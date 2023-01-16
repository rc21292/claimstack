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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('name');
            $table->enum('onboarding', ['Tie Up', 'Non - Tie Up'])->default('Tie Up');
            $table->enum('by', ['Direct', 'Associate Partner'])->default('Direct');
            $table->longText('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('pan')->nullable();
            $table->string('panfile')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('landline')->nullable();
            $table->string('phone')->nullable();
            $table->string('rohini')->nullable();
            $table->string('rohinifile')->nullable();
            $table->string('linked_associate_partner')->nullable();
            $table->string('linked_associate_partner_id')->nullable();
            $table->string('assigned_employee')->nullable();
            $table->string('assigned_employee_id')->nullable();
            $table->string('linked_employee')->nullable();
            $table->string('linked_employee_id')->nullable();
            $table->longText('comments')->nullable();
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
        Schema::dropIfExists('hospitals');
    }
};
