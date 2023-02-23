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
        Schema::create('insurance_policies', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id')->nullable();
            $table->string('claim_id')->nullable();
            $table->string('policy_no')->nullable();
            $table->string('insurance_company')->nullable();
            $table->string('policy_name')->nullable();
            $table->string('si_no_or_certificate_no')->nullable();
            $table->string('company_or_tpa_id_card_no')->nullable();
            $table->string('tpa_name')->nullable();
            $table->enum('policy_type',['Group','Retail'])->nullable();
            $table->string('group_name')->nullable();
            $table->date('policy_start_date')->nullable();
            $table->date('policy_expiry_date')->nullable();
            $table->date('policy_commencement_date_without_break')->nullable();
            $table->string('proposer_or_primary_insured_sur_name')->nullable();
            $table->string('proposer_or_primary_insured_first_name')->nullable();
            $table->string('proposer_or_primary_insured_middle_name')->nullable();
            $table->string('proposer_or_primary_insured_last_name')->nullable();
            $table->string('is_primary_insured_and_patient_same')->nullable();
            $table->string('primary_insured_address')->nullable();
            $table->string('primary_insured_city')->nullable();
            $table->string('primary_insured_state')->nullable();
            $table->string('primary_insured_pincode')->nullable();
            $table->integer('no_of_insured_person')->nullable();
            $table->integer('basic_sum_insured')->nullable();
            $table->integer('cumulative_bonus_cv')->nullable();
            $table->string('agent_broker_code')->nullable();
            $table->string('agent_broker_name')->nullable();
            $table->string('are_you_covered_under_any_top_up_or_additional_policy')->nullable();
            $table->string('policy_no_top_up_or_additional')->nullable();
            $table->string('currently_covered_by_any_other_mediclaim_or_health_insurance')->nullable();
            $table->date('other_policy_commencement_date_without_break')->nullable();
            $table->date('other_policy_insurance_company_name')->nullable();
            $table->string('other_policy_no')->nullable();
            $table->integer('other_policy_sum_insured')->nullable();
            $table->string('patient_hospitalized_last_4y_since_inception')->nullable();
            $table->string('date_of_admission_past')->nullable();
            $table->string('policy_details_comments')->nullable();
            $table->string('primary_insured_name')->nullable();
            $table->enum('primary_insured_gender', ['Male', 'Female', 'Other'])->nullable();
            $table->string('primary_insured_age')->nullable();
            $table->enum('primary_insured_relation', ['Self', 'Husband', 'Wife', 'Son', 'Daughter', 'Father', 'Mother', 'Other'])->nullable();
            $table->integer('primary_insured_sum_insured')->nullable();
            $table->integer('primary_insured_cumulative_bonus_cb')->nullable();
            $table->integer('primary_insured_balance_sum_insured')->nullable();
            $table->string('primary_insured_comments')->nullable();
            $table->string('dependent_insured_name')->nullable();
            $table->enum('dependent_insured_gender', ['Male', 'Female', 'Other'])->nullable();
            $table->string('dependent_insured_age')->nullable();
            $table->enum('dependent_insured_relation', ['Self', 'Husband', 'Wife', 'Son', 'Daughter', 'Father', 'Mother', 'Other'])->nullable();
            $table->integer('dependent_insured_sum_insured')->nullable();
            $table->integer('dependent_insured_cumulative_bonus_cb')->nullable();
            $table->integer('dependent_insured_balance_sum_insured')->nullable();
            $table->string('dependent_insured_comments')->nullable();
            $table->string('dependent_insured1_name')->nullable();
            $table->enum('dependent_insured1_gender', ['Male', 'Female', 'Other'])->nullable();
            $table->string('dependent_insured1_age')->nullable();
            $table->enum('dependent_insured1_relation', ['Self', 'Husband', 'Wife', 'Son', 'Daughter', 'Father', 'Mother', 'Other'])->nullable();
            $table->integer('dependent_insured1_sum_insured')->nullable();
            $table->integer('dependent_insured1_cumulative_bonus_cb')->nullable();
            $table->integer('dependent_insured1_balance_sum_insured')->nullable();
            $table->string('dependent_insured1_comments')->nullable();
            $table->string('dependent_insured2_name')->nullable();
            $table->enum('dependent_insured2_gender', ['Male', 'Female', 'Other'])->nullable();
            $table->string('dependent_insured2_age')->nullable();
            $table->enum('dependent_insured2_relation', ['Self', 'Husband', 'Wife', 'Son', 'Daughter', 'Father', 'Mother', 'Other'])->nullable();
            $table->integer('dependent_insured2_sum_insured')->nullable();
            $table->integer('dependent_insured2_cumulative_bonus_cb')->nullable();
            $table->integer('dependent_insured2_balance_sum_insured')->nullable();
            $table->string('dependent_insured2_comments')->nullable();           
            
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
        Schema::dropIfExists('insurance_policies');
    }
};
