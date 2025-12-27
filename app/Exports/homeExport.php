<?php

namespace App\Exports;

use App\Models\Info;
use Maatwebsite\Excel\Concerns\FromCollection;

class homeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Info::all();
    }
}
