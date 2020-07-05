<?php

namespace App\Http\Controllers\pong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Re_type;
use App\Re_building;
use App\Re_floor;
use App\Re_group;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $re_type = Re_type::all();
        $re_building = Re_building::all();
        $re_floor = Re_floor::all();
        $re_group = Re_group::all();
        $data = array(
            're_type' => $re_type,
            're_building' => $re_building,
            're_floor' => $re_floor,
            're_group' => $re_group,
        );
        return view('backend.managerepair.index', $data);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

//        dd($request);
        $re_typeadd = new Re_type;
//        $re_buildingadd = new Re_building;
//        $re_flooradd = new Re_floor;
//        $re_groupadd = new Re_group;


        $re_typeadd->type = $request['type'];
//        $re_buildingadd->building = $request['building'];
//        $re_flooradd->floor = $request['floor'];
//        $re_groupadd->group = $request['group'];

        $re_typeadd->save();
//        $re_buildingadd->save();
//        $re_flooradd->save();
//        $re_groupadd->save();

        foreach ($request['inputunit'] as $key => $rinputunit) {
            $abfm = new Re_type();
            $abfm->type = $rinputunit;
            $abfm->save();
        }

        return redirect('managerepair');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $edittype = Re_type::where('id_type', $request['id'])
            ->first();
//        $editbuilding =Re_building::where('id_building',$request['id'])
//            ->first();
//        $editfloor =Re_floor::where('id_floor',$request['id'])
//            ->first();
//        $editgroup =Re_group::where('id_group',$request['id'])
//            ->first();

        return view('backend.managerepair.create-type', compact('edittype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Re_type::destroy($id);


        return redirect('managerepair');
    }

    public function createbuilding(Request $request)
    {
//        dd($request);
        $re_buildingadd = new Re_building;
        $re_buildingadd->building = $request['building'];
        $re_buildingadd->save();

        foreach ($request['inputunit'] as $key => $rinputunit) {
            $abfm = new Re_floor();
            $abfm->floor = $rinputunit;
//            การดึง key หลักมา
            $abfm->building_id = $re_buildingadd->id_building;
//            ---
            $abfm->save();
        }
        return redirect('managerepair');
    }

    public function showbdf(Request $request)
    {
//        $edittype = Re_type::where('id_type', $request['id'])
//            ->first();
        $editbuilding = Re_building::where('id_building', $request['id'])
            ->first();
//        $editfloor =Re_floor::where('id_floor',$request['id'])
//            ->first();
//        $editgroup =Re_group::where('id_group',$request['id'])
//            ->first();

        return view('backend.managerepair.create-building', compact('editbuilding'));
    }

}
