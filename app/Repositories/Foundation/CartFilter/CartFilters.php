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

            $cart_id = $this->builder->get()->filter(function ($value) {
                return !$this->overTime($value);
            })->pluck('id');

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

            $cart_id = $this->builder->get()->filter(function ($value) {
                return !! $value->meals;
            })->pluck('id');

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

            $cart_id = $this->builder->get()->filter(function ($value) {
                return !! $value->datetimepeoples;
            })->pluck('id');
           
            $query->whereIn('id', $cart_id);
        });

        return $this;
    }

    public function eagerLoadMeal()
    {
        $this->builder->with('meals');

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->builder;
    }
}   