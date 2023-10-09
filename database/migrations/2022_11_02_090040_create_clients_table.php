<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clientnumber',16)->unique();
            $table->DateTime('visitdate');
            $table->string('LH-pid',20)->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('contact');
            $table->string('age_group');
            $table->string('hiv_status');
            $table->string('visit_reason');
            $table->string('screening_method');
            $table->string('screening_result');
            $table->string('treatment_status');
            $table->string('treatment_done');
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
        Schema::dropIfExists('clients');
    }
}
