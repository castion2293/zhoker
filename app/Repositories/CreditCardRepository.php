<?php

namespace App\Repositories;

use App\CreditCard;

class CreditCardRepository
{
    protected $creditCard;

    /**
     * CreditCardRepository constructor.
     * @param CreditCard $creditCard
     */
    public function __construct(CreditCard $creditCard)
    {
        $this->creditCard = $creditCard;
    }

    /**
     * @param $id, $customer
     * @return chef
     */
    public function create($id, $customer)
    {
        return $this->creditCard->firstOrCreate([
            'user_id' => $id,
            'customer_id' => $customer->id,
            'brand' => $customer->sources->data[0]->brand,
            'cvc_check' => $customer->sources->data[0]->cvc_check,
            'last4' => $customer->sources->data[0]->last4,
            'exp_month' => $customer->sources->data[0]->exp_month,
            'exp_year' => $customer->sources->data[0]->exp_year,
            'card_name' => $customer->sources->data[0]->name,
            'funding' => $customer->sources->data[0]->funding,
        ]);
    }

    /**
     * @param $credit_card, $customer
     * @return chef
     */
    public function update($credit_card, $customer)
    {
        return $credit_card->update([
            'customer_id' => $customer->id,
            'brand' => $customer->sources->data[0]->brand,
            'cvc_check' => $customer->sources->data[0]->cvc_check,
            'last4' => $customer->sources->data[0]->last4,
            'exp_month' => $customer->sources->data[0]->exp_month,
            'exp_year' => $customer->sources->data[0]->exp_year,
            'card_name' => $customer->sources->data[0]->name,
            'funding' => $customer->sources->data[0]->funding,
        ]);
    }

    /**
     * @param $credit_card
     * @return 
     */
    public function delete($credit_card)
    {
        return $credit_card->delete();
    }
}