<?php

namespace App\Exports;

use App\Package;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PackageExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Package::all();
    }

    public function headings(): array
    {
        return [
            'Package Id',
            'Package Name',
            'Price',
            'Day',
            'Age not Over',
            'Age not Under',
            'As',
            'Create At',
            'Update At',
            'Note',
        ];
    }
}
