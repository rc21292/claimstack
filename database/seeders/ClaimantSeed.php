<?php

namespace Database\Seeders;

use App\Models\Claimant;
use App\Models\User;
use App\Models\Patient;
use App\Models\Claim;
use App\Models\Hospital;
use App\Models\AssociatePartner;
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
    $hospital  = Hospital::inRandomOrder()->first();
    $associate  = AssociatePartner::inRandomOrder()->first();
    $patient  = Patient::inRandomOrder()->first();
    $claim  = Claim::inRandomOrder()->first();
    for ($i = 1; $i < 101; $i++) {
        Claimant::create([
            'patient_id' => $patient->uid,
            'claim_id' => $claim->uid,
            'hospital_id' => $hospital->uid,
            'associate_partner_id' => $associate->associate_partner_id,
            'patient_title' => $faker->randomElement(['Mr.', 'Ms.']),
            'patient_firstname' => $faker->firstname(),
            'patient_middlename' => $faker->lastname(),
            'patient_lastname' => $faker->lastname(),
            'title' => $faker->randomElement(['Mr.', 'Ms.']),
            'firstname' => $faker->firstname(),
            'middlename' => $faker->lastname(),
            'lastname' => $faker->lastname(),     
            'patient_id_proof' => 'Aadhar Card',           
            'are_patient_and_claimant_same' => 'Yes',       
            'pan_no' => 'CCZPP'.$faker->numerify('####').'B',
            'aadhar_no' => 'CCZPP'.$faker->numerify('####').'B',    
            'patients_relation_with_claimant' => $faker->randomElement(['Self', 'Relation']),
            'address' => $faker->address,
            'city' => $faker->city,
            'state' => $faker->state,
            'pincode' => $faker->postcode,
            'email' => $i == 1 ? 'claimant@claimstack.com' : $faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'personal_email_id' =>  $i == 1 ? 'claimant@claimstack.com' : $faker->unique()->safeEmail(),
            'official_email_id' =>  $i == 1 ? 'claimant1@claimstack.com' : $faker->unique()->safeEmail(),
            'mobile_no' => $faker->numerify('9#########'),
            'bank_name'                             =>  $faker->randomElement(['Punjab National Bank', 'State Bank of India', 'Axis1 Bank', 'HDFC Bank', 'ICICI Bank']),
            'ac_no'                       =>  $faker->numerify('4#7###8###0#'),
            'ifs_code'                         => 'IFSC'.$faker->numerify('9###2##'),
            'cancel_cheque'                         => 'No',
            'comments'                  => $faker->realText($maxNbChars = 200, $indexSize = 2),
        ]);
    }

    $claimants = Claimant::get(['id', 'pan_no']);
    foreach ($claimants as $partner) {
        Claimant::where('id', $partner->id)->update([
            'uid' => 'CLMT' . substr($partner->pan_no, 0, 2) . substr($partner->pan_no, -3)
        ]);

    }
}
}
