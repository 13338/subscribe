<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'is_cancelled' => false,
        'expired_at' => Carbon::now()->addMonth(3),
    ];
});
