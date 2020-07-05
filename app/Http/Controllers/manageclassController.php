<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Manageclass;
use App\buyclass;
use App\Sport;
use DB;

class manageclassController extends Controller
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


public function manageclass()
    {
        $sport = Sport::all();
        $manageclass = DB::table('manageclass')
        ->leftJoin('sport', 'manageclass.sport_id', '=', 'sport.id_sport')
        ->get();
        $data = array(
            'sport' => $sport, 
            'manageclass' => $manageclass, 
        );
        return view('backend.manageclass.index', $data);
        

    }

    public function edit($id)
    {

        $manageclass=DB::table('manageclass')->where('id',$id)->first();

        return view('backend.manageclass.edit',['manageclass'=>$manageclass]);
        //
    }


 public function del(Request $request)
    {

    //    dd($request);
        $id = $request->input('id');
         DB::table('manageclass')->where('id',$id)->delete();
        return redirect()->to('backend/manageclass')->with('success', 'success');
    }


    public function updateclass(Request $request)
    {
        // dd($request);
        $updateclass = Manageclass::where('id', $request['classid'])->first();
        // dd($updateclass);
        $updateclass->classID           = $request['classID'];
        $updateclass->class_title       = $request['class_title'];
        $updateclass->hour              = $request['hour'];
        $updateclass->price             = $request['price'];
        $updateclass->price_hour        = $request['price_hour'];
        $updateclass->other             = $request['other'];
        $updateclass->save();
///dd($request);
      
//             $id = $request->id;
//         $classID = $request->classID;
//         $class_title = $request->class_title;
//         $hour = $request->hour;
//         $price = $request->price;
//           $price_hour = $request->price_hour;
//             $Status = $request->Status;
//             $other = $request->other;
// $updateclass=Manageclass::where('id',$id)->first();
//        $updateclass->classID = $request->classID;
//         $updateclass->class_title = $request->class_title;
//         $updateclass->hour = $request->hour;
//         $updateclass->price = $request->price;
//         $updateclass->price_hour = $request->price_hour;
//          $updateclass->Status = '1';
//            $updateclass->other = $request->other;
// $updateclass->save();

//dd($updateclass);
        return redirect()->to('backend/manageclass')->with('success', 'success');

    }


public function createform()
    {
        
        return view('backend.manageclass.create');
    }



public function create(Request $request)
    {
//dd($request);
        $manageclass = new Manageclass();
        $manageclass->sport_id = $request->sport_id;
        $manageclass->classID = $request->classID;
        $manageclass->class_title  = $request->class_title;
        $manageclass->hour  = $request->hour;
        $manageclass->price  = $request->price;
        $manageclass->price_hour  = $request->price_hour;
        $manageclass->other  = $request->other;
        $manageclass->enddate_at  = $request->enddate;
        $manageclass->save();
        return redirect()->to('backend/manageclass/')->with('success', 'success');
    }

    public function showclass($id) 
    {
        $manageclass = DB::table('manageclass')
        ->where('id',$id)
        ->first();
        $html = '';
        
        $html = '
            <div class="form-group">
                <label class="control-label col-md-4 col-sm-4" for="fullname">
                    ID Class:
                </label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" data-parsley-required="true" id="classID" name="classID"
                        placeholder="ID Class..." type="text" value="'.$manageclass->classID.'"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4 col-sm-4" for="email">
                    Class name:
                </label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" data-parsley-required="true" id="class_title"
                        name="class_title" placeholder="Class name..." type="text" value="'.$manageclass->class_title.'" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4 col-sm-4" for="email">
                    Hour:
                </label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" data-parsley-required="true" id="fullname" name="hour"
                        placeholder="Hour..." type="number" value="'.$manageclass->hour.'" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4 col-sm-4" for="email">
                    Price:
                </label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" data-parsley-required="true" id="fullname" name="price"
                        placeholder="Price..." type="number" value="'.$manageclass->price.'" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4 col-sm-4" for="email">
                    Price/Hour:
                </label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" data-parsley-required="true" id="fullname" name="price_hour"
                        placeholder="Price/Hour..." type="number" value="'.$manageclass->price_hour.'" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4 col-sm-4" for="email">
                    Other:
                </label>
                <div class="col-md-6 col-sm-6">
                    <textarea class="form-control border-input" name="other" placeholder="Other..." type="text" cols="20" rows="3">'.$manageclass->other.'</textarea>
                </div>
            </div>
        ';

        return $html;
    }

    public function delclass($id)
    {
        Manageclass::destroy($id);
        return back();
    }

    public function buyclass($id)
    {
        // dd($id);
        // $id_class = Manageclass::where('id',$id)->first();
        $data = array(
            // 'id_class' => $id_class,
            'id' => $id,

        );
        return view('backend.manageclass.buyclass', $data);
    }

    public function createbuyclass(Request $request) 
    {
        // dd($request);
        $buyclass = new buyclass;
        if ($request->membertype == 1) {
            $buyclass->member_id    = $request->classID;
            $buyclass->buy_type     = 1;
        } else {
            $buyclass->buy_type     = 2;
        }
        $buyclass->class_no     = rand(10000000, 99999999);
        $buyclass->buy_name     = $request->buy_name;
        $buyclass->buy_lname    = $request->buy_lname;
        $buyclass->class_id     = $request->class_id;
        $buyclass->buy_address  = $request->buy_address;
        $buyclass->buy_phone    = $request->buy_phone;
        $buyclass->buy_note     = $request->buy_note;
        $buyclass->save();

        return redirect()->to('backend/manageclass/');
    }

    public function showmemberinfo($id) 
    {
        $member = DB::table('member')
        ->where('memberID', $id)
        // ->leftJoin('manageclass', 'member.class_id', '=', 'manageclass.id')
        ->first();
        $data = array(
            'member' => $member, 
        );
        // dd($data);
        return $data;
    }

    public function infomember_buyclass($id)
    {
        $member = DB::table('tb_buyclass')
        ->where('class_id', $id)
        ->leftJoin('manageclass', 'tb_buyclass.class_id', '=', 'manageclass.id')
        ->get();
        $data = array(
            'member' => $member, 
        );
        return view('backend.manageclass.info', $data);
    }

    public function delmemberbuyclass($id)
    {
        buyclass::destroy($id);
        return back();
    }

    public function editmemberinfo($id)
    {
        // dd($id);
        $buyclass = DB::table('tb_buyclass')
        ->where('buy_id', $id)
        ->first();
        // dd($buyclass);
        $data = array(
            'buyclass' => $buyclass, 
        );
        return view('backend.manageclass.modal.edit-member-info', $data);
    }
    public function manageclassController($id)
    {
        dd($id);
    }
}