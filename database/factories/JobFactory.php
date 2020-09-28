<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    $time = $faker->dateTimeBetween('-1 month');

    return [
        'title' => $faker->sentence(4),
        'region' => $faker->randomElement([
            'Full Time/Anywhere', 'Only USA', 'Only Europe',
        ]),
        'description' => $faker->realText(1000),
        'instructions' => $faker->url,
        'created_at' => $time,
        'updated_at' => $time,

        'company_id' => factory(Company::class),
    ];
});

$factory->state(Job::class, 'published', [
    'published' => true
]);
