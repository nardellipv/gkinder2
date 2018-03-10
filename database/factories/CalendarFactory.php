<?php

use gkinder\Calendar;
use Faker\Generator as Faker;

$factory->define(Calendar::class, function (Faker $faker) {
    return [
        'activity' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->text($maxNbChars = 200),
        'date_start' => $faker->dateTimeBetween($startDate = '-4 month', $endDate = now(), $timezone = null),
        'date_end' => $faker->dateTimeBetween($startDate = '-4 month', $endDate = now(), $timezone = null),
        'school_id' => rand(1, 20),
        'room_id' => rand(1, 140),
    ];
});
