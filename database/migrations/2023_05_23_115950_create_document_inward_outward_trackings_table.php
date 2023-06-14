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
        Schema::create('document_inward_outward_trackings', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_transaction')->nullable();
            $table->string('user_id')->nullable();
            $table->enum('document_type', ['Main Claim', 'Pre', 'Post', 'Insurance Claim Form', 'Cancel Cheque', 'MoU', 'Other'])->nullable();
            $table->string('claim_id')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('patient_id')->nullable();
            $table->string('ap_name')->nullable();
            $table->string('ap_id')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('hospital_id')->nullable();
            $table->string('other')->nullable();
            $table->enum('transaction_type', ['Inward', 'Outward'])->nullable();
            $table->enum('from_to', ['From', 'To'])->nullable();
            $table->string('name_of_the_organization_person')->nullable();
            $table->enum('mode_of_transaction',['By Hand', 'Courier', 'Speed Post', 'Other'])->nullable();
            $table->string('courier_person_name')->nullable();
            $table->string('pod_other_number')->nullable();
            $table->string('pod_other_number_file')->nullable();
            $table->string('document_comments')->nullable();
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
        Schema::dropIfExists('document_inward_outward_trackings');
    }
};
