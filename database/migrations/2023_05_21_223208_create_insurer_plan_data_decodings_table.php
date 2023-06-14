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
    /*medical_practitioner_specialistsconsultants_surgeon_fees_anaesthetist_assistant_physiotherapy : medical_practitioner_specialistsconsultants_surgeon_fees
    implants_for_surgical_procedures_prosthetics_devices_other_devices_implant_charges : implants_for_surgical_procedures_prosthetics_devices_charges
    massages_steam_bath_alternative_treatment_other_than_ayurveda_and_homeopathy: massages_steam_bath_alternative_treatment_ayurveda_homeopathy
    cancer_of_specified_sites_�_breast_cervix_uterus_fallopian_tube_ovary_vaginavulva : cancer_of_specified_sites
    oral_chemotherapy_sublimits_including_pre_and_post_hospitalisation: oral_chemotherapy_sublimits_including_pp_hospitalisation
    vaporisation_of_the_prostate_green_laser_treatment_or_holmium_laser_treatment: vaporisation_of_the_prostate_green_or_holmium_laser_treatment
    stem_cell_theraphy_hematopoietic_stem_cells_for_bone_marrow_transplant_for_haematological_conditions  stem_cell_theraphy_bone_marrow_transplant_haematological_conds*/
    public function up()
    {
        Schema::create('insurer_plan_data_decodings', function (Blueprint $table) {
            $table->id();
            $table->string('insurer')->nullable();
            $table->string('plan_name')->nullable();
            $table->string('office')->nullable();
            $table->string('icu_rent')->nullable();
            $table->string('medical_practitioner_specialistsconsultants_surgeon_fees')->nullable();
            $table->longText('implants_for_surgical_procedures_prosthetics_devices_charges')->nullable();
            $table->string('ambulance_charges')->nullable();
            $table->string('restoration')->nullable();
            $table->string('cumalitave_bonus')->nullable();
            $table->string('covid19_waiting_period')->nullable();
            $table->string('covid19_cover')->nullable();
            $table->string('zone_wise_copay')->nullable();
            $table->string('copay')->nullable();
            $table->string('pre_hospitalization')->nullable();
            $table->string('post_hospitalization')->nullable();
            $table->string('day_care')->nullable();
            $table->string('domiciliary')->nullable();
            $table->string('90_days_waiting_period')->nullable();
            $table->text('one_year_waiting_period')->nullable();
            $table->text('two_years_waiting_period')->nullable();
            $table->text('three_years_waiting_period')->nullable();
            $table->text('four_years_waiting_period')->nullable();
            $table->text('waiting_period_for_ped')->nullable();
            $table->text('normal_waiting_period')->nullable();
            $table->text('maternity_cover')->nullable();
            $table->text('meternity_cover_amount_normal')->nullable();
            $table->text('meternity_cover_amount_c_section')->nullable();
            $table->text('meternity_waiting_period')->nullable();
            $table->text('ayush')->nullable();
            $table->text('dental')->nullable();
            $table->text('roboticsadvanced_treatment')->nullable();
            $table->string('cover_for_organ_donor_when_insured_person_is_recipient')->nullable();
            $table->string('cover_for_organ_donor_when_insured_person_is_donor')->nullable();
            $table->string('animal_bite_vaccination')->nullable();
            $table->string('daily_cash')->nullable();
            $table->string('health_check_up')->nullable();
            $table->string('opd')->nullable();
            $table->text('attendant_allowance')->nullable();
            $table->text('new_born_baby_cover')->nullable();
            $table->text('medical_second_opinion')->nullable();
            $table->text('is_coma_covered')->nullable();
            $table->text('hiv_aids_cover')->nullable();
            $table->text('mental_illness')->nullable();
            $table->text('ivf')->nullable();
            $table->text('cataract_cover')->nullable();
            $table->text('bariatric_surgery')->nullable();
            $table->text('changeofgender_treatments')->nullable();
            $table->text('cosmetic_or_plastic_surgery')->nullable();
            $table->text('hazardous_or_adventure_sports')->nullable();
            $table->text('breach_of_laws')->nullable();
            $table->text('drugalcohol_abuse')->nullable();
            $table->text('non_medical_admissions')->nullable();
            $table->text('vitamins_tonics')->nullable();
            $table->text('unproven_treatments')->nullable();
            $table->text('hormone_replacement_therapy')->nullable();
            $table->text('general_debility_congenital_external_anomaly')->nullable();
            $table->text('general_debility_congenital_internal_anomaly')->nullable();
            $table->text('robotic')->nullable();
            $table->text('stem_cell_surgery')->nullable();
            $table->text('circumcision')->nullable();
            $table->text('vaccination_or_inoculation')->nullable();
            $table->text('massages_steam_bath_alternative_treatment_ayurveda_homeopathy')->nullable();
            $table->text('non_prescription_drug')->nullable();
            $table->text('equipments')->nullable();
            $table->text('items_of_personal_comfort')->nullable();
            $table->text('war')->nullable();
            $table->text('radioactivity')->nullable();
            $table->text('treatment_taken_outside_the_geographical_limits_of_india')->nullable();
            $table->text('non_payable_list_to_be_attached')->nullable();
            $table->text('permanently_excluded_diseaseslist_to_be_attached')->nullable();
            $table->text('artificial_life_maintenance')->nullable();
            $table->text('puberty_and_menopause_related_disorders')->nullable();
            $table->text('age_related_macular_degeneration_armd')->nullable();
            $table->text('coinsurance_percentage')->nullable();
            $table->text('moratorium_period')->nullable();
            $table->text('prepared_by')->nullable();
            $table->text('plan_type')->nullable();
            $table->text('qc_by')->nullable();
            $table->text('decoding_date')->nullable();
            $table->text('qc_date')->nullable();
            $table->text('qc_status_correctincorrect')->nullable();
            $table->text('qc_done_not_done')->nullable();
            $table->text('qc_remarks')->nullable();
            $table->text('rollback')->nullable();
            $table->text('plan_uin')->nullable();
            $table->text('survival_period')->nullable();
            $table->text('angioplasty')->nullable();
            $table->text('sum_insured_enhancement_or_restoration_benefit')->nullable();
            $table->text('cumulative_bonus')->nullable();
            $table->text('years_between_two_claims')->nullable();
            $table->text('continuation_for_second_and_third_event')->nullable();
            $table->text('multiple_claims_up_to_sum_insured_amount')->nullable();
            $table->text('child_education_benefit')->nullable();
            $table->text('loss_of_job_benefit')->nullable();
            $table->text('apallic_syndrome')->nullable();
            $table->text('bacterial_meningitis')->nullable();
            $table->text('brain_surgery')->nullable();
            $table->text('loss_of_speech')->nullable();
            $table->text('head_trauma')->nullable();
            $table->text('progressive_supranuclear_palsy')->nullable();
            $table->text('surgery_to_aorta')->nullable();
            $table->text('alzheimers')->nullable();
            $table->text('aplastic_anaemia')->nullable();
            $table->text('bacterial_meningitis2')->nullable();
            $table->string('balloon_valvotomy_or_valvuloplasty')->nullable();
            $table->string('benign_brain_tumour')->nullable();
            $table->string('blindness')->nullable();
            $table->string('cancer_of_specified_sites')->nullable();
            $table->string('cardiomyopathy')->nullable();
            $table->string('coma_of_specified_severity')->nullable();
            $table->string('creutzfeldtjakob_disease_cjd')->nullable();
            $table->string('deafness')->nullable();
            $table->string('dissecting_aortic_aneurysm')->nullable();
            $table->string('eisenmengers_syndrome')->nullable();
            $table->string('encephalitis')->nullable();
            $table->string('end_stage_liver_disease_failure')->nullable();
            $table->string('end_stage_renal_failure')->nullable();
            $table->string('fulminant_viral_hepatitis')->nullable();
            $table->string('heart_valve_replacement')->nullable();
            $table->string('infective_endocarditis')->nullable();
            $table->string('insertion_of_pacemaker')->nullable();
            $table->string('kidney_failure_requiring_regular_dialysis')->nullable();
            $table->string('burns')->nullable();
            $table->string('organ_bone_marrow_transplant')->nullable();
            $table->string('medullary_cystic_disease')->nullable();
            $table->string('motor_neuron_disease_with_permanent_symptoms')->nullable();
            $table->string('multiple_sclerosis')->nullable();
            $table->string('multiple_sclerosis_with_persisting_symptoms')->nullable();
            $table->string('muscular_dystrophy')->nullable();
            $table->string('myocardial_infarction')->nullable();
            $table->string('nervous_system_cover')->nullable();
            $table->string('open_chest_cabg')->nullable();
            $table->string('open_heart_replacement_or_repair_of_heart_valves')->nullable();
            $table->string('paralysis')->nullable();
            $table->string('parkinsons_disease')->nullable();
            $table->text('permanent_paralysis_of_limbs')->nullable();
            $table->text('primary_idiopathic_pulmonary_hypertension')->nullable();
            $table->text('stroke')->nullable();
            $table->text('uterine_artery_embolization_and_hifu')->nullable();
            $table->text('balloon_sinuplasty')->nullable();
            $table->text('deep_brain_stimulation')->nullable();
            $table->text('oral_chemotherapy_sublimits_including_pp_hospitalisation')->nullable();
            $table->text('immunotheraphy_monoclonal_antibody_to_be_given_as_injection')->nullable();
            $table->text('intra_vitreal_injections')->nullable();
            $table->text('robotic_surgeries')->nullable();
            $table->text('stereotactic_radio_surgeries')->nullable();
            $table->text('bronchical_thermoplasty')->nullable();
            $table->text('vaporisation_of_the_prostate_green_or_holmium_laser_treatment')->nullable();
            $table->text('ionmintra_operative_neuro_monitoring')->nullable();
            $table->text('stem_cell_theraphy_bone_marrow_transplant_haematological_conds')->nullable();
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
        Schema::dropIfExists('insurer_plan_data_decodings');
    }
};
