@extends('layout.template')

@section('css')
@stop

@section('body')
<div class="wrapper">


      <form action="{{ url('/user/create/') }}" method="post" enctype="multipart/form-data">
        @csrf
						
                            <div class="element" >
                              <div class="panel">
                                  <div class="panel-heading">
                                      <div class="panel-body">
                                  <div class="col-lg-3 col-md-3">
                                    <div class="author"><b>Member information</b><br><br>
                                        <img alt="" class="avatar border-white" width="200px" src="storage/picture/profile.png">
                                        </img>
                                    </div>
                                  </div>
                                  <div class="col-lg-9 col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    Member ID
                                                </label>
    <input class="form-control border-input" type="TEXT" name="member_num" placeholder="Member ID" type="text" value="">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <button type="search" class="btn btn-primary p-l-40 p-r-40">Search</button>


                 <button class="btn btn-white p-l-40 p-r-40" name="clear">Clear</button>
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    Register Date
                                                </label>
    <input class="form-control border-input" type="date" name="registerdate" placeholder="Register Date" type="text" value="">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    Member Group
                                                </label>
    <input class="form-control border-input" name="membergroup" placeholder="" type="text" value="">
                                                </input>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    Name
                                                </label>
                                                <input class="form-control border-input" name="name" placeholder="Name" type="text" value="">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    Surname
                                                </label>
                                                <input class="form-control border-input" name="surname" placeholder="English" type="text" value="">
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                 START PACKAGE
                                                </label>
                                                <input class="form-control border-input" name="startdate" type="date" value="">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    END PACKAGE
                                                </label>
                                                <input class="form-control border-input"  name="enddate" type="date" value="">
                                                </input>
                                            </div>
                                        </div>
                                    </div>



                                     <div class="row">
    <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    TEL.
                                                </label>
                                                 <input class="form-control border-input" id="" name="tel" placeholder="tel" type="text" value="">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                   E-mail
                                                </label>
                                                <input class="form-control border-input" id="" name="email" placeholder="E-mail" type="text" value="">
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    BIRTH DAY
                                                </label>
                                                <input class="form-control border-input" type="date" name="birthday" placeholder="วัน/เดือน/ปี" type="text" value="">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                   GENDER
                                                </label>
                                                <select class="default-select2 form-control" name="gender" placeholder="Select Package">
                                                    <option value="ALL Status">
                                                        ---SELECT GENDER---
                                                    </option>
                                                    <option value="1">
                                                        MALE
                                                    </option>
                                                    <option value="2">
                                                        FEMAL
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>
                                                    Groups
                                                </label>
                 <select class="default-select3 form-control" placeholder="Select Package" name="groups">
                                                    <option value="ALL Status">
                                                     -Select Groups-
                                                    </option>
                                                    <option value="A">
                                                       A
                                                    </option>
                                                    <option value="B">
                                                        B
                                                    </option>
                                                </select>
                                                </input>
                                            </div>
                                        </div>
    <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                   Package
    </label>
     <select type="text" class="form-control" name="package">
     <option value="" data-total="0">- Package -</option>
    <option value="4500" data-total="30" data-package="ind1m">ind 1 m. @4500</option>
    <option value="3375" data-total="30" data-package="ind1mys">ind y/s 1 m. @3375</option>
    <option value="10600" data-total="90" data-package="ind3m">ind 3 m. @10600</option>
    <option value="7950" data-total="90" data-package="ind3mys">ind y/s 3 m. @7950</option>
    <option value="16500" data-total="180" data-package="ind6m">ind 6 m. @16500</option>
    <option value="12375" data-total="180" data-package="ind6mys">ind y/s 6 m. @12375</option>
    <option value="23600" data-total="365" data-package="ind12m">ind 12 m. @23600</option>
    <option value="17700" data-total="365" data-package="ind12mys">ind y/s 12 m. @17700</option>
    <option value="23600" data-total="365" data-package="fim12m1">fimily 12 m. (1st) &nbsp;@23600</option>
    <option value="17700" data-total="365" data-package="fim12m2">fimily 12 m. (2nd) @17700</option>
    <option value="11800" data-total="365" data-package="fim12m3">fimily 12 m. (3rd) @11800</option>
    <option value="16500" data-total="180" data-package="fim6m1">fimily 6 m. (1st) &nbsp;@16500</option>
    <option value="12375" data-total="180" data-package="fim6m2">fimily 6 m. (2nd) @12375</option>
    <option value="8250" data-total="180" data-package="fim6m3">fimily 6 m. (3rd) @8250</option>
    <option value="10600" data-total="90" data-package="fim3m1">fimily 3 m. (1st) &nbsp;@10600</option>
    <option value="7950" data-total="90" data-package="fim3m2">fimily 3 m. (2nd) @7950</option>
    <option value="5300" data-total="90" data-package="fim3m3">fimily 3 m. (3rd) @5300</option>
    <option value="4500" data-total="30" data-package="fim1m1">fimily 1 m. (1st) &nbsp;@4500</option>
    <option value="3375" data-total="30" data-package="fim1m2">fimily 1 m. (2nd) @3375</option>
    <option value="2250" data-total="30" data-package="fim1m3">fimily 1 m. (3rd) @2250</option>
    <option value="19500" data-total="365" data-package="corp1024">Corporate member 10-24 @19500</option>
    <option value="15850" data-total="365" data-package="corp2549">Corporate member 25-49 @15850</option>
    <option value="13800" data-total="365" data-package="corp5099">Corporate member 50-99 @13800</option>
    <option value="12000" data-total="365" data-package="corp100">Corporate member 100+ @12000</option>
    <option value="0" data-total="365" data-package="corp">Corporate member </option>
    <option value="0" data-total="365" data-package="extfeecorp">Extra member fee for corportate</option>
    <option value="0" data-total="365" data-package="pg34">Member for Persons/Group 3-4</option>
    <option value="0" data-total="365" data-package="pg59">Member for Persons/Group 5-9</option>
    <option value="0" data-total="365" data-package="vip">Member vip</option></select>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>
                                                   Address
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
                                                    Country
                                                </label>
                                                 <select class="default-select2 form-control" placeholder="Select Country" name="country">
                                                    <option value="ALL Status">
                                                        ---Select Country---
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    Web site
                                                </label>
                                                <input class="form-control border-input" name="website" placeholder="Web site" type="text" value="">
                                                </input>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>
                                                    SPORT
                                                </label>
                                               <select class="default-select2 form-control" placeholder="Select Package" name="sport">
                                                    <option value="ALL Status">
                                                        ---SELECT SPORT---
                                                    </option>
                                                    <option value="1">
                                                       Rock Climbing
                                                    </option>
                                                    <option value="2">
                                                        Finess
                                                    </option>
                                                     <option value="3">
                                                        Class exercise
                                                    </option>
                                                    <option value="4">
                                                        Swimming
                                                    </option>
                                                    <option value="5">
                                                        Badminton
                                                    </option>

                                                     <option value="6">
                                                        Tennis
                                                    </option>
                                                     <option value="7">
                                                       Table Tennis
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>






                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>
                                                    แนบไฟล์
                                                </label>
<input class="form-control border-input" name="memberFile[]" placeholder="profile" type="file" value="">
                                            </input>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">

<input class="form-control border-input" name="memberFile[]" placeholder="profile" type="file" value="">
                                            </input>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">

<input class="form-control border-input" name="memberFile[]" placeholder="profile" type="file" value="">
                                            </input>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
<input class="form-control border-input" name="memberFile[]" placeholder="profile" type="file" value="">
                                            </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">

<input class="form-control border-input" name="memberFile[]" placeholder="profile" type="file" value="">
                                            </input>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  </div>

                                        </div>
                                      </div>
                                    </div>

                            </div>
                            <div class="results" ></div>
                          
  <!-- ************************************************************************************************************** -->
<div class="row">
    <div class="col-md-6">
    <!-- begin panel -->
      <div class="panel panel-inverse" data-sortable-id="form-validation-1">
        <div class="panel-body panel-form">
          <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form">
            <div class="form-group">
                <label class="control-label col-md-4 col-sm-4">
                    <b><h4>Total register :</h4></b>
                </label>
                <div class="col-md-8 col-sm-8 text-right">
                    <b><h4>1</h4></b>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 text-right">
                    <b><h4>Discount:</b></h4>
                </label>
                <div class="col-md-8 col-sm-8 text-right">
                    <b><h4>0%</b></h4>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4 col-sm-4">
                  <b><h4>  Total count :</h4></b>
                </label>
                <div class="col-md-8 col-sm-8 text-right">
                  <b><h4>  0%<h4></b>
                </div>
            </div>
          </div>
        </div>
    <!-- end panel -->
      </div>
<!-- end col-6 -->
      <div class="col-md-6">
          <!-- begin panel -->
          <div class="panel panel-inverse" data-sortable-id="form-validation-1">
              <div class="panel-body panel-form">
                  <div class="form-group">
                      <label class="col-md-6 col-sm-6">
                          <button id="add_group"class="btn btn-success" type="button">
                              ADD GROUPS
                          </button>


                          <button id="remove_group" class="btn btn-danger" type="button">
                              REMOVE
                          </button>
                      </label>
                      <div class="form-group text-right">
                          <div class="col-md-6">
                              <button class="btn btn-success" type="button">
                                  PRINT
                              </button>
                              <button class="btn btn-primary start" type="submit" value="Save">
                                  REGISTER
                              </button>
</form>

                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<script>
    $( document ).ready(function() {
        var x = 1;
        $('#num').html(x);

    $('.wrapper').on('click', '#remove_group', function() {
      x--;
      $('#num').html(x);
      $('#remove_group').closest('.wrapper').find('.element').not(':first').last().remove();
    });
    $('.wrapper').on('click', '#add_group', function() {
      if(x == 6)
      {
        alert("สามารถเพิ่มข้อมูลสูงสุดได้เพียง 6 เท่านั้น")
      }
      else
      {
          x++;
          $('#num').html(x);
          $('#add_group').closest('.wrapper').find('.element').first().clone().appendTo('.results');
      }
      });
    });
    </script>



@stop


@section('js')


@stop
