<?php

namespace Database\Seeders;

use App\Models\Claim;
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
            Claim::create([
                'uid'                           => 'C'.Carbon::now()->format('Y-m-d').$key+1,
                'patient_id'                    => $patient->id,
                'admission_date'                => Carbon::now()->subYears(3)->format('Y-m-d'),
                'admission_time'                => Carbon::now()->subYears(3)->format('H:i:s'),
                'abha_id'                       => $faker->numerify('99-#2##-####-0###'),
                'insurance_coverage'            => $faker->randomElement(['Yes', 'No']),
                'policy_no'                     => 'POL'.$faker->numerify('102####'),
                'company_tpa_id_card_no'        => 'TPA'.$faker->numerify('926####'),
                'lending_required'              => $faker->randomElement(['Yes', 'No']),
                'hospitalization_due_to'        => $faker->randomElement(['Injury', 'Illness', 'Maternity']),
                'date_of_delivery'              => Carbon::now()->subYears(3)->format('Y-m-d'),
                'system_of_medicine'            => $faker->randomElement(['Allopathy', 'Ayurveda', 'Siddha', 'Unani', 'AYUSH']),
                'treatment_type'                => $faker->randomElement(['OPD', 'IPD']),
                'admission_type_1'              => $faker->randomElement(['Emergency', 'Planned']),
                'admission_type_2'              => $faker->randomElement(['Day Care', 'Hospitalization']),
                'admission_type_3'              => $faker->randomElement(['Main', 'Pre-Post']),
                'claim_category'                => $faker->randomElement(['Cashless', 'Reimbursement']),
                'treatment_category'            => $faker->randomElement(['OPD', 'IPD']),
                'disease_category'              => $faker->randomElement(['Cardiac', 'Eye Related', 'Dialysis', 'Infection', 'Maternity', 'Injury']),
                'disease_name'                  => $faker->randomElement(['Dengue', 'Gonorrhoea', 'Hepatitis', 'HIV infection', 'Ebola', 'Haemophilus infection', 'Measles']),
                'disease_type'                  => $faker->randomElement(['PED (Pre Existing Disease)', 'Non PED']),
                'estimated_amount'              => $faker->numerify('9#####'),
                'comments'                      => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'claim_intimation_done'         => $faker->randomElement(['Yes', 'No']),
                'claim_intimation_number_mail'  => $faker->randomElement([$faker->numerify('99#2######'), $faker->unique()->safeEmail(),]),
            ]);
        }
    }
}
