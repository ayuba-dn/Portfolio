<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('age');
            $table->string('sex');
            $table->string('tribe');
            $table->string('religion');
            $table->string('marital_status');
            $table->string('occupation');
            $table->string('level_of_education');
            //
        

            //knowledge of dangers of non-complaince

            $table->integer('duration_of_hypertention');
            $table->integer('duration_of_medication');
            $table->integer('attend_clinic_regularly');
            $table->integer('non_complaint');
            $table->integer('councelled_by_doctors');
            $table->integer('what_where_you_told');
            $table->integer('dangers_of_non_compliance');
            $table->integer('result_of_non_compliance');

            //PERCEPTION OF DANGERS OF NON-COMPLAINCE
            $table->integer('missing_dose_is_non_complaince');
            $table->integer('has_any_danger');
            $table->integer('complying_improves_health');
            $table->integer('important_to_be_informed');
            $table->integer('take_your_drugs_for_life');
            $table->integer('is_it_a_burden');
            $table->integer('should_stop_drugs_when_better');
            $table->integer('can_stroke_result_from_non_complaince');
            $table->integer('non_complying_increases_hospital_visits');


            //REASONS FOR NON-COMPLAINCE

            $table->integer('drugs_are_expensive');
            $table->integer('too_much_drugs');
            $table->integer('feel_better_after_awhile');
            $table->integer('drugs_make_you_sick');
            $table->integer('drugs_got_finished');
            $table->integer('forget_to_take_drugs');
            $table->integer('doctor_did_not_councel');
            $table->integer('traditional_drugs_atimes');
            $table->integer('busy_schedule');
            $table->integer('get_tired');

            //BELIEVE TOWARDS NEED FOR COMPLAINCE

            $table->integer('controlling_bp_save_life');
            $table->integer('need_your_drugs_to_feel_ok');
            $table->integer('need_your_drugs_to_feel_healthy');
            $table->integer('working_with_health_necessary_tobebetter');
            $table->integer('complying_for_your_children');

       


        });
    }

  //  1)  For how long have you been hypertensive (years)?....................
//2)  For how long have you been taking antihypertensive drugs?.....................
//3)  Have you been attending clinics regularly?  Yes [  ]         No [  ]
//4)  Have you ever been non-compliant? Yes [  ]         No [  ]
//5)  Were you counselled by your doctors on compliance at the beginning of taking your drugs?       Yes [  ]     No [  ]
//6)  What were you told? (a) I need to take the drugs even when am well (b) I need to take the drugs when I travel (c) I need to be regular with my clinic visits (d) I should avoid traditional medications
//7)  What are the dangers of drug non-compliance? (a) Stroke [  ] (b) Forgetfulness [  ]        (c) Seizure [  ] (d) Blindness [  ] (e) Heart failure [  ] (f) Kidney failure [  ] (g) Pains in your legs when you walk [  ] (h) Damage to blood vessels [  ]
//8)  What do you think can result from non-compliance? (a) Premature death (b) Unnecessary spending (c) Permanent disability (d) Absence from work

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaires');
    }
}
