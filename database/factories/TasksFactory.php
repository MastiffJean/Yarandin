<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tasks;
use Faker\Generator as Faker;

$factory->define(Tasks::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(7),
        'description' => $faker->text(300),
        'file' => ''
    ];
});
