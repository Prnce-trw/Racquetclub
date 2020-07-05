<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Member;

use App\File;
use DB;




class userController extends Controller
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



public function user()
    {
        $member = Member::all();

        return view('backend.user.index',compact('member'));
        

    }


public function updateprofile(Request $request)
    {
//dd($request);
            $memberID = $request->memberID;
        $registerdate = $request->registerdate;
        $membergroup = $request->membergroup;
        $name = $request->name;
        $surname = $request->surname;
          $startdate = $request->startdate;
            $enddate = $request->enddate;
            $tel = $request->tel;
            $email = $request->email;
            $birthday = $request->birthday;
              $gender = $request->gender;
            $groups = $request->groups;
             $package = $request->package;
             $address = $request->address;
              $country = $request->country;
              $website = $request->website;
              $sport = $request->sport;
            $member_num = $request->member_num;
            $mastercard = $request->mastercard;
            
$member=Member::where('memberID',$memberID)->first();
//dd($member);
       $member->registerdate = $request->registerdate;
        $member->membergroup  = $request->membergroup;
        $member->name  = $request->name;
        $member->surname  = $request->surname;
        $member->startdate  = $request->startdate;
         $member->enddate  = $request->enddate;
        $member->tel  = $request->tel;
        $member->email  = $request->email;
         $member->birthday  = $request->birthday;
        $member->gender  = $request->gender;
        $member->groups  = $request->groups;
        $member->package  = $request->package;
        $member->address  = $request->address;
        $member->country  = $request->country;
        $member->website  = $request->website;
        $member->sport  = $request->sport;
 $member->member_num = $request->member_num;
 $member->mastercard = $request->mastercard;
$member->save();

//dd($member);
/*for ($i=0; $i < count($request->memberFile)[$i]; $i++) { 
    $memberFile = $request->file('memberFile')[$i];
    $file_name = time() .'.' . $memberFile->getClientOriginalExtension();
    $memberFile->move(storage_path().'\filepdf',$file_name);
    $file = new File();
    $file->file_name = $file_name;
    $file->memberID = $member->memberID;
    $file->save();

    dd($file);
    }*/
        return redirect()->to('backend/user')->with('success', 'success');

    }


    public function showprofile($memberID)
    {

        $member=DB::table('member')->where('memberID',$memberID)->first();

        return view('backend.user.showprofile',['member'=>$member]);
        
        
    }


public function del(Request $request)
    {

        dd($request);
        $memberID = $request->input('memberID');
   DB::table('member')->where('memberID',$memberID)->get();
        //File::delete('storage/picture_newbanner'.$picture[0]->image);
        //dd($picture);

        //DB::table('member')->where('memberID', $memberID)->delete();
        return redirect()->to('backend/user')->with('success', 'success');
    }




    public function create(Request $request)
    {

//dd($request);
        $member = new Member();
        $member->registerdate = $request->registerdate;
        $member->membergroup  = $request->membergroup;
        $member->name  = $request->name;
        $member->surname  = $request->surname;
        $member->startdate  = $request->startdate;
         $member->enddate  = $request->enddate;
        $member->tel  = $request->tel;
        $member->email  = $request->email;
         $member->birthday  = $request->birthday;
        $member->gender  = $request->gender;
        $member->groups  = $request->groups;
        $member->package  = $request->package;
        $member->address  = $request->address;
        $member->country  = $request->country;
        $member->website  = $request->website;
        $member->sport  = $request->sport;
 $member->member_num = $request->member_num;
 $member->mastercard = '1';
$member->save();

//dd($member);

for ($i=0; $i < count($request->memberFile)[$i]; $i++) { 
    $memberFile = $request->file('memberFile')[$i];
    $file_name = time() .'.' .$request->file('memberFile')[$i]->getClientOriginalExtension();
    $memberFile->move(storage_path().'\filepdf',$file_name);
    $file = new File();
    $file->file_name = $file_name;
    $file->memberID = $member->memberID;
    $file->save();

    //dd($file);

}

        $member->save();
        return redirect()->to('backend/user')->with('success', 'success');
    }

    

}
