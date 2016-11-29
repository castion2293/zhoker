<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use App\Mail\ContactCustomerEmail;
use Carbon\Carbon;

class MailService
{
    /**
     * @param $date
     * @return 
     */
    public function sendContactMail($data)
    {
        return Mail::to('castion2293@yahoo.com.tw')->queue(new ContactEmail($data));
    }

    /**
     * @param $date
     * @return 
     */
    public function sendContactCustomerMail($data)
    {
        return Mail::to($data['email'])->queue(new ContactCustomerEmail($data));
    }
}