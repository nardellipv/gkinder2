<?php

use App\Tutor;
use Faker\Generator as Faker;

$factory->define(Tutor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastname,
        'phone' => $faker->phoneNumber,
        'dni' => $faker->numberBetween($min = 10000000, $max = 35000000),
        'address' => $faker->address,
        'email' => $faker->unique()->email,
    ];
});
