<?php

namespace App\Repositories;

use App\Shift;

class ShiftRepository 
{
    protected $shift;

    /**
     * ShiftRepository constructor.
     * @param Shift $shift
     */
    public function __construct(Shift $shift)
    {
        $this->shift = $shift;
    }

    /**
     * @param $id
     * @return shift
     */
     public function findShiftById($id)
     {
        return $this->shift->finOrFail($id);
     }

    /**
     * @param $shift_name
     * @return shift
     */
     public function findShiftByShiftName($shift_name = null)
     {
         return $this->shift->findShift($shift_name);
     }
     
     /**
     * @param shift
     * @return meal
     */
     public function forMeals(Shift $shift, $qty = null)
     {
         if ($qty) {
             return $shift->meals()->take($qty)->get();
         } else {
             return $shift->meals()->get();
         }
     }
}