<?php

namespace Database\Seeders;

use App\Models\AssociatePartner;
use App\Models\SalesServiceType;
use App\Models\User;
use App\Models\VendorServiceType;
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
                'reference' => 'Refereed By Admin',
                'status' => $faker->randomElement(['Main', 'Sub AP', 'Agency']),
                'assigned_employee' => $user->id,
                'assigned_employee_id' => $user->employee_code,
                'linked_employee' => $user->id,
                'linked_employee_id' => $user->employee_code,
                'mou' => $faker->randomElement(['yes', 'no']),
                'agreement_start_date' => Carbon::now()->format('Y-m-d'),
                'agreement_end_date' => Carbon::now()->addMonths(3)->format('Y-m-d'),
                'contact_person' => $faker->name(),
                'contact_person_phone' => $faker->numerify('9#########'),
                'contact_person_email' => $faker->unique()->safeEmail(),
                'comments' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')

            ]);
        }
        $associate_partners = AssociatePartner::get(['id', 'pan', 'type']);
        foreach ($associate_partners as $partner) {
            AssociatePartner::where('id', $partner->id)->update([
                'associate_partner_id' => 'AP' . substr($partner->pan, 0, 2) . substr($partner->pan, -2)
            ]);

            if ($partner->type == 'vendor') {
                VendorServiceType::create([
                    'associate_partner_id' => $partner->id,
                    'cashless_claims_management' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'cashless_claims_management_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'cashless_helpdesk' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'cashless_helpdesk_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'claims_assessment' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'claims_assessment_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'claims_bill_entry' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'claims_bill_entry_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'claims_reimbursement' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'claims_reimbursement_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'doctor_claim_process' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'doctor_claim_process_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'doctor_honorary_panel' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'doctor_honorary_panel_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'doctor_tele_consultation' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'doctor_tele_consultation_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'insurance_tpa_coordination' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'insurance_tpa_coordination_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'medical_lending_bill' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'medical_lending_bill_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'medical_lending_patient' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'medical_lending_patient_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'others' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'others_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'vendor_partner_comments' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                ]);
            } else {
                SalesServiceType::create([
                    'associate_partner_id' => $partner->id,
                    'consulting' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'consulting_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'dealer_distributor' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'dealer_distributor_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'hospital_empanelment_agent' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'hospital_empanelment_agent_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'software_sales' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'software_sales_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'others' => $faker->randomElement(['Bharat Claims', 'Vendor Partner', 'NA']),
                    'others_charge' => $faker->randomElement(['2000', '3000', '4000', '5000', '6000', '7000']),
                    'sales_partner_comments' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                ]);
            }
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
