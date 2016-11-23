<?php

namespace App\Presenters;

class OrderPresenter
{
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