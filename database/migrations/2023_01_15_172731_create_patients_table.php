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
        
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('dob')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Unisex'])->default('Male');
            $table->longText('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('id_proof_file')->nullable();
            $table->integer('hospital_id')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('hospital_address')->nullable();
            $table->string('hospital_city')->nullable();
            $table->string('hospital_state')->nullable();
            $table->string('hospital_pincode')->nullable();
            $table->string('associate_partner_id')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->nullable();           
            $table->enum('referred_by', ['Direct', 'Hospital', 'Associate Partner'])->default('Direct');
            $table->longText('comments')->nullable();
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
        Schema::dropIfExists('patients');
    }
};
