<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
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
            Admin::create([
                'firstname' => $faker->firstname(),
                'lastname' => $faker->lastname(),
                'email' => $faker->unique()->safeEmail(),
                'employee_code' => 'CSADM0' . $i,
                'designation' => 'Admin',
                'phone' => $faker->numerify('9#########'),
                'linked_with' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]),
                'kra' => Str::upper(Str::random(8)),
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')

            ]);
        }
    }
}
