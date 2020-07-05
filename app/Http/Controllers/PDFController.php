<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use App\Member;
use DB;
class PDFController extends Controller
{
    public function pdfinformation($memberID)
    {
        $member=DB::table('member')->where('memberID',$memberID)->first();
        $pdf = PDF::loadView('/backend/user/report',compact('member'))->setPaper('a4', 'landscape');
            //return @$pdf->download('report.pdf');// export
            return @$pdf->stream('report.pdf');//เปิดดาวน์โหลด 
	}
    
    public function pdf()
    {
        $member=DB::table('member')->first();
        $pdf = PDF::loadView('/backend/user/report',compact('member'))->setPaper('a4', 'landscape');
         //return @$pdf->download('report.pdf');// export
        return @$pdf->stream('report.pdf');//เปิดดาวน์โหลด 
    }

    public function member_pdf($id)
    {
        $member = DB::table('member')
        ->where('memberID', $id)
        ->first();
        $data = array(
            'member' => $member,
        );
        $pdf = PDF::loadView('/backend/pdf/member',$data);
        return $pdf->stream();
        // return view('/backend/pdf/member',$data);
    }
}
