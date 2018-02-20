<?php

use Faker\Generator as Faker;
use gkinder\NewsLetter;

$factory->define(NewsLetter::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
    ];
});
