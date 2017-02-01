<?php

namespace App\Repositories\Foundation;

use Carbon\Carbon;

trait DateTrait
{
    public function CheckDate($date)
    {
        if ($date == $this->getToday()) {
             $h = Carbon::now()->hour;
             $m = Carbon::now()->minute;
             return $h . ':' . $m;
         } 

         return '';
    }

    public function getToday()
    {
        return date("Y-m-d" , strtotime(Carbon::now()) );
    }
}