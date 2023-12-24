<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $user = User::updateOrCreate([
            'id' => $socialUser->id,
        ], [
            'name'=> $socialUser->name,
            'email'=> $socialUser->email,
            'claimed' => true,
            'remember_token' => $socialUser->token,
        ]);
    }
}
