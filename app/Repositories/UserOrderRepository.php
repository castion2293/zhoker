<?php

namespace App\Repositories;

use App\UserOrder;

class UserOrderRepository
{
    protected $userOrder;

    /**
    * UserOrderRepository constructor.
    * @param UserOrder $userOrder
    */
    public function __construct(UserOrder $userOrder)
    {
        $this->userOrder = $userOrder;
    }

    /**
     * @param $user
     * @param $cashier_id
     * @param $totalPrice
     * @return static
     */
    public function create($user, $cashier_id, $totalPrice)
    {
        return $this->userOrder->create([
            'user_id' => $user->id,
            'total_price' => $totalPrice,
            'pay_way' => '',
            'contact_first_name' => $user->first_name,
            'contact_last_name' => $user->last_name,
            'contact_phone_number' => $user->phone_number,
            'contact_email' => $user->email,
            'contact_address' => '',
            'cashier_id' => $cashier_id,
        ]);
    }
}