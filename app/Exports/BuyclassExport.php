<?php

namespace App\Exports;

use App\buyclass;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BuyclassExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return buyclass::all();
    }

    public function headings(): array
    {
        return [
            'Buyclass Id',
            'Mamber Id',
            'First Name',
            'Last Name',
            'Buyclass No',
            'Cladd Id',
            'Buyclass Type',
            'Address',
            'Phone',
            'Note',
            'Hour',
            'Create At',
            'Update At',
        ];
    }
}
