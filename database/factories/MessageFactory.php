<?php

use gkinder\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'body' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
        'date' => $faker->dateTimeBetween($startDate = '-4 month', $endDate = '+1 years', $timezone = null),
    ];
});
