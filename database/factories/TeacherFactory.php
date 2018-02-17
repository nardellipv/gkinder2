<?php

use gkinder\Teacher;
use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastname,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'email' => $faker->unique()->email,
        'school_id' => rand(1, 20),
    ];
});
