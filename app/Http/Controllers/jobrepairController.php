<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




class jobrepairController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {

        return view('backoffice.dashboard');


    }


    public function jobrepair()
    {


        return view('backoffice.jobrepair.index');


    }


    public function jobrepair()
    {


        return view('backoffice.jobrepair.worksheet');


    }

    public function jobrepair()
    {


        return view('backoffice.jobrepair.manageworksheet');


    }


    public function jobrepair()
    {


        return view('backoffice.jobrepair.viewworksheet');


    }

}
