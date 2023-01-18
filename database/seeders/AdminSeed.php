<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
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

        for ($i = 1; $i < 20; $i++) {
            $admin = Admin::create([
                'firstname' => $faker->firstname(),
                'lastname' => $faker->lastname(),
                'email' => $i == 1 ? 'admin@claimstack.com' : $faker->unique()->safeEmail(),
                'uid' => $i + 20,
                'employee_code' => 'EMP' . $i + 20,
                'designation' => 'Admin',
                'department' => $faker->randomElement(['Operations', 'Sales', 'Accounts', 'Lending', 'IT', 'Insurance']),
                'phone' => $faker->numerify('9#########'),                
                'kra' => Str::upper(Str::random(8)),
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')

            ]);
            $admin->assignRole('admin');
            $role = Role::where('name', 'admin')->with('permissions')->first();
            foreach($role->permissions as $permission){
                 $admin->givePermissionTo($permission);
            }
        }
        
        $admins = Admin::get(['id', 'employee_code', 'department']);

        foreach ($admins as $admin) {
            $part  = User::where('department', $admin->department)->inRandomOrder()->first();
            Admin::where('id', $admin->id)->update([
                'linked_employee' => $part->id,
                'linked_employee_id' => $part->employee_code
            ]);
        }
    }
}
