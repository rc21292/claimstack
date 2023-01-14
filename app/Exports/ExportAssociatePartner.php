<?php

namespace App\Exports;

use App\Models\AssociatePartner;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAssociatePartner implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AssociatePartner::all();
    }
}
