@extends('layout.template')

@section('css')
@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="panel-body">
    
            <div class="col-lg-3 col-md-5">
                <div class="card card-user">
                    <div class="content">
                        <div class="author">Member information
                            <img alt="..." class="avatar border-white" height="250" src="storage/picture/news02.jpg" width="250">
                            </img>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">
                        </h4>
                    </div>
                    <div class="content">
                       
                            <div class="row">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                    </div>
                                    Member ID
                                    <input class="form-control" type="text"/></input>

                                    <div class="input-group-btn">
                                     <label class="col-md-6">
                            <button type="submit" class="btn btn-primary p-l-40 p-r-40">Search</button>

                                   
                            <button class="btn btn-white p-l-40 p-r-40" type="submit">Clear</button>
                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Register Date
                                            </label>
                                            <input class="form-control border-input" name="firstname" placeholder="Register Date" type="date" value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Member Group
                                            </label>
                                            <input class="form-control border-input" name="lastname" placeholder="" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Start Date
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="Start Date" type="date" value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Expire Date
                                            </label>
                                            <input class="form-control border-input" id="email" name="email" placeholder="" type="date" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                Package
                                            </label>
                                            <select class="form-control border-input" name="user_type">
                                                <option value="">
                                                    -- โปรดเลือก --
                                                </option>
                                                <option <="" option="" value="0">
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Name
                                            </label>
                                            <input class="form-control border-input" name="firstname" placeholder="English" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Surname
                                            </label>
                                            <input class="form-control border-input" name="lastname" placeholder="English" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                ชื่อ
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="ภาษาไทย" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                นามสกุล
                                            </label>
                                            <input class="form-control border-input" id="email" name="email" placeholder="ภาษาไทย" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                วันเกิด
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="วัน/เดือน/ปี" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                เพศ
                                            </label>
                                            <select class="default-select2 form-control" placeholder="Select Package">
                                                <option value="ALL Status">
                                                    ---เลือก---
                                                </option>
                                                <option value="1">
                                                    เพศหญิง
                                                </option>
                                                <option value="2">
                                                    เพศชาย
                                                </option>
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                ที่อยู่
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
                                                เขต
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="วัน/เดือน/ปี" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                จังหวัด
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="จังหวัด" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                รหัสไปรษณีย์
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="วัน/เดือน/ปี" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                ประเทศ
                                            </label>
                                            <select class="default-select2 form-control" placeholder="Select Package">
                                                <option value="ALL Status">
                                                    ---เลือกประเทศ---
                                                </option>
                                                <option value="1">
                                                    อเมริกา
                                                </option>
                                                <option value="2">
                                                    ญี่ปุ่น
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                E-MAIL
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="E-MAIL" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                เบอร์โทรศัพท์
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="เบอร์โทรศัพท์" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                ที่อยู่
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
                                                เขต
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="วัน/เดือน/ปี" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                จังหวัด
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="จังหวัด" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                รหัสไปรษณีย์
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="วัน/เดือน/ปี" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                ประเทศ
                                            </label>
                                            <select class="default-select2 form-control" placeholder="Select Package">
                                                <option value="ALL Status">
                                                    ---เลือกประเทศ---
                                                </option>
                                                <option value="1">
                                                    อเมริกา
                                                </option>
                                                <option value="2">
                                                    ญี่ปุ่น
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                E-MAIL
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="E-MAIL" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                เบอร์โทรศัพท์
                                            </label>
                                            <input class="form-control border-input" id="" name="telephone" placeholder="เบอร์โทรศัพท์" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>
                                                แนบไฟล์
                                            </label>
                                            <input class="form-control border-input" name="profile" placeholder="profile" type="file" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                           
                                            <input class="form-control border-input" name="profile" placeholder="profile" type="file" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                           
                                            <input class="form-control border-input" name="profile" placeholder="profile" type="file" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                           
                                            <input class="form-control border-input" name="profile" placeholder="profile" type="file" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                           
                                            <input class="form-control border-input" name="profile" placeholder="profile" type="file" value="">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </br>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    @if ()
        @if()
            @if()
            @endif
        @endif
    @endif


    <div class="col-md-6">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <div class="panel-body panel-form">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form">
                    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4">
                            <b><h4>Total register :</b></h4>
                        </label>
                        <div class="col-md-6 col-sm-6 text-right">
                            <b><h4>1</b></h4>
                        </div>
                    </div>
                    <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 text-right">
                            <b><h4>Discount:</b></h4>
                        </label>
                        <div class="col-md-6 col-sm-6 text-right">
                            <b><h4>0%</b></h4>
                        </div>
                    </div>
                    <div class="form-group">
         <label class="control-label col-md-4 col-sm-4">
                          <b><h4>  Total count :</b></h4>
                        </label>
                        <div class="col-sm-6 text-right">
                          <b><h4>  0%</b><h4>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->




<!-- begin row -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-md-6">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <div class="panel-body panel-form">
                    <div class="form-group">
                        <label class="col-md-6 col-sm-6">
                            <button class="btn btn-success" type="submit">
                                ADD GROUPS
                            </button>
                            <button class="btn btn-danger" type="submit">
                                REMOVE
                            </button>
                        </label>
                        <div class="form-group text-right">
                            <div class="col-md-6">
                                <button class="btn btn-success" type="button">
                                    PRINT
                                </button>
                                <button class="btn btn-primary start" type="button">
                                    REGISTER
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
