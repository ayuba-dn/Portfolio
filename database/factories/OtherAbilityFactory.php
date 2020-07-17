<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OtherAbility;
use Faker\Generator as Faker;

$factory->define(OtherAbility::class, function (Faker $faker) {
    return [
        'ability' => 'Agile Developement and Scrum',
    ];
});
