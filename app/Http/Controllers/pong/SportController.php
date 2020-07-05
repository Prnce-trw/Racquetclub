<?php

namespace App\Http\Controllers\pong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sport;
Use App\RSport;
use DB;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataSport = Sport::all();
        $data = ['dataSport'=>$dataSport,];
        return view('backend.sport.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        $sport = Sport::where('id_sport',$request->id)->first();
        $data = ['sport'=>$sport,];
        return view('backend.sport.create',$data);
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
        if ($request->id_sport==null||$request->id_sport=='') {
            $add = new Sport ;
            $add->name_sport = $request->firstname;
            $add->note_sport = $request->note;
            $add->save();
        }else{
            $update = Sport::where('id_sport',$request->id_sport)->first();
            $update->name_sport = $request->firstname;
            $update->note_sport = $request->note;
            $update->save();
        }
        return redirect('manage-sport');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sport = Sport::where('id_sport',$id)->first();
        $data = ['sport'=>$sport,];
        return view('backend.sport.edit',$data);
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
        
        $sport = Sport::where('id_sport',$id)->first();
        $sport->name_sport	 = $request['firstname'];
        $sport->note_sport	 = $request['note'];
        $sport->save();
        // dd($sport);
        return redirect('manage-sport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Sport::destroy($id);

        return back();
    }

    public function showsport(Request $request)
    {
        // dd($request->id);
        $sport = DB::table('sport')
        ->where('id_sport', $request->id)
        ->first();
        $data = array('sport' => $sport,);
        return view('backend.sport.modal-edit',$data);
    }
}
