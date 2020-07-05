@extends('layout.template')

@section('css')
@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="panel-body">


    
     






            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">
                        </h4>
                    </div>
                    <div class="content">
                        <form action="" enctype="multipart/form-data" method="post" name="register-form">
                            <div class="row">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                              วันที่แจ้งซ่อม
                                            </label>
                        <input class="form-control border-input" type="text" name="firstname" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                เวลา
                                            </label>
                     <input class="form-control border-input" name="firstname" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                ประเภท
                                            </label>
                                             <select type="text" class="form-control checkSelect" id="wsFix"><!-- pmd-option  -->
                                                        <option value="">- เลือก -</option>
                                                        <option value="L_1">อุปกรณ์ชำรุด-ติดตั้ง</option>
                                                        <option value="L_2">อุปกรณ์ชำรุด-เครื่องใช้ไฟฟ้า</option>
                                                        <option value="L_3">อุปกรณ์ชำรุด-อุปกรณ์สุขภัณฑ์</option>
                                                        <option value="L_4">อุปกรณ์ชำรุด-อุปกรณ์กีฬา</option>
                                                        <option value="L_5">อุปกรณ์ชำรุด-หลอดไฟชำรุด</option>
                                                        <option value="L_6">อุปกรณ์ชำรุด-IT</option>
                                                        <option value="L_7">อุปกรณ์ชำรุด-อื่นๆ</option>
                                                        <option value="F">เฟอร์นิเจอร์ชำรุด</option>
                                                        <option value="A">ระบบแอร์</option>
                                                        <option value="W">ระบบน้ำ</option>
                                                        <option value="P_1">ระบบท่อ-ส้วมตัน</option>
                                                        <option value="P_2">ระบบท่อ-ท่อตัน</option>
                                                        <option value="P_3">ระบบท่อ-กลิ่น</option>
                                                        <option value="P_4">ระบบท่อ-แตก/รั่ว</option>
                                                        <option value="P_5">ระบบท่อ-อื่นๆ</option>
                                                        <option value="E">ระบบไฟ</option>
                                                        <option value="I_1">ระบบ IT-อินเตอร์เน็ต</option>
                                                        <option value="I_2">ระบบ IT-สัญญาณทีวี</option>
                                                        <option value="I_3">ระบบ IT-สัญญาณโทรศัพท์</option>
                                                        <option value="I_4">ระบบ IT-CCTV</option>
                                                        <option value="S">งานติดตั้ง</option>
                                                        <option value="Z">อื่นๆ</option>
                                                    </select>
                                        </div>
                                    </div>
                                    
                                </div>

<div class="row">
<div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                               หมายเหตุ
                                            </label>
                                            <textarea class="form-control border-input" name="address" placeholder="ที่อยู่" type="text" value="">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>


                                 <div class="row">
<div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                               อาคาร.
                                            </label>
                                             <select type="text" class="form-control checkSelect" id="wsBuilding"><!-- pmd-option  -->
                                                        <option value="">- เลือก -</option>
                                                        <option value="B_1">RQ 01</option>
                                                        <option value="B_2">RQ 02</option>
                                                        <option value="B_3">RQ 03</option>
                                                        <option value="B_4">RQ 04</option>
                                                        <option value="B_5">RQ 05(คลับเฮ้าส์)</option>
                                                        <option value="B_6">Racquet Club</option>
                                                        <option value="B_7">Owner</option>
                                                        <option value="B_8">RQ 49</option>
                                                        <option value="B_9">RQ 30(Housing(12/5/7))</option>
                                                        <option value="B_10">RQ 11(แฟลต 11)</option>
                                                        <option value="B_11">RQ 20(หอพัก ญ)</option>
                                                        <option value="B_12">RQ 10(Residence)</option>
                                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                              ชั้น
                                            </label>
                                           <select type="text" class="form-control checkSelect" id="wsFloor"><!-- pmd-option  -->
                                                        <option value="">- เลือก -</option>
                                                    </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                ห้อง
                                            </label>
                <input class="form-control border-input" type="text" id="" name="telephone" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    
                                </div>

                                 <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <h4> สิ่งที่ชำรุด</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                              ประเภทงานซ่อม :
                                            </label>
                                           <label>
                                                <input type="radio" name="optionsRadios" value="option1" checked />
                                                ปกติ
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                          <label>
                                                <input type="radio" name="optionsRadios" value="option1" checked />
                                                ฉุกเฉิน
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>
                                                ยี่ห้อ/รุ่น/อุปกรณ์ที่ชำรุด
                                            </label>
            <input class="form-control border-input" type="text" id="" name="telephone" placeholder="ยี่ห้อ/รุ่น/อุปกรณ์ที่ชำรุด" type="text" value="">
                                            </input>
                                            </input>
                                        </div>
                                    </div>
<div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                               เลขทะเบียนทรัพย์สิน
</label>
 <input class="form-control border-input" type="text" id="" name="telephone" placeholder="เลขทะเบียนทรัพย์สิน" type="text" value="">
                                            </input>
                                    </div>
                                </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                             ปัญหา/อาการ
                                            </label>
            <textarea class="form-control border-input" name="address" placeholder="ปัญหา/อาการ" type="text" value="">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                             เวลาที่สะดวกให้เข้าซ่อม
                                            </label>
            <textarea class="form-control border-input" name="address" placeholder="เวลาที่สะดวกให้เข้าซ่อม" type="text" value="">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                               

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <h4> ข้อมูลผู้แจ้งซ่อม (ลูกค้า)</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                        </div>
                                    </div>
                                </div>
<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                             ชื่อ - นามสกุล:
                                            </label>
            <input class="form-control border-input" name="address" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>



<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                             บริษัท / เลขที่ห้องเช่า:
                                            </label>
<input class="form-control border-input" name="address" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>



                              
<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                            เบอร์ติดต่อ:
                                            </label>
<input class="form-control border-input" name="address" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>  



 <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <h4>ผู้รับแจ้งซ่อม (พนักงาน)</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                        </div>
                                    </div>
                                </div>




                               <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                             ชื่อ - นามสกุล:
                                            </label>
            <input class="form-control border-input" name="address" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>



<div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                ฝ่าย
                                            </label>
                                             <select type="text" class="form-control checkSelect" id="wsInformAdminSub"><!-- pmd-option  -->
                                                            <option value="">- เลือก -</option>
                                                            <option value="CS">CS</option>
                                                            <option value="Sport">Sport</option>
                                                            <option value="Space">Space</option>
                                                            <option value="Support">Support</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                        </div>
                                    </div>
                                    
                                </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                
                                <button class="btn btn-primary start" type="button">
                                   แจ้งซ่อม
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@stop


@section('js')


@stop
