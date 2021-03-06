<?php

namespace App\Repositories;

use App\DateTimePeople;
use App\Repositories\Foundation\DateTrait;

class DateTimePeopleRepository
{
    use DateTrait;

    protected $datetimepeople;

    public function __construct(DateTimePeople $datetimepeople)
    {
        $this->datetimepeople = $datetimepeople;
    }

     /**
     * @param $id
     * @return $this
     */
     public function findDateTimePeopleById($id)
     {
        return $this->datetimepeople->find($id);
     }

    /**
     * @param $date
     * @return mixed
     */
     public function findDateTimePeopleByDate($date)
     {
         $now = $this->CheckDate($date);
         
         return $this->datetimepeople->where('date', $date)
                                      ->where('end_time', '>', $now)
                                      ->get();
     }

    /**
     * @param $date
     * @param $people
     * @return mixed
     */
     public function findDateTimePeopleByDateAndPeople($date, $people)
     {
         $now = $this->CheckDate($date);

         return $this->datetimepeople->where('date', $date)
                                     ->where('people_left', '>=', $people)
                                     ->where('end_time', '>', $now)
                                     ->get();
     }

    /**
     * @param $meal
     * @param $newDateTimePeopleArray
     * @return static
     */
     public function create($meal, $newDateTimePeopleArray)
     {
        return DateTimePeople::create([
            'meal_id' => $meal->id,
            'date' => $newDateTimePeopleArray[1],
            'time' => $newDateTimePeopleArray[2],
            'end_date' => $newDateTimePeopleArray[3],
            'end_time' => $newDateTimePeopleArray[4],
            'people_left' => $newDateTimePeopleArray[5],
        ]);
     }

    /**
     * @param DateTimePeople $datetimepeople
     * @param $cart
     * @param null $rcv
     * @return bool
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
     * @param DateTimePeople $datetimepeople
     * @return bool|null
     */
     public function delete(DatetimePeople $datetimepeople)
     {
        return $datetimepeople->delete();
     }
}