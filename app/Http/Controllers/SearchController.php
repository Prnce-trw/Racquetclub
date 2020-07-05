<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.search.search');
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

    public function sendvalue(Request $request)
    {
        // dd($request);
        $booking = DB::table('tb_booking')
        ->where('booking_no', $request->value)
        ->leftJoin('manageclass', 'tb_booking.booking_class1', '=', 'manageclass.id')
        ->leftJoin('teacher', 'tb_booking.booking_teacher1', '=', 'teacher.id')
        ->first();
        $booking2 = DB::table('tb_booking')
        ->where('booking_no', $request->value)
        ->leftJoin('manageclass', 'tb_booking.booking_class2', '=', 'manageclass.id')
        ->leftJoin('teacher', 'tb_booking.booking_teacher2', '=', 'teacher.id')
        ->first();
        $html = '';
        if ($booking != null) { // เช็คค่าที่ส่งมาต้องไม่เท่ากับ null
            if ($booking->booking_type == 1) { // เช็คสถานะการเล่น ถ้าเป็น 1
                $html .= '
                <div class="panel">
                    <div class="panel-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reservation ID</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking->booking_no.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Date</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking->booking_date.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Time</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$this->booktime($booking->booking_time).'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Playing Type</label>
                                <div class="col-md-9">
                                    <p class="form-control">เล่น</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking->booking_name.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reservations Name</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking->booking_employee.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Note</label>
                                <div class="col-md-9">
                                    <textarea name="" class="form-control" id="" cols="30" rows="10">'.$booking->booking_note.'</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            } else {
                $html .= '
                <div class="panel">
                    <div class="panel-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reservation ID</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking->booking_no.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Date</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking->booking_date.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Time</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$this->booktime($booking->booking_time).'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Playing Type</label>
                                <div class="col-md-9">
                                    <p class="form-control">คลาส</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking->booking_name.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Class 1</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking->class_title.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Teacher Name 1</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking->Teachername . $booking->surename .' ('.$booking->nickname.')</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Name 2</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking->booking_name2.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Class 2</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking2->class_title.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Teacher Name 2</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking2->Teachername . $booking2->surename .' ('.$booking2->nickname.')</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Reservations Name</label>
                                <div class="col-md-9">
                                    <p class="form-control">'.$booking->booking_employee.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Note</label>
                                <div class="col-md-9">
                                    <textarea name="" class="form-control" id="" cols="30" rows="10">'.$booking->booking_note.'</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else { //ถ้าเป็นค่า null จะขึ้นไม่พบข้อมูล
            $html .= '
            <div class="panel">
                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h3 style="color:red;">ไม่พบข้อมูล</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
        return $html;
    }

    public function booktime($booking)
    {
        if ($booking == 0) {
            $data = '06:00';
        } elseif ($booking == 1) {
            $data = '07:00';
        } elseif ($booking == 2) {
            $data = '08:00';
        } elseif ($booking == 3) {
            $data = '09:00';
        } elseif ($booking == 4) {
            $data = '10:00';
        } elseif ($booking == 5) {
            $data = '11:00';
        } elseif ($booking == 6) {
            $data = '12:00';
        } elseif ($booking == 7) {
            $data = '13:00';
        } elseif ($booking == 8) {
            $data = '14:00';
        } elseif ($booking == 9) {
            $data = '15:00';
        } elseif ($booking == 10) {
            $data = '16:00';
        } elseif ($booking == 11) {
            $data = '17:00';
        } elseif ($booking == 12) {
            $data = '18:00';
        } elseif ($booking == 13) {
            $data = '19:00';
        } elseif ($booking == 14) {
            $data = '20:00';
        } elseif ($booking == 15) {
            $data = '21:00';
        } elseif ($booking == 16) {
            $data = '22:00';
        }
        return  $data;
    }
}