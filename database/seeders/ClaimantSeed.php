<?php

namespace Database\Seeders;

use App\Models\Claimant;
use App\Models\User;
use App\Models\Patient;
use App\Models\Claim;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator;
use Illuminate\Support\Facades\Hash;

class ClaimantSeed extends Seeder
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
        $claim  = Claim::inRandomOrder()->first();
        for ($i = 1; $i < 101; $i++) {
            Claimant::create([
                'patient_firstname' => $faker->firstname(),
                'patient_lastname' => $faker->lastname(),
                'claimant_firstname' => $faker->firstname(),
                'claimant_lastname' => $faker->lastname(),
                'patient_id' => $patient->id,
                'claim_id' => $claim->id,
                'patient_claimant_relation' => $faker->randomElement(['Self', 'Relation']),
                'associate_partner_id' => $user->employee_code,
                'claimant_address' => $faker->address,
                'claimant_city' => $faker->city,
                'claimant_state' => $faker->state,
                'claimant_pincode' => $faker->postcode,
                'claimant_email' =>  $i == 1 ? 'employee@claimstack.com' : $faker->unique()->safeEmail(),
                'patient_or_claimant_offical_email' =>  $i == 1 ? 'employee@claimstack.com' : $faker->unique()->safeEmail(),
                'claimant_mobile' => $faker->numerify('9#########')
            ]);
        }
    }
}
