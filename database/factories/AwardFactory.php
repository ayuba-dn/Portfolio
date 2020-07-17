<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Award;
use Faker\Generator as Faker;

$factory->define(Award::class, function (Faker $faker) {
    return [
        'award_title' => 'Google Analytics Certified Developer',
        'user_id' => 1,
    ];
});
