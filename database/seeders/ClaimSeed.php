<?php

namespace Database\Seeders;

use App\Models\Claim;
use App\Models\InsurancePolicy;
use App\Models\Insurer;
use App\Models\User;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator;
use Illuminate\Support\Facades\Hash;

class ClaimSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        $patients  = Patient::get();
        foreach ($patients as $key =>  $patient) {
            $claim = Claim::create([
                'uid'                           => 'C-'.Carbon::now()->format('Y-m-d').'-'.$key+1,
                'patient_id'                    => $patient->id,
                'admission_date'                => Carbon::now()->subYears(3)->format('d-m-Y'),
                'admission_time'                => Carbon::now()->subYears(3)->format('H:i:s'),
                'abha_id'                       => $faker->numerify('99-#2##-####-0###'),
                'insurance_coverage'            => $faker->randomElement(['Yes', 'No']),
                'policy_no'                     => 'POL'.$faker->numerify('102####'),
                'company_tpa_id_card_no'        => 'TPA'.$faker->numerify('926####'),
                'lending_required'              => $faker->randomElement(['Yes', 'No']),
                'hospitalization_due_to'        => $faker->randomElement(['Injury', 'Illness', 'Maternity']),
                'date_of_delivery'              => Carbon::now()->subYears(3)->format('d-m-Y'),
                'system_of_medicine'            => $faker->randomElement(['Allopathy', 'Ayurveda', 'Siddha', 'Unani', 'AYUSH']),
                'treatment_type'                => $faker->randomElement(['OPD', 'IPD']),
                'admission_type_1'              => $faker->randomElement(['Emergency', 'Planned']),
                'admission_type_2'              => $faker->randomElement(['Day Care', 'Hospitalization']),
                'admission_type_3'              => $faker->randomElement(['Main', 'Pre', 'Post']),
                'claim_category'                => $faker->randomElement(['Cashless', 'Reimbursement']),
                'treatment_category'            => $faker->randomElement(['Surgical', 'Medical Management', 'Intensive Care', 'Investigation', 'Non Allopathic']),
                'disease_category'              => $faker->randomElement(['Cardiac', 'Eye Related', 'Dialysis', 'Infection', 'Maternity', 'Injury']),
                'disease_name'                  => $faker->randomElement(['Dengue', 'Gonorrhoea', 'Hepatitis', 'HIV infection', 'Ebola', 'Haemophilus infection', 'Measles']),
                'disease_type'                  => $faker->randomElement(['PED (Pre Existing Disease)', 'Non PED']),
                'estimated_amount'              => $faker->numerify('9#####'),
                'comments'                      => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'claim_intimation_done'         => $faker->randomElement(['Yes', 'No']),
                'claim_intimation_number_mail'  => $faker->randomElement([$faker->numerify('99#2######'), $faker->unique()->safeEmail()]),
                'discharge_date'                => Carbon::now()->subYears(3)->format('d-m-Y'),
                'days_in_hospital'              => $faker->randomElement(['2', '3', '4', '5']),
                'room_category'                 => $faker->randomElement(['Daycare', 'Single Occupancy', 'Twin Sharing', ' 3 or more beds per room']),
                'consultation_date'             => Carbon::now()->subYears(3)->format('d-m-Y'),
                'nature_of_illness'             => 'For strained back, choose Strains. When two or more injuries or illnesses are indicated, and one is a sequela, aftereffect, complication due to medical treatment, or re-injury, choose the initial injury or illness.',
                'clinical_finding'              => 'An irregular heart sound (heart murmur) heard through a stethoscope. Chest pain (angina) or tightness with activity. Feeling faint or dizzy or fainting with activity. Shortness of breath, especially with activity.',
                'chronic_illness'               => $faker->randomElement(['N/A', 'Diabetes', 'Hear Disease', 'Hypertension', 'Hyperlipidaemias', 'Osteoarthritis', 'Asthma-COPD-Bronchitis', 'Cancer', 'Alcohol or Drug Abuse', 'Any HIV or STD related ailments', 'Any other ailment']),
                'ailment_details'               => 'If you have got a rash or a persistent cough, you can call that an ailment. Some other common ailments are allergies or chronic headaches. They can be a real pain.',
                'has_family_physician'          => $faker->randomElement(['Yes', 'No']),
                'family_physician'              => $faker->firstname().' '.$faker->lastname(),
                'family_physician_contact_no'   => $faker->numerify('9#########'),
            ]);

            $cl = Claim::find($claim->id);
            $patient = Patient::find($cl->patient_id);

            InsurancePolicy::create([
                'patient_id' => $patient->id,
                'claim_id'  => $claim->id,
                'policy_no'=> $cl->policy_no,
                'insurer_id'=> Insurer::inRandomOrder()->first()->id,
                'policy_id'=> Insurer::inRandomOrder()->first()->id,
                'certificate_no'=> $faker->numerify('032############9'),
                'company_tpa_id_card_no'=> $cl->company_tpa_id_card_no,
                'tpa_name'=> $faker->firstname().' '.$faker->lastname(),
                'policy_type'=> $faker->randomElement(['Retail', 'Group']),
                'group_name'=> "Random Group Name",
                'previous_policy_no'=> $faker->numerify('012############9'),
                'start_date'=> Carbon::now()->subYears(3)->format('Y-m-d'),
                'expiry_date'=> Carbon::now()->subYears(3)->format('Y-m-d'),
                'commencement_date'=> Carbon::now()->subYears(3)->format('Y-m-d'),
                'title'=>  $faker->randomElement(['Mr.', 'Ms.']),
                'firstname'=> $faker->firstname(),
                'middlename'=> $faker->lastname(),
                'lastname'=> $faker->lastname(),
                'is_primary_insured_and_patient_same'=> $faker->randomElement(['Yes', 'No']),
                'primary_insured_address'=> $patient->patient_current_address,
                'primary_insured_city'=> $patient->patient_current_city,
                'primary_insured_state'=> $patient->patient_current_state,
                'primary_insured_pincode'=> $patient->patient_current_pincode,
                'no_of_person_insured'=> $faker->numerify('0#'),
                'basic_sum_insured'=> $faker->numerify('#3#8#'),
                'cumulative_bonus_cv'=> $faker->numerify('#7#8#'),
                'agent_broker_code'=> $faker->numerify('012#######'),
                'agent_broker_name'=> $faker->firstname().' '.$faker->lastname(),
                'additional_policy'=> $faker->randomElement(['Yes', 'No']),
                'policy_no_additional'=> $faker->numerify('012############9'),
                'currently_covered'=> $faker->randomElement(['Yes', 'No']),
                'commencement_date_other'=> Carbon::now()->subYears(3)->format('Y-m-d'),
                'insurance_company_other'=> Insurer::inRandomOrder()->first()->id,
                'policy_no_other'=> $faker->numerify('012############9'),
                'sum_insured_other'=> $faker->numerify('#3#8#'),
                'hospitalized'=> $faker->randomElement(['Yes', 'No']),
                'admission_date_past'=> Carbon::now()->subYears(3)->format('Y-m-d'),
                'diagnosis'=> $faker->randomElement(['Random Diagnosis 1', 'Random Diagnosis 2', 'Random Diagnosis 3']),
                'comments'=> $faker->realText($maxNbChars = 200, $indexSize = 2),
                'primary_insured_firstname'=> $faker->firstname(),
                'primary_insured_gender'=>  $faker->lastname(),
                'primary_insured_age'=> $faker->numerify('##'),
                'primary_insured_relation'=> "Self",
                'primary_insured_sum_insured'=> $faker->numerify('#3#8#'),
                'primary_insured_cumulative_bonus'=> $faker->numerify('#7#8#'),
                'primary_insured_balance_sum_insured'=>  $faker->numerify('##'),
                'primary_insured_comment'=> $faker->realText($maxNbChars = 200, $indexSize = 2),
                'dependent_insured_firstname'=>  $faker->firstname(),
                'dependent_insured_gender'=>  $faker->lastname(),
                'dependent_insured_age'=>$faker->numerify('##'),
                'dependent_insured_relation'=> "Son",
                'dependent_insured_sum_insured'=>  $faker->numerify('#3#8#'),
                'dependent_insured_cumulative_bonus'=> $faker->numerify('#7#8#'),
                'dependent_insured_balance_sum_insured'=> $faker->numerify('##'),
                'dependent_insured_comment'=> $faker->realText($maxNbChars = 200, $indexSize = 2),
            ]);
        }
    }
}
