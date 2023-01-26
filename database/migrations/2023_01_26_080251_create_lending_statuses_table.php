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
        Schema::create('lending_statuses', function (Blueprint $table) {
            $table->id();
            $table->enum('opted_for_medical_lending',['Yes','No'])->default('No');
            $table->date('date_of_loan_application')->default(date("Y-m-d H:i:s"));;
            $table->enum('medical_lending_type',['Yes','No'])->default('No');
            $table->double('loan_amount_applied_for')->default(0);
            $table->enum('loan_status',['Yes','No'])->default('No');
            $table->double('loan_approved_amount')->default(0);
            $table->double('loan_disbursed_amount')->default(0);
            $table->date('date_of_loan_disbursement')->default(date("Y-m-d H:i:s"));
            $table->string('loan_tenure')->nullable();
            $table->date('loan_start_date')->default(date("Y-m-d H:i:s"));
            $table->date('claim_settlement_date')->default(date("Y-m-d H:i:s"));
            $table->date('loan_end_date')->default(date("Y-m-d H:i:s"));
            $table->double('claim_settled_amount')->default(0);
            $table->date('claim_amount_disbursed_date')->default(date("Y-m-d H:i:s"));
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
        Schema::dropIfExists('lending_statuses');
    }
};
