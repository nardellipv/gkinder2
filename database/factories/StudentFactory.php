<?php

use Faker\Generator as Faker;
use gkinder\Student;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastname,
        'dni' => $faker->numberBetween($min = 40000000, $max = 60000000),
        'sex' => $faker->randomElement($array = array('NENA', 'NENE')),
        'birth_date' => $faker->dateTimeBetween($startDate = '-4 years', $endDate = 'now', $timezone = null),
        'observation' => $faker->paragraph($nbSentences = 150, $variableNbSentences = true),
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'school_id' => rand(1, 20),
        'room_id' => rand(1, 20),
        'tutor_id' => rand(1, 100),
    ];
});
