<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Education;
use Faker\Generator as Faker;

$factory->define(Education::class, function (Faker $faker) {
    return [
        'institution' => $faker->company,
        'start_date' => $faker->date, 
        'end_date' => $faker->date, 
        'degree_type' => 'Bachelor of Science.',
        'gpa' => 3.5,  
        'user_id' => 1,
        'course' => 'Computer Science',
    ];
});
