<?php

namespace App\Repositories;

use App\ChefOrder;

class ChefOrderRepository
{
    protected $chefOrder;

    /**
    * ChefOrderRepository constructor.
    * @param ChefOrder $chefOrder
    */
    public function __construct(ChefOrder $chefOrder)
    {
        $this->chefOrder = $chefOrder;
    }

    /**
     * @param $chef_id
     * @return chefOrder
     */
    public function create($chef_id)
    {
        return $this->chefOrder->create([
            'chef_id' => $chef_id,
        ]);
    }

    /**
     * @param $chefOrder
     * @return chef
     */
    public function forChef(ChefOrder $chefOrder)
    {
        return $chefOrder->chefs()->first();
    }

}