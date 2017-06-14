<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Image;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'slug', 'avatar', 'birthday', 'visitor', 'email', 'password', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function urlStoreAvatar($url) {
        $size = getimagesize($url);
        $extension = image_type_to_extension($size[2]);
        if($extension == '.jpeg') { $extension = '.jpg'; }

        $filename = md5(time()).$extension;

        $image = Image::make($url);

        $image_512 = $image->fit(512)->encode(substr($extension, 1, 4));
        $res =  Storage::disk('public')->put('avatars/512/'.$filename, $image_512->getEncoded(), 'public');

        $image_128 = $image->fit(128)->encode(substr($extension, 1, 4));
                Storage::disk('public')->put('avatars/128/'.$filename, $image_128->getEncoded(), 'public');

       if($res) {
           return $filename;
       }
        return null;
    }

    public static function createBySocialProvider($providerUser)
        {
            $fullname = explode(" ", $providerUser->getName());

            $slug = str_slug($providerUser->getName(), '-');
            $orderslugs = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->orderBy('slug', 'desc')->first();
                if($orderslugs) {
                $count = explode("-", $orderslugs->slug);
                $count = last($count) + 1;
                $slug = $slug.'-'.$count;
                }


            return self::create([
                'email' => $providerUser->getEmail(),
                'name' => $fullname[0],
                'surname' => $fullname[1],
                'slug' => $slug,
                'avatar' => \App\User::urlStoreAvatar($providerUser->avatar_original),
                'visitor' => \Request::ip(),

                //'name' => $providerUser->getName(),
                //'surname' => $providerUser->getNickname(),
            ]);
        }


}
