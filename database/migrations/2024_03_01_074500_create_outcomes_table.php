<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomes', function (Blueprint $table) {
              $table->bigIncrements('id');
              $table->bigInteger('referralid')->unsigned();              
              $table->string('clientnumber');
              $table->string('assessment_outcome');
              $table->string('followup_outcome');
              $table->string('followup_outcome_date');
              $table->string('sample_type');
              $table->string('histology_result');
              $table->string('histology_result_date');
              $table->string('treatment_provided');
              $table->string('treatment_date');
              $table->string('recommended_plan');
              $table->string('feedback');
              $table->string('referral_outcome');
              $table->timestamps();
              $table->foreign('referralid')->references('id')->on('referrals')
                                      ->onUpdate('cascade')
                                      ->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outcomes');
    }
};
