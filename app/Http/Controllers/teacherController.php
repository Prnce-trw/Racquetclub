<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class teacherController extends Controller
{
    // public function __construct()
    //{
    //   $this->middleware('auth');
    //}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('backoffice.dashboard');

    }

    public function teacher()
    {

        $teacher = Teacher::all();
        return view('backend.teacher.index', compact('teacher'));

    }

    public function teacherform()
    {

        return view('backend.teacher.create');
    }

    public function create(Request $request)
    {

        // dd($request);
        if ($request['id_teacher']!=null) {
            $teacher = Teacher::find($request['id_teacher']);
        }else{
            $teacher = new Teacher();
        }
        $teacher->Teachername = $request->Teachername;
        $teacher->surename = $request->surename;
        $teacher->nickname = $request->nickname;
        $teacher->phone_teacher=$request->phone;
        $teacher->save();
        return redirect()->to('backend/teacher')->with('success', 'success');

    }
    public function show($id)
    {
        $teacher = Teacher::find($id);
        return $teacher;
    }
    public function block($id,$status)
    {
        $teacher = Teacher::find($id);
        $teacher->status = $status;
        $teacher->save();
        return redirect('backend/teacher');
    }
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect('backend/teacher');
    }

}
