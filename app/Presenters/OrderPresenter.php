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
     * @param $cart, $now
     * @return boolean
     */
     public function compareDateTime($cart, $now = null)
     {
         if ($this->getTodayDate($now) == $cart->date)
            return $this->compareTime($cart->time, $now);
         else if ($this->getTodayDate($now) > $cart->date) 
            return true;
         else 
            return false;
     }

     /**
     * @param $time, $now
     * @return boolean
     */
     public function compareTime($time, $now)
     {
         if ($this->getTodayTime($now) > $time)
            return true;
         else
            return false;
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

     
}