<?php

namespace App\Presenters;

use App\Repositories\Foundation\DateTrait;

class OrderPresenter
{
     use DateTrait;

     /**
     * @param $cart
     * @return boolean
     */
     public function chefOrderCheck($cart)
     {
         return $cart->cheforders()->withTrashed()->first()->checked;
     }

     /**
     * @param $cart
     * @return boolean
     */
     public function chefDeleteCheck($cart)
     {
         return $cart->cheforders()->withTrashed()->first()->deleted_at;
     }

     /**
     * determine paid status
     * @param boolean $paid
     * @return string
     */
     public function paidCheck($paid)
     {
         if ($paid)
            return 'Paid';
         else
            return 'Not Paid';
     }

      /**
     * @param $cart
     * @return $image
     */
     public function getMealImage($cart)
     {
        return $cart->meals()->withTrashed()->first()->images->take(1);
     }

      /**
     * @param $cart
     * @return name
     */
     public function getMealName($cart)
     {
         return $cart->meals()->withTrashed()->first()->name;
     }

     /**
     * @param $cart
     * @return price
     */
     public function getMealPrice($cart)
     {
         return $cart->meals()->withTrashed()->first()->price;
     }
}