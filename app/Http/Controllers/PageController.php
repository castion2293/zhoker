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

    public function __construct(MailService $mailService, AgentService $agentService) 
    {
        $this->mailService = $mailService;
        $this->agentService = $agentService;
    }

    public function getContact() 
    {
        $agent = $this->agentService->agent();
        return view($agent . '.others.contact');
    }

    public function postContact(ContactRequest $request) 
    {
        $this->mailService->sendContactMail($request->all());
        $this->mailService->sendContactCustomerMail($request->all());

        $agent = $this->agentService->agent();
        return view($agent . '.email.SendContactEmail');
    }

    public function getAbout()
    {
        $agent = $this->agentService->agent();
        return view($agent . '.others.about');
    }

    public function getPress()
    {
        $agent = $this->agentService->agent();
        return view($agent . '.others.press');
    }

    public function getCareer()
    {
        $agent = $this->agentService->agent();
        return view($agent . '.others.career');
    }

    public function getHelp()
    {
        $agent = $this->agentService->agent();
        return view($agent . '.others.help');
    }
}
