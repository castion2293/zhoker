<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => "Nick",
        'last_name' => "Zhang",
        'email' => "castion2293@yahoo.com.tw",
        'phone_number' => "8018823718",
        'password' => bcrypt('123456789'),
        'chef_id' => 1,
        'chef_psw' => 'Q123751139',
        'role' => 1,
    ];
});

$factory->define(App\Chef::class, function (Faker\Generator $faker) {
    
    return [
        'address' => "751 S 300 E",
        'city' => "Salt Lake City",
        'state' => "Utah",
        'zip_code' => 84111,
        'profile_img' => 'https://s3-us-west-2.amazonaws.com/zhoker/profile_images/1487625456.jpg',
    ];
});
