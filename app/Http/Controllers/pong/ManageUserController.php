<?php

namespace App\Http\Controllers\pong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Package;
use App\Country;
use App\Sport;
use App\Member;
use App\ImageMember;
use App\RSport;
use App\RPackage;
use App\Group;
use App\File;
USE App\Hold;
use App\DiscountPackage;
use PDF;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['members'] = Member::join('group','member.memberID','=','group.member_id')->get();
        $data['packages'] = Package::all();
        return view('backend.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataPackage = Package::all();
        $country = Country::all();
        $sport = Sport::all();
        $data =[
            'packages'=>$dataPackage,
            'countries'=>$country,
            'sports'=>$sport,
        ];
        return view('backend.user.register',$data);
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
        //----สมัครสมาชิกใหม่ คนเดียว
        foreach ($request->member_num as $grade => $member_num) {
            // dd($grade);
            // dd($request);
            $datend = $request['enddate'][$grade];
            if ($grade>=2) {
                $group1 = Group::where('group_number',$request['membergroup'][$grade])
                ->where('grade',1)
                ->first();
                $endpackgroup1 = RPackage::orderBy('end','desc')
                ->where('member_id',$group1->member_id)->first();
            }
            if (!isset($member_num)) {
                // นำเป้าหมายที่กรอกมาต่อคำ
                $goals=null;
                if (isset($request['chGoal'][$grade])) {
                    foreach ($request['chGoal'][$grade] as $key => $vgoals) {
                        if ($key==count($request['chGoal'][$grade])-1) {
                            $goals .= $vgoals;
                        }else{
                            $goals .= $vgoals.',';
                        }
                    }
                }

                $website=null;
                if (isset($request['website'][$grade])) {
                    foreach ($request['website'][$grade] as $websitekey => $vwebsite) {
                        $website .= $vwebsite.',';
                        if ($request['other'][$grade]!==null&&$vwebsite=='5') {
                            $website .= $request['other'][$grade];
                        }
                        if ($request['friend'][$grade]!==null&&$vwebsite=='4') {
                            $website .= $request['friend'][$grade].',';
                        }
                    }
                }
                // dd('nogoal');
                $addMember = new Member;
                $addMember->registerdate = $request['registerdate'][$grade];
                $addMember->name = $request['name'][$grade];
                $addMember->surname = $request['surname'][$grade];
                $addMember->tel = $request['tel'][$grade];
                $addMember->email = $request['email'][$grade];
                $addMember->birthday = $request['birthday'][$grade];
                $addMember->gender = $request['gender'][$grade];
                $addMember->address = $request['address'][$grade];
                $addMember->country = $request['nation'][$grade];
                $addMember->website = $website;
                $addMember->member_job = $request['job'][$grade];
                $addMember->emergency_tel = $request['Etel'][$grade];
                $addMember->emergency_name = $request['Ename'][$grade];
                $addMember->goals = $goals;
                $addMember->save();
            // dd($addMember->memberID);
            //----อัปรูป
                if (isset($request['imgBase64'][$grade])) {

                    $imageBase = $request['imgBase64'][$grade];
                    $image_array_1 = explode(";", $imageBase);
                    $image_array_2 = explode(",", $image_array_1[1]);
                    $imageBase = base64_decode($image_array_2[1]);
                    $imageName = 'storage/app/image-user/'.$addMember->memberID.'.png';
                    file_put_contents($imageName, $imageBase);

                    $addImage = new ImageMember;
                    $addImage->member_id = $addMember->memberID;
                    $addImage->path = $imageName;
                    $addImage->save();

                }
            //--------อัปกีฬา
                if (isset($request['chSport'][$grade])) {
                    foreach ($request['chSport'][$grade] as $keys => $vsport) {
                        $addsport = new RSport;
                        $addsport->sport_id = $vsport;
                        $addsport->member_id = $addMember->memberID;
                        $addsport->save();
                    }
                }

            //------add group
                $fam = substr($request['membergroup'][$grade], 0,3);

                $addgroup = new Group;
                $addgroup->group_number=$request['membergroup'][$grade];
                $addgroup->member_id=$addMember->memberID;
                $addgroup->grade=$grade;
                if ($fam=='fam') {
                    $addgroup->type_group=2;
                }else{
                    $addgroup->type_group=1;
                }

                $addgroup->save();

            //-------อัป package
                if ($request['package'][$grade]!==null) {
                    $addpackage = new RPackage;
                    $addpackage->package_id = $request['package'][$grade];
                    $addpackage->member_id = $addMember->memberID;
                    $addpackage->start= $request['startdate'][$grade];

                    if ($fam=='fam'&&$grade>=2) {
                        if ($endpackgroup1->end<$request['enddate'][$grade]) {
                            $datend = $endpackgroup1->end;
                        }
                    }
                    $addpackage->end = $datend;
                    // $addpackage->discount_p = $request['discount'][$grade];
                    // $addpackage->discount_n = $request['note'][$grade];
                    $addpackage->renew_status = '1';
                    $addpackage->save();

                    if ($request['typeDis'][$grade]=='2'&&$request['discount'][$grade]!=null) {
                        $addDiscount = new DiscountPackage;
                        $addDiscount->num_discount =  $request['discount'][$grade];
                        $addDiscount->type_discount = $request['typeDis'][$grade];
                        $addDiscount->rpackage_id = $addpackage->id_rpackage;
                        $addDiscount->discount_note = $request['note'][$grade];
                        $addDiscount->save();
                    }elseif($request['typeDis'][$grade]=='3'&&$request['moneydiscount'][$grade]!=null){
                        $addDiscount = new DiscountPackage;
                        $addDiscount->num_discount =  $request['moneydiscount'][$grade];
                        $addDiscount->type_discount = $request['typeDis'][$grade];
                        $addDiscount->rpackage_id = $addpackage->id_rpackage;
                        $addDiscount->discount_note = $request['note'][$grade];
                        $addDiscount->save();
                    }

                    $totalday = date_diff(date_create($request['startdate'][$grade]),date_create($datend))->format('%a');
                    $addMember->continuous = $totalday;
                    $addMember->save();

                }
            //-----up files
                if ($request->file('files')) {
                    if (isset($request->file('files')[$grade])) {
                        foreach ($request->file('files')[$grade] as $keyf => $vfile) {
                            $pathfile = $vfile->storeAs('files-user',$addMember->memberID.'file'.time().$vfile->getClientOriginalName());
                            $addfile = new File;
                            $addfile->memberID = $addMember->memberID;
                            $addfile->file_name = 'storage/app/'.$pathfile;
                            $addfile->save();
                        }
                    }
                }
            }
        //จบการสมัครสมาชิกใหม่แบบสมาชิกใหม่
            elseif (isset($member_num)) {
                $updateMember = Member::find($member_num);
                if (isset($updateMember)) {
                    // $updateMember->
                    $goals=null;
                    if (isset($request['chGoal'][$grade])) {
                        foreach ($request['chGoal'][$grade] as $key => $vgoals) {
                            if ($key==count($request['chGoal'][$grade])-1) {
                                $goals .= $vgoals;
                            }else{
                                $goals .= $vgoals.',';
                            }
                        }
                    }

                    $website=null;
                    if (isset($request['website'][$grade])) {
                        foreach ($request['website'][$grade] as $websitekey => $vwebsite) {
                            $website .= $vwebsite.',';
                            if ($request['other'][$grade]!==null&&$vwebsite=='5') {
                                $website .= $request['other'][$grade];
                            }
                            if ($request['friend'][$grade]!==null&&$vwebsite=='4') {
                                $website .= $request['friend'][$grade].',';
                            }
                        }
                    }
                // dd('nogoal');
                    $updateMember->registerdate = $request['registerdate'][$grade];
                    $updateMember->name = $request['name'][$grade];
                    $updateMember->surname = $request['surname'][$grade];
                    $updateMember->tel = $request['tel'][$grade];
                    $updateMember->email = $request['email'][$grade];
                    $updateMember->birthday = $request['birthday'][$grade];
                    $updateMember->gender = $request['gender'][$grade];
                    $updateMember->address = $request['address'][$grade];
                    $updateMember->country = $request['nation'][$grade];
                    $updateMember->website = $website;
                    $updateMember->member_job = $request['job'][$grade];
                    $updateMember->emergency_tel = $request['Etel'][$grade];
                    $updateMember->emergency_name = $request['Ename'][$grade];
                    $updateMember->goals = $goals;
                    $updateMember->save();


                    // update images

                    if (isset($request['imgBase64'][$grade])) {

                        $imageBase = $request['imgBase64'][$grade];
                        $image_array_1 = explode(";", $imageBase);
                        $image_array_2 = explode(",", $image_array_1[1]);
                        $imageBase = base64_decode($image_array_2[1]);
                        $imageName = 'storage/app/image-user/'.$member_num.'.png';
                        file_put_contents($imageName, $imageBase);

                        $addImage = ImageMember::where('member_id',$member_num)->first();
                        if (!isset($addImage)) {
                            $addImage = new ImageMember;
                        }
                        $addImage->member_id = $member_num;
                        $addImage->path = $imageName;
                        $addImage->save();
                    }


                    // update group
                    $fam = substr($request['membergroup'][$grade], 0,3);
                    $addgroup = Group::where('member_id',$member_num)->first();
                    $addgroup->group_number=$request['membergroup'][$grade];
                    $addgroup->grade=$grade;
                    if ($fam=='fam') {
                        $addgroup->type_group=2;
                    }else{
                        $addgroup->type_group=1;
                    }
                    $addgroup->save();

                    // // update sport
                    RSport::where('member_id',$member_num)->delete();
                    if (isset($request['chSport'][$grade])) {
                        foreach ($request['chSport'][$grade] as $keys => $vsport) {
                            $addsport = new RSport;
                            $addsport->sport_id = $vsport;
                            $addsport->member_id = $member_num;
                            $addsport->save();
                        }
                    }

                    // // upload files
                    if ($request->file('files')) {
                        if (isset($request->file('files')[$grade])) {
                            foreach ($request->file('files')[$grade] as $keyf => $vfile) {
                                $pathfile = $vfile->storeAs('files-user',$member_num.'file'.time().$vfile->getClientOriginalName());
                                $addfile = new File;
                                $addfile->memberID = $member_num;
                                $addfile->file_name = 'storage/app/'.$pathfile;
                                $addfile->save();
                            }
                        }
                    }


                    //update packend
                    if ($request['enddate'][$grade]!==null) {
                        $addpackage = RPackage::where('member_id',$member_num)
                        ->where('end',$request['enddate'][$grade])->first();

                        if ($fam=='fam'&&$grade>=2) {
                            if ($endpackgroup1->end<$request['enddate'][$grade]) {

                                $datend = $endpackgroup1->end;
                                // ลดจำนวนวัน
                                $totaldayold = $updateMember->continuous;
                                $totalday = date_diff(date_create($endpackgroup1->end),date_create($request['enddate'][$grade]))->format('%a');
                                $totallast = $totaldayold-$totalday;

                                $updateMember->continuous = $totallast;
                                $updateMember->save();

                            }
                        }
                        $addpackage->end = $datend;
                        $addpackage->save();
                    }
                }
            }
        }
        return redirect('manage-user/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groupnum = Group::where('member_id',$id)->first();
        $data['members'] = Member::join('group','member.memberID','=','group.member_id')
        ->orderBy('grade','asc')
        ->where('group_number',$groupnum->group_number)->get();
        $data['id'] = $id;
        $data['packages'] = Package::all();
        $data['countries'] = Country::all();
        $data['sports'] = Sport::all();

        // dd($data['members']);
        return view('backend.user.search',$data);

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
        // dd($request,$id);
        $updateMember = Member::find($id);
        if (isset($updateMember)) {
                    // $updateMember->
            $goals=null;
            if (isset($request['chGoal'])) {
                foreach ($request['chGoal'] as $key => $vgoals) {
                    if ($key==count($request['chGoal'])-1) {
                        $goals .= $vgoals;
                    }else{
                        $goals .= $vgoals.',';
                    }
                }
            }
                // dd('nogoal');
            $updateMember->registerdate = $request['registerdate'];
            $updateMember->name = $request['name'];
            $updateMember->surname = $request['surname'];
            $updateMember->tel = $request['tel'];
            $updateMember->email = $request['email'];
            $updateMember->birthday = $request['birthday'];
            $updateMember->gender = $request['gender'];
            $updateMember->address = $request['address'];
            $updateMember->country = $request['nation'];
            $updateMember->website = $request['website'];
            $updateMember->member_job = $request['job'];
            $updateMember->emergency_tel = $request['Etel'];
            $updateMember->emergency_name = $request['Ename'];
            $updateMember->goals = $goals;
            $updateMember->save();


                    // update images
            // dd(isset($request['imgBase64']));
            if ($request['imgBase64']!==null) {

                $imageBase = $request['imgBase64'];
                $image_array_1 = explode(";", $imageBase);
                $image_array_2 = explode(",", $image_array_1[1]);
                $imageBase = base64_decode($image_array_2[1]);
                $imageName = 'storage/app/image-user/'.$id.'.png';
                file_put_contents($imageName, $imageBase);

                $addImage = ImageMember::where('member_id',$id)->first();
                if (!isset($addImage)) {
                    $addImage = new ImageMember;
                }
                $addImage->member_id = $id;
                $addImage->path = $imageName;
                $addImage->save();
            }
                    // // update sport
            RSport::where('member_id',$id)->delete();
            if (isset($request['chSport'])) {
                foreach ($request['chSport'] as $keys => $vsport) {
                    $addsport = new RSport;
                    $addsport->sport_id = $vsport;
                    $addsport->member_id = $id;
                    $addsport->save();
                }
            }

                    // // upload files
            if ($request->file('files')) {

                foreach ($request->file('files') as $keyf => $vfile) {
                    $pathfile = $vfile->storeAs('files-user',$id.'file'.time().$vfile->getClientOriginalName());
                    $addfile = new File;
                    $addfile->memberID = $id;
                    $addfile->file_name = 'storage/app/'.$pathfile;
                    $addfile->save();
                }
            }
            return redirect('manage-user/'.$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function selectPackage(Request $request)
    {

        $dataPackage = Package::all();
        $html = '<option>- Package -</option>';
        foreach ($dataPackage as $value) {
            if ($value->more!=null&&$value->less!=null) {
                // between
                if ($request->age>=$value->more&&$request->age<=$value->less) {
                    $html .='<option data-day="'.$value->package_numday.'" value="'.$value->id.'"';
                    $html .='data-price="'.$value->package_price.'"';
                    $html .='>';
                    $html .= $value->package_name;
                    $html .='</option>';
                }
                // or
                if ($value->more>$value->less) {
                    if ($request->age>=$value->more||$request->age<=$value->less) {
                        $html .='<option data-day="'.$value->package_numday.'" value="'.$value->id.'"';
                        $html .='data-price="'.$value->package_price.'"';
                        $html .='>';
                        $html .= $value->package_name;
                        $html .='</option>';
                    }
                }
            }else{
                $html .='<option data-day="'.$value->package_numday.'" value="'.$value->id.'" ';
                $html .='data-price="'.$value->package_price.'"';
                $html .='>';
                $html .= $value->package_name;
                $html .='</option>';
            }
        }
        return $html;

    }

    public function appendDiv($id)
    {
        $dataPackage = Package::all();
        $country = Country::all();
        $sport = Sport::all();
        $data =[
            'packages'=>$dataPackage,
            'countries'=>$country,
            'sports'=>$sport,
            'id'=>$id,
        ];
        return view('backend.user.append',$data);
    }
    public function appendSearch($id,Request $request)
    {
        // dd($id);

        $member = Member::find($id);
        $image = ImageMember::where('member_id',$id)->first();
        // dd($member);
        $group = Group::where('member_id',$id)->first();
        $package = RPackage::join('package','r_package.package_id','=','package.id')
        ->orderBy('end','desc')
        ->where('member_id',$id)->first();
        $sports = RSport::join('sport','r_sport.sport_id','=','sport.id_sport')
        ->where('member_id',$id)->get();
        $sport = [];
        // dd($package);
        $allpackages = Package::all();
        $allSport = Sport::all();
        $discount = DiscountPackage::where('rpackage_id',$package->id_rpackage)->get();

        if ($id=='0') {
            $data=[
                'packages'=>$allpackages,
                'sports'=>$allSport,
                'id'=>$request->grade,
            ];
            return view('backend.user.clear',$data);
        }
        foreach ($sports as $key => $value) {
            array_push($sport, $value->sport_id);
        }
        $goals = explode(",", $member->goals);
        $websites = explode(",", $member->website);
        // dd($data);
        if ($group->type_group=='1') {
            $data = [
                'member'=>$member,
                'group'=>$group,
                'package'=>$package,
                'sport'=>$sport,
                'goals'=>$goals,
                'allpackages'=>$allpackages,
                'allSport'=>$allSport,
                'id'=>$request->grade,
                'image'=>$image,
                'websites'=>$websites,
                'discount'=>$discount,
            ];
            return view('backend.user.showprofile',$data);
        }else{
            return 0;
        }
        // Member::group()->where('group_number',$group->group_number)->get();

    }
    public function modalUpgrade(Request $request)
    {
        $member = Member::find($request->id);
        // คำนวนอายุ
        $group = Group::where('member_id',$request->id)->first();
        $age = floor((time() - strtotime($member->birthday)) / 31556926);

        $package = Package::join('r_package','package.id','=','r_package.package_id')
        ->orderBy('end','desc')
        ->where('member_id',$request->id)
        ->first();

        $allPack = Package::where('id','!=',$package->id)
        ->get();
        $data = [
            'member'=>$member,
            'package'=>$package,
            'age'=>$age,
            'allPack'=>$allPack,
            'group'=>$group,
        ];
        return view('backend.user.modal.modal-upgrade',$data);
    }
    public function upgradepack($id,Request $request)
    {
        // dd($request,$id);

        if ($request['end']!==null&&$request['package']!==null) {
            $fam = substr($request['groupid'], 0,3);
            $datend = $request['end'];
            if ($fam=='fam') {
                $one = Group::where('group_number',$request['groupid'])
                ->where('grade','=','1')->first();
                $endpackone = RPackage::orderBy('end','desc')
                ->where('member_id',$one->member_id)
                ->first();
                if ($endpackone->end<$datend) {
                    $datend = $endpackone->end;
                }
            }
            $addpackage = RPackage::find($id);
            $addpackage->package_id = $request['package'];
            $addpackage->end= $datend;
            $addpackage->status_upgrade = '1';
            $ckreturn = $addpackage->save();
        }

        if ($ckreturn) {
            return 1;
        }else{
            return 0;
        }

    }


    public function renewal(Request $request)
    {
        $member = Member::find($request->id);
        // คำนวนอายุ
        $group = Group::where('member_id',$request->id)->first();
        $age = floor((time() - strtotime($member->birthday)) / 31556926);

        $package = Package::join('r_package','package.id','=','r_package.package_id')
        ->orderBy('end','desc')
        ->where('member_id',$request->id)
        ->first();

        $memberGroups = Group::join('member','group.member_id','=','member.memberID')
        ->where('group_number',$group->group_number)
        ->where('grade','<',$group->grade)
        ->where('member_id','!=',$request->id)->get();
        $packgroup = [];
        foreach ($memberGroups as $key => $value) {
            $packrenew = RPackage::orderBy('end','desc')->where('member_id',$value->member_id)->first();
            array_push($packgroup, $packrenew);
        }

        $allPack = Package::all();
        $data = [
            'member'=>$member,
            'package'=>$package,
            'age'=>$age,
            'allPack'=>$allPack,
            'group'=>$group,
            'memberGroups'=>$memberGroups,
            'packgroup'=>$packgroup,
        ];
        return view('backend.user.modal.modal-renewal',$data);
    }

    public function renewalpack($id,Request $request)
    {
        // dd($request);
        $datend = $request->end;
        if ($request['radioRenew']==1) {
            $groupMember = Group::where('member_id',$id)->first();

            if (substr($groupMember->group_number,0,3)=='fam' && $groupMember->grade ==1) {
                $groupAll = Group::orderBy('grade','asc')
                ->where('member_id','!=',$id)
                ->where('group_number',$groupMember->group_number)->get();
                foreach ($groupAll as $key => $member) {
                    // dd($member);
                    $member->group_number = 'one'.time().$key;
                    $member->grade = 1;
                    $member->type_group = 1;
                    $member->save();
                }
            }

            $groupMember->group_number = 'one'.time();
            $groupMember->grade = 1;
            $groupMember->type_group = 1;
            $groupMember->save();
        }else{
            $groupNumber = 'fam'.time();
            $group = Group::orderBy('grade','asc')->where('group_number',$request['groupNumber'])->get();
            $groupMember = Group::where('member_id',$id)->first();
            if (count($group)!=0) {
                $groupNumber = $group[0]->group_number;
            }

            if (substr($groupMember->group_number,0,3)=='fam') {
                // dd('fam');
                if ($groupMember->grade ==1) {
                    $groupAll = Group::orderBy('grade','asc')
                    ->where('member_id','!=',$id)
                    ->where('group_number',$groupMember->group_number)->get();
                    // if (count($groupAll)!=0) {
                    foreach ($groupAll as $key => $member) {
                        $member->group_number = 'one'.time().$key;
                        $member->grade = 1;
                        $member->type_group = 1;
                        $member->save();
                    }
                    // }
                }else{

                    $groupAll = Group::orderBy('grade','asc')
                    ->where('member_id','!=',$id)
                    ->where('group_number',$groupMember->group_number)
                    ->where('grade','>',$groupMember->grade)
                    ->get();
                    // dd($groupAll,'else fam');
                    // if (count($groupAll)!=0) {
                    foreach ($groupAll as $key => $member) {
                        $member->grade = $member->grade-1;
                        $member->save();
                    }
                    // }
                    if (count($group)!=0) {
                        if ($datend > $group[0]->end) {
                            $datend = $group[0]->end;
                        }
                    }
                }

            }
            // dd('fam not');
            $groupMember->group_number = $groupNumber;
            $groupMember->grade = count($group)+1;
            $groupMember->type_group = 2;
            $groupMember->save();

        }

        $addPackage = new RPackage;
        $addPackage->package_id = $request['package'];
        $addPackage->member_id = $id;
        $addPackage->start= $request['start'];
        $addPackage->end = $datend;
        $addPackage->renew_status = $request['status'];
        $success = $addPackage->save();
        if ($request['typeDis']=='2'&&$request['discount']!=null) {
            $addDiscount = new DiscountPackage;
            $addDiscount->num_discount =  $request['discount'];
            $addDiscount->type_discount = $request['typeDis'];
            $addDiscount->rpackage_id = $addPackage->id_rpackage;
            $addDiscount->discount_note = $request['note'];
            $addDiscount->save();
        }elseif($request['typeDis']=='3'&&$request['moneydiscount']!=null){
            $addDiscount = new DiscountPackage;
            $addDiscount->num_discount =  $request['moneydiscount'];
            $addDiscount->type_discount = $request['typeDis'];
            $addDiscount->rpackage_id = $addPackage->id_rpackage;
            $addDiscount->discount_note = $request['note'];
            $addDiscount->save();
        }
        if ($success) {
            return 1;
        }else{
            return 0;
        }

    }

    public function crop(Request $request)
    {
        if(isset($request["image"])){

            $data = $request["image"];

            $image_array_1 = explode(";", $data);

            $image_array_2 = explode(",", $image_array_1[1]);
            return $data;
        }
    }
    public function searchEdit($id,Request $request)
    {
        $member = Member::find($id);
        $image = ImageMember::where('member_id',$id)->first();

        // dd($member);
        $group = Group::where('member_id',$id)->first();
        $package = RPackage::join('package','r_package.package_id','=','package.id')
        ->orderBy('end','desc')
        ->where('member_id',$id)->first();
        $sports = RSport::join('sport','r_sport.sport_id','=','sport.id_sport')
        ->where('member_id',$id)->get();
        $sport = [];

        $allpackages = Package::all();
        $allSport = Sport::all();
        foreach ($sports as $key => $value) {
            array_push($sport, $value->sport_id);
        }
        $goals = explode(",", $member->goals);
        $data = [
            'member'=>$member,
            'group'=>$group,
            'package'=>$package,
            'sport'=>$sport,
            'goals'=>$goals,
            'allpackages'=>$allpackages,
            'allSport'=>$allSport,
            'id'=>$request->grade,
            'image'=>$image,
        ];
        // dd($data['image']);
        return view('backend.user.edit-user',$data);
    }
    public function storeHold($id,Request $request)
    {
        // dd($request);
        $memberGroup = Group::where('member_id',$id)->first();
        $groupOne = Group::where('group_number',$memberGroup->group_number)
        ->where('grade',1)
        ->first();
        $bool = true;
        $packOne = RPackage::orderBy('end','desc')->where('member_id',$groupOne->member_id)->first();
        $packUpdate = RPackage::orderBy('end','desc')->where('member_id',$id)->first();
        $endUpdate = date('Y-m-d', strtotime($packUpdate->end. ' + '.$request['total'].' days'));
        $fam = substr($memberGroup->group_number, 0,3);
        $totalday = $request['total'];


        if ($endUpdate > $packOne->end && $packOne->member_id!=$packUpdate->member_id && $fam=='fam') {
            // dd('asd');
            $endUpdate = $packOne->end;
            $totalday = date_diff(date_create($request['start']),date_create($packOne->end))->format('%a');
        }
        // dd($totalday);
        $packUpdate->end = $endUpdate;
        $packUpdate->save();

        if ($request->file('files')!==null) {
            $vfile=$request->file('files');
            $pathfile = $vfile->storeAs('files-hold',$packUpdate->member_id.'file'.time().$vfile->getClientOriginalName());
        }

        $addHold = new Hold;
        $addHold->rpackage_id = $packUpdate->id_rpackage;
        $addHold->member_id =$packUpdate->member_id;
        $addHold->day = $totalday;
        $addHold->start_hold = $request['start'];
        $addHold->end_hold = $request['end'];
        $addHold->file_hold = 'storage/app/'.$pathfile;
        $addHold->save();

        return redirect('manage-user');

    }
    public function checkHold(Request $request)
    {
        // dd($request);
        $memberGroup = Group::where('member_id',$request->id)->first();
        $groupOne = Group::where('group_number',$memberGroup->group_number)
        ->where('grade',1)
        ->first();
        $bool = true;
        $packOne = RPackage::orderBy('end','desc')->where('member_id',$groupOne->member_id)->first();
        $packUpdate = RPackage::orderBy('end','desc')->where('member_id',$request->id)->first();
        $endUpdate = date('Y-m-d', strtotime($packUpdate->end. ' + '.$request['totalhold'].' days'));
        $fam = substr($memberGroup->group_number, 0,3);
        if ($endUpdate > $packOne->end && $packOne->member_id!=$packUpdate->member_id && $fam=='fam') {
            $bool = false;
        }else{
            $bool = true;
        }
        return response()->json($bool);
    }
    public function hold(Request $request)
    {
        $data['member'] = Member::where('memberID',$request->id)->first();
        $data['holds'] = Hold::where('member_id',$request->id)->get();
        return view('backend.user.modal.modal-hold',$data);
    }
    public function searchGroup(Request $request)
    {
        // dd($request);
        $members = Group::join('member','group.member_id','=','member.memberID')
        ->where('group_number',$request['numGroup'])->get();
        $packgroup = [];
        foreach ($members as $value) {
            $packrenew = RPackage::orderBy('end','desc')->where('member_id',$value->member_id)->first();
            array_push($packgroup, $packrenew);
        }

        $html = '';
        foreach ($members as $key => $member) {
            $html .= '<h5>';
            $html .= '<span class="label label-theme m-l-5">'.$packgroup[$key]->end.'</span>';
            $html .= '<b>Member id :'.$member->memberID.' Name :'.$member->name.' '.$member->surname.'</b>';
            $html .= '</h5>';
        }
        $packHtml = '';
        if (count($members)!==0) {
            $memberUpdate = Member::where('memberID',$request['idMember'])->first();
        // คำนวนอายุ

            $age = floor((time() - strtotime($memberUpdate->birthday)) / 31556926);
            $allPack = Package::where('less','>=',$age)
            ->where('more','<=',$age)
            ->where(function ($allPack) use ($members) {
                $allPack->whereIn('astext',[count($members)+1,''])
                ->orWhereNull('astext');
            })
            ->get();
            // dd($allPack,$memberUpdate,$age,count($members)+1);
            $packHtml .= '<option value="">- Package -</option>';
            foreach ($allPack as $packValue) {
                $packHtml .= '<option value="'.$packValue->id .'" data-day="'.$packValue->package_numday.'"
                data-money="'.$packValue->package_price.'">
                '.$packValue->package_name.'
                </option>';
            }
        }
        $data=[
            'html'=>$html,
            'packHtml'=>$packHtml,
            'members'=>$members,
        ];
        return $data;

    }
    public function searchMember(Request $request)
    {
        $member = Group::where('member_id',$request['memberId'])->first();
        // dd($request);
        return $member;
    }
    public function filter(Request $request)
    {
        // dd($request);
        $ageDateS = date('Y-m-d', strtotime('today -'.$request['ageStart'].' years'));
        $ageDateE = date('Y-m-d', strtotime('today -'.$request['ageEnd'].' years'));
        // dd($ageDateS,$ageDateE);
        $rpackages = RPackage::orderBy('end','desc')->get()->unique('member_id');

        $filter_result = Member::join('group','member.memberID','=','group.member_id')
        ->join('r_package','member.memberID','=','r_package.member_id')
        ->join('package','r_package.package_id','=','package.id')
        ->leftjoin('discount_package','r_package.id_rpackage','=','discount_package.rpackage_id')
        ->orderBy('end','desc');
        // dd($filter_result);
        if ($request['memberID']!==null) {
            $filter_result->where(function ($filter_result) use ($request) {
                $filter_result->orwhere('memberID',$request['memberID']);
            });
        }
        if ($request['groupNumber']!==null) {
            $filter_result->where('group_number',$request['groupNumber']);
        }
        if ($request['name']!==null) {
            $filter_result->where('name', 'like', '%'.$request['name'].'%');
        }
        if ($request['surname']!==null) {
            $filter_result->where('surname', 'like', '%'.$request['surname'].'%');
        }
        if ($request['email']!==null) {
            $filter_result->where('email', 'like', '%'.$request['email'].'%');
        }
        if ($request['ageStart']!==null&&$request['ageEnd']!==null) {
            // dd($ageDateS,$ageDateE);
            $filter_result->whereBetween('birthday', [$ageDateE,$ageDateS]);
        }
        if ($request['gender']!==null) {
            $filter_result->where('gender', $request['gender']);
        }
        if ($request['nation']!==null) {
            $filter_result->where('country', 'like', '%'.$request['nation'].'%');
        }
        if ($request['package']!==null) {
            $filter_result->where('end','>=',date('Y-m-d'));
            $filter_result->where('package_id', $request['package']);
        }
        if ($request['status']!==null) {
            // dd($request['status']);
            if ($request['status']=='1') {
                $filter_result->where('end','>=',date('Y-m-d'));
                $holds = Hold::where('end_hold','>=',date('Y-m-d'))
                ->where('start_hold','<=',date('Y-m-d'))
                ->orderBy('end_hold','desc')->get()
                ->unique('member_id');
                // dd($holds);
                $arrId = [];
                foreach ($holds as $key => $hold) {
                    array_push($arrId, $hold->member_id);
                }
                // dd($arrId);
                $filter_result->whereNotIn('memberID',$arrId);
            }elseif ($request['status']=='2') {
                $holds = Hold::where('end_hold','>=',date('Y-m-d'))
                ->where('start_hold','<=',date('Y-m-d'))
                ->orderBy('end_hold','desc')->get()
                ->unique('member_id');
                // dd($holds);
                $filter_result->where(function ($filter_result) use ($holds) {
                    foreach ($holds as $key => $hold) {
                        $filter_result->orwhere('id_rpackage',$hold->rpackage_id);
                    }
                });
            }else{
                $filter_result->where('end','<',date('Y-m-d'));
            }

        }
        if ($request['start']!==null&&$request['end']!==null) {
            $filter_result->whereBetween('end', [$request['start'],$request['end']]);
        }
        if ($request['disyear']!==null&&$request['disother']!==null) {
            $filter_result->where(function ($filter_result) use ($request) {
                $filter_result->orwhere('type_discount',$request['disyear']);
                $filter_result->orwhere('type_discount',2);
                $filter_result->orwhere('type_discount',3);
            });
        }elseif ($request['disyear']!==null||$request['disother']!==null) {
            if ($request['disyear']!==null) {
                $filter_result->where('type_discount',$request['disyear']);
            }
            if ($request['disother']!==null) {
                $filter_result->where(function ($filter_result) use ($request) {
                    $filter_result->orwhere('type_discount','2');
                    $filter_result->orwhere('type_discount','3');
                });
            }
        }

        $data['members'] = $filter_result->get()->unique('member_id');

        // dd($data['members']);


        return view('backend.user.table-filter',$data);
        // dd($request);
    }
    public function printpdf(Request $request,$id)
    {
        // dd($request,$id);
        $data['member'] = $id;
        $data['request'] = $request;
        $data['sports'] = Sport::all();
        $pdf = PDF::loadView('backend.user.pdf-member', $data);
        return @$pdf->stream();
    }
}
