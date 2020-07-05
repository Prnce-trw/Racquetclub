<?php

namespace App\Http\Controllers\pong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Card;
use DB;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $data['cards'] = Card::all();
        
        return view('backend.daypass.card',$data);
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
        try {
            DB::transaction(function () use($request) {

                foreach ($request['name'] as $key => $value) {
                    $daypass = new Card;
                    $daypass->id_card = $value;
                    $daypass->save();    
                }

            });
            return redirect('manage-card')->with('success','Insert success');
        } catch (Exception $e) {

            return redirect('manage-card')->with('error','error');
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
    public function check($id,$type)
    {
        $check = Card::where($type,$id)->first();
        // dd();
        if (isset($check)) {
            return response()->json(['error' => 'Error msg'], 404);    
        }
        return response()->json(['success' => 'OK']);
    }
}
