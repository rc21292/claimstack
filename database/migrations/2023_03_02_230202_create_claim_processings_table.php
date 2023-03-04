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
        Schema::create('claim_processings', function (Blueprint $table) {
            $table->id();

            $table->string('patient_id')->nullable();
            $table->string('patient_title')->nullable();
            $table->string('patient_firstname')->nullable();
            $table->string('patient_lastname')->nullable();
            $table->string('patient_middlename')->nullable();
            $table->string('patient_age')->nullable();
            $table->string('patient_gender')->nullable();
            $table->text('patient_current_residential_address')->nullable();
            $table->text('patient_current_city')->nullable();
            $table->text('patient_current_state')->nullable();
            $table->text('patient_current_pincode')->nullable();
            $table->string('hospital_id')->nullable();
            $table->string('hospital_name')->nullable();
            $table->text('hospital_address')->nullable();
            $table->text('hospital_city')->nullable();
            $table->text('hospital_state')->nullable();
            $table->text('hospital_pincode')->nullable();
            $table->string('insurance_company')->nullable();
            $table->string('policy_name')->nullable();
            $table->string('policy_type')->nullable();
            $table->string('policy_start_date')->nullable();
            $table->string('policy_expiry_date')->nullable();
            $table->string('policy_commencement_date_without_break')->nullable();
            $table->string('date_of_admission')->nullable();
            $table->string('time_of_admission')->nullable();
            $table->string('expected_date_of_discharge')->nullable();
            $table->string('expected_no_of_days_in_hospital')->nullable();
            $table->string('hospitalization_due_to')->nullable();
            $table->string('date_of_delivery')->nullable();
            $table->string('date_of_first_consultation')->nullable();
            $table->string('system_of_medicine')->nullable();
            $table->string('treatment_type')->nullable();
            $table->string('admission_type_1')->nullable();
            $table->string('admission_type_2')->nullable();
            $table->string('admission_type_3')->nullable();
            $table->string('claim_category')->nullable();
            $table->string('treatment_category')->nullable();
            $table->string('disease_category')->nullable();
            $table->string('disease_name')->nullable();
            $table->string('disease_type')->nullable();
            $table->string('nature_of_illness_disease_with_presenting_complaints')->nullable();
            $table->string('relevant_clinical_findings')->nullable();
            $table->text('past_history_of_any_chronic_illness')->nullable();
            $table->text('any_other_aliment_details')->nullable();
            $table->string('primary_diagnosis_icd_leveli_disease')->nullable();
            $table->string('primary_diagnosis_icd_leveli_code')->nullable();
            $table->string('primary_diagnosis_icd_levelii_disease')->nullable();
            $table->string('primary_diagnosis_icd_levelii_code')->nullable();
            $table->string('primary_diagnosis_icd_leveliii_disease')->nullable();
            $table->string('primary_diagnosis_icd_leveliii_code')->nullable();
            $table->string('primary_diagnosis_icd_leveliv_disease')->nullable();
            $table->string('primary_diagnosis_icd_leveliv_code')->nullable();
            $table->string('additional_diagnosis_icd_leveli_disease')->nullable();
            $table->string('additional_diagnosis_icd_leveli_code')->nullable();
            $table->string('additional_diagnosis_icd_levelii_disease')->nullable();
            $table->string('additional_diagnosis_icd_levelii_code')->nullable();
            $table->string('additional_diagnosis_icd_leveliii_disease')->nullable();
            $table->string('additional_diagnosis_icd_leveliii_code')->nullable();
            $table->string('additional_diagnosis_icd_leveliv_disease')->nullable();
            $table->string('additional_diagnosis_icd_leveliv_code')->nullable();
            $table->string('co_morbidities_icd_leveli_disease')->nullable();
            $table->string('co_morbidities_icd_leveli_code')->nullable();
            $table->string('co_morbidities_icd_levelii_disease')->nullable();
            $table->string('co_morbidities_icd_levelii_code')->nullable();
            $table->string('co_morbidities_icd_leveliii_disease')->nullable();
            $table->string('co_morbidities_icd_leveliii_code')->nullable();
            $table->string('co_morbidities_icd_leveliv_disease')->nullable();
            $table->string('co_morbidities_icd_leveliv_code')->nullable();
            $table->text('co_morbidities_comments')->nullable();
            $table->text('procedure_name')->nullable();
            $table->text('procedure_i_pcs_group_name')->nullable();
            $table->text('procedure_i_pcs_group_code')->nullable();
            $table->text('procedure_i_pcs_sub_group_name')->nullable();
            $table->text('procedure_i_pcs_sub_group_code')->nullable();
            $table->text('procedure_i_pcs_short_name')->nullable();
            $table->text('procedure_i_pcs_code')->nullable();
            $table->text('procedure_i_pcs_long_name')->nullable();
            $table->text('procedure_ii_pcs_group_name')->nullable();
            $table->text('procedure_ii_pcs_group_code')->nullable();
            $table->text('procedure_ii_pcs_sub_group_name')->nullable();
            $table->text('procedure_ii_pcs_sub_group_code')->nullable();
            $table->text('procedure_ii_pcs_short_name')->nullable();
            $table->text('procedure_ii_pcs_code')->nullable();
            $table->text('procedure_ii_pcs_long_name')->nullable();
            $table->string('procedure_iii_pcs_group_name')->nullable();
            $table->string('procedure_iii_pcs_group_code')->nullable();
            $table->string('procedure_iii_pcs_sub_group_name')->nullable();
            $table->string('procedure_iii_pcs_sub_group_code')->nullable();
            $table->string('procedure_iii_pcs_short_name')->nullable();
            $table->string('procedure_iii_pcs_code')->nullable();
            $table->string('procedure_iii_pcs_long_name')->nullable();
            $table->enum('final_assessment_status', ['Waiting for Pre-Assessment', 'Query Raised by BHC Team', 'Non Admissible as per the Policy TC', 'Non Admissible as per the Treatment Received', 'Admissible'])->nullable();
            $table->text('query')->nullable();
            $table->double('final_assessment_amount')->nullable();
            $table->text('final_assessment_comments')->nullable();

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
        Schema::dropIfExists('claim_processings');
    }
};
