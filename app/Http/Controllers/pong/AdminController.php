<?php

namespace App\Http\Controllers\pong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $admins = Admin::all();
        $data = [
            'admins'=>$admins,
        ];
        return view('backend.admin.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $dataAdmin = Admin::where('id_admin',$request->id)->first();
        // dd($dataAdmin);
        return view('backend.admin.modal.created',compact('dataAdmin'));
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
        if ($request->id_admin!==null) {
            $add = Admin::where('id_admin',$request->id_admin)->first();
            $add->username = $request['userName'];
            $add->firstname_admin = $request['firstname'];
            $add->lastname_admin = $request['lastname'];
            $add->email = $request['email'];
            if ($request['password']!==null) {
                $add->password = Hash::make($request['password']);
            }
            $checksave = $add->save();
        }else{
            $add = new Admin;
            $add->username = $request['userName'];
            $add->firstname_admin = $request['firstname'];
            $add->lastname_admin = $request['lastname'];
            $add->email = $request['email'];
            $add->password = Hash::make($request['password']);
            $add->capacity = '3';
            $checksave = $add->save();
        }
        
        

        if ($checksave) {
            return redirect('manage-admin')->with('success',"Insert Success");
        }else{
            return redirect('manage-admin')->with('fail',"Insert Error!!");
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
        $delete = Admin::where('id_admin',$id)->delete();
        if ($delete) {
            return redirect('manage-admin')->with('success',"Insert Success");
        }else{
            return redirect('manage-admin')->with('fail',"Insert Error!!");
        }
    }

    public function checkemail(Request $request)
    {
        // dd($request);
        if ($request->email!==null) {
            $check = Admin::where('email',$request->email)->first();
            // dd('email'.$check);
            if ($check!==null) {
                return '0';
            }else{
                return '1';
            }   
        }elseif ($request->username!==null) {

            $check = Admin::where('username',$request->username)->first();
            // dd('user'.$check);
            if ($check!==null) {
                return '0';
            }else{
                return '1';
            }  
        }elseif ($request->oldpassword!==null) {

            $check = password_verify($request->oldpassword, auth('web')->user()->password );
            // dd($check);
            if (!$check) {
                return '0';
            }else{
                return '1';
            }
            
        }
    }
    public function login_ui()
    {
        return view($view = 'backend.admin.login');
    }
    public function login(Request $request)
    {
        // dd($request->password);
        if(Auth::guard('web')->attempt(['username' => $request->username , 'password' =>$request->password ] )){
            return redirect('/admin');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Login ERROR");';
            echo 'window.history.back();';
            echo '</script>';
            // return redirect()->back()->with($request->only('email' , 'remember'));
        }
    }
    public function updatePermission(Request $request)
    {
        // dd($request);
        $update = Admin::where('id_admin',$request->pk)->first();
        $update->capacity = $request->value;
        $checksave = $update->save();
        // dd($checksave);
        if($checksave){
            return response('SUCCESS', 200);    
        }else{
            return response('ERROR', 200);
        }
        
    }
    public function recept()
    {
        return view('backend.admin.create');
    }
    public function cs()
    {
        return view('backend.admin.create');   
    }
    public function admin()
    {
        return view('backend.admin.create');
    }
    public function block($id,$status)
    {
        // dd($id,$status);
        $checksave = Admin::where('id_admin',$id)->update(['status_admin'=>$status]);
        if($checksave){
            return redirect('manage-admin')->with('success',"Insert Success");   
        }else{
            return redirect('manage-admin')->with('fail',"Insert Error!!");
        }
    }
    
}
