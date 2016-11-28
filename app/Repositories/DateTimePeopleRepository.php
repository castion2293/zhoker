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
     * @param $date
     * @return datetimepeople
     */
     public function findDateTimePeopleByDate($date)
     {
         return $this->datetimepeople->where('date', $date)->get();
     }

     /**
     * @param $date, $people
     * @return datetimepeople
     */
     public function findDateTimePeopleByDateAndPeople($date, $people)
     {
         return $this->datetimepeople->where('date', $date)
                                     ->where('people_left', '>=', $people)
                                     ->get();
     }

      /**
     * @param $datetimepeople, $cart
     * @return 
     */
    public function updatePeople(DatetimePeople $datetimepeople, $cart, $rcv = null)
    {
        if ($rcv) {
            return $datetimepeople->update([
                'people_order' => $datetimepeople->people_order - $cart->people_order,
                'people_left' => $datetimepeople->people_left + $cart->people_order,
            ]);
        } else {
            return $datetimepeople->update([
                'people_order' => $datetimepeople->people_order + $cart->people_order,
                'people_left' => $datetimepeople->people_left - $cart->people_order,
            ]);
        }
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