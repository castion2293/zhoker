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
     * @param null
     * @return shift
     */
     public function findShiftAll()
     {
        return $this->shift->all();
     }
}