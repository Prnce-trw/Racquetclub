<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Manageclass;

//use DB;

class racquetballController extends Controller
{
    //public function __construct()
   // {
       // $this->middleware('auth');
  ///  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {

return view('backoffice.dashboard');


    }


public function racquetball()
    {
        return view('backend.racquetball.index');
        

    }




}