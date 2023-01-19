<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use App\Models\AssociatePartner;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator;
use Illuminate\Support\Facades\Hash;

class PatientSeed extends Seeder
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
        $ap  = AssociatePartner::inRandomOrder()->first();
        for ($i = 1; $i < 10; $i++) {
            Patient::create([
                'firstname' => $faker->firstname(),
                'lastname' => $faker->lastname(),
                'dob' => Carbon::now()->addMonths(3)->format('Y-m-d'),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'address' => $faker->address,
                'city' => $faker->city,
                'state' => $faker->state,
                'pincode' => $faker->postcode,
                'hospital_id' => $user->id,
                'hospital_name' => $user->name,
                'hospital_address' => $faker->address,
                'hospital_city' => $faker->city,
                'hospital_state' => $faker->state,
                'hospital_pincode' => $faker->postcode,
                'associate_partner_id' => $ap->id,
                'hospital_id' => $user->id,
                'email' =>  $i == 1 ? 'patient@claimstack.com' : $faker->unique()->safeEmail(),
                'mobile' => $faker->numerify('9#########')
            ]);
        }
    }
}
