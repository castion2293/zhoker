<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category([
           'category' => 'American' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Asian' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Barbecue' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Brazilian' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Chinese' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'European' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'French' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Hawaiian' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Italian' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Indonesian' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Japanese' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Korean' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Mexican' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Mediterranean' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Middle Eastern' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Seafood' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Thai' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'Vegetarian' 
        ]);
        $category->save();

        $category = new \App\Category([
           'category' => 'indian' 
        ]);
        $category->save();
    }
}
