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
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id')->nullable();
            $table->string('claim_id')->nullable();
            $table->string('claimant_id')->nullable();
            $table->string('hospital_id')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('hospital_address')->nullable();
            $table->string('patient_title')->nullable();
            $table->string('patient_firstname')->nullable();
            $table->string('patient_middlename')->nullable();
            $table->string('patient_lastname')->nullable();
            $table->string('is_patient_and_borrower_same')->nullable();
            $table->string('is_claimant_and_borrower_same')->nullable();
            $table->string('title')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('borrowers_relation_with_patient')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('id_proof_file')->nullable();
            $table->string('email_id')->nullable();
            $table->string('official_email_id')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('pan_no_file')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('aadhar_no_file')->nullable();
            $table->string('bank_statement')->nullable();
            $table->string('bank_statement_file')->nullable();
            $table->string('itr')->nullable();
            $table->string('itr_file')->nullable();
            $table->string('cancel_cheque')->nullable();
            $table->string('cancel_cheque_file')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('ac_no')->nullable();
            $table->string('ifs_code')->nullable();
            $table->string('co_borrower_nominee_name')->nullable();
            $table->string('co_borrower_nominee_dob')->nullable();
            $table->string('co_borrower_nominee_dob_file')->nullable();
            $table->string('co_borrower_nominee_gender')->nullable();
            $table->string('co_borrower_nominee_gender_file')->nullable();
            $table->string('co_borrower_nominee_relation')->nullable();
            $table->string('co_borrower_other_documents')->nullable();
            $table->string('co_borrower_other_documents_file')->nullable();
            $table->string('estimated_amount')->nullable();
            $table->string('co_borrower_comments')->nullable();
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
        Schema::dropIfExists('borrowers');
    }
};
