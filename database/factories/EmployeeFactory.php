<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'basic_salary' => $faker->biasedNumberBetween($min = 1000, $max = 20000)
    ];
});
