<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'position' => $faker->jobtitle,
        'email' => $faker->unique()->safeEmail,
        'contact_no' => $faker->e164PhoneNumber,
        'attendance_id' => Str::random()
    ];
});
