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
     * @param $id
     * @return chefOrder
     */
    public function findChefOrderById($id)
    {
        return $this->chefOrder->findOrFail($id);
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
     * @return 
     */
    public function updateCheck(ChefOrder $chefOrder)
    {
        return $chefOrder->update([
            'checked' => true,
        ]);
    }

    /**
     * @param $chefOrder
     * @return 
     */
    public function updatePaid(ChefOrder $chefOrder)
    {
        return $chefOrder->update([
            'paid' => true,
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

    /**
     * @param $chefOrder
     * @return cart
     */
    public function forCart(ChefOrder $chefOrder)
    {
        return $chefOrder->carts()->first();
    }

     /**
     * @param $chefOrder
     * @return 
     */
     public function delete(ChefOrder $chefOrder)
     {
         return $chefOrder->delete();
     }

}