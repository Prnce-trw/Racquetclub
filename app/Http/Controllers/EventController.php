<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Event;
use App\booking;
use App\Teacher;
use App\Manageclass;
use App\buyclass;
use App\Allsport;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('66666');
        return view('backend.sportevent.modal.event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $event = new Event;
        $event->cort_id        = $request['cort_id'];
        $event->eve_date       = $request['cort_date'];
        $event->eve_time       = $request['cort_time'];
        $event->save();

        return back();
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
    
    public function eventindex($id)
    {
        $datenow = date('Y-m-d');
        $booking = DB::table('tb_booking')
        ->where('cort_sportid', $id)
        ->where('booking_date', date('Y-m-d'))
        ->where('booking_cancel', 0)
        ->leftJoin('teacher', 'tb_booking.booking_teacher1', '=', 'teacher.id')
        ->get();
        $cort = DB::table('tb_allsport')
        ->where('as_id', $id)
        ->leftJoin('tb_cort', 'tb_allsport.as_id', '=', 'tb_cort.fkey_allsport')
        ->get();

        $trhtml = ''; // ประกาศ tr ว่างไว้ก่อนเพื่อรอ $trhtml เอาไปใช้วนค่า
        for ($i=0; $i < 17 ; $i++) { // วนเวลาออกมา 17 เวลา 
            $apendtd = ''; // ประกาศ td ว่างไว้ก่อนเพื่อรอเอาไปลงใน tr

            foreach($cort as $key => $item) { // วนจำนวนคาร์ดออกมา
                $cort_f = ''; // ประกาศตัวแปรเพื่อรอเอาข้อมูลมาลง

                // ประกาศตัวแปรที่เก็บ td ที่ยังไม่ถูกจองเอาไว้
                $tdhtml = '<td data-time="'.$i.'" data-sportid="'.$id.'" class="text-center td-box text-mid" id-cort="'.$item->cort_id.'" data-date="'.$datenow.'"> 
                </td>';
                foreach ($booking as $keyin => $book) { // วนการจอง
                        
                    if ($book->cort_f == $item->cort_id && $book->booking_time == $i) { // ข้อแม้ว่า ให้ cort_f == cort_id และ เวลาจอง == ค่าของเวลาที่วนในแต่ละรอบ
                        $cort_f .= $this->playingtype($book->booking_type).' '.'<span>'.$book->booking_name1.'</span>'.' '.$book->nickname; // ต่อ str ค่าใหม่ลงใน $apendtd ที่ประกาศค่ารอไว้

                        // เอาตัวแปร tdhtml ที่ประกาศไว้ตอนแรกมาแทนที่ถ้าเกิดมีคนจองแล้ว 
                        $tdhtml = '<td data-time="'.$i.'" data-sportid="'.$id.'" data-bookid="'.$book->booking_id.'" class="text-center td-have text-mid" id-cort="'.$item->cort_id.' "> 
                        '.$cort_f.' 
                        </td>';
                    } 

                }
                // push ค่าใหม่ลงใน apendtd ที่ประกาศค่ารอไว้
                $apendtd .= $tdhtml;
            }
            
            $time = '';
            $time .= 6 + $i.' : 00';

            // ต่อ str $trhtml ที่ประกาศรอไว้แล้ว
            $trhtml .= '<tr>
            <td class="text-center text-mid bg-red">'.$time.'</td>
            '.$apendtd.'
            </tr>';
        }

        $data = array(
            // การต่อ str ไม่ต้องไปวนหน้า view เพราะต่อใน controller แล้ว แต่ถ้าเป็น array ต้องไปวนหน้า view 
            'trhtml' => $trhtml, 
            'id' => $id, 
            'booking' => $booking,
            'cort' => $cort,
            'apendtd'=> $apendtd,
        );

        return view('backend.sportevent.event' , $data);
    }

    public function playingtype($book)
    {
        if ($book == 1) {
            $data = 'P';
        } else {
            $data = 'C';
        }
        return $data;
    }

    public function create_event(Request $request)
    {

        $cort_id = $request->id;
        $cort_time = $request->time;
        $cort_date = $request->date;
        $cort_sportid = $request->sportid;
        $teacher = Teacher::all();
        $manageclass = Manageclass::all();
        $courtname = DB::table('tb_cort')
        ->where('cort_id', $cort_id)
        ->first();

        $data = array(
            'courtname' => $courtname,
            'teacher' => $teacher,
            'manageclass' => $manageclass,
            'cort_id' => $cort_id,
            'cort_time' => $cort_time,
            'cort_date' => $cort_date,
            'cort_sportid' => $cort_sportid,
        );

        return view('backend.sportevent.modal.event', $data);
    }

    public function bookingcreate(Request $request)
    {
        $allsport = DB::table('tb_allsport')->where('as_id',$request->cort_sportid)->first();
        if ($request['playing_type'] == 1) {
            $booking = new booking;
            $booking->booking_no         = $allsport->as_codename.rand(10000000, 99999999);
            $booking->cort_f             = $request['cort_id'];
            $booking->booking_time       = $request['cort_time'];
            $booking->cort_date          = $request['cort_date'];
            $booking->cort_sportid       = $request['cort_sportid'];
            $booking->booking_date       = $request['cort_date'];
            $booking->booking_type       = $request['playing_type'];
            $booking->booking_memberID1  = $request['memberid_1'];
            $booking->booking_name1      = $request['booking_name_1'];
            $booking->booking_employee   = $request['employee_name'];
            $booking->booking_note       = $request['note'];
            $booking->save();
        }

        if ($request['playing_type'] == 2) {
            $booking = new booking;
            $booking->booking_no         = $allsport->as_codename.rand(10000000, 99999999);
            $booking->cort_f             = $request['cort_id'];
            $booking->booking_time       = $request['cort_time'];
            $booking->cort_date          = $request['cort_date']; 
            $booking->cort_sportid       = $request['cort_sportid'];
            $booking->booking_date       = $request['cort_date'];
            $booking->booking_type       = $request['playing_type'];
            $booking->booking_memberID1  = $request['memberid_1'];
            $booking->booking_name1      = $request['booking_name_1'];
            $booking->booking_class1     = $request['booking_class_1'];
            $booking->booking_teacher1   = $request['booking_teacher_1'];
            if ($request->membertype_2 == 1) {
                $booking->booking_memberID2  = $request['memberid_2'];
                $booking->booking_name2      = $request['booking_name_2'];
                $booking->booking_class2     = $request['booking_class_2'];
                $booking->booking_teacher2   = $request['booking_teacher_2'];
            }
            if ($request->membertype_3 == 1) {
                $booking->booking_memberID3  = $request['memberid_3'];
                $booking->booking_name3      = $request['booking_name_3'];
                $booking->booking_class3     = $request['booking_class_3'];
                $booking->booking_teacher3   = $request['booking_teacher_3'];
            }
            if ($request->membertype_4 == 1) {
                $booking->booking_memberID4  = $request['memberid_4'];
                $booking->booking_name4      = $request['booking_name_4'];
                $booking->booking_class4     = $request['booking_class_4'];
                $booking->booking_teacher4   = $request['booking_teacher_4'];
            }
            $booking->booking_employee   = $request['employee_name'];
            $booking->booking_note       = $request['note'];
            $booking->save();
        }
        
        return back();
    }
    
    public function create_edit(Request $request) 
    {
        $manageclass = Manageclass::all();
        $teacher = Teacher::all();
        $cort_id = $request->id;
        $cort_time = $request->time;
        $cort_date = $request->date;
        $cort_sportid = $request->sportid;

        // ข้อมูลของคนที่ 1
        $booking = DB::table('tb_booking') 
        ->where('booking_id', $request->bookid)
        ->leftJoin('manageclass', 'tb_booking.booking_class1', '=', 'manageclass.id')
        ->leftJoin('teacher', 'tb_booking.booking_teacher1', '=', 'teacher.id')
        ->leftJoin('tb_cort', 'tb_booking.cort_f', '=', 'tb_cort.cort_id')
        ->first();
        // class ของคนที่ 1
        $buyclass1 = DB::table('tb_buyclass')
        ->where('class_no', $booking->booking_class1)
        ->leftJoin('manageclass', 'tb_buyclass.class_id', '=', 'manageclass.id')
        ->first();

        $book = DB::table('tb_booking')
        ->where('booking_id', $request->bookid)
        ->first();
        
        $html = '';
        for ($i=1; $i <= 4; $i++) { 
            $bookingname        = 'booking_name'.$i.'';
            $booking_memberid   = 'booking_memberID'.$i.'';
            $booking_class      = 'booking_class'.$i.'';
            $booking_teacherid  = 'booking_teacher'.$i.'';
            $booking_status     = 'booking_status'.$i.'';
            if ($book->$bookingname !=null) {
            $div = 
                '<div class="form-group">'.
                    '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                        ''.$i.'. Member Id'.
                    '</label>'.
                    '<div class="col-md-6 col-sm-6">'.
                        '<input class="form-control memberid" data-parsley-required="true" id="memberid_'.$i.'"'.
                            'placeholder="Member Card..." type="text" name="memberid_'.$i.'" value="'.$book->$booking_memberid.'" placeholder="Member Id..."/>'.
                    '</div>'.
                '</div>'.
                '<div class="form-group">'.
                    '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                        ''.$i.'. Name'.
                    '</label>'.
                    '<div class="col-md-6 col-sm-6">'.
                        '<input class="form-control" value="'.$book->$bookingname.'" name="booking_name_'.$i.'" placeholder="Name..." id="booking_name_'.$i.'">'.
                    '</div>'.
                '</div>'.
                '<div>'.
                    '<div class="form-group">'.
                        '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                            ''.$i.'. Class'.
                        '</label>'.
                        '<div class="col-md-6 col-sm-6">'.
                            '<div class="row">'.
                                '<input type="text" class="form-control searchclass" placeholder="Search Class No..." value="'.$book->$booking_class.'" name="booking_class_'.$i.'" id="classid_'.$i.'">'.
                                '<div id="class_name_'.$i.'">'.
                                    '<div class="form-group">'.
                                        '<label class="control-label col-md-4 col-sm-4" for="email">'.
                                            'Class Name:'.
                                        '</label>'.
                                        '<div class="col-md-8 col-sm-8">'.
                                            '<p class="form-control">'.$this->checkclass($book->$booking_class).'</p>'.
                                        '</div>'.
                                    '</div>'.
                                    '<div class="form-group">'.
                                        '<label class="control-label col-md-4 col-sm-4" for="email">'.
                                            'Class Owner:'.
                                        '</label>'.
                                        '<div class="col-md-8 col-sm-8">'.
                                            '<p class="form-control">'.$this->checkclassname($book->$booking_class).'</p>'.
                                        '</div>'.
                                    '</div>'.
                               '</div>'.
                            '</div>'.
                        '</div>'.
                    '</div>'.
                '</div>'.
                '<div class="form-group">'.
                    '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                        ''.$i.'.ชื่อครูผู้สอน/น็อกเกอร์'.
                    '</label>'.
                    '<div class="col-md-6 col-sm-6">'.
                        '<div class="row">'.
                            '<select name="booking_teacher_'.$i.'" id="" class="form-control">'.
                                '<option value="'.$book->$booking_teacherid.'" selected>'.
                                    $this->bookingteacher($book->$booking_teacherid).
                                '<optgroup label="Select Teacher...">'.
                                    $this->bookingteachername($book->$booking_teacherid).
                                '</optgroup>'.
                            '</select>'.
                        '</div>'.
                    '</div>'.
                '</div>'.
                '<div class="form-group">'.
                    '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                        ''.$i.'.Check:'.
                    '</label>'.
                    '<div class="col-md-6 col-sm-6">'.
                        '<div class="row">'.
                            '<input type="checkbox" name="booking_status_'.$i.'" id="" value="1" '.$this->checkjoin($book->$booking_status).'>'.
                        '</div>'.
                    '</div>'.
                '</div>'
                ;
            } else {
                $div = 
                '<div class="form-group">'.
                    '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                        ''.$i.'. Member Id'.
                    '</label>'.
                    '<div class="col-md-6 col-sm-6">'.
                        '<input class="form-control memberid" data-parsley-required="true" id="memberid_'.$i.'"'.
                            'type="text" name="memberid_'.$i.'" placeholder="Member Id..."/>'.
                    '</div>'.
                '</div>'.
                '<div class="form-group">'.
                    '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                        ''.$i.'. Name'.
                    '</label>'.
                    '<div class="col-md-6 col-sm-6">'.
                        '<input class="form-control" name="booking_name_'.$i.'" placeholder="Name..." id="booking_name_'.$i.'">'.
                    '</div>'.
                '</div>'.
                '<div>'.
                    '<div class="form-group">'.
                        '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                            ''.$i.'. Class'.
                        '</label>'.
                        '<div class="col-md-6 col-sm-6">'.
                            '<div class="row">'.
                                '<input type="text" class="form-control searchclass" name="booking_class_'.$i.'" id="classid_'.$i.'" placeholder="Search Class No...">'.
                                '<div id="class_name_'.$i.'">'.
                                    '<div class="form-group">'.
                                        '<label class="control-label col-md-4 col-sm-4" for="email">'.
                                            'Class Name:'.
                                        '</label>'.
                                        '<div class="col-md-8 col-sm-8">'.
                                            '<p class="form-control"></p>'.
                                        '</div>'.
                                    '</div>'.
                                    '<div class="form-group">'.
                                        '<label class="control-label col-md-4 col-sm-4" for="email">'.
                                            'Class Owner:'.
                                        '</label>'.
                                        '<div class="col-md-8 col-sm-8">'.
                                            '<p class="form-control"></p>'.
                                        '</div>'.
                                    '</div>'.
                               '</div>'.
                            '</div>'.
                        '</div>'.
                    '</div>'.
                '</div>'.
                '<div class="form-group">'.
                    '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                        ''.$i.'.ชื่อครูผู้สอน/น็อกเกอร์'.
                    '</label>'.
                    '<div class="col-md-6 col-sm-6">'.
                        '<div class="row">'.
                            '<select name="booking_teacher_'.$i.'" id="" class="form-control">'.
                                '<option selected disabled>Select Class...</option>'.
                                    
                                '<optgroup label="Select Teacher...">'.
                                    $this->bookingteachername($book->$booking_teacherid).
                                '</optgroup>'.
                            '</select>'.
                        '</div>'.
                    '</div>'.
                '</div>'.
                '<div class="form-group">'.
                    '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                        ''.$i.'.Check:'.
                    '</label>'.
                    '<div class="col-md-6 col-sm-6">'.
                        '<div class="row">'.
                            '<input type="checkbox" name="booking_status_'.$i.'" id="" value="1" '.$this->checkjoin($book->$booking_status).'>'.
                        '</div>'.
                    '</div>'.
                '</div>'
                ;
            }
        $html .= $div;
        }

        $data = array(
            'manageclass' => $manageclass,
            'teacher' => $teacher,
            'booking' => $booking,
            'cort_id' => $cort_id,
            'cort_time' => $cort_time,
            'cort_date' => $cort_date,
            'cort_sportid' => $cort_sportid,
            'buyclass1' => $buyclass1,
            'html' => $html,
        );

        return view('backend.sportevent.modal.event-edit', $data);
    }

    public function checkclass($book)
    {
        $searchclass = DB::table('tb_buyclass')
        ->where('class_no', $book)
        ->leftJoin('manageclass', 'tb_buyclass.class_id', '=', 'manageclass.id')
        ->first();
        if ($searchclass != null) {
            $data = $searchclass->class_title;
        } else {
            $data = '';
        }

        return $data;
    }

    public function checkclassname($book)
    {
        $searchclass = DB::table('tb_buyclass')
        ->where('class_no', $book)
        ->first();
        if ($searchclass != null) {
            $data = $searchclass->buy_name.' '.$searchclass->buy_lname;
        } else {
            $data = '';
        }

        return $data;
    }

    public function bookingteacher($book)
    {
        $searchteacher = DB::table('teacher')
        ->where('id', $book)
        ->first();
        if ($searchteacher != null) {
            $data = $searchteacher->Teachername.' '.$searchteacher->surename.' ('.$searchteacher->nickname.')';
        } else {
            $data = '';
        }

        return $data;
    }

    public function bookingteachername($book)
    {
        $searchteacher = DB::table('teacher')
        ->get();

        $data = '';
        foreach ($searchteacher as $key => $item) {
            $data .= '
            <option value="'.$item->id.'">.
                '.$item->Teachername.' '.$item->surename.' ('.$item->nickname.')</option>
            ';
        }

        return $data;
    }

    public function checkjoin($book)
    {
        if ($book == 0) {
            $data = '';
        } else {
            $data = 'checked';
        }
        return $data;
    }

    public function bookingupdate(Request $request, $id)
    {
        // dd($request->all(), $id);
        if ($request->playing_type == 1) {
            $booking = booking::where('booking_id', $id)->first();
            $booking->booking_no         = $request['booking_no'];
            $booking->booking_date       = $request['date'];
            $booking->booking_type       = $request['playing_type'];
            $booking->booking_name1      = $request['booking_name_1'];
            $booking->booking_employee   = $request['employee_name'];
            $booking->booking_note       = $request['note'];
            $booking->booking_status1    = $request['booking_status_1'];
            $booking->save();
        }

        if ($request->playing_type == 2) {
            $booking = booking::where('booking_id', $id)->first();
            $booking->booking_no         = $request['booking_no'];
            $booking->booking_date       = $request['date'];
            $booking->booking_type       = $request['playing_type'];
            // คนที่ 1
            $booking->booking_memberID1  = $request['memberid_1'];
            $booking->booking_name1      = $request['booking_name_1'];
            $booking->booking_class1     = $request['booking_class_1'];
            $booking->booking_teacher1   = $request['booking_teacher_1'];
            // เช็คว่ามาตามเวลาจองของคนที่ 1
            if ($request['booking_status_1'] == 1) {
                $booking->booking_status1    = $request['booking_status_1'];
                //ตัดชั่วโมงของ class ของคนที่ 1
                if ($request['booking_class_1'] != null) {
                    $buyclass1 = buyclass::where('class_no', $request['booking_class_1'])
                    ->first();
                    $buyclass1->buy_hour     = $buyclass1->buy_hour + 1;
                    $buyclass1->save();
                }
            }

            // คนที่ 2
            $booking->booking_memberID2  = $request['memberid_2'];
            $booking->booking_name2      = $request['booking_name_2'];
            $booking->booking_class2     = $request['booking_class_2'];
            $booking->booking_teacher2   = $request['booking_teacher_2'];
            // เช็คว่ามาตามเวลาจองของคนที่ 2
            if ($request['booking_status_2'] == 1) {
                $booking->booking_status2    = $request['booking_status_2'];
                //ตัดชั่วโมงของ class ของคนที่ 2
                if ($request['booking_class_2'] != null) {
                    $buyclass2 = buyclass::where('class_no', $request['booking_class_2'])
                    ->first();
                    $buyclass2->buy_hour     = $buyclass2->buy_hour + 1;
                    $buyclass2->save();
                }
            }

            // คนที่ 3
            $booking->booking_memberID3  = $request['memberid_3'];
            $booking->booking_name3      = $request['booking_name_3'];
            $booking->booking_class3     = $request['booking_class_3'];
            $booking->booking_teacher3   = $request['booking_teacher_3'];
            // เช็คว่ามาตามเวลาจองของคนที่ 3
            if ($request['booking_status_3'] == 1) {
                $booking->booking_status3    = $request['booking_status_3'];
                //ตัดชั่วโมงของ class ของคนที่ 3
                if ($request['booking_class_3'] != null) {
                    $buyclass3 = buyclass::where('class_no', $request['booking_class_3'])
                    ->first();
                    $buyclass3->buy_hour     = $buyclass3->buy_hour + 1;
                    $buyclass3->save();
                }
            }

            // คนที่ 4
            $booking->booking_memberID4  = $request['memberid_4'];
            $booking->booking_name4      = $request['booking_name_4'];
            $booking->booking_class4     = $request['booking_class_4'];
            $booking->booking_teacher4   = $request['booking_teacher_4'];
            // เช็คว่ามาตามเวลาจองของคนที่ 4
            if ($request['booking_status_4'] == 1) {
                $booking->booking_status4    = $request['booking_status_4'];
                //ตัดชั่วโมงของ class ของคนที่ 4
                if ($request['booking_class_4'] != null) {
                    $buyclass4 = buyclass::where('class_no', $request['booking_class_4'])
                    ->first();
                    $buyclass4->buy_hour     = $buyclass4->buy_hour + 1;
                    $buyclass4->save();
                }
            }
            $booking->booking_employee   = $request['employee_name'];
            $booking->booking_note       = $request['note'];
            $booking->save();
        }
        return back();
    }

    public function delevent($id)
    {
        $booking = booking::where('booking_id', $id)->first();
        $booking->booking_cancel         = 1;
        $booking->save();
        return back();
    }

    public function selectdate(Request $request)
    {
        $id = $request->id;
        $date = $request->datenow;
        $booking = booking::where('cort_sportid', $id)
        ->where('booking_date', $date)
        ->where('booking_cancel', 0)
        ->get();
        $cort = DB::table('tb_allsport')
        ->where('as_id', $request->id)
        ->leftJoin('tb_cort', 'tb_allsport.as_id', '=', 'tb_cort.fkey_allsport')
        ->get();
        
        // dd($booking);

        $trhtml = '';
        for ($i=0; $i < 17; $i++) { 
            $apendtd = '';
            foreach ($cort as $key => $item) {
                $cort_f = '';
                $tdhtml = '<td data-time="'.$i.'" data-sportid="'.$id.'" class="text-center td-box text-mid" id-cort="'.$item->cort_id.'" data-date="'.$date.'"> 
                </td>';
                foreach ($booking as $key => $book) {
                    if ($book->cort_f == $item->cort_id && $book->booking_time == $i) {
                        $cort_f .= $book->playingtype().' '.'<span>'.$book->booking_name1.'</span>'.' '.$book->booking_teacher1;

                        $tdhtml = '<td data-time="'.$i.'" data-sportid="'.$id.'" data-bookid="'.$book->booking_id.'" class="text-center td-have text-mid" id-cort="'.$item->cort_id.' "> 
                        '.$cort_f.' 
                        </td>';
                    }
                }
                $apendtd .= $tdhtml;
            }
            $time = '';
            $time .= 6 + $i.' : 00';
               
            $trhtml .= '<tr>
            <td class="text-center text-mid bg-red">'.$time.'</td>
            '.$apendtd.'
            </tr>';
        }
        // dd($trhtml);
        $data = array(
            'date' => $date, 
            'trhtml' => $trhtml, 
            'id' => $id, 
            'booking' => $booking,
            'cort' => $cort,
            'apendtd'=> $apendtd,
        );
        // dd($data);
        return $data;
    }

    public function eventindexcus($id)
    {
        // dd($id);
        $select_sport = Allsport::where('as_id', $id)->first();
        $sport = Allsport::all();
        $datenow = date('Y-m-d');
        $booking = booking::where('cort_sportid', $id)
        ->where('booking_date', date('Y-m-d'))
        ->where('booking_cancel', 0)
        ->get();
        $cort = DB::table('tb_allsport')
        ->where('as_id', $id)
        ->leftJoin('tb_cort', 'tb_allsport.as_id', '=', 'tb_cort.fkey_allsport')
        ->get();

        $trhtml = ''; // ประกาศ tr ว่างไว้ก่อนเพื่อรอ $trhtml เอาไปใช้วนค่า
        for ($i=0; $i < 17 ; $i++) { // วนเวลาออกมา 17 เวลา 
            $apendtd = ''; // ประกาศ td ว่างไว้ก่อนเพื่อรอเอาไปลงใน tr

            foreach($cort as $key => $item) { // วนจำนวนคาร์ดออกมา
                $cort_f = ''; // ประกาศตัวแปรเพื่อรอเอาข้อมูลมาลง

                // ประกาศตัวแปรที่เก็บ td ที่ยังไม่ถูกจองเอาไว้
                $tdhtml = '<td data-time="'.$i.'" data-sportid="'.$id.'" class="text-center td-box text-mid" id-cort="'.$item->cort_id.'" data-date="'.$datenow.'"> 
                </td>';
                foreach ($booking as $keyin => $book) { // วนการจอง
                        
                    if ($book->cort_f == $item->cort_id && $book->booking_time == $i) { // ข้อแม้ว่า ให้ cort_f == cort_id และ เวลาจอง == ค่าของเวลาที่วนในแต่ละรอบ
                        $cort_f .= $book->playingtype().' '.'<span>'.$book->booking_name1.'</span>'.' '.$book->booking_teacher1; // ต่อ str ค่าใหม่ลงใน $apendtd ที่ประกาศค่ารอไว้

                        // เอาตัวแปร tdhtml ที่ประกาศไว้ตอนแรกมาแทนที่ถ้าเกิดมีคนจองแล้ว 
                        $tdhtml = '<td data-time="'.$i.'" data-sportid="'.$id.'" data-bookid="'.$book->booking_id.'" class="text-center td-have text-mid" id-cort="'.$item->cort_id.' "> 
                        '.$cort_f.' 
                        </td>';
                    } 

                }
                // push ค่าใหม่ลงใน apendtd ที่ประกาศค่ารอไว้
                $apendtd .= $tdhtml;
            }
            
            $time = '';
            $time .= 6 + $i.' : 00';

            // ต่อ str $trhtml ที่ประกาศรอไว้แล้ว
            $trhtml .= '<tr>
            <td class="text-center text-mid bg-red">'.$time.'</td>
            '.$apendtd.'
            </tr>';
        }

        $data = array(
            // การต่อ str ไม่ต้องไปวนหน้า view เพราะต่อใน controller แล้ว แต่ถ้าเป็น array ต้องไปวนหน้า view 
            'trhtml' => $trhtml, 
            'id' => $id, 
            'booking' => $booking,
            'cort' => $cort,
            'apendtd'=> $apendtd,
            'sport'=> $sport,
            'select_sport'=> $select_sport,
        );

        return view('backend.sportevent.event-custom', $data);
    }

    // public function eventindexcustom($id)
    // {
    //     return view('backend.sportevent.event-custom');
    // }

    public function court_info(Request $request)
    {
        $cort_id = $request->id;
        $cort_time = $request->time;
        $cort_date = $request->date;
        $cort_sportid = $request->sportid;
        $booking1 = DB::table('tb_booking') 
        ->where('booking_id', $request->bookid)
        ->leftJoin('tb_cort', 'tb_booking.cort_f', '=', 'tb_cort.cort_id')
        ->leftJoin('teacher', 'tb_booking.booking_teacher1', '=', 'teacher.id')
        ->first();

        $booking2 = DB::table('tb_booking') 
        ->where('booking_id', $request->bookid)
        ->leftJoin('tb_cort', 'tb_booking.cort_f', '=', 'tb_cort.cort_id')
        ->leftJoin('teacher', 'tb_booking.booking_teacher2', '=', 'teacher.id')
        ->first();

        $book = DB::table('tb_booking')
        ->where('booking_id', $request->bookid)
        ->first();
        // dd($book);

        $html = '';
        if ($book->booking_type == 1) {
            $div = 
            '<div class="form-group" id="Member_show">'.
                '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                    '1. Member Id:'.
                '</label>'.
                '<div class="col-md-6 col-sm-6">'.
                    '<p class="form-control">'.$book->booking_memberID1.'</p>'.
                '</div>'.
            '</div>'.
            '<div class="form-group">'.
                '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                    '1. Name:'.
                '</label>'.
                '<div class="col-md-6 col-sm-6">'.
                    '<p class="form-control">'.$book->booking_name1.'</p>'.
                '</div>'.
            '</div>'.
            '<div class="form-group">'.
                '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                   ' 1. Check:'.
                '</label>'.
                '<div class="col-md-6 col-sm-6">'.
                    $this->checkjoincustomer($book->booking_status1).
                '</div>'.
            '</div>'
            ;
            $html .= $div;
        } else {
            for ($i=1; $i <= 4; $i++) { 
                $bookingname        = 'booking_name'.$i.'';
                $booking_memberid   = 'booking_memberID'.$i.'';
                $booking_class      = 'booking_class'.$i.'';
                $booking_teacherid  = 'booking_teacher'.$i.'';
                $booking_status     = 'booking_status'.$i.'';
                if ($book->$bookingname !=null) {
                $div = 
                    '<div class="form-group">'.
                        '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                            ''.$i.'. Member Id'.
                        '</label>'.
                        '<div class="col-md-6 col-sm-6">'.
                            '<p class="form-control">'.$book->$booking_memberid.'</p>'.
                        '</div>'.
                    '</div>'.
                    '<div class="form-group">'.
                        '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                            ''.$i.'. Name'.
                        '</label>'.
                        '<div class="col-md-6 col-sm-6">'.
                            '<p class="form-control">'.$book->$bookingname.'</p>'.
                        '</div>'.
                    '</div>'.
                    '<div>'.
                        '<div class="form-group">'.
                            '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                                ''.$i.'. Class'.
                            '</label>'.
                            '<div class="col-md-6 col-sm-6">'.
                                '<div class="row">'.
                                    '<p class="form-control">'.$book->$booking_class.'</p>'.
                                    '<div id="class_name_'.$i.'">'.
                                        '<div class="form-group">'.
                                            '<label class="control-label col-md-4 col-sm-4" for="email">'.
                                                'Class Name:'.
                                            '</label>'.
                                            '<div class="col-md-8 col-sm-8">'.
                                                '<p class="form-control">'.$this->checkclass($book->$booking_class).'</p>'.
                                            '</div>'.
                                        '</div>'.
                                        '<div class="form-group">'.
                                            '<label class="control-label col-md-4 col-sm-4" for="email">'.
                                                'Class Owner:'.
                                            '</label>'.
                                            '<div class="col-md-8 col-sm-8">'.
                                                '<p class="form-control">'.$this->checkclassname($book->$booking_class).'</p>'.
                                            '</div>'.
                                        '</div>'.
                                   '</div>'.
                                '</div>'.
                            '</div>'.
                        '</div>'.
                    '</div>'.
                    '<div class="form-group">'.
                        '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                            ''.$i.'.ชื่อครูผู้สอน/น็อกเกอร์'.
                        '</label>'.
                        '<div class="col-md-6 col-sm-6">'.
                            '<div class="row">'.
                                '<p class="form-control">'.$this->bookingteacher($book->$booking_teacherid).'</p>'.
                            '</div>'.
                        '</div>'.
                    '</div>'.
                    '<div class="form-group">'.
                        '<label class="control-label col-md-4 col-sm-4" for="fullname">'.
                            ''.$i.'.Check:'.
                        '</label>'.
                        '<div class="col-md-6 col-sm-6">'.
                            '<div class="row">'.
                                $this->checkjoincustomer($book->$booking_status).
                            '</div>'.
                        '</div>'.
                    '</div>'
                    ;
                } else {
                    $div = '';
                }
                $html .= $div;
            }
        }
        
        $data = array(
            'booking1' => $booking1,
            'booking2' => $booking2,
            'cort_id' => $cort_id,
            'cort_time' => $cort_time,
            'cort_date' => $cort_date,
            'cort_sportid' => $cort_sportid,
            'html' => $html,
        );

        return view('backend.sportevent.modal.event-info', $data);
    }

    public function checkjoincustomer($book)
    {
        if ($book == 0) {
            $data = '<i class="fa fa-2x fa-times" style="color: red;"></i>';
        } else {
            $data = '<i class="fa fa-2x fa-check" style="color: green;"></i>';
        }
        return $data;
    }

    public function showmember(Request $request) 
    {
        // dd($request->id1,$request->id2,$request->id3,$request->id4);
        // id ของ member คนที่ 1
        if ($request->id1 != null) {
            $id1 = $request->id1; 
            $member1 = DB::table('member')
            ->where('memberID', $id1)
            ->first();

            // หา class ของคนที่ 1
            $buyclass1 = DB::table('tb_buyclass') 
            ->where('member_id', $id1)
            ->leftJoin('manageclass', 'tb_buyclass.class_id', '=', 'manageclass.id')
            ->get();


            $data['member1'] = $member1;
        }

        // id ของ member คนที่ 2
        if ($request->id2 != null) {
            $id2 = $request->id2; 
            $member2 = DB::table('member')
            ->where('memberID', $id2)
            ->first();

            // หา class ของคนที่ 2
            $buyclass2 = DB::table('tb_buyclass') 
            ->where('member_id', $id2)
            ->leftJoin('manageclass', 'tb_buyclass.class_id', '=', 'manageclass.id')
            ->get();

            $data['member2'] = $member2;
        }

        // id ของ member คนที่ 3
        if ($request->id3 != null) {
            $id3 = $request->id3; 
            $member3 = DB::table('member')
            ->where('memberID', $id3)
            ->first();

            // หา class ของคนที่ 3
            $buyclass3 = DB::table('tb_buyclass') 
            ->where('member_id', $id3)
            ->leftJoin('manageclass', 'tb_buyclass.class_id', '=', 'manageclass.id')
            ->get();

            $data['member3'] = $member3;
        }

        // id ของ member คนที่ 4
        if ($request->id4 != null) {
            $id4 = $request->id4; 
            $member4 = DB::table('member')
            ->where('memberID', $id4)
            ->first();

            // หา class ของคนที่ 4
            $buyclass4 = DB::table('tb_buyclass') 
            ->where('member_id', $id4)
            ->leftJoin('manageclass', 'tb_buyclass.class_id', '=', 'manageclass.id')
            ->get();

            $data['member4'] = $member4;
        }
        return $data;
    }
    public function searchclass(Request $request)
    {
        // dd($request->all());
        // คลาสของคนที่ 1
        if ($request->class1 != null) {
            $buyclass1 = DB::table('tb_buyclass') 
            ->where('class_no', $request->class1)
            ->leftJoin('manageclass', 'tb_buyclass.class_id', '=', 'manageclass.id')
            ->first();

            $html1 = '';
            if ($buyclass1 != null) {
                if ($buyclass1->buy_hour < $buyclass1->hour) {
                    $html1 .= '
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            ชื่อคลาส:
                        </label>
                        <div class="col-md-8 col-sm-8">
                            <p class="form-control">'.$buyclass1->class_title.'</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            ชื่อผู้ซื้อ:
                        </label>
                        <div class="col-md-8 col-sm-8">
                            <p class="form-control">'.$buyclass1->buy_name.' '.$buyclass1->buy_lname.'</p>
                        </div>
                    </div>
                    ';
                } elseif ($buyclass1->buy_hour >= $buyclass1->hour) {
                    $html1 .= '
                    <p class="form-control"><span style="color: red;">คลาสของคุณครบตามจำนวนชั่วโมงแล้ว</span></p>
                    ';
                }
            }
            $data['html1'] = $html1;
        }

        // คลาสของคนที่ 2
        if ($request->class2 != null) {
            $buyclass2 = DB::table('tb_buyclass') 
            ->where('class_no', $request->class2)
            ->leftJoin('manageclass', 'tb_buyclass.class_id', '=', 'manageclass.id')
            ->first();

            $html2 = '';
            if ($buyclass2 != null) {
                if ($buyclass2->buy_hour < $buyclass2->hour) {
                    $html2 .= '
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            ชื่อคลาส:
                        </label>
                        <div class="col-md-8 col-sm-8">
                            <p class="form-control">'.$buyclass2->class_title.'</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            ชื่อผู้ซื้อ:
                        </label>
                        <div class="col-md-8 col-sm-8">
                            <p class="form-control">'.$buyclass2->buy_name.' '.$buyclass2->buy_lname.'</p>
                        </div>
                    </div>
                    ';
                } elseif ($buyclass2->buy_hour >= $buyclass2->hour) {
                    $html2 .= '
                    <p class="form-control"><span style="color: red;">คลาสของคุณครบตามจำนวนชั่วโมงแล้ว</span></p>
                    ';
                }
                
            } 
            $data['html2'] = $html2;
        }

        // คลาสของคนที่ 3
        if ($request->class3 != null) {
            $buyclass3 = DB::table('tb_buyclass') 
            ->where('class_no', $request->class3)
            ->leftJoin('manageclass', 'tb_buyclass.class_id', '=', 'manageclass.id')
            ->first();

            $html3 = '';
            if ($buyclass3 != null) {
                if ($buyclass3->buy_hour < $buyclass3->hour) {
                    $html3 .= '
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            ชื่อคลาส:
                        </label>
                        <div class="col-md-8 col-sm-8">
                            <p class="form-control">'.$buyclass3->class_title.'</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            ชื่อผู้ซื้อ:
                        </label>
                        <div class="col-md-8 col-sm-8">
                            <p class="form-control">'.$buyclass3->buy_name.' '.$buyclass3->buy_lname.'</p>
                        </div>
                    </div>
                    ';
                } elseif ($buyclass3->buy_hour >= $buyclass3->hour) {
                    $html3 .= '
                    <p class="form-control"><span style="color: red;">คลาสของคุณครบตามจำนวนชั่วโมงแล้ว</span></p>
                    ';
                }
                
            } 
            $data['html3'] = $html3;
        }

        // คลาสของคนที่ 4
        if ($request->class4 != null) {
            $buyclass4 = DB::table('tb_buyclass') 
            ->where('class_no', $request->class4)
            ->leftJoin('manageclass', 'tb_buyclass.class_id', '=', 'manageclass.id')
            ->first();

            $html4 = '';
            if ($buyclass4 != null) {
                if ($buyclass4->buy_hour < $buyclass4->hour) {
                    $html4 .= '
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            ชื่อคลาส:
                        </label>
                        <div class="col-md-8 col-sm-8">
                            <p class="form-control">'.$buyclass4->class_title.'</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            ชื่อผู้ซื้อ:
                        </label>
                        <div class="col-md-8 col-sm-8">
                            <p class="form-control">'.$buyclass4->buy_name.' '.$buyclass4->buy_lname.'</p>
                        </div>
                    </div>
                    ';
                } elseif ($buyclass4->buy_hour >= $buyclass4->hour) {
                    $html4 .= '
                    <p class="form-control"><span style="color: red;">คลาสของคุณครบตามจำนวนชั่วโมงแล้ว</span></p>
                    ';
                }
                
            } 
            $data['html4'] = $html4;
        }
        return $data;
    }

}
