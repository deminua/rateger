<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use Socialite;
use App\UserSocialAccount;

class SocialController extends Controller
{
    public function login($provider)
    {
        return Socialite::with($provider)->redirect();
    }

    public function callback(SocialAccountService $service, $provider)
    {

        $driver   = Socialite::driver($provider);
        $user = $service->createOrGetUser($driver, $provider);
        \Auth::login($user, true);
        return redirect()->route('user.show', ['slug'=>$user->slug]);
        #return redirect()->intended('/');

    }

    public function social()
    {

        $usersocials = UserSocialAccount::where('user_id', auth()->user()->id)->get();
        #return dd($usersocials);

        $res = [];

        foreach (app()['config']['services'] as $key => $value) {

        $res[$key] = null;

            foreach ($usersocials as $us) {
                if($key == $us->provider) {
                    $res[$us->provider] = $us;
                }
            }
        }

        return view('social', ['usersocials'=>$res]);
    }

    public function disable($provider)
    {
        UserSocialAccount::where('user_id', auth()->user()->id)->where('provider', $provider)->delete();
        return back();
    }
}
