<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('id_validations', function (Blueprint $table) {
            $table->id('validation_id')->primary();
            $table->string('student_id',255);
            $table->string('student_lastname',255);
            $table->string('student_firstname',255);
            $table->string('course',255);
            $table->string('prev_yearlevel',1025);
            $table->string('current_yearlevel',1025);
            $table->binary('enrolment_receipt',);
            $table->string('status',1025)->default('requested');
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('id_validations');
    }
};
