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
        $user = $this->findOrCreateFaceBookUser(
            Socialite::driver('facebook')->user()
        );

        Auth::login( $user);
        //redirect to home page
        return redirect()->route('home.index', ['user' => $user]);
    }

    protected function findOrCreateFaceBookUser($fbUser)
    {
        $user = User::firstOrNew(['email' => $fbUser->email]);
        
        if($user->exists) return $user;

        $user->fill([
            'first_name' => $fbUser->name,
            'email' => $fbUser->email,
            'password' => bcrypt($fbUser->id),
            'user_profile_img' => $fbUser->avatar_original
        ])->save();

        return $user;
    }
}
