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
        $this->call(SuperAdminSeed::class);
        $this->call(AssociatePartnerSeed::class);
        $this->call(HospitalSeeder::class);
        $this->call(HospitalTieUpSeeder::class);
        $this->call(PatientSeed::class);
        $this->call(ClaimSeed::class);
        $this->call(InsurerSeed::class);
        $this->call(ClaimantSeed::class);
        $this->call(IcdCodesTableSeeder::class);
        $this->call(PcsCodesTableSeeder::class);
    }
}
