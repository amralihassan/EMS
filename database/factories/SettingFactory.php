<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'ar_school_name' => 'المدرسى الذكية',
        'en_school_name' => 'Smart School',
        'email' => $faker->email,
        'address' => $faker->address,
        'contact1' => $faker->randomNumber(),
        'contact2' => $faker->randomNumber(),
        'contact3' => $faker->randomNumber(),
        'status' => 'open',
        'ar_education_administration' => 'ادارة الهرم التعليمية',
        'en_education_administration' => 'Al Haram Educational Administration',
        'ar_governorate' => 'محافظة الجيزة',
        'en_governorate' => 'Giza Government',
        'msg_maintenance' => 'The site under maintenance',
        'admin_id' => '1',

    ];
});
