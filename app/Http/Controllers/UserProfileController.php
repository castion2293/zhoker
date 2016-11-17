<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserProfileEditRequest;
use App\Http\Requests\UserResetPasswordRequest;

use Auth;
use Hash;
use App\User;
use App\CreditCard;
use Storage;
use Stripe\Stripe;
use Stripe\Customer;

class UserProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('desktop.user.profile', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;

        return redirect()->route('user_profile.edit', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        //dd($user->creditcards()->get()->isEmpty());

        return view('desktop.user.setting', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfileEditRequest $request, $id)
    {
        $user = User::find($id);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        
        if ($request->hasFile('user_profile_img')) {

            $image = $request->file('user_profile_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $s3 = Storage::disk('s3');
            $filePath = '/profile_images/' . $filename;
            $s3->put($filePath, file_get_contents($image), 'public');

            $leng = strlen('https://s3-us-west-2.amazonaws.com/zhoker');

            $oldFilename = $user->user_profile_img;
            $oldpath = substr($oldFilename, $leng);
            $s3->delete($oldpath);
            
            $user->user_profile_img = 'https://s3-us-west-2.amazonaws.com/zhoker' . $filePath;
        }

        $user->save();

        return redirect()->route('user_profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function resetPassword(UserResetPasswordRequest $request)
    {
        $data = $request->all();

        $user = User::find(Auth::user()->id);

        if (password_verify($data['old_password'], $user->password)) {
            $user->password = bcrypt($data['password']);
            $user->save();

            return view('desktop.user.setting', ['user' => $user]);
        } else {
            return back()->withErrors('The specified password does not match the database password');
        }
        
    }

    public function postPaymentCreate(Request $request)
    {
        $user = Auth::user();

        Stripe::setApiKey(config('services.stripe.secret'));
        try {
            $customer = Customer::create([
                "email" => $user->email,
                "source" => $request->input('stripeToken'),
                "description" => $user->first_name,
            ]);
            
            $credit_card = CreditCard::firstOrCreate([
                'user_id' => $user->id,
                'customer_id' => encrypt($customer->id),
                'brand' => $customer->sources->data[0]->brand,
                'cvc_check' => $customer->sources->data[0]->cvc_check,
                'last4' => $customer->sources->data[0]->last4,
                'exp_month' => $customer->sources->data[0]->exp_month,
                'exp_year' => $customer->sources->data[0]->exp_year,
                'card_name' => $customer->sources->data[0]->name,
                'funding' => $customer->sources->data[0]->funding,
            ]);

            $url = url()->previous() . "#payment";
            return redirect($url);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function postPaymentEdit(Request $request)
    {
        $user = Auth::user();
        
        Stripe::setApiKey(config('services.stripe.secret'));
        try {
            $customer = Customer::create([
                "email" => $user->email,
                "source" => $request->input('stripeToken'),
                "description" => $user->first_name,
            ]);
            
            $credit_card = $user->creditcards()->first();
            
            $credit_card->customer_id = encrypt($customer->id);
            $credit_card->brand =  $customer->sources->data[0]->brand;
            $credit_card->cvc_check = $customer->sources->data[0]->cvc_check;
            $credit_card->exp_month = $customer->sources->data[0]->exp_month;
            $credit_card->exp_year = $customer->sources->data[0]->exp_year;
            $credit_card->card_name = $customer->sources->data[0]->name;
            $credit_card->funding = $customer->sources->data[0]->funding;
            $credit_card->last4 = $customer->sources->data[0]->last4;
            $user->creditcards()->save($credit_card);

            $url = url()->previous() . "#payment";
            return redirect($url);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getPaymentDelete($id)
    {
        $credit_card = CreditCard::where('user_id', $id)->first();

        $credit_card->delete();

        $url = url()->previous() . "#payment";
        return redirect($url);
    }
}
