<?php

namespace App\Exports;

use App\Manageclass;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ClassExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Manageclass::all();
    }

    public function headings(): array
    {
        return [
            'Class Id',
            'Class  No',
            'Sport Id',
            'Class Name',
            'Hour',
            'Price',
            'Price / Hour',
            'Status',
            'Create At',
            'Update At',
            'Note',
            'End At',
        ];
    }
}
