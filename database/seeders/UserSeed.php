<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        for ($i = 1; $i < 101; $i++) {
            User::create([
                'firstname' => $faker->firstname(),
                'lastname' => $faker->lastname(),
                'email' => $i == 1 ? 'user@claimstack.com' : $faker->unique()->safeEmail(),
                'employee_code' => 'EMP0' . $i,
                'designation' => 'Employee',
                'department' => $faker->randomElement(['Operations', 'Sales', 'Accounts', 'Lending', 'IT', 'Insurance']),
                'phone' => $faker->numerify('9#########'),              
                'kra' => Str::upper(Str::random(8)),
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')

            ]);
        }
        $admins = User::get(['id', 'employee_code']);
        foreach ($admins as $admin) {
            $part  = User::inRandomOrder()->first();
            User::where('id', $admin->id)->update([
                'linked_employee' => $part->id,
                'linked_employee_id' => $part->employee_code
            ]);
        }
    }
}
