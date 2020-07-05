<?php

namespace App\Http\Controllers\pong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\ImageMember;
use App\RPackage;

class MemberCardController extends Controller
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
        $update = Member::find($request['memberID']);
        $update->barcode = $request['QRcode'];
        $check = $update->save();
        if ($check) {
            return 1;
        }else{
            return 0;
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
        $data['member'] = Member::find($id);
        $data['image'] = ImageMember::where('member_id',$id)->first();
        $data['package'] = RPackage::where('member_id',$id)->orderBy('end','desc')->first();
        // dd($data['package']);
        return view('backend.user.modal.modal-card',$data);
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
}
