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
        Schema::create('org_applications', function (Blueprint $table) {
            $table->id('org_applicationID')->primary();
            $table->string('president_lastname',1050);
            $table->string('president_firstname',1050);
            $table->string('president_course',1050);
            $table->string('president_year',1050);
            $table->integer('president_contactno');
            $table->string('president_email',1050);
            
            $table->string('org_name');
            $table->string('org_motto');
            $table->string('org_mission');
            $table->string('org_vision');
            $table->binary('org_background');
            $table->binary('org_application_letter');
            $table->binary('org_officer_list');
            $table->binary('org_constituon_bylaws');
            $table->binary('org_plan');
            $table->binary('org_fundreport');

            $table->string('application_status');
            $table->timestamp('created_at')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('org_applications');
    }
};
