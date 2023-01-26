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
           $table->string('firstname');
           $table->string('lastname')->nullable();
           $table->integer('patient_id')->nullable();
           $table->string('patient_dob')->nullable();
           $table->enum('patient_gender', ['Male', 'Female', 'Unisex'])->default('Male');
           $table->longText('patient_address')->nullable();
           $table->string('patient_city')->nullable();
           $table->string('patient_state')->nullable();
           $table->string('patient_pincode')->nullable();
           $table->string('patient_id_proof')->nullable();
           $table->string('patient_id_proof_file')->nullable();
           $table->integer('hospital_id')->nullable();
           $table->string('hospital_name')->nullable();
           $table->string('hospital_address')->nullable();
           $table->string('hospital_city')->nullable();
           $table->string('hospital_state')->nullable();
           $table->string('hospital_pincode')->nullable();
           $table->string('associate_partner_id')->nullable();
           $table->string('patient_email')->unique();
           $table->string('patient_mobile')->nullable();           
           $table->enum('patient_referred_by', ['Direct', 'Hospital', 'Associate Partner'])->default('Direct');
           $table->longText('patient_comments')->nullable();
           $table->date('probable_date_of_admission')->nullable();           
           $table->date('probable_date_of_discharge')->nullable();           
           $table->enum('lending_required', ['Yes', 'No'])->default('No');
           $table->enum('treatment_type', ['OPD', 'IPD'])->default('OPD');
           $table->enum('admission_type', ['Day Care', 'Hospitalization'])->default('Day Care');
           $table->enum('claim_category', ['Cashless', 'Reimbursement'])->default('Cashless');
           $table->enum('treatment_category', ['Surgical', 'Medical Management'])->default('Surgical');
           $table->enum('disease_category', ['Cardiac', 'Dialysis', 'Eye Related', 'Infection', 'Maternity ', 'Neuro Related', 'Trauma'])->default('Cardiac');
           $table->enum('disease_type', ['PED', 'Non-PED'])->default('PED');
           $table->string('disease_name')->nullable();    
           $table->longText('claim_intimation_comments')->nullable();       
           $table->rememberToken();
           $table->timestamps();
           $table->softDeletes();
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
