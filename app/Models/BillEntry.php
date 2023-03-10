<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_rent_date',
        'room_rent_from',
        'room_rent_to',
        'room_rent_total_days',
        'room_rent_amount',
        'room_rent_total_amount',
        'room_rent_file',
        'icu_charges_date',
        'icu_charges_from',
        'icu_charges_to',
        'icu_charges_total_days',
        'icu_charges_amount',
        'icu_charges_total_amount',
        'icu_charges_file',
        'nursing_charges_date',
        'nursing_charges_from',
        'nursing_charges_to',
        'nursing_charges_total_days',
        'nursing_charges_amount',
        'nursing_charges_total_amount',
        'nursing_charges_file',
        'diet_charges_date',
        'diet_charges_from',
        'diet_charges_to',
        'diet_charges_total_days',
        'diet_charges_amount',
        'diet_charges_total_amount',
        'diet_charges_file',
        'rmo_charges_date',
        'rmo_charges_from',
        'rmo_charges_to',
        'rmo_charges_total_days',
        'rmo_charges_amount',
        'rmo_charges_total_amount',
        'rmo_charges_file',
        'administration_charges_date',
        'administration_charges_from',
        'administration_charges_to',
        'administration_charges_total_days',
        'administration_charges_amount',
        'administration_charges_total_amount',
        'administration_charges_file',
        'iv_fluids_date',
        'iv_fluids_from',
        'iv_fluids_to',
        'iv_fluids_total_days',
        'iv_fluids_amount',
        'iv_fluids_total_amount',
        'iv_fluids_file',
        'blood_transfusion_date',
        'blood_transfusion_from',
        'blood_transfusion_to',
        'blood_transfusion_total_days',
        'blood_transfusion_amount',
        'blood_transfusion_total_amount',
        'blood_transfusion_file',
        'injection_date',
        'injection_from',
        'injection_to',
        'injection_total_days',
        'injection_amount',
        'injection_total_amount',
        'injection_file',
        'medical_practitioners_fees_date',
        'medical_practitioners_fees_from',
        'medical_practitioners_fees_to',
        'medical_practitioners_fees_total_days',
        'medical_practitioners_fees_amount',
        'medical_practitioners_fees_total_amount',
        'medical_practitioners_fees_file',
        'specialists_visit_date',
        'specialists_visit_from',
        'specialists_visit_to',
        'specialists_visit_total_days',
        'specialists_visit_amount',
        'specialists_visit_total_amount',
        'specialists_visit_file',
        'consultants_visit_date',
        'consultants_visit_from',
        'consultants_visit_to',
        'consultants_visit_total_days',
        'consultants_visit_amount',
        'consultants_visit_total_amount',
        'consultants_visit_file',
        'surgeon_fees_visit_date',
        'surgeon_fees_visit_from',
        'surgeon_fees_visit_to',
        'surgeon_fees_visit_total_days',
        'surgeon_fees_visit_amount',
        'surgeon_fees_visit_total_amount',
        'surgeon_fees_visit_file',
        'anaesthetist_date',
        'anaesthetist_from',
        'anaesthetist_to',
        'anaesthetist_total_days',
        'anaesthetist_amount',
        'anaesthetist_total_amount',
        'anaesthetist_file',
        'ot_assistant_date',
        'ot_assistant_from',
        'ot_assistant_to',
        'ot_assistant_total_days',
        'ot_assistant_amount',
        'ot_assistant_total_amount',
        'ot_assistant_file',
        'physiotherapy_date',
        'physiotherapy_from',
        'physiotherapy_to',
        'physiotherapy_total_days',
        'physiotherapy_amount',
        'physiotherapy_total_amount',
        'physiotherapy_file',
        'pharmacy_charges_date',
        'pharmacy_charges_from',
        'pharmacy_charges_to',
        'pharmacy_charges_total_days',
        'pharmacy_charges_amount',
        'pharmacy_charges_total_amount',
        'pharmacy_charges_file',
        'medicines_date',
        'medicines_from',
        'medicines_to',
        'medicines_total_days',
        'medicines_amount',
        'medicines_total_amount',
        'medicines_file',
        'drugs_date',
        'drugs_from',
        'drugs_to',
        'drugs_total_days',
        'drugs_amount',
        'drugs_total_amount',
        'drugs_file',
        'diagnostic_charges_date',
        'diagnostic_charges_from',
        'diagnostic_charges_to',
        'diagnostic_charges_total_days',
        'diagnostic_charges_amount',
        'diagnostic_charges_total_amount',
        'diagnostic_charges_file',
        'lab_tests_date',
        'lab_tests_from',
        'lab_tests_to',
        'lab_tests_total_days',
        'lab_tests_amount',
        'lab_tests_total_amount',
        'lab_tests_file',
        'investigation_date',
        'investigation_from',
        'investigation_to',
        'investigation_total_days',
        'investigation_amount',
        'investigation_total_amount',
        'investigation_file',
        'imaging_investigation_date',
        'imaging_investigation_from',
        'imaging_investigation_to',
        'imaging_investigation_total_days',
        'imaging_investigation_amount',
        'imaging_investigation_total_amount',
        'imaging_investigation_file',
        'other_charges_date',
        'other_charges_from',
        'other_charges_to',
        'other_charges_total_days',
        'other_charges_amount',
        'other_charges_total_amount',
        'other_charges_file',
        'anaesthesia_date',
        'anaesthesia_from',
        'anaesthesia_to',
        'anaesthesia_total_days',
        'anaesthesia_amount',
        'anaesthesia_total_amount',
        'anaesthesia_file',
        'blood_date',
        'blood_from',
        'blood_to',
        'blood_total_days',
        'blood_amount',
        'blood_total_amount',
        'blood_file',
        'oxygen_date',
        'oxygen_from',
        'oxygen_to',
        'oxygen_total_days',
        'oxygen_amount',
        'oxygen_total_amount',
        'oxygen_file',
        'operation_theatre_charges_date',
        'operation_theatre_charges_from',
        'operation_theatre_charges_to',
        'operation_theatre_charges_total_days',
        'operation_theatre_charges_amount',
        'operation_theatre_charges_total_amount',
        'operation_theatre_charges_file',
        'surgical_appliances_charges_date',
        'surgical_appliances_charges_from',
        'surgical_appliances_charges_to',
        'surgical_appliances_charges_total_days',
        'surgical_appliances_charges_amount',
        'surgical_appliances_charges_total_amount',
        'surgical_appliances_charges_file',
        'implants_for_surgical_procedures_date',
        'implants_for_surgical_procedures_from',
        'implants_for_surgical_procedures_to',
        'implants_for_surgical_procedures_total_days',
        'implants_for_surgical_procedures_amount',
        'implants_for_surgical_procedures_total_amount',
        'implants_for_surgical_procedures_file',
        'prosthetics_devices_date',
        'prosthetics_devices_from',
        'prosthetics_devices_to',
        'prosthetics_devices_total_days',
        'prosthetics_devices_amount',
        'prosthetics_devices_total_amount',
        'prosthetics_devices_file',
        'other_devices_date',
        'other_devices_from',
        'other_devices_to',
        'other_devices_total_days',
        'other_devices_amount',
        'other_devices_total_amount',
        'other_devices_file',
        'ambulance_charges_date',
        'ambulance_charges_from',
        'ambulance_charges_to',
        'ambulance_charges_total_days',
        'ambulance_charges_amount',
        'ambulance_charges_total_amount',
        'ambulance_charges_file',
        'other_consumable_items_date',
        'other_consumable_items_from',
        'other_consumable_items_to',
        'other_consumable_items_total_days',
        'other_consumable_items_amount',
        'other_consumable_items_total_amount',
        'other_consumable_items_file',
        'payable_consumables_date',
        'payable_consumables_from',
        'payable_consumables_to',
        'payable_consumables_total_days',
        'payable_consumables_amount',
        'payable_consumables_total_amount',
        'payable_consumables_file',
        'non_payable_consumables_date',
        'non_payable_consumables_from',
        'non_payable_consumables_to',
        'non_payable_consumables_total_days',
        'non_payable_consumables_amount',
        'non_payable_consumables_total_amount',
        'non_payable_consumables_file',
        'registration_admission_charges_date',
        'registration_admission_charges_from',
        'registration_admission_charges_to',
        'registration_admission_charges_total_days',
        'registration_admission_charges_amount',
        'registration_admission_charges_total_amount',
        'registration_admission_charges_file',
        'package_charges_date',
        'package_charges_from',
        'package_charges_to',
        'package_charges_total_days',
        'package_charges_amount',
        'package_charges_total_amount',
        'package_charges_file',
        'gipsa_ppn_packages_date',
        'gipsa_ppn_packages_from',
        'gipsa_ppn_packages_to',
        'gipsa_ppn_packages_total_days',
        'gipsa_ppn_packages_amount',
        'gipsa_ppn_packages_total_amount',
        'gipsa_ppn_packages_file',
        'bhc_packages_date',
        'bhc_packages_from',
        'bhc_packages_to',
        'bhc_packages_total_days',
        'bhc_packages_amount',
        'bhc_packages_total_amount',
        'bhc_packages_file',
        'other_date',
        'other_from',
        'other_to',
        'other_total_days',
        'other_amount',
        'other_total_amount',
        'other_file',
        'opd_charges_date',
        'opd_charges_from',
        'opd_charges_to',
        'opd_charges_total_days',
        'opd_charges_amount',
        'opd_charges_total_amount',
        'opd_charges_file',
        'wellness_date',
        'wellness_from',
        'wellness_to',
        'wellness_total_days',
        'wellness_amount',
        'wellness_total_amount',
        'wellness_file',
        'hospital_amount',
        'bhc_amount',
        'bhc_total_amount',
    ];
}
