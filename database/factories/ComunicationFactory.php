<?php

use Faker\Generator as Faker;
use gkinder\Comunication;

$factory->define(Comunication::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'body' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
        'date' => $faker->dateTimeBetween($startDate = '-7 month', $endDate = 'now', $timezone = null),
        'read' => $faker->randomElement($array = array('READ', 'NOREAD')),
        'school_id' => rand(1, 20),
        'tutor_id' => rand(1, 100),
        'room_id' => rand(1, 140),
    ];
});
