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

    protected $creditCard;
    protected $customer;

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
    * @return $this
    */
    public function createCustomer($user, $request)
    {
        $this->customer = Customer::create([
            "email" => $user->email,
            "source" => $request->stripeToken,
            "description" => $user->first_name,
        ]);

        return $this;
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
    public function findCreditCardByUser($user)
    {
        $this->creditCard = $this->userRepo->forCreditCard($user);

        return $this;
    }

    /**
    * @param $user, $customer
    * @return 
    */
    public function createCreditCard($user, $customer = null)
    {
        count($customer) ?: $customer = $this->customer;

        return $this->creditCardRepo->create($user->id, $customer);
    }

    /**
    * @param $creditCard, $user, $customer
    * @return 
    */
    public function updateCreditCard($creditCard = null, $customer = null)
    {
        count($creditCard) ?: $creditCard = $this->creditCard;
        count($customer) ?: $customer = $this->customer;

        return $this->creditCardRepo->update($creditCard, $customer);
    }

    /**
    * @param $creditCard
    * @return 
    */
    public function deleteCreditCard($creditCard = null)
    {
        count($creditCard) ?: $creditCard = $this->creditCard;

        return $this->creditCardRepo->delete($creditCard);
    }

    
}