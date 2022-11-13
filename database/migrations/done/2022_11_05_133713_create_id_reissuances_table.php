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
        Schema::create('id_reissuances', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('student_lastname');
            $table->string('student_firstname');
            $table->string('purpose')->default('reissuance');
            $table->binary('docu_affidavit');
            $table->binary('docu_paymentreceipt');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('id_reissuances');
    }
};
