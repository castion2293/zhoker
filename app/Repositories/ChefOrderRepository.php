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
     * @return mixed
     */
    public function findChefOrderById($id)
    {
        return $this->chefOrder->find($id);
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
     * @param ChefOrder $chefOrder
     * @return bool
     */
    public function updateCheck(ChefOrder $chefOrder)
    {
        return $chefOrder->update([
            'checked' => true,
        ]);
    }

    /**
     * @param ChefOrder $chefOrder
     * @return bool
     */
    public function updatePaid(ChefOrder $chefOrder)
    {
        return $chefOrder->update([
            'paid' => true,
        ]);
    }

    /**
     * @param ChefOrder $chefOrder
     * @return mixed
     */
    public function forChef(ChefOrder $chefOrder)
    {
        return $chefOrder->chefs()->first();
    }

    /**
     * @param ChefOrder $chefOrder
     * @return mixed
     */
    public function forCart(ChefOrder $chefOrder)
    {
        return $chefOrder->carts()->first();
    }

    /**
     * @param ChefOrder $chefOrder
     * @return bool|null
     */
     public function delete(ChefOrder $chefOrder)
     {
         return $chefOrder->delete();
     }

}