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