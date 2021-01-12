<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Admin;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'ar_name' => 'عمرو',
        'en_name' => 'Amr',
        'username' => 'admin',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '123', // password
        'remember_token' => Str::random(10),
    ];
});
