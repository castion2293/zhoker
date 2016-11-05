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

        $local_user = User::firstorNew([
            'email' => $user->email,
        ]);

        $local_user->first_name = $user->name;
        $local_user->password = bcrypt($user->id);

        $local_user->save();

        Auth::login($local_user);

        return redirect()->route('home.index', ['user' => $user]);
    }
}
