<?php

namespace Database\Seeders;

use App\Models\AssociatePartner;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);
        for ($i = 1; $i < 60; $i++) {

            $partner    = AssociatePartner::inRandomOrder()->first();
            $linked     = User::inRandomOrder()->first();
            $assigned   = User::inRandomOrder()->first();

            Hospital::create([
                'uid' => 'HSP'.$i,
                'name' => $faker->company,
                'onboarding' => $faker->randomElement(['Tie Up', 'Non - Tie Up']),
                'by' => $faker->randomElement(['Direct', 'Associate Partner']),
                'address' => $faker->address,
                'city' => $faker->city,
                'state' => $faker->state,
                'pincode' => $faker->postcode,
                'firstname' => $faker->firstname(),
                'lastname' => $faker->lastname(),
                'pan' => Str::upper(Str::random(10)),
                'email' => $i == 1 ? 'hospital@claimstack.com' : $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'landline' => $faker->numerify('9#########'),
                'phone'=> $faker->numerify('2##8#####'),
                'rohini' => Str::upper(Str::random(10)),
                'linked_associate_partner' => $partner->firstname.' '.$partner->lastname,
                'linked_associate_partner_id' =>  $partner->associate_partner_id,
                'assigned_employee' => $assigned->id,
                'assigned_employee_id' => $assigned->employee_code,
                'linked_employee' => $linked->id,
                'linked_employee_id' => $linked->employee_code,
                'comments' => $faker->realText($maxNbChars = 200, $indexSize = 2)
            ]);
        }
    }
}
