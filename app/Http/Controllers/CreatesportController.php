<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Allsport;
use App\Cort;

class CreatesportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allsport = DB::table('tb_allsport')
        ->get();
        $data = array(
            'allsport' => $allsport,
        );
        return view('backend.reservations.create-sport', $data);
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
        // dd($request);
        $allsport = new Allsport;
        $allsport->as_name      = $request['name'];
        $allsport->as_codename  = $request['codename'];
        $allsport->as_note      = $request['note'];
        $allsport->save();
        foreach($request['cortname'] as $key => $value){
            $cort = new Cort();
            $cort->cort_name           = $value;
            $cort->fkey_allsport       = $allsport->as_id;
            $cort->save();
        }

        return redirect('createsport');
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
        // dd($request);
        $allsport = Allsport::where('as_id', $id)->first();
        $allsport->as_name      = $request['name'];
        $allsport->as_note      = $request['note'];
        $allsport->save();
        
        if ($request['cortname'] != null) {
            foreach($request['cortname'] as $key => $value){
                $cort = new Cort();
                $cort->cort_name           = $value;
                $cort->fkey_allsport       = $id;
                $cort->save();
            }
        } 
    
        return redirect('createsport');
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

    public function editsport(Request $request)
    {
        // dd($request);
        $allsport = Allsport::where('as_id', $request->id)->first();
        $sport_cort = DB::table('tb_allsport')
        ->where('as_id', $request->id)
        ->leftJoin('tb_cort', 'tb_allsport.as_id', '=', 'tb_cort.fkey_allsport')
        ->get();
        // dd($sport_cort);
        $data = array(
            'allsport' => $allsport, 
            'sport_cort' => $sport_cort, 
        );

        return view('backend.reservations.modal.modal-sport-edit',$data);
    }
}
