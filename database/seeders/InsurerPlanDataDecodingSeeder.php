<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
  use App\Models\InsurerPlanDataDecoding;
  use App\Models\DecodingInsurer;
  use App\Models\DecodingPlan;
  use Illuminate\Support\LazyCollection;

class InsurerPlanDataDecodingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('insurer_plan_data_decodings')->truncate();
       // $sql = file_get_contents(database_path() . '/seeds/insurer_plan_data_decodings.sql');
      


        DB::table('insurer_plan_data_decodings')->truncate();
        
        LazyCollection::make(function () {
          $handle = fopen(public_path("insurar_plan_decodings.csv"), 'r');

          while (($line = fgetcsv($handle, 4096)) !== false) {
            yield $line;
        }

        fclose($handle);
    })
        ->skip(1)
        ->chunk(1000)
        ->each(function (LazyCollection $chunk) {
          $records = $chunk->map(function ($row) {

            $insurer = DecodingInsurer::updateOrCreate(['insurer' => $row[0]]);
            $plan = DecodingPlan::updateOrCreate(['plan_name' => $row[1]]);
                  



            return [
                "insurer" => $insurer->id,
                "plan_name" => $plan->id,
                "office" => $row[2],
                "icu_rent" => $row[3],
                "medical_practitioner_specialistsconsultants_surgeon_fees" => $row[4],
                "implants_for_surgical_procedures_prosthetics_devices_charges" => $row[5],
                "ambulance_charges" => $row[6],
                "restoration" => $row[7],
            ];
        })->toArray();

          DB::table('insurer_plan_data_decodings')->insert($records);
      });
    

        // DB::statement($sql);
    }
}
