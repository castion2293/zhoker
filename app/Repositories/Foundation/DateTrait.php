<?php

namespace App\Repositories\Foundation;

use Carbon\Carbon;

trait DateTrait
{
    public function CheckDate($date)
    {
        if ($date == $this->getTodayDate()) {
            return date("H:i", strtotime(Carbon::now()));
         } 

         return '';
    }

    /**
     * @param $cart, $now
     * @return boolean
     */
     public function compareDateTime($cart, $now = null)
     {
         count($now) ?: $now = Carbon::now();

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

    public function getTodayDate($now = null)
    {
        count($now) ?: $now = Carbon::now();

        return date("Y-m-d" , strtotime($now) );
    }

    public function getTodayTime($now = null)
    {
        count($now) ?: $now = Carbon::now();

        return date("H:i", strtotime($now) );
    }
}