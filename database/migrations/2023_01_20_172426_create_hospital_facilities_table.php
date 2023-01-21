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
        Schema::create('hospital_facilities', function (Blueprint $table) {
            $table->id();
            $table->integer('hospital_id')->unsigned()->nullable();
            $table->enum('pharmacy', ['Yes', 'No'])->default('No');
            $table->string('pharmacy_file')->nullable();
            $table->enum('lab', ['Yes', 'No'])->default('No');
            $table->string('lab_file')->nullable();
            $table->enum('ambulance', ['Yes', 'No'])->default('No');
            $table->string('ambulance_file')->nullable();
            $table->enum('operation_theatre', ['Yes', 'No'])->default('No');
            $table->string('operation_theatre_file')->nullable();
            $table->enum('icu', ['Yes', 'No'])->default('No');
            $table->string('icu_file')->nullable();
            $table->enum('iccu', ['Yes', 'No'])->default('No');
            $table->string('iccu_file')->nullable();
            $table->enum('nicu', ['Yes', 'No'])->default('No');
            $table->string('nicu_file')->nullable();
            $table->enum('csc_sterilization', ['Yes', 'No'])->default('No');
            $table->string('csc_sterilization_file')->nullable();
            $table->enum('centralized_gas_ons', ['Yes', 'No'])->default('No');
            $table->string('centralized_gas_ons_file')->nullable();
            $table->enum('centralized_ac', ['Yes', 'No'])->default('No');
            $table->string('centralized_ac_file')->nullable();
            $table->enum('kitchen', ['Yes', 'No'])->default('No');
            $table->string('kitchen_file')->nullable();
            $table->enum('usg_machine', ['Yes', 'No'])->default('No');
            $table->string('usg_machine_file')->nullable();
            $table->enum('digital_xray', ['Yes', 'No'])->default('No');
            $table->string('digital_xray_file')->nullable();
            $table->enum('ct', ['Yes', 'No'])->default('No');
            $table->string('ct_file')->nullable();
            $table->enum('mri', ['Yes', 'No'])->default('No');
            $table->string('mri_file')->nullable();
            $table->enum('pet_scan', ['Yes', 'No'])->default('No');
            $table->string('pet_scan_file')->nullable();
            $table->enum('organ_transplant_unit', ['Yes', 'No'])->default('No');
            $table->string('organ_transplant_unit_file')->nullable();
            $table->enum('burn_unit', ['Yes', 'No'])->default('No');
            $table->string('burn_unit_file')->nullable();
            $table->enum('dialysis_unit', ['Yes', 'No'])->default('No');
            $table->string('dialysis_unit_file')->nullable();
            $table->enum('blood_bank', ['Yes', 'No'])->default('No');
            $table->string('blood_bank_file')->nullable();
            $table->string('hospital_facility_comments')->nullable();
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
        Schema::dropIfExists('hospital_facilities');
    }
};
