<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(PermissionSeed::class); 
        $this->call(EmployeeSeed::class); 
        $this->call(UserSeed::class); 
        $this->call(AdminSeed::class);
        $this->call(AssociatePartnerSeed::class);       
    }
}
