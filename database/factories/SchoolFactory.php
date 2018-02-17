<?php

use App\School;
use Faker\Generator as Faker;

$factory->define(School::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'city' => $faker->city,
        'cp' => $faker->numberBetween($min = 1000, $max = 9000),
        'phone' => $faker->phoneNumber,
        'active' => $faker->randomElement($array = array('ACTIVE', 'DISABLE')),
        'account' => $faker->randomElement($array = array('BASIC', 'PRO')),
        'url' => $faker->url,
        'email' => $faker->email,
    ];
});
