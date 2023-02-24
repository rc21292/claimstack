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

        Schema::create('claims', function (Blueprint $table) {
           $table->id();
           $table->string('uid')->nullable();
           $table->integer('patient_id')->nullable();
           $table->date('admission_date')->nullable();
           $table->time('admission_time')->nullable();
           $table->string('abha_id')->nullable();
           $table->enum('insurance_coverage', ['Yes', 'No'])->default('No');
           $table->string('policy_no')->nullable();
           $table->string('company_tpa_id_card_no')->nullable();
           $table->enum('lending_required', ['Yes', 'No'])->default('No');
           $table->string('hospitalization_due_to')->nullable();
           $table->date('date_of_delivery')->nullable();
           $table->string('system_of_medicine')->nullable();
           $table->enum('treatment_type', ['OPD', 'IPD'])->default('OPD');
           $table->string('admission_type_1')->nullable();
           $table->string('admission_type_2')->nullable();
           $table->string('admission_type_3')->nullable();
           $table->string('claim_category')->nullable();
           $table->enum('treatment_category', ['OPD', 'IPD'])->default('OPD');
           $table->string('disease_category')->nullable();
           $table->string('disease_name')->nullable();
           $table->string('disease_type')->nullable();
           $table->string('estimated_amount')->nullable();
           $table->text('comments')->nullable();
           $table->string('claim_intimation_done')->nullable();
           $table->string('claim_intimation_number_mail')->nullable();
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
        Schema::dropIfExists('claims');
    }
};
