<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserProfileEditRequest;
use App\Http\Requests\UserResetPasswordRequest;

use App\Services\UserProfileService;
use App\Services\CreditCardService;
use App\Services\AgentService;
use App\Services\SessionService;
use App\Services\GateService;

class UserProfileController extends Controller
{
    protected $userProfileService;
    protected $creditCardService;
    protected $agentService;
    protected $sessionService;
    protected $gateService;

    public function __construct(UserProfileService $userProfileService, AgentService $agentService, CreditCardService $creditCardService, SessionService $sessionService,
                                GateService $gateService) 
    {
        $this->middleware('auth');

        $this->userProfileService = $userProfileService;
        $this->creditCardService = $creditCardService;
        $this->agentService = $agentService;
        $this->sessionService = $sessionService;
        $this->gateService = $gateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->userProfileService->indexUser();
        $carts = $this->userProfileService->indexCart($user);
        $userorders = $this->userProfileService->indexUserOrder($user, 3);

        $agent = $this->agentService->agent();
        return view($agent . '.user.profile', ['user' => $user, 'carts' => $carts, 'userorders' => $userorders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->userProfileService->indexUser();
        
        return redirect()->route('user_profile.edit', encrypt($user->id));
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
        $id = $this->gateService->decrypt($id);
        $this->gateService->userIdCheck($id);

        $user = $this->userProfileService->indexUser($id);

        $agent = $this->agentService->agent();
        return view($agent . '.user.setting', ['user' => $user]);
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
        $this->gateService->userIdCheck($id);

        $user = $this->userProfileService->indexUser($id);

        $this->userProfileService->update($user, $request);

        flash()->success('Success', 'Your profile has been updated successfully!');
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
        $user = $this->userProfileService->indexUser();

        if ($this->userProfileService->resetPassword($user, $request)) {

            flash()->success('Success', 'Password has been reseted successfully!');
            $agent = $this->agentService->agent();
            return view($agent . '.user.setting', ['user' => $user]);
        } else {

            flash()->error('Error', 'The specified password does not match the database password');
            return redirect()->back();
        }
    }

    public function postPaymentCreate(Request $request)
    {
        $user = $this->userProfileService->indexUser();

        $this->creditCardService->setAPIKey(config('services.stripe.secret'));
        try {
            $customer = $this->creditCardService->createCustomer($user, $request);
            
            $this->creditCardService->createCreditCard($user, $customer);

            if ($this->sessionService->has('oldUrl')) {
                $oldUrl = $this->sessionService->get('oldUrl');
                $this->sessionService->forget('oldUrl');
                
                flash()->success('Success', 'The credit card has been binded successfully!');
                return redirect($oldUrl);
            }

            flash()->success('Success', 'The credit card has been binded successfully!');
            $url = url()->previous() . "#payment";
            return redirect($url);

        } catch (\Exception $e) {

            flash()->error('Error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function postPaymentEdit(Request $request)
    {
        $user = $this->userProfileService->indexUser();
        
        $this->creditCardService->setAPIKey(config('services.stripe.secret'));
        try {
            $customer = $this->creditCardService->createCustomer($user, $request);
            
            $creditCard = $this->creditCardService->findCreditCard($user);
            $this->creditCardService->updateCreditCard($creditCard, $user, $customer);

            flash()->success('Success', 'The credit card has been updated successfully!');
            $url = url()->previous() . "#payment";
            return redirect($url);

        } catch (\Exception $e) {

            flash()->error('Error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getPaymentDelete($id)
    {
        $id = $this->gateService->decrypt($id);
        $this->gateService->userIdCheck($id);

        $user = $this->userProfileService->indexUser($id);
        $credit_card = $this->creditCardService->findCreditCard($user);

        $this->creditCardService->deleteCreditCard($credit_card);

        flash()->success('Success', 'The credit card has been deleted successfully!');
        $url = url()->previous() . "#payment";
        return redirect($url);
    }
}
