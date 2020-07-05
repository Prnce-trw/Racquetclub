<?php

namespace App\Exports;

use App\Sport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SportExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sport::all();
    }

    public function headings(): array
    {
        return [
            'Sport Id',
            'Sport Name',
            'Note',
            'Create At',
            'Update At',
        ];
    }
}
