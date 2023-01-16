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
        
        Schema::create('claimants', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id')->nullable();
            $table->integer('claim_id')->nullable();
            $table->string('patient_firstname');
            $table->string('patient_lastname')->nullable();
            $table->string('claimant_firstname');
            $table->string('claimant_lastname')->nullable();
            $table->string('patient_or_claimant_pan')->nullable();
            $table->string('patient_or_claimant_pan_file')->nullable();
            $table->string('patient_id_proof')->nullable();
            $table->string('patient_id_proof_file')->nullable();
            $table->enum('patient_claimant_relation', ['Self', 'Relation'])->default('Self');
            $table->string('associate_partner_id')->nullable();
            $table->integer('hospital_id')->nullable();
            $table->string('claimant_address')->nullable();
            $table->string('claimant_city')->nullable();
            $table->string('claimant_state')->nullable();
            $table->string('claimant_pincode')->nullable();
            $table->string('claimant_email')->unique();
            $table->string('patient_or_claimant_offical_email')->unique();
            $table->string('claimant_mobile')->nullable();           
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
        Schema::dropIfExists('claimants');
    }
};
