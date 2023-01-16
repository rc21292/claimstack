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
        $user  = User::inRandomOrder()->first();
        $patient  = Patient::inRandomOrder()->first();
        for ($i = 1; $i < 10; $i++) {
            Claim::create([
                'firstname' => $faker->firstname(),
                'lastname' => $faker->lastname(),
                'patient_id' => $patient->id,
                'patient_dob' => Carbon::now()->addMonths(3)->format('Y-m-d'),
                'patient_gender' => $faker->randomElement(['Male', 'Female']),
                'patient_address' => $faker->address,
                'patient_city' => $faker->city,
                'patient_state' => $faker->state,
                'patient_pincode' => $faker->postcode,
                'hospital_id' => $user->id,
                'hospital_name' => $user->name,
                'hospital_address' => $faker->address,
                'hospital_city' => $faker->city,
                'hospital_state' => $faker->state,
                'hospital_pincode' => $faker->postcode,
                'associate_partner_id' => $user->employee_code,
                'hospital_id' => $user->id,
                'patient_email' =>  $i == 1 ? 'employee@claimstack.com' : $faker->unique()->safeEmail(),
                'patient_mobile' => $faker->numerify('9#########'),
                'patient_referred_by' => $faker->randomElement(['Direct', 'Hospital', 'Associate Partner']),
                'patient_comments' => $faker->realText($maxNbChars = 100, $indexSize = 2),
                'probable_date_of_admission' => Carbon::now()->format('Y-m-d'),
                'probable_date_of_discharge' => Carbon::now()->addMonths(3)->format('Y-m-d'),
                'lending_required' => $faker->randomElement(['Yes', 'No']),
                'treatment_type' => $faker->randomElement(['OPD', 'IPD']),
                'admission_type' => $faker->randomElement(['Day Care', 'Hospitalization']),
                'claim_category' => $faker->randomElement(['Cashless', 'Reimbursement']),
                'treatment_category' => $faker->randomElement(['Surgical', 'Medical Management']),
                'disease_category' => $faker->randomElement(['Cardiac', 'Dialysis', 'Eye Related', 'Infection', 'maternity ', 'Neuro Related', 'Trauma']),
                'disease_type' => $faker->randomElement(['PED', 'Non-PED']),
                'disease_name' => $user->name,
                'claim_intimation_comments' => $faker->realText($maxNbChars = 100, $indexSize = 2),
            ]);
        }
    }
}
