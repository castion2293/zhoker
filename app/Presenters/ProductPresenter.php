<?php

namespace App\Presenters;

class ProductPresenter
{
    /**
     * check user buy next time item
     * @param $user, $id
     * @return string
     */
     public function checkUserBuyNextTimeItem($user, $id)
     {
         if (count($user->datetimepeoples()->find($id)))
            return true;

         return false;
     }

     /**
     * @param $score, $number
     * @return int
     */
     public function getEvaluateScore($score, $number)
     {
         return $score / $number;
     }
}