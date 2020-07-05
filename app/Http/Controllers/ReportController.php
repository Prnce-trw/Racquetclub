<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Allsport;
use App\booking;
use App\Member as Member;
use App\item as item;
use App\Teacher;
use App\Admin;
use App\Sport;
use App\Manageclass;
use App\Package;
use App\buyclass;
use App\cort;
use App\Exports\MemberExport;
use App\Exports\TeacherExport;
use App\Exports\AdminExport;
use App\Exports\SportExport;
use App\Exports\ClassExport;
use App\Exports\PackageExport;
use App\Exports\BookingExport;
use App\Exports\BuyclassExport;
use Excel;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member_count = Member::all()->count();
        $teacher_count = Teacher::all()->count();
        $admin_count = Admin::all()->count();
        $sport_count = Sport::all()->count();
        $class_count = Manageclass::all()->count();
        $booking_count = booking::all()->count();
        $package_count = Package::all()->count();
        $allsport = Allsport::all();
        $data = array(
            'member_count' => $member_count, 
            'teacher_count' => $teacher_count, 
            'admin_count' => $admin_count, 
            'sport_count' => $sport_count, 
            'class_count' => $class_count, 
            'package_count' => $package_count, 
            'allsport' => $allsport, 
            'booking_count' => $booking_count, 
        );
        return view('backend.report.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        // $test = booking::all();
        // dd($test->booking_court());
        if ($request->ajax()) {
            $output = "";
            $btnexport = "";
            $searchbooking = DB::table('tb_booking')
            ->leftJoin('tb_cort', 'tb_booking.cort_f', '=', 'tb_cort.cort_id')
            ->leftJoin('tb_allsport', 'tb_booking.cort_sportid', '=', 'tb_allsport.as_id')
            ->leftJoin('teacher', 'tb_booking.booking_teacher1', '=', 'teacher.id');
            if ($request->sportid != '') {
                $searchbooking->where('cort_sportid', $request->sportid);
            }
            if ($request->startdate != '') {
                $searchbooking->where('booking_date','>=', $request->startdate);
            }
            if ($request->enddate != '') {
                $searchbooking->Where('booking_date','<=', $request->enddate);
            }
            $booking = $searchbooking->get();
            // dd($booking);

            if ($booking) {
                $btnexport .= '<a href="#" class="btn btn-sm btn-success">Export</a>';
                foreach ($booking as $key => $book) {
                    
                    $output .= '<tr>'.
                    '<td>'.$book->booking_id.'</td>'.
                    '<td>'.$book->as_name.'</td>'.
                    '<td> Court '.$book->cort_f.'</td>'.
                    '<td>'.$book->booking_date.'</td>'.
                    '<td>'.$this->booktime($book->booking_time).'</td>'.
                    '<td>'.$this->booktype($book->booking_type).'</td>'.
                    '<td>'.$book->booking_name.'</td>'.
                    '<td>'.$book->Teachername.'</td>'.
                    '<td>'.$book->booking_employee.'</td>'.
                    '<td></td>'.
                    '<td></td>'.
                    '</tr>';
                }
                $data = array(
                    'btnexport' => $btnexport, 
                    'output' => $output, 
                );
                return Response($data);
            }
        }
    }
    public function booktime($book)
    {
        if ($book == 0) {
            $data = '06:00';
        } elseif ($book == 1) {
            $data = '07:00';
        } elseif ($book == 2) {
            $data = '08:00';
        } elseif ($book == 3) {
            $data = '09:00';
        } elseif ($book == 4) {
            $data = '10:00';
        } elseif ($book == 5) {
            $data = '11:00';
        } elseif ($book == 6) {
            $data = '12:00';
        } elseif ($book == 7) {
            $data = '13:00';
        } elseif ($book == 8) {
            $data = '14:00';
        } elseif ($book == 9) {
            $data = '15:00';
        } elseif ($book == 10) {
            $data = '16:00';
        } elseif ($book == 11) {
            $data = '17:00';
        } elseif ($book == 12) {
            $data = '18:00';
        } elseif ($book == 13) {
            $data = '19:00';
        } elseif ($book == 14) {
            $data = '20:00';
        } elseif ($book == 15) {
            $data = '21:00';
        } elseif ($book == 16) {
            $data = '22:00';
        }
        return  $data;
    }

    public function booktype($book)
    {
        if ($book == 1) {
            $data = 'เล่น';
        } else {
            $data = 'คลาส';
        }
        return $data;
    }

    public function reportmember()
    {
        $member = Member::all();
        $data = array(
            'member' => $member, 
        ); 
        return view('backend.report.member', $data);
    }

    public function filteruser(Request $request)
    {
        $datestart = date('Y-m-d', strtotime('today -'.$request['ageStart'].' years'));
        $dateend = date('Y-m-d', strtotime('today -'.$request['ageEnd'].' years'));

        $resultUser = DB::table('member');

        if ($datestart !== null && $dateend !== null) {
            $resultUser->whereBetween('birthday', [$datestart, $dateend]);
        }

        $resultUser = $resultUser->get();

        $data = array(
            'resultUser' => $resultUser, 
        );
        
        return view('backend.report.fliter-table-user',$data);
    }

    public function exportmember($resultUser) 
    {
        return Excel::download(new MemberExport, 'Member.xlsx');
    }

    public function reportteacher()
    {
        $teacher = Teacher::all();
        $data = array(
            'teacher' => $teacher, 
        ); 
        return view('backend.report.teacher', $data);
    }

    public function exportteacher() 
    {
        return Excel::download(new TeacherExport, 'Teacher.xlsx');
    }

    public function reportadmin()
    {
        $admin = Admin::all();
        $data = array(
            'admin' => $admin, 
        ); 
        return view('backend.report.admin', $data);
    }

    public function exportadmin() 
    {
        return Excel::download(new AdminExport, 'Admin.xlsx');
    }

    public function reportsport()
    {
        $sport = Sport::all();
        $data = array(
            'sport' => $sport, 
        ); 
        return view('backend.report.sport', $data);
    }

    public function exportsport() 
    {
        return Excel::download(new SportExport, 'Sport.xlsx');
    }

    public function reportclass()
    {
        $class = Manageclass::all();
        $data = array(
            'class' => $class, 
        ); 
        return view('backend.report.class', $data);
    }

    public function exportclass() 
    {
        return Excel::download(new ClassExport, 'Class.xlsx');
    }

    public function reportpackage()
    {
        $package = Package::all();
        $data = array(
            'package' => $package, 
        ); 
        return view('backend.report.package', $data);
    }

    public function exportpackage() 
    {
        return Excel::download(new PackageExport, 'Package.xlsx');
    }

    public function reportbooking()
    {
        $allsport = Allsport::all();
        $booking = booking::all();
        $data = array(
            'booking' => $booking, 
            'allsport' => $allsport, 
        ); 
        return view('backend.report.booking', $data);
    }

    public function filterCourt(Request $request)
    {
        $allsport = Allsport::where('as_id',$request->sportId)->first();
        $getCourt = cort::where('fkey_allsport', $allsport->as_id)->get();
        $htmlCourt = '<option selected disabled>Select Sport...</option>';
        foreach ($getCourt as $key => $value) {
            $htmlCourt .= '<option value="'.$value->cort_id.'">'.$value->cort_name.'</option>';
        }
        $data = array('htmlCourt' => $htmlCourt, );
        return $data;
    }

    public function filterBooking(Request $request)
    {
        // dd($request->all());
        $fbooking = booking::orderBy('booking_id','DESC');
        if ($request['sport'] != null) {
            $fbooking->where('cort_sportid',$request->sport);
        }
        if ($request['court'] != null) {
            $fbooking->where('cort_f',$request->court);
        }
        if ($request['check'] != null) {
            $fbooking->where('booking_status1',$request->check);
        }
        if ($request['time'] != null) {
            $fbooking->where('booking_time',$request->time);
        }
        if ($request['dateStart'] != null || $request['dateEnd'] != null) {
            $fbooking->whereBetween('booking_date', [$request->dateStart, $request->dateEnd]);
        }
        $booking = $fbooking->get();
        // dd($booking);
        if ($booking != null) {
            $html = "";
            foreach ($booking as $key => $value) {
                $html .= '<tr>'.
                   '<td class="text-center">'.($key+1).'</td>'.
                   '<td>'.$value->booking_no.'</td>'.
                   '<td>'.$value->booking_date.'</td>'.
                   '<td>'.$value->booking_name1.'</td>'.
                   '<td>'.$value->changeDatatoTime().'</td>'.
                   '<td>'.$value->playingtype().'</td>'.
                   '<td>'.$value->booking_employee.'</td>'.
                   '<td>'.$value->booking_note.'</td>'.
                '</tr>';
            }
        }

        // dd($data);
        $data = array('html' => $html, );
        return $data;
    }

    public function exportbooking(Request $request) 
    {
        // dd($request->all());
        $fbooking = booking::orderBy('booking_id','DESC');
        if ($request['sport'] != null) {
            $fbooking->where('cort_sportid',$request->sport);
        }
        if ($request['court'] != null) {
            $fbooking->where('cort_f',$request->court);
        }
        if ($request['check'] != null) {
            $fbooking->where('booking_status1',$request->check);
        }
        if ($request['time'] != null) {
            $fbooking->where('booking_time',$request->time);
        }
        if ($request['dateStart'] != null || $request['dateEnd'] != null) {
            $fbooking->whereBetween('booking_date', [$request->dateStart, $request->dateEnd]);
        }
        $booking = $fbooking->get();
        // dd($booking);
        if ($booking != null) {
            $html = "";
            foreach ($booking as $key => $value) {
                $html .= '<tr>'.
                   '<td class="text-center">'.($key+1).'</td>'.
                   '<td>'.$value->booking_no.'</td>'.
                   '<td>'.$value->booking_date.'</td>'.
                   '<td>'.$value->booking_name1.'</td>'.
                   '<td>'.$value->booking_time.'</td>'.
                   '<td>'.$value->booking_type.'</td>'.
                   '<td>'.$value->booking_employee.'</td>'.
                   '<td>'.$value->booking_note.'</td>'.
                '</tr>';
            }
        }

        // dd($data);
        $data = array('html' => $html, );
        return Excel::download(new BookingExport("backend.report.excel.booking", $data), 'Booking.xlsx');
        // return Excel::download(new BookingExport("excel.assettableallnewform", $data), 'AssetMasterTablesALL.xlsx');
    }

    public function reportbuyclass()
    {
        $buyclass = buyclass::all();
        $data = array(
            'buyclass' => $buyclass, 
        ); 
        return view('backend.report.buyclass', $data);
    }

    public function exportbuyclass() 
    {
        return Excel::download(new BuyclassExport, 'Buyclass.xlsx');
    }
}
