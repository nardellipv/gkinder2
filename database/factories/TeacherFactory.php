<?php

use Faker\Generator as Faker;
use gkinder\Teacher;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastname,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'email' => $faker->unique()->email,
        'observation' => $faker->paragraph($nbSentences = 150, $variableNbSentences = true),
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'school_id' => rand(1, 20),
        'room_id' => rand(1, 20),
    ];
});
