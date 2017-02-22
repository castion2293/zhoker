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
     * @param UserRepository $userRepo
     * @param CreditCardRepository $creditCardRepo
     */
    public function __construct(UserRepository $userRepo, CreditCardRepository $creditCardRepo)
    {
        $this->userRepo = $userRepo;
        $this->creditCardRepo = $creditCardRepo;
    }

    /**
     * @param $key
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
     * @param $price
     * @param $currency
     * @param $customer_id
     * @return Charge
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
     * @return $this
     */
    public function findCreditCardByUser($user)
    {
        $this->creditCard = $this->userRepo->forCreditCard($user);

        return $this;
    }

    /**
     * @param $user
     * @param null $customer
     * @return \App\Repositories\chef
     */
    public function createCreditCard($user, $customer = null)
    {
        count($customer) ?: $customer = $this->customer;

        return $this->creditCardRepo->create($user->id, $customer);
    }

    /**
     * @param null $creditCard
     * @param null $customer
     * @return \App\Repositories\chef
     */
    public function updateCreditCard($creditCard = null, $customer = null)
    {
        count($creditCard) ?: $creditCard = $this->creditCard;
        count($customer) ?: $customer = $this->customer;

        return $this->creditCardRepo->update($creditCard, $customer);
    }

    /**
     * @param null $creditCard
     * @return mixed
     */
    public function deleteCreditCard($creditCard = null)
    {
        count($creditCard) ?: $creditCard = $this->creditCard;

        return $this->creditCardRepo->delete($creditCard);
    }

    
}