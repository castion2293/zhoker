<?php

namespace App\Repositories\Foundation;

use Carbon\Carbon;

trait DateTrait
{
    public function CheckDate($date)
    {
        if ($date == $this->getToday()) {
            return date("H:i", strtotime(Carbon::now()));
         } 

         return '';
    }

    public function getToday()
    {
        return date("Y-m-d" , strtotime(Carbon::now()) );
    }
}