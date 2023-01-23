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
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('come')->nullable();
            $table->string('patient_id')->nullable();
            $table->string('policy_copy')->nullable();
            $table->string('policy_copy_file')->nullable();
            $table->string('tpa_card')->nullable();
            $table->string('tpa_card_no')->nullable();
            $table->string('insurance_company')->nullable();
            $table->string('policy_name')->nullable();
            $table->string('policy_no')->nullable();
            $table->string('policy_start_date')->nullable();
            $table->string('policy_expiry_date')->nullable();
            $table->string('policy_inception_date')->nullable();
            $table->string('no_of_insured_person')->nullable();
            $table->string('basic_sum_insured')->nullable();
            $table->string('cumulative_bonus')->nullable();
            $table->string('policy_type')->nullable();
            $table->string('group_proposer_name')->nullable();
            $table->string('email_id')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('tpa')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('agent_broker_code')->nullable();
            $table->string('agent_broker_name')->nullable();
            $table->string('policy_details_comments')->nullable();
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
        Schema::dropIfExists('policies');
    }
};
