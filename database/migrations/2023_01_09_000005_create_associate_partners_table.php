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
        Schema::create('associate_partners', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('associate_partner_id')->nullable();
            $table->enum('type', ['vendor', 'sales'])->default('vendor');
            $table->string('pan')->nullable();
            $table->string('panfile')->nullable();
            $table->string('owner')->nullable();
            $table->string('email')->unique();
            $table->longText('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('phone')->nullable();
            $table->longText('refrence')->nullable();
            $table->enum('status', ['Main', 'Sub AP', 'Agency'])->default('Main');
            $table->string('linked_associate_partner')->nullable();
            $table->string('linked_associate_partner_id')->nullable();
            $table->string('assigned_employee')->nullable();
            $table->string('assigned_employee_id')->nullable();
            $table->string('linked_employee')->nullable();
            $table->string('linked_employee_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('associate_partners');
    }
};
