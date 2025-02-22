<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialLogin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialLoginController extends Controller
{
    // Redirect to provider
    public function redirectToProvider($provider)
    {
      
        return Socialite::driver($provider)->redirect();
    }

    // Handle provider callback
    public function handleProviderCallback($provider)
    {
       
       
        $socialUser = Socialite::driver($provider)->stateless()->user();

        // Find or create the user
        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => bcrypt(Str::random(24)), 
            ]);
        }

        // Store or update social login information
        SocialLogin::updateOrCreate(
            [
                'user_id' => $user->id,
                'provider' => strtoupper($provider),
            ],
            [
                'provider_user_id' => $socialUser->getId(),
                'access_token' => $socialUser->token,
                'refresh_token' => $socialUser->refreshToken,
                'expires_at' => $socialUser->expiresIn ? now()->addSeconds($socialUser->expiresIn) : null,
            ]
        );

        // Log in the user
        Auth::login($user);

        return redirect()->intended(route('dashboard'));
    }
}
