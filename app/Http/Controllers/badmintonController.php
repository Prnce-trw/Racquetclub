<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Manageclass;

//use DB;

class badmintonController extends Controller
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


public function badminton()
    {
        return view('backend.badminton.index');
        

    }




}