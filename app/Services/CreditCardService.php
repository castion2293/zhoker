<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\CreditCardRepository;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class CreditCardService
{
    protected $userRepo;
    protected $creditCardRepo;

    /**
     * CreditCardService constructor.
     */
    public function __construct(UserRepository $userRepo, CreditCardRepository $creditCardRepo)
    {
        $this->userRepo = $userRepo;
        $this->creditCardRepo = $creditCardRepo;
    }

    /**
    * @param $key
    * @return 
    */
    public function setAPIKey($key)
    {
        return Stripe::setApiKey($key);
    }

    /**
    * @param $user, $request
    * @return customer
    */
    public function createCustomer($user, $request)
    {
        return Customer::create([
            "email" => $user->email,
            "source" => $request->stripeToken,
            "description" => $user->first_name,
        ]);
    }

    /**
    * @param $price, $currency, $customer_id
    * @return 
    */
    public function charge($price, $currency, $customer_id)
    {
        return Charge::create([
            "amount" => $price * 100,
            "currency" => $currency,
            "customer" => $customer_id,
        ]);
    }

    /**
    * @param $user
    * @return 
    */
    public function findCreditCard($user)
    {
        return $this->userRepo->forCreditCard($user);
    }

    /**
    * @param $user, $customer
    * @return 
    */
    public function createCreditCard($user, $customer)
    {
        return $this->creditCardRepo->create($user->id, $customer);
    }

    /**
    * @param $credit_card, $user, $customer
    * @return 
    */
    public function updateCreditCard($credit_card, $user, $customer)
    {
        $credit_card->customer_id = encrypt($customer->id);
        $credit_card->brand =  $customer->sources->data[0]->brand;
        $credit_card->cvc_check = $customer->sources->data[0]->cvc_check;
        $credit_card->exp_month = $customer->sources->data[0]->exp_month;
        $credit_card->exp_year = $customer->sources->data[0]->exp_year;
        $credit_card->card_name = $customer->sources->data[0]->name;
        $credit_card->funding = $customer->sources->data[0]->funding;
        $credit_card->last4 = $customer->sources->data[0]->last4;

        return $this->userRepo->saveCreditCard($user, $credit_card);
    }

    /**
    * @param $credit_card
    * @return 
    */
    public function deleteCreditCard($credit_card)
    {
        return $this->creditCardRepo->delete($credit_card);
    }

    
}