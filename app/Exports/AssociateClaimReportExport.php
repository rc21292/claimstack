<?php

namespace App\Exports;

use App\Models\Claim;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AssociateClaimReportExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data;

    function __construct($data) {
        $this->data = $data;
    }

    public function collection()
    {
        return Claim::all();
    }


    public function headings(): array
    {
        return [
            'Patient ID',
            'Claim ID',
            'Patient Name',
            'Claimant Name',
            'Borrower Name',
            'Hospital Name',
            'Pre-Assessment Status',
            'Claim Processing Status',
            'Final Assessment / Authorization Status',
            'IC Claim Status',
            'Estimated Amount',
            'Claimed Ampunt',
            'Loan Amount',
            'Settled Amount',
            'Date of Disbursement (By IC)',
            'DOA',
            'DOD',
            'Policy No.',
            'Insurance Co.',
            'TPA Name',
            'Policy Type',
            'Disease Category',
            'Disease Name',
            'Disease Type',
            'Claimant ID',
            'Borrower ID',
            'Hospital ID',
            'Hospital Address',
            'Hospital City',
            'Hospital State',
            'Hospital PIN',
            'Key Points ',
        ];
    }
}
