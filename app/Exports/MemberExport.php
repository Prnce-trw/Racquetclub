<?php

namespace App\Exports;

use App\Member as resultUser;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MemberExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Member::all();
    // }

    // public function headings(): array
    // {
    //     return [
    //         'Member Id',
    //         'Register At',
    //         'First Name',
    //         'Last Name',
    //         'Phone',
    //         'E-Mail',
    //         'Birthday',
    //         'Gender',
    //         'Address',
    //         'Country',
    //         'Website',
    //         'Master Card',
    //         'Barcode',
    //         'Create At',
    //         'Update At',
    //         'Member Job',
    //         'Emergency Tel',
    //         'Emergency Name',
    //         'Goals',
    //         'Continuous',
    //     ];
    // }

    public function view(): View
    {
        return view('backend.report.fliter-table-user', [
            'resultUser ' => $resultUser,
        ]);
    }
}
