<?php

namespace App\Repositories\Foundation\CartFilter;

use App\Repositories\Foundation\QueryFilter;

class CartFilters extends QueryFilter
{
    /**
     * @param $builder
     * @return $this
     */
    public function applyCart($builder)
    {
        $this->builder = $builder;

        return $this;
    }

    /**
     * @param 
     * @return $this
     */
    public function uncheck()
    {
        $this->builder->where('checked', 0);

        return $this;
    }

    /**
     * @param 
     * @return $this
     */
    public function fresh()
    {
        $this->builder->where(function ($query) {
            $cart_id = [];

            foreach ($this->builder->get() as $cart) {
                if (!$this->overTime($cart)) 
                    $cart_id = array_prepend($cart_id, $cart->id);
            }

            $query->whereIn('id', $cart_id);
        });
        
        return $this;
    }

    /**
     * @param 
     * @return $this
     */
    public function hasMeal()
    {
        $this->builder->where(function ($query) {
            $cart_id = [];

            foreach ($this->builder->get() as $cart) {
                if ($cart->meals)
                    $cart_id = array_prepend($cart_id, $cart->id);
            }

            $query->whereIn('id', $cart_id);
        });

        return $this;
    }

    /**
     * @param 
     * @return $this
     */
    public function hasDateTimePeople()
    {
        $this->builder->where(function ($query) {
            $cart_id = [];

            foreach ($this->builder->get() as $cart) {
                if ($cart->datetimepeoples) {
                    $cart_id = array_prepend($cart_id, $cart->id);
                }
            }
           
            $query->whereIn('id', $cart_id);
        });

        return $this;
    }

    /**
     * @param 
     * @return $builrder
     */
    public function getQuery()
    {
        return $this->builder;
    }
}   