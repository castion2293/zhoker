<?php

namespace App\Repositories;

use App\DateTimePeople;

class DateTimePeopleRepository
{
    protected $datetimepeople;

    public function __construct(DateTimePeople $datetimepeople)
    {
        $this->datetimepeople = $datetimepeople;
    }

    /**
     * @return datetimepeople
     */
     public function NewDateTimePeople()
     {
        return new DateTimePeople();
     }

     /**
     * @param $id
     * @return datetimepeople
     */
     public function findDateTimePeopleById($id)
     {
        return $this->datetimepeople->findOrFail($id);
     }

     /**
     * @param $datetimepeople
     * @return 
     */
     public function save(DatetimePeople $datetimepeople)
     {
        return $datetimepeople->save();
     }

     /**
     * @param $datetimepeople, $meal
     * @return 
     */
     public function mealAssociate(DatetimePeople $datetimepeople, $meal)
     {
        return $datetimepeople->meals()->associate($meal);
     }
}