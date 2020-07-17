<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Experience;
use Faker\Generator as Faker;

$factory->define(Experience::class, function (Faker $faker) {
    return [
        'job_title' => $faker->jobTitle,
        'responsibilities' => $faker->realText,
        'company' => $faker->company,
        'start_date' => $faker->date, 
        'end_date' => $faker->date,  
        'user_id' => 1,                           
    ];
});
