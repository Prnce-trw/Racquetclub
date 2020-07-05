<?php

namespace App\Exports;

use App\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TeacherExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teacher::all();
    }

    public function headings(): array
    {
        return [
            'Teacher Id',
            'First Name',
            'Last Name',
            'Nick Name',
            'Create At',
            'Update At',
            'Status',
            'Phone',
        ];
    }
}
