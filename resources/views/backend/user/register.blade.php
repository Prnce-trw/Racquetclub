@extends('layout.template')

@section('css')
<style type="text/css">
    .boxContainer {
        display: table;
        background-color: gray;
        width: 195px;
        height: 260px;
    }
    .box {
        display: table-cell;
        text-align: center;
        vertical-align: bottom;
    }
</style>
@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <h3>Member information</h3>
    </div>
    <!---=======================----- START div search ------===================---------->
    <div class="panel-group" id="accordion">
    </div>
    <!---=======================----- END div search ------===================---------->
    <form action="{{ url('manage-user') }}" enctype="multipart/form-data" method="post" id="form">
        @csrf
        <div class="panel-body" id="panel-body1">
            <center><h1>1</h1></center>
            <div class="col-md-3 boxContainer" id="div-image1">
                <input type="file" name="imgUser[1]" class="input-image" div-id="div-image1" id="imgUser1" style="display: none;">
                <div class="box">
                    <button class="btn" type="button" onclick="document.getElementById('imgUser1').click()"><i class="ion-camera "></i></button>
                    <input type="hidden" name="imgBase64[1]" value="">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Member ID</h5></label>
                    <div class="col-md-4">
                        <input class="form-control" name="member_num[1]" type="text" id="memberID" />
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary p-l-40 p-r-40" type="button" onclick="searchMember(1)">
                            Search
                        </button>
                        <button class="btn btn-white p-l-40 p-r-40" type="button" onclick="clearMember(1)">
                            Clear
                        </button>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Register Date</h5></label>
                    <div class="col-md-4">
                        <input class="form-control border-input" name="registerdate[1]" placeholder="Register Date" type="date" value="{{ date("Y-m-d") }}" required readonly/>
                    </div>
                    <label class="col-md-2 control-label"><h5>Member Group</h5></label>
                    <div class="col-md-4">
                        <input class="form-control" id="membergroup" name="membergroup[1]" type="text" value="" required/>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Name</h5></label>
                    <div class="col-md-4">
                        <input class="form-control border-input" name="name[1]" placeholder="Name" type="text" value="" required/>
                    </div>
                    <label class="col-md-2 control-label"><h5>Last name</h5></label>
                    <div class="col-md-4">
                        <input class="form-control border-input" name="surname[1]" placeholder="Surname" type="text" value="" required/>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Nationality</h5></label>
                    <div class="col-md-4">
                        <input class="form-control border-input" name="nation[1]" placeholder="Nationality" type="text" value="" required/>
                    </div>
                    <label class="col-md-2 control-label"><h5>BIRTH DAY</h5></label>
                    <div class="col-md-4">
                        <input class="form-control border-input birthday" id="birthday" name="birthday[1]" placeholder="วัน/เดือน/ปี" type="date" value="" required>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Occupation</h5></label>
                    <div class="col-md-4">
                        <input class="form-control border-input" name="job[1]" placeholder="Occupation" type="text" value="" />
                    </div>
                    <label class="col-md-2 control-label"><h5>GENDER</h5></label>
                    <div class="col-md-4">
                        <select class="default-select2 form-control" name="gender[1]" placeholder="Select Package" required>
                            <option value="">
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
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Tel.</h5></label>
                    <div class="col-md-4">
                        <input class="form-control border-input" id="" name="tel[1]" placeholder="tel" type="text" value="" required>
                    </div>
                    <label class="col-md-2 control-label"><h5>E-mail</h5></label>
                    <div class="col-md-4">
                        <input class="form-control border-input" id="" name="email[1]" placeholder="E-mail" type="text" value="" required>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Emergency Tel</h5></label>
                    <div class="col-md-4">
                        <input class="form-control border-input" id="" name="Etel[1]" placeholder="tel" type="text" value="">
                    </div>
                    <label class="col-md-2 control-label"><h5>Emergency Name</h5></label>
                    <div class="col-md-4">
                        <input class="form-control border-input" id="" name="Ename[1]" placeholder="Name" type="text" value="">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Address</h5></label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="4" name="address[1]" placeholder="ที่อยู่" required></textarea>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Package</h5></label>
                    <div class="col-md-4">
                        <select class="form-control package" name="package[1]" type="text" id="package" required>
                            <option value="">
                                - Package -
                            </option>
                            @foreach($packages as $key => $package)
                            <option value="{{ $package->id }}" data-day="{{ $package->package_numday }}" data-price="{{ $package->package_price }}" >
                                {{ $package->package_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>START PACKAGE</h5></label>
                    <div class="col-md-4">
                        <input class="form-control border-input startdate" id="startPackage" name="startdate[1]" type="date" value="{{ date("Y-m-d") }}" required/>
                    </div>
                    <label class="col-md-2 control-label"><h5>END PACKAGE</h5></label>
                    <div class="col-md-4">
                        <input readonly class="form-control border-input" id="endpackage" name="enddate[1]" type="date" value="" required/>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>SPORT</h5></label>
                    <div class="form-group col-md-10">
                        @foreach($sports as $sport)
                        <div class="col-md-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="{{ $sport->id_sport }}" name="chSport[1][]">
                                {{ $sport->name_sport }}
                            </label>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Training goals</h5></label>
                    <div class="form-group col-md-10">
                        <div class="col-md-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="1" name="chGoal[1][]">
                                Weight Loss
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="2" name="chGoal[1][]">
                                Weight Gain
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="3" name="chGoal[1][]">
                                Body Building
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="4" name="chGoal[1][]">
                                Rehab
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="5" name="chGoal[1][]">
                                Stress relief
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-label"><h5>How did you hear about us?</h5></label>
                    <div class="col-md-9">
                        <div class="form-group col-md-10">
                            <div class="col-md-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="1" name="website[1][]">
                                    Website
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="2" name="website[1][]">
                                    Facebook
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="3" name="website[1][]">
                                    Youtube
                                </label>
                            </div>
                            <div class="col-md-12">
                                <label class="checkbox-inline" style="padding-bottom: 5px;">
                                    <input type="checkbox" class="check-friend" value="4" name="website[1][]">
                                    Friend
                                </label>
                                <input class="form-control border-input" name="friend[1]" placeholder="Note Friend" type="text" value="" disabled>
                            </div>
                            <div class="col-md-12">
                                <label class="checkbox-inline" style="padding-bottom: 5px;">
                                    <input type="checkbox" value="5" class="check-other" name="website[1][]">
                                    Other
                                </label>
                                <input class="form-control border-input" name="other[1]" placeholder="Note Other" type="text" value="" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Upload Files</h5></label>
                    <div class="col-md-4">
                        <input type="file" name="files[1]" class="fileupload" multiple="multiple">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Discount</h5></label>
                    <h4 class="col-md-2">0 Years</h4>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="number" class="form-control" name="discountcon[1]" readonly value="0">
                            <span class="input-group-addon">
                                %
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"><h5>Discount other</h5></label>
                    <div class="col-md-2">

                        <div class="input-group">
                            <input type="number" class="form-control discount" name="discount[1]">
                            <span class="input-group-addon">
                                % <input type="radio" class="radio-discount" name="typeDis[1]"value="2" checked>
                            </span>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="number" class="form-control money-discount" name="moneydiscount[1]" disabled>
                            <span class="input-group-addon">
                                ฿ <input type="radio" class="radio-discount" name="typeDis[1]"value="3">
                            </span>
                        </div>
                    </div>
                    <label class="col-md-1 control-label"><h5>Note</h5></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="note[1]">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-1 control-label"><h5>Total</h5></label>
                    <label class="col-md-2 control-label"><h5 style="color: red;" id="money1" class="money-pay"></h5></label>
                </div>
            </div>
        </div>
        <hr>
    </form>
</div>

<div class="col-md-6">
    <div class="panel">
        <div class="panel-body panel-form">
            <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form">
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4">
                        <b>
                            <h4>
                                Total register
                            </h4>
                        </b>
                    </label>
                    <div class="col-md-6 col-sm-6 text-right">
                        <b>
                            <h4 id="totalregister">
                                1
                            </h4>
                        </b>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4 text-right">
                        <b>
                            <h4>
                                Discount
                            </h4>
                        </b>
                    </label>
                    <div class="col-md-6 col-sm-6 text-right">
                        <b>
                            <h4>
                                0%
                            </h4>
                        </b>
                    </div>
                </div> --}}
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4">
                        <b>
                            <h4>
                                Total pay
                            </h4>
                        </b>
                    </label>
                    <div class="col-sm-6 text-right">
                        <b>
                            <h4 id="totalPay">
                                0
                            </h4>
                        </b>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<!-- end panel -->
<!-- end col-6 -->
<!-- begin row -->
<div class="row">
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-body panel-form">
                <div class="form-group">
                    <label class="col-md-6 col-sm-6">
                        <button class="btn btn-success" type="button" id="addgroup">
                            ADD GROUPS
                        </button>
                        <button class="btn btn-danger" type="button" id="removegroup">
                            REMOVE
                        </button>
                    </label>
                    <div class="form-group text-right">
                        <div class="col-md-6">
                            <button class="btn btn-success" type="button" onclick="">
                                PRINT
                            </button>
                            <button class="btn btn-primary start" type="submit" form="form" value="Save">
                                REGISTER
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===================== Modal Crop ========================--->
<div id="cropImageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload & Crop Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 text-center">
                        <div id="image_demo" style="width:350px; margin-top:30px"></div>
                    </div>
                    <div class="col-md-4" style="padding-top:30px;">
                        <button class="btn btn-success crop_image" data-id="">Crop & Upload Image</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
@stop

@section('js')

<script type="text/javascript">
    var i = 1;

    var memberone = 'one'+{{ time() }};
    var membergroup = 'fam'+{{ time() }};
    $('.fileupload').filer({
        addMore: true,
        showThumbs: true
    });
    member_num(i);

    function calpayone (id) {
        var discount = $('input[name="discount'+id+'"').val();

        if (discount==''||discount==null) {

            discount = 0;
        }
        var pay = $('select[name="package'+id+'"').find(':selected').attr('data-price');
        var totalone = parseInt(pay)-(parseInt(pay)*(parseInt(discount)/100));

        $('#money'+id.substring(1,id.length-1)).html(totalone);

    }
    function calpaymoney (id) {
        var discount = $('input[name="moneydiscount'+id).val();

        if (discount==''||discount==null) {

            discount = 0;
        }
        var pay = $('select[name="package'+id+'"').find(':selected').attr('data-price');
        var totalone = parseInt(pay)-parseInt(discount);

        $('#money'+id.substring(1,id.length-1)).html(totalone);

    }
    function totalPay () {
        var x = $('.money-pay');
        var total = 0;
        x.each(function(index, el) {
            if (this.innerHTML!=null&&this.innerHTML!='') {
                total += parseInt(this.innerHTML)
            }
            total += 0;
            console.log(this.innerHTML);
        });
        $('#totalPay').html(total);
    }
    function searchMember (grade) {
        var memberID = $('input[name="member_num['+grade+']"').val();
        if (memberID!==null&&memberID!=='') {
            $.ajax({
                type: 'GET',
                url: '{{ url('search-div') }}'+'/'+memberID,
                data: {
                    'grade': grade
                },

                success: function (data) {
                    if (data!=0) {
                        $('#panel-body'+grade).html(data);
                        member_num(i);
                        totalPay();
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: 'Cannot Search',
                            text: 'ต้องยังไม่เป็นสมาชิกกลุ่มใดดทั้งนั้น Please enter Member ID again.',

                        })
                        clearMember(grade);

                    }

                },
                error: function () {
                    Swal.fire({
                        type: 'error',
                        title: 'Cannot Search',
                        text: 'Please enter Member ID again.',

                    })
                    clearMember(grade);
                }
            });
        }else{
            Swal.fire({
                type: 'error',
                title: 'Cannot Search',
                text: 'Please enter Member ID again.',

            })
        }
    }
    function clearMember(grade) {
        // alert(grade)
        $.ajax({
            type: 'GET',
            url: '{{ url('search-div') }}'+'/'+'0',
            data: {
                'grade': grade
            },

            success: function (data) {
                $('#panel-body'+grade).html(data);
                member_num(i);
                totalPay();
            },
            error: function () {
                Swal.fire({
                    type: 'error',
                    title: 'Cannot Clear',
                    text: 'Please enter Member ID again.',

                })
            }
        });
    }
    function member_num (i) {
        var groupNum = $('#membergroup').val();
        if (i==1&&groupNum=='') {
            $('#membergroup').val(memberone);
        }else if(i>1){
            $('#membergroup').val(membergroup);
            $('.group-num').val(membergroup);
        }
    }
    function appendform (id) {
        $.ajax({
            type: 'GET',
            url: '{{ url('append-div') }}'+'/'+id,
            data: {
                'id': id
            },

            success: function (data) {
                $('#form').append(data);
                $('#totalregister').html(i);
                member_num(i);
            }
        });
    }

    function selectPackage (date,inputName) {
        var birthday = +new Date(date);
        var age = ~~((Date.now() - birthday) / (31557600000));
        $.ajax({
            type: 'GET',
            url: '{{ url('select-package') }}',
            data: {
                'age': age
            },
            success: function (data) {
                $('select[name="package'+inputName+'"').html(data);

            }
        });
    }
    function endpackage (day,sday,name) {
        var date = new Date(sday);
        date.setDate(date.getDate(sday) + parseInt(day));
        var dateString = date.toISOString().split('T')[0];
        $('input[name="enddate'+name+'"').val(dateString);
    }
    $(document).on('change','.birthday', function(){
        var dateBirth = $(this).val();
        var input = $(this).attr('name').substring(8);
        // alert(input);
        selectPackage(dateBirth,input);
    });
    $(document).on('change','.package', function(){
        var day = $(this).find(':selected').attr('data-day');
        var name = $(this).attr('name').substring(7);
        var sday = $('input[name="startdate'+name+'"').val();
        endpackage(day,sday,name);
        calpayone(name);
        totalPay();
    });
    $(document).on('change','.startdate', function(){
        var sday = $(this).val();
        var name = $(this).attr('name').substring(9);
        var day = $('select[name="package'+name+'"').find(':selected').attr('data-day');
        endpackage(day,sday,name);
    });
    $(document).on('change','.discount', function(){
        var name = $(this).attr('name').substring(8);
        calpayone(name);
        totalPay();
    });
    $(document).on('change','.money-discount', function(){
        var name = $(this).attr('name').substring(13);
        calpaymoney(name);
        totalPay();
    });
    $(document).on('change','.check-other', function(){
        var grade = $(this).attr('name').substring(8,9);
        if ($(this).is(':checked')) {
            $('input[name="other['+grade+']"').removeAttr('disabled');
        }else{
            $('input[name="other['+grade+']"').attr('disabled','disabled');
        }
    });
    $(document).on('change','.check-friend', function(){
        var grade = $(this).attr('name').substring(8,9);
        if ($(this).is(':checked')) {
            $('input[name="friend['+grade+']"').removeAttr('disabled');
        }else{
            $('input[name="friend['+grade+']"').attr('disabled','disabled');
        }
    });
    $(document).on('change','.radio-discount', function(){
        var grade = $(this).attr('name').substring(7);
        var type = $(this).val();

        if (type==2) {
            $('input[name="discount'+grade).removeAttr('disabled');
            $('input[name="moneydiscount'+grade).attr('disabled','disabled');
            calpayone(grade);
        }else{
            $('input[name="discount'+grade).attr('disabled','disabled');
            $('input[name="moneydiscount'+grade).removeAttr('disabled','disabled');
            calpaymoney(grade);
        }
        totalPay();
    });

    $('#addgroup').click(function() {
        if (i<6) {
            i = i+1;
            appendform(i);

        }else{
            Swal.fire({
                type: 'error',
                title: 'Cannot be added',
                text: 'Data is over!',

            })
        }
        totalPay();
    });
    $('#removegroup').click(function() {
        if (i!=1) {
            $('#panel-body'+i).remove();
            $('#hr'+i).remove();
            i = i-1;
            $('#totalregister').html(i);
            member_num(i);
        }
        totalPay();

    });
    // Crop image

    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport:
        {
          width:195,
          height:260,
          type:'square' //circle
      },
      boundary:{
          width:300,
          height:300
      }
  });
    $(document).on('change','.input-image', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
          $image_crop.croppie('bind', {
            url: event.target.result
        }).then(function(){
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    var strID = $(this).attr('div-id')
    // alert(strID);
    $('#cropImageModal').modal('show');
    $('.crop_image').attr('data-id',strID);
});

    $('.crop_image').click(function(event){
        var divID = $(this).attr('data-id');
        var idgrade = $(this).attr('data-id').substring(9);
        // alert(idgrade);
        $image_crop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
      }).then(function(response){

          $('#cropImageModal').modal('hide');
          $('#'+divID).css('background-image', 'url("'+response+'")');
          $('input[name="imgBase64['+idgrade+']"').val(response);

      })
  });

</script>
@stop
