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
        Schema::create('users', function (Blueprint $table) {
            $table->string('student_id')->primary();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('department');
            $table->string('course');
            $table->string('year_level');
            $table->string('birth_date');
            $table->string('email')->unique();
            $table->string('username');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role')->default('0');
            $table->string('status')->default('enrolled');
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
        Schema::dropIfExists('users');
    }
};
