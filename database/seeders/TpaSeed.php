<?php

namespace Database\Seeders;

use App\Models\Tpa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TpaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insurereArr = [
            [ 'name' => 'Name of TPA ( Add Only on the TPA Dropdown Field listing )', 'type' => 'TPA' ],
            [ 'name' => 'Medvantage Insurance TPA Pvt. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Medi Assist Insurance TPA Pvt. Ltd. ', 'type' => 'TPA' ],
            [ 'name' => 'MDIndia Health Insurance TPA Pvt. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Paramount Health Services & Insurance TPA Pvt. Ltd. ', 'type' => 'TPA' ],
            [ 'name' => 'Heritage Health Insurance TPA Pvt. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Family Health Plan Insurance TPA Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Raksha Health Insurance TPA Pvt. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Vidal Health Insurance TPA Pvt. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'East West Assist Insurance TPA Pvt. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Medsave Health Insurance TPA Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Genins India Insurance TPA Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Health India Insurance TPA Services Pvt. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Good Health Insurance TPA Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Park Mediclaim Insurance TPA Pvt. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Safeway Insurance TPA Pvt. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Anmol Medicare Insurance TPA Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Ericson Insurance TPA Pvt. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Health Insurance TPA of India Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Vision Digital Insurance TPA Pvt. Ltd. ', 'type' => 'TPA' ],
            [ 'name' => 'Acko General Insurance Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Aditya Birla Health Insurance Co. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Bajaj Allianz General Insurance Company Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Care Health Insurance Ltd. (Religare Health Insurance Co. Ltd.)', 'type' => 'TPA' ],
            [ 'name' => 'Cholamandalam MS General Insurance Co Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Edelweiss General Insurance Co. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Future Generali India Insurance Co Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Go Digit General Insurance Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'HDFC ERGO General Insurance Co.Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'ICICI LOMBARD General Insurance Co. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'IFFCO TOKIO General Insurance Co. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Kotak Mahindra General Insurance Company Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Liberty General Insurance Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Magma HDI General Insurance Co. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Manipal Cigna Health Insurance Company Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'National Insurance Co. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Navi General Insurance Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Niva Bupa Health Insurance Co Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Raheja QBE General Insurance Co. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Reliance General Insurance Co.Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Royal Sundaram General Insurance Co. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'SBI General Insurance Company Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Shriram General Insurance Company Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Star Health & Allied Insurance Co.Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'Tata AIG General Insurance Co. Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'The New India Assurance Co. Ltd', 'type' => 'TPA' ],
            [ 'name' => 'The Oriental Insurance Company Ltd.', 'type' => 'TPA' ],
            [ 'name' => 'United India Insurance Company Ltd.', 'type' => 'TPA' ]
        ];

        foreach ($insurereArr as $key => $insurere) {
            Tpa::create([
                'company' => $insurere['name'],
                'company_type' => $insurere['type'],
            ]);
        }
    }
}
