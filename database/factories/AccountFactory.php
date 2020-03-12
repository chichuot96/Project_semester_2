<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Accounts::class, function (Faker $faker) {
    return [
        'user_name' => $faker->firstName,
        'full_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'date_of_birth' => now(),
        'phone_number' => $faker->phoneNumber,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'address' => $faker->address,
        'status'=> $faker->boolean,
        'role'=> $faker->randomDigit,
        'is_child'=>$faker->boolean,
    ];
});
