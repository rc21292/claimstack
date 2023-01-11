<?php

namespace Database\Seeders;

use App\Models\AssociatePartner;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator;
use Illuminate\Support\Facades\Hash;

class AssociatePartnerSeed extends Seeder
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
        for ($i = 1; $i < 101; $i++) {
            AssociatePartner::create([
                'firstname' => $faker->firstname(),
                'lastname' => $faker->lastname(),
                'type' => $faker->randomElement(['vendor', 'sales']),
                'pan' => Str::upper(Str::random(10)),
                'owner' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'address' => $faker->address,
                'city' => $faker->city,
                'state' => $faker->state,
                'pincode' => $faker->postcode,
                'phone' => $faker->numerify('9#########'),
                'refrence' => 'Refereed By Admin',
                'status' => $faker->randomElement(['Main', 'Sub AP', 'Agency']),
                'assigned_employee' => $user->id,
                'assigned_employee_id' => $user->employee_code,
                'linked_employee' => $user->id,
                'linked_employee_id' => $user->employee_code,               
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')

            ]);
        }
        $associate_partners = AssociatePartner::get(['id', 'pan']);
        foreach ($associate_partners as $partner) {            
            AssociatePartner::where('id', $partner->id)->update([                
                'associate_partner_id' => 'AP'.substr($partner->pan, 0, 2).substr($partner->pan, -2)
            ]);
        }
       
        foreach ($associate_partners as $partner) {
            $part  = AssociatePartner::inRandomOrder()->first();
            AssociatePartner::where('id', $partner->id)->update([
                'linked_associate_partner' => $part->id,
                'linked_associate_partner_id' => $part->associate_partner_id
            ]);
        }
    }
}
