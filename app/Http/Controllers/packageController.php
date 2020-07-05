<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Package;

use DB;

class packageController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('backoffice.dashboard');

    }



public function managepackage()
    {
        $package = Package::all();
        return view('backend.managepackage.index',compact('package'));
        

    }


    public function edit($id)
    {

        $package=DB::table('package')->where('id',$id)->first();

        return view('backend.managepackage.edit',['package'=>$package]);
        //
    }


public function createform()
    {
        
        return view('backend.managepackage.create');
    }

    

        public function del(Request $request)
    {

       // dd($request);
        $id = $request->input('id');

        DB::table('package')->where('id',$id)->delete();
        return redirect()->to('backend/managepackage')->with('success', 'success');
    }


   public function updatepackage(Request $request, $id)
    {
        // dd($request);
        $package = Package::where('id',$id)->first();
        $package->package_name	 = $request['package_name'];
        $package->package_price	 = $request['package_price'];
        $package->package_numday = $request['package_numday'];
        $package->less	         = $request['less'];
        $package->more	         = $request['more'];
        $package->astext	     = $request['astext'];
        $package->other	         = $request['other'];
        $package->save();
        // dd($sport);
        return redirect('backend/managepackage');

    }

    public function create(Request $request)
    {
        // dd($request);
        $package = new Package;
        $package->package_name      = $request['package_name'];
        $package->package_price     = $request['package_price'];
        $package->package_numday    = $request['package_numday'];
        $package->less              = $request['less'];
        $package->more              = $request['more'];
        $package->astext            = $request['astext'];
        $package->other             = $request['other'];
        $package->save();

        return redirect('backend/managepackage');
    }

    public function delpackage($id)
    {
        Package::destroy($id);
        return back();
    }

    public function showpackage(Request $request)
    {
        // dd($request);
        $package = DB::table('package')->where('id', $request->id)->first();
        $data = array('package' => $package,);

        return view('backend.managepackage.model-edit',$data);
    }
}
