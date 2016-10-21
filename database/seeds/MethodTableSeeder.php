<?php

use Illuminate\Database\Seeder;

class MethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $method = new \App\Method([
           'method' => 'In House' 
        ]);
        $method->save();

        $method = new \App\Method([
           'method' => 'To Go' 
        ]);
        $method->save();

        $method = new \App\Method([
           'method' => 'Delieve' 
        ]);
        $method->save();
    }
}
