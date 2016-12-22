<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['categories', 'methods', 'shifts'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($toTruncate as $table) {
            DB::table($table)->truncate();
        }

        $this->call(CategoryTableSeeder::class);
        $this->call(MethodTableSeeder::class);
        $this->call(ShiftTableSeeder::class);
    }
}
