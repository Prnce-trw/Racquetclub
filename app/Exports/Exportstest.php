<?php

namespace App\Exports;

use App\Daypass;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exportstest implements FromCollection
{
    public function collection()
    {
        return Daypass::all();
    }
}