<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Socialite;
use Session;

class OAuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        
        if ( empty($local_user = User::where('email', $user->email)->first()) ) {
            
            $local_user = User::firstorCreate([
                'first_name' => $user->name,
                'email' => $user->email,
                'password' => $user->id,
            ]);
        }

        Auth::login($local_user);

        return redirect()->route('home.index', ['user' => $user]);
    }
}
