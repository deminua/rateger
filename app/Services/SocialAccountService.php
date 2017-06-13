<?php

namespace App\Services;

use App\UserSocialAccount;
use App\User;

class SocialAccountService
{
    public function createOrGetUser($providerObj, $providerName)
    {

       
        $providerUser = $providerObj->user();
        //$providerUser->get    avatar_original

        $account = UserSocialAccount::whereProvider($providerName)
                        ->whereProviderUserId($providerUser->getId())
                            ->first();




        //Если есть аккаунт, авторизируем
        if ($account) {
            if (auth()->check()) {
                    if($account->user_id != auth()->user()->id) {
                        $account->user_id = auth()->user()->id;
                        $account->save();
                    }
            }

            return $account->user;


        } else {

            //Создаем новый
            $account = new UserSocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName]);

            $user = User::whereEmail($providerUser->getEmail())->first();


            if (\Auth::check()) {
                        $user = \Auth::user();
            } else {
                        if (!$user) {
                            $user = User::createBySocialProvider($providerUser);
                            #$user->code = md5($user->id);
                        }
                  }

            $user->api_token = str_random(60);
            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}