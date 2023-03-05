<?php

namespace Database\Seeders;

use App\Models\Borrower;
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

class BorrowerSeed extends Seeder
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
    $claimant  = Claimant::inRandomOrder()->first();
    for ($i = 1; $i < 101; $i++) {
        Borrower::create([
            'patient_id' => $patient->uid,
            'claim_id' => $claim->uid,
            'claimant_id' => $claimant->uid,
            'hospital_id' => $hospital->uid,
            'hospital_name' => $hospital->name,
            'hospital_address' => $hospital->address,
            'hospital_city' => $hospital->city,
            'hospital_state' => $hospital->state,
            'hospital_pincode' => $hospital->hospital_pincode,
            'patient_title' => $faker->randomElement(['Mr.', 'Ms.']),
            'patient_firstname' => $faker->firstname(),
            'patient_middlename' => $faker->lastname(),
            'patient_lastname' => $faker->lastname(),     
            'borrower_pan_no' => 'CCZPP'.$faker->numerify('####').'B',
            'borrower_address' => $faker->address,
            'borrower_city' => $faker->city,
            'borrower_state' => $faker->state,
            'borrower_pincode' => $faker->postcode,
        ]);
    }

    $claimants = Borrower::get(['id', 'borrower_pan_no']);
    foreach ($claimants as $partner) {
        Borrower::where('id', $partner->id)->update([
            'uid'      => 'BRO' . substr($claimant->pan_no, 0, 2) . substr($partner->borrower_pan_no, -3)
        ]);
    }
}
}
