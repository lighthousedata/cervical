<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clientnumber');
            $table->string('LH_pid');
            $table->string('referral_date');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('contact');
            $table->string('age_group');
            $table->string('screening_type');
            $table->string('hiv_status');
            $table->string('referral_reason');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referrals');
    }
}
