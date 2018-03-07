<?php

use gkinder\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'body' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
        'date' => $faker->dateTimeBetween($startDate = '-7 month', $endDate = 'now', $timezone = null),
        'school_id' => rand(1, 20),
        'tutor_id' => rand(1, 100),
        'room_id' => rand(1, 140),
    ];
});
