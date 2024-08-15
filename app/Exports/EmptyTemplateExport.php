<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmptyTemplateExport implements FromCollection
{
    public function collection()
    {
        return new Collection([
            ['cm_ou_cne', 'date_naissance'], // Add column headers
        ]);
    }
}
