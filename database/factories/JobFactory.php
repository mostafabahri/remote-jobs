<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    $time = $faker->dateTimeBetween('-1 month');

    return [
       'title' => $faker->sentence(4),
        'region' => $faker->randomElement([
            'Full Time/Anywhere', 'Only USA', 'Only Europe'
        ]),
        'created_at' => $time,
        'updated_at' => $time
    ];
});
