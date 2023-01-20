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
            $table->enum('lab', ['Yes', 'No'])->default('No');
            $table->enum('ambulance', ['Yes', 'No'])->default('No');
            $table->enum('operation_theatre', ['Yes', 'No'])->default('No');
            $table->enum('icu', ['Yes', 'No'])->default('No');
            $table->enum('iccu', ['Yes', 'No'])->default('No');
            $table->enum('nicu', ['Yes', 'No'])->default('No');
            $table->enum('csc_sterilization', ['Yes', 'No'])->default('No');
            $table->enum('centralized_gas_ons', ['Yes', 'No'])->default('No');
            $table->enum('centralized_ac', ['Yes', 'No'])->default('No');
            $table->enum('kitchen', ['Yes', 'No'])->default('No');
            $table->enum('usg_machine', ['Yes', 'No'])->default('No');
            $table->enum('digital_xray', ['Yes', 'No'])->default('No');
            $table->enum('ct', ['Yes', 'No'])->default('No');
            $table->enum('mri', ['Yes', 'No'])->default('No');
            $table->enum('pet_scan', ['Yes', 'No'])->default('No');
            $table->enum('organ_transplant_unit', ['Yes', 'No'])->default('No');
            $table->enum('burn_unit', ['Yes', 'No'])->default('No');
            $table->enum('dialysis_unit', ['Yes', 'No'])->default('No');
            $table->enum('blood_bank', ['Yes', 'No'])->default('No');
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
