<?php

use gkinder\Calendar;
use Faker\Generator as Faker;

$factory->define(Calendar::class, function (Faker $faker) {
    return [
        'activity' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->text($maxNbChars = 200),
        'date' => $faker->dateTimeBetween($startDate = '-4 month', $endDate = '+1 years', $timezone = null),
        'room_id' => rand(1, 140),
        'school_id' => rand(1, 20),
    ];
});
