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
        Schema::create('id_printings', function (Blueprint $table) {
            $table->id('print_id')->primary();
            $table->string('student_id');
            $table->string('student_lastname', 255);
            $table->string('student_middlename', 255);
            $table->string('student_firstname', 255);
            $table->string('student_course', 255);
            $table->string('student_address', 255);
            $table->string('student_purpose', 255);
            $table->timestamp('student_birthdate');
            $table->binary('student_photo');
            $table->string('contactperson_name', 255);
            $table->string('contactperson_no', 255);
            $table->string('contactperson_address', 512);
            $table->string('status', 512);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('id_printing');
    }
};
