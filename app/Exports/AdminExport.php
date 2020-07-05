<?php

namespace App\Exports;

use App\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AdminExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Admin::all();
    }

    public function headings(): array
    {
        return [
            'Admin Id',
            'Username',
            'First Name',
            'Last Name',
            'E-Mail',
            'Password',
            'Capacity',
            'Status',
            'Create At',
            'Update At',
        ];
    }
}
