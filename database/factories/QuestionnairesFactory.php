<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Questionnaire;
use Faker\Generator as Faker;

$factory->define(Questionnaire::class, function (Faker $faker) {
    return [
       
        'age' => $faker->numberBetween($min = 30, $max = 100),
        'sex' => $faker->randomElement($array = array ('Male','Female')),
        'religion' => $faker->randomElement($array = array ('Christainity','Islam','Other')),
        'marital_status' => $faker->randomElement($array = array ('Single','Married','Divorced')),
        'tribe' => $faker->randomElement($array = array('Hausa','Fulani','Yoruba','Igbo','Nupe')),
        'occupation' => $faker->randomElement($array = array('Businessman','Housewife','Retired Worker','Student','Unemployed')),
        'level_of_education' => $faker->randomElement($array = array('Primary','Secondary','Tertiary','None','Quranic')),
         
          //knowledge of dangers of non-complaince
        'duration_of_hypertention' => $faker->numberBetween($min = 1, $max = 50),
        'duration_of_medication' => $faker->numberBetween($min = 1, $max = 50),
        'attend_clinic_regularly' => $faker->randomElement($array = array(1,0)),
        'non_complaint' => $faker->randomElement($array = array(0,1)),
        'councelled_by_doctors' => $faker->randomElement($array = array(1,0)),
        'what_where_you_told' => $faker->numberBetween($min = 0, $max = 4),
        'dangers_of_non_compliance' => $faker->numberBetween($min = 0, $max = 8),
        'result_of_non_compliance' => $faker->numberBetween($min = 0, $max = 4),

       
         //PERCEPTION OF DANGERS OF NON-COMPLAINCE
        'missing_dose_is_non_complaince' => $faker->randomElement($array = array(1,0)),
         'has_any_danger' => $faker->randomElement($array = array(1,0)),
          'complying_improves_health' => $faker->randomElement($array = array(1,0)),
           'important_to_be_informed' => $faker->randomElement($array = array(1,0)),
            'take_your_drugs_for_life' => $faker->randomElement($array = array(1,0)),
             'is_it_a_burden' => $faker->randomElement($array = array(1,0)),
              'should_stop_drugs_when_better' => $faker->randomElement($array = array(1,0)),
               'can_stroke_result_from_non_complaince' => $faker->randomElement($array = array(1,0)),
                'non_complying_increases_hospital_visits' => $faker->randomElement($array = array(1,0)),

          
            //REASONS FOR NON-COMPLAINCE
                 'drugs_are_expensive' => $faker->randomElement($array = array(1,0)),
                  'too_much_drugs' => $faker->randomElement($array = array(1,0)),
                   'feel_better_after_awhile' => $faker->randomElement($array = array(1,0)),
                    'drugs_make_you_sick' => $faker->randomElement($array = array(1,0)),
                     'drugs_got_finished' => $faker->randomElement($array = array(1,0)),
                      'forget_to_take_drugs' => $faker->randomElement($array = array(1,0)),
                       'doctor_did_not_councel' => $faker->randomElement($array = array(1,0)),
                        'traditional_drugs_atimes' => $faker->randomElement($array = array(1,0)),
                         'busy_schedule' => $faker->randomElement($array = array(1,0)),
                          'get_tired' => $faker->randomElement($array = array(1,0)),

            //BELIEVE TOWARDS NEED FOR COMPLAINCE
              'controlling_bp_save_life' => $faker->randomElement($array = array(1,0)),
               'need_your_drugs_to_feel_ok' => $faker->randomElement($array = array(1,0)),
                'need_your_drugs_to_feel_healthy' => $faker->randomElement($array = array(1,0)),
                 'working_with_health_necessary_tobebetter' => $faker->randomElement($array = array(1,0)),
                  'complying_for_your_children' => $faker->randomElement($array = array(1,0)),

    ];
});

