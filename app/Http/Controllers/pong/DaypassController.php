<?php

namespace App\Http\Controllers\pong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sport;
use App\RSport;
use App\Daypass;
use App\DaypassSport;
use DB;
use App\Exports\Exportstest;
use Maatwebsite\Excel\Facades\Excel;

class DaypassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Excel::download(new Exportstest,'test.xlsx');
        $data['sports'] = Sport::all();
        $data['daypass'] = Daypass::whereDate('created_at', '=', date('Y-m-d'))->orderBy('created_at','asc')->get();
        return view('backend.daypass.index',$data);
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

        try
        {
            DB::transaction(function () use($request) {
                $daypass = new Daypass;
                $daypass->daypass_fname = $request['name'];
                $daypass->daypass_lname = $request['surename'];
                $daypass->daypass_phone = $request['phone'];
                $daypass->card_id = $request['card'];
                $daypass->daypass_age = $request['age'];
                $daypass->daypass_gender = $request['gender'];
                $daypass->daypass_receipt = $request['receipt'];
                $daypass->daypass_note = $request['note'];
                $daypass->save();

                if (isset($request['chSport'])) {
                    foreach ($request['chSport'] as $value) {
                        $daysport = new DaypassSport;
                        $daysport->sport_id = $value;
                        $daysport->daypass_id = $daypass->id_daypass;
                        $daysport->save();
                    }
                }
            });
            // dd('try');
            return redirect('daypass')->with('success','Insert success');
        }
        catch(\Exception $e)
        {
            // dd('catch');
            return redirect('daypass')->with('error','error');
        }
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
    public function cardReturn($id)
    {
        try {

            $daypass = Daypass::find($id);
            $daypass->return_card = '1';
            $daypass->save();

            return redirect('daypass')->with('success','คืนบัตรสำเร็จแล้ว');
        } catch (Exception $e) {
            return redirect('daypass')->with('error','error');
        }
    }
}
