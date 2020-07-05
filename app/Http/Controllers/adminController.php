<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;



class adminController extends Controller
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
    public function admin()
    {
        return view('backoffice.admin.index');
    }
    public function admin()
    {
        return view('backoffice.admin.create');
    }
    public function admin()
    {
        return view('backoffice.admin.permission');
    }
    public function admin()
    {
        return view('backoffice.admin.teacher');
    }