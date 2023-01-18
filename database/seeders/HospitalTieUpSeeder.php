<?php

namespace Database\Seeders;

use App\Models\AssociatePartner;
use App\Models\HospitalTieUp;
use App\Models\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class HospitalTieUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);
        for ($i = 1; $i < 10; $i++) {

            $hospital    = Hospital::inRandomOrder()->first();

            HospitalTieUp::create([
                'uid' => 'HSP'.$i,
                'hospital_id' => $hospital->id,
                'mou_inception_date' => $faker->text,
                'bhc_packages_for_surgical_procedures_accepted' => $faker->randomElement(['Yes','No']),
                'discount_on_medical_management_cases' => $faker->randomElement(['Yes','No']),
                'discount_on_final_bill' => $faker->numerify('2##8#####'),
                'discount_on_room_rent' => $faker->numerify('2##8#####'),
                'discount_on_medicines' => $faker->numerify('2##8#####'),
                'discount_on_consumables' => $faker->numerify('2##8#####'),
                'referral_commission_offered' => $faker->randomElement(['Yes','No']),
                'referral' => $faker->numerify('2##8#####'),
                'claimstag_usage_services' => $faker->randomElement(['Monthly','Half Yearly','Quarterly', 'Yearly','Pre Use','No']),
                'claimstag_installation_charges' => $faker->randomNumber(2),
                'claimstag_usage_charges' => $faker->randomNumber(2),
                'claims_reimbursement_insured_services' => $faker->randomElement(['Monthly','Half Yearly','Quarterly', 'Yearly','Pre Use','No']),
                'claims_reimbursement_insured_service_charges' => $faker->randomNumber(2),
                'cashless_claims_management_services' => $faker->randomElement(['Monthly','Half Yearly','Quarterly', 'Yearly','Pre Use','No']),
                'cashless_claims_management_services_charges' => $faker->randomNumber(2),
                'medical_lending_for_patients' => $faker->randomElement(['Yes','No']),
                'medical_lending_service_type' => $faker->randomElement(['Bridge','Term','Both']),
                'subvention' => $faker->numerify('2##8#####'),
                'medical_lending_for_bill_invoice_discounting' => $faker->randomElement(['Yes','No']),
                'comments_on_invoice_discounting' => $faker->numerify('2##8#####'),
                'lending_finance_company_agreement' => $faker->numerify('2##8#####'),
                'lending_finance_company_agreement_date' => $faker->numerify('2##8#####'),
                'hospital_management_system_installation' => $faker->randomElement(['Yes','No']),
                'hms_services' => $faker->randomElement(['Monthly','Half Yearly','Quarterly', 'Yearly','Pre Use','No']),
                'hms_charges' => $faker->randomNumber(2),
                'comments' => $faker->realText($maxNbChars = 200, $indexSize = 2)
            ]);
        }
    }
}
