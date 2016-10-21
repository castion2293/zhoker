<?php

use Illuminate\Database\Seeder;

class ShiftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shift = new \App\Shift([
           'shift' => 'Dinner' 
        ]);
        $shift->save();

        $shift = new \App\Shift([
           'shift' => 'Lunch' 
        ]);
        $shift->save();

        $shift = new \App\Shift([
           'shift' => 'Brunch' 
        ]);
        $shift->save();

        $shift = new \App\Shift([
           'shift' => 'Breakfast' 
        ]);
        $shift->save();

        $shift = new \App\Shift([
           'shift' => 'Tea Time' 
        ]);
        $shift->save();
    }
}
