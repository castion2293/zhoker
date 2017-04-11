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

    /**
     * UserProfileController constructor.
     * @param UserProfileService $userProfileService
     * @param AgentService $agentService
     * @param CreditCardService $creditCardService
     * @param SessionService $sessionService
     * @param GateService $gateService
     */
    public function __construct(UserProfileService $userProfileService, AgentService $agentService, CreditCardService $creditCardService, SessionService $sessionService,
                                GateService $gateService) 
    {
        $this->middleware('auth');

        $this->userProfileService = $userProfileService;
        $this->creditCardService = $creditCardService;
        $this->agentService = $agentService;
        $this->sessionService = $sessionService;
        $this->gateService = $gateService;

        parent::boot();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->userProfileService->findUser()->getUser();
        $carts = $this->userProfileService->findCartByUser($user)->getCart();
        $userorders = $this->userProfileService->findUserOrderByUser($user, 3)->getUserOrder();

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
        $user = $this->userProfileService->findUser()->getUser();
        
        return redirect()->route('user_profile.edit', $user->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->gateService->userIdCheck($id);
        
        $user = $this->userProfileService->findUser($id)->getUser();

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

        $user = $this->userProfileService->findUser($id)->getUser();

        $this->userProfileService->update($user, $request);

        flash()->success(Self::$lang->desktop()['flash']['success'], Self::$lang->desktop()['flash']['update_user_profile']);
        return redirect()->action('UserProfileController@index');
    }

    /**
     * @param UserResetPasswordRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function resetPassword(UserResetPasswordRequest $request)
    {
        $user = $this->userProfileService->findUser()->getUser();

        if ($this->userProfileService->resetPassword($user, $request)) {

            flash()->success(Self::$lang->desktop()['flash']['success'], Self::$lang->desktop()['flash']['reset_password']);
            $agent = $this->agentService->agent();
            return view($agent . '.user.setting', ['user' => $user]);
        } else {

            flash()->error(Self::$lang->desktop()['flash']['error'], Self::$lang->desktop()['flash']['not_match_password']);
            return redirect()->back();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postPaymentCreate(Request $request)
    {
        $user = $this->userProfileService->findUser()->getUser();

        $this->creditCardService->setAPIKey(config('services.stripe.secret'));
        try {
            $this->creditCardService->createCustomer($user, $request)->createCreditCard($user);

            if ($this->sessionService->has('oldUrl')) {
                $oldUrl = $this->sessionService->get('oldUrl');
                $this->sessionService->forget('oldUrl');
                
                flash()->success(Self::$lang->desktop()['flash']['success'], Self::$lang->desktop()['flash']['bind_card']);
                return redirect($oldUrl);
            }

            flash()->success(Self::$lang->desktop()['flash']['success'], Self::$lang->desktop()['flash']['bind_card']);
            $url = url()->previous() . "#payment";
            return redirect($url);

        } catch (\Exception $e) {

            flash()->error(Self::$lang->desktop()['flash']['error'], $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postPaymentEdit(Request $request)
    {
        $user = $this->userProfileService->findUser()->getUser();
        
        $this->creditCardService->setAPIKey(config('services.stripe.secret'));
        try {
            $this->creditCardService->createCustomer($user, $request)
                                    ->findCreditCardByUser($user)
                                    ->updateCreditCard();

            flash()->success(Self::$lang->desktop()['flash']['success'], Self::$lang->desktop()['flash']['update_card']);
            $url = url()->previous() . "#payment";
            return redirect($url);

        } catch (\Exception $e) {

            flash()->error(Self::$lang->desktop()['flash']['error'], $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getPaymentDelete($id)
    {
        $this->gateService->userIdCheck($id);
        
        $user = $this->userProfileService->findUser($id)->getUser();
        $credit_card = $this->creditCardService->findCreditCardByUser($user)->deleteCreditCard();

        flash()->success(Self::$lang->desktop()['flash']['success'], Self::$lang->desktop()['flash']['delete_card']);
        $url = url()->previous() . "#payment";
        return redirect($url);
    }
}
