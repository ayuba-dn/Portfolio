<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Interest;
use Faker\Generator as Faker;

$factory->define(Interest::class, function (Faker $faker) {
    return [
        'interest' => "Playing Football",
        'user_id' => 1,
    ];
});
