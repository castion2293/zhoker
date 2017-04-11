<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

use App\Services\MailService;
use App\Services\AgentService;

class PageController extends Controller
{
    protected $mailService;
    protected $agentService;

    /**
     * PageController constructor.
     * @param MailService $mailService
     * @param AgentService $agentService
     */
    public function __construct(MailService $mailService, AgentService $agentService) 
    {
        $this->mailService = $mailService;
        $this->agentService = $agentService;

        parent::boot();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact() 
    {

        $agent = $this->agentService->agent();
        return view($agent . '.others.contact');
    }

    /**
     * @param ContactRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postContact(ContactRequest $request) 
    {
        $this->mailService->sendContactMail($request->all());
        $this->mailService->sendContactCustomerMail($request->all());

        $agent = $this->agentService->agent();
        return view($agent . '.email.SendContactEmail');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAbout()
    {
        $agent = $this->agentService->agent();
        return view($agent . '.others.about');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPress()
    {
        $agent = $this->agentService->agent();
        return view($agent . '.others.press');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCareer()
    {
        $agent = $this->agentService->agent();
        return view($agent . '.others.career');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHelp()
    {
        $agent = $this->agentService->agent();
        return view($agent . '.others.help');
    }
}
