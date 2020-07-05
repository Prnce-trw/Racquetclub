@extends('layout.template')

@section('css')
@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="table-responsive">
            <table class="table">Report
                <thead>
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class="col-md-14">
                                    Select Building
                                   <select type="text" class="form-control" id="building">
                                    <option value="empty"> All</option>
                                    <option value="B_1"> RQ 01</option>
                                    <option value="B_2"> RQ 02</option>
                                    <option value="B_3"> RQ 03</option>
                                    <option value="B_4"> RQ 04</option>
                                    <option value="B_5"> RQ 05(คลับเฮ้าส์)</option>
                                    <option value="B_6"> Racquet Club</option>
                                    <option value="B_7"> Owner</option>
                                    <option value="B_8"> RQ 49</option>
                                    <option value="B_9"> RQ 30(Housing(12/5/7))</option>
                                    <option value="B_10"> RQ 11(แฟลต 11)</option>
                                    <option value="B_11"> RQ 20(หอพัก ญ)</option>
                                    <option value="B_12"> RQ 10(Residence)</option>
                                </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="col-md-14">
                                    Select Type
                                  <select type="text" class="form-control" id="type">
                                    <option value="empty"> All</option>
                                    <option value="L"> อุปกรณ์ชำรุด-ติดตั้ง</option>
                                    <option value="L"> อุปกรณ์ชำรุด-เครื่องใช้ไฟฟ้า</option>
                                    <option value="L"> อุปกรณ์ชำรุด-อุปกรณ์สุขภัณฑ์</option>
                                    <option value="L"> อุปกรณ์ชำรุด-อุปกรณ์กีฬา</option>
                                    <option value="L"> อุปกรณ์ชำรุด-หลอดไฟชำรุด</option>
                                    <option value="L"> อุปกรณ์ชำรุด-IT</option>
                                    <option value="L"> อุปกรณ์ชำรุด-อื่นๆ</option>
                                    <option value="F"> เฟอร์นิเจอร์ชำรุด</option>
                                    <option value="A"> ระบบแอร์</option>
                                    <option value="W"> ระบบน้ำ</option>
                                    <option value="P"> ระบบท่อ-ส้วมตัน</option>
                                    <option value="P"> ระบบท่อ-ท่อตัน</option>
                                    <option value="P"> ระบบท่อ-กลิ่น</option>
                                    <option value="P"> ระบบท่อ-แตก/รั่ว</option>
                                    <option value="P"> ระบบท่อ-อื่นๆ</option>
                                    <option value="E"> ระบบไฟ</option>
                                    <option value="I"> ระบบ IT-อินเตอร์เน็ต</option>
                                    <option value="I"> ระบบ IT-สัญญาณทีวี</option>
                                    <option value="I"> ระบบ IT-สัญญาณโทรศัพท์</option>
                                    <option value="I"> ระบบ IT-CCTV</option>
                                    <option value="S"> งานติดตั้ง</option>
                                    <option value="Z"> อื่นๆ</option>
                                </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="col-md-14">
                                    Status
                                    <select type="text" class="form-control" id="status">
                                    <option value="empty"> All</option>
                                    <option value="0"> รอมอบหมายงานช่าง</option>
                                    <option value="1"> รอดำเนินการ</option>
                                    <option value="2"> ดำเนินการซ่อม</option>
                                    <option value="3"> ซ่อมเสร็จเรียบร้อย</option>
                                    <option value="4"> ซ่อมยังไม่เรียบร้อย</option>
                                </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="col-md-14">
                                    Start Date
                                    <input class="form-control" name="" type="date"/>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="col-md-14">
                                    Expire Date
                                    <input class="form-control" name="" type="date"/>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                
                                   
                                    <a class="btn btn-primary btn-sm" href="">
                                        <i class="fa fa-search">
                                        </i>
                                        Search
                                    </a>
                                
                            </div>
                        </td>
                    </tr>
                   
                      
                        <div class="table-responsive">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr>
                                        <th>
                                            วันที่แจ้งซ่อม
                                        </th>
                                        <th>
                                           วันที่มอบหมายงาน:
                                        </th>
                                        <th>
                                           วันที่ซ่อมเสร็จ
                                        </th>
                                        <th>
                                            รหัสใบงาน
                                        </th>
                                        <th>
                                          อาคาร/ชั้น
                                        </th>
                                        <th>
                                           ประเภท
                                        </th>
                                        <th>
                                            ข้อมูลลูกค้า
                                        </th>
                                        <th>
                                            พนักงานที่รับแจ้ง
                                        </th>
                                        <th>
                                            ช่าง
                                        </th>
                                        <th>
                                            รายงานการซ่อม
                                        </th>
                                        <th>
                                            สถานะ
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>
                                            <span class="glyphicon glyphicon-time">
                                            </span>
                                        </td>
                                        <td>
                                            Internet Explorer 5.0
                                        </td>
                                        <td>
                                            Win 7
                                        </td>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            X
                                        </td>
                                        
                                        <td>
                                            นายก
                                        </td>
                                        <td>
                                        
                                                Admin
                                            </a>
                                        </td>
                                        <td>
                                            12:30:2562
                                        </td>
                                        <td>
                                            
                                            A
                                        </td>
                                        <td>
                                            <font color="green">
                                                Accep
                                            </font>
                                        </td>
                                        <td>
                                           <font color="green">
                                                Accep
                                            </font>
                                                  
                                                      
                                        </td>
                                    </tr>
                                    

                                    
                                </tbody>
                            </table>
                        </div>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@stop


@section('js')
@stop
