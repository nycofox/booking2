<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function googleRedirect()
    {
        Session::put('redirect', url()->previous());

        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $redirectAddress = Session::get('redirect') ?? route('home');

        $google_user = Socialite::driver('google')->user();

        $auth_user = User::updateOrCreate(
            [
                'social_id' => $google_user->id,
            ],
            [
                'name' => $google_user->name,
                'email' => $google_user->email,
                'social_id' => $google_user->id,
                'social_provider' => 'google',
                'avatar_url' => $google_user->getAvatar(),
                'last_active_at' => now(),
                'anonymized_at' => null,
            ]
        );

        Auth::login($auth_user, true);

        $auth_user->activities()->create([
            'type' => 'login'
        ]);

        return redirect(route('home'));
    }
}
