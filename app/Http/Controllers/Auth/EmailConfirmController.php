<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserToken;
use App\User;
use Auth;
use Validator;
use App\Notifications\SendAccountActiveEmail;
use Illuminate\Auth\Events\Registered;

class EmailConfirmController extends Controller
{
    public function sendConfirmEmail(Request $request)
    {
        $this->validator($request->all())->validate();

        $userToken = UserToken::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'password' => $request->input('password'),
            'token' => str_random(64),
            'status' => 0
        ]);

        $userToken->notify(new SendAccountActiveEmail($userToken));

        return view('desktop.email.SendEmail');
    }

    public function confirmEmail(Request $request, $token)
    {
        $userToken = UserToken::where('token', $token)->first();

        $userArray = [
            'first_name' => $userToken->first_name,
            'last_name' => $userToken->last_name,
            'email' => $userToken->email,
            'phone_number' => $userToken->phone_number,
            'password' => $userToken->password,
        ];

        event(new Registered($user = $this->create($userArray)));
        
        Auth::login($user);

        $userToken->delete();

        return redirect()->route('home.index');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'phone_number' => 'required|numeric',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response'=>'required|captcha',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
