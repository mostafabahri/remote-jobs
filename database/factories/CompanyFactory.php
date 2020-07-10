<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
       'name' => $faker->company,
       'logo' => $faker->boolean(70) ? 'https://picsum.photos/seed/' . $faker->numberBetween(1, 1e6) . '/100/100': null
    ];
});
