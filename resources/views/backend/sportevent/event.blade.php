@extends('layout.template')

@section('css')

<link href="{{asset('assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}"
    rel="stylesheet" />
<link href="{{asset('assets/plugins/ionRangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet')}}" />
<link href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/jquery-tag-it/css/jquery.tagit.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/password-indicator/css/password-indicator.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<style>
    .table a {
        display: block;
        text-decoration: none;
    }

    .bg-blue {
        background-color: blue;
        color: white !important;
    }

    .bg-red {
        background-color: red;
        color: white !important;
    }

    .bg-red-2 {
        background-color: red;
        color: white !important;
        opacity: 0.4;
    }

    .text-mid {
        vertical-align: middle !important;
    }

</style>
@stop

@section('body')
<div class="row">
    <div class="col-md-9">
        <div class="panel">
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>
                    </div>
                    <div class="table-responsive gradeX">
                        <h3 id="dateshownow">{{date("Y-m-d")}}</h3>
                        <table class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th class="bg-blue text-center">
                                        Time 
                                    </th>
                                    @foreach ($cort as $item)
                                    <th class="bg-blue text-center cort_id">
                                        {{$item->cort_name}}
                                    </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody id="trhtml">
                                {{-- @foreach ($trhtml as $item) --}}
                                {!! $trhtml !!}
                                {{-- @endforeach --}}
                                {{-- @for ($i = 0; $i < 17; $i++)
                                <tr data-time="{{$i}}" class="tr-box" data-sportid="{{$id}}">
                                <td class="text-center text-mid bg-red {{$i % 2 == 0 ? 'bg-red' : 'bg-red2'}}">
                                    {{ '0'. 6+$i .':00' }} - {{ '0'. 7+$i .':00' }}
                                </td>
                                {!!$apendtd!!}
                                </tr>
                                @endfor --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel">
            <div class="panel-body panel-form">
                <div class="form-group">
                    <div class="col-md-12">
                    <input type="hidden" name="cort_id" id="cort_id" value="{{$id}}">
                        <div id="datepicker-inline"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div id="today"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="result-modal"></div>
<div id="result-modaledit"></div>
@stop

@section('js')
<script type="text/javascript">
    // รับค่าตอนจองครั้งแรก
    $(document).on('click', '.td-box', function (e) {
        var sportid = $(this).attr('data-sportid');
        var cort = $(e.target).attr('id-cort');
        var time = $(this).attr('data-time');
        var date = $(this).attr('data-date');
        // alert(cort + '\n' + time + '\n' + date + '\n' + sportid);
        modalCreate(cort, time, date, sportid);
    });

    // รับค่าตอนแก้
    $(document).on('click', '.td-have', function (e) {
        // alert('5555');
        var sportid = $(this).attr('data-sportid');
        var cort = $(e.target).attr('id-cort');
        var time = $(this).attr('data-time');
        var date = $(this).parents('table').attr('data-date');
        var bookid = $(this).attr('data-bookid');
        // alert(cort + '\n' + time + '\n' + date + '\n' + sportid + '\n' + bookid);
        modalEdit(cort, time, date, sportid, bookid);
    });

    // ajax เรียก model ตอนจอง
    function modalCreate(id, time, date, sportid) {
        $.ajax({
            url: "{{url('create_event')}}/",
            type: 'GET',
            data: {
                id: id,
                time: time,
                date: date,
                sportid: sportid,
            },
            success: function (data) {
                $('#result-modal').html(data);
                $('#modal-created').modal('show');
            }
        })
    }

    // ajax เรียก model ตอนแก้ไข
    function modalEdit(id, time, date, sportid, bookid) {
        $.ajax({
            url: "{{url('create_edit')}}/",
            type: 'GET',
            data: {
                id: id,
                time: time,
                date: date,
                sportid: sportid,
                bookid: bookid,
            },
            success: function (data) {
                $('#result-modaledit').html(data);
                $('#modal-edit').modal('show');
            }
        })
    }

    // ajax ส่งค่าวันที่
    function selectdate(datenow) {
        var cort_id = $('#cort_id').val();
        $.ajax({
            url: "{{url('selectdate')}}/",
            type: 'GET',
            data: {
                id: cort_id,
                datenow: datenow,
            },
            success: function (data) {
                $('#dateshownow').html(data.date);
                $('#trhtml').html(data.trhtml);
                $('#result-modaledit').html(data);
                $('#modal-edit').modal('show');
            }
        })
    }

    // showhide button 1
    $(document).on( "click", ".membertype_1", function() {
        if ($("#membercard_1").is(":checked")) {
                $("#divmember_1").show(100);
            } else {
                $("#divmember_1").hide(100);
            }
    });

    // showhide button 2
    $(document).on( "click", ".membertype_2", function() {
        if ($("#membercard_2").is(":checked")) {
                $("#divmember_2").show(100);
            } else {
                $("#divmember_2").hide(100);
            }
    });

    // showhide button 3
    $(document).on( "click", ".membertype_3", function() {
        if ($("#membercard_3").is(":checked")) {
                $("#divmember_3").show(100);
            } else {
                $("#divmember_3").hide(100);
            }
    });

    // showhide button 4
    $(document).on( "click", ".membertype_4", function() {
        if ($("#membercard_4").is(":checked")) {
                $("#divmember_4").show(100);
            } else {
                $("#divmember_4").hide(100);
            }
    });

    // ค้นหาไอดี
    $(document).on( "keyup", ".memberid", function() {
        var id1 = $('#memberid_1').val();
        var id2 = $('#memberid_2').val();
        var id3 = $('#memberid_3').val();
        var id4 = $('#memberid_4').val();

        // เรียก function
        searchmemberid(id1, id2, id3, id4);
    });

    function searchmemberid(id1, id2, id3, id4) {
        $.ajax({
            url:"{{url('showmember')}}",
            type:"get",
            data: {
                id1: id1,
                id2: id2,
                id3: id3,
                id4: id4,
                },
        }).done(function(data){
            if (data.member1 != null) {
                $("#booking_name_1").val(data.member1['name'] + ' ' + data.member1['surname']); // ชื่อคนที่ 1 ที่ถูกส่งมา
            }
            if (data.member2 != null) {
                $("#booking_name_2").val(data.member2['name'] + ' ' + data.member2['surname']); // ชื่อคนที่ 2 ที่ถูกส่งมา
            }
            if (data.member3 != null) {
                $("#booking_name_3").val(data.member3['name'] + ' ' + data.member3['surname']); // ชื่อคนที่ 3 ที่ถูกส่งมา
            }
            if (data.member4 != null) {
                $("#booking_name_4").val(data.member4['name'] + ' ' + data.member4['surname']); // ชื่อคนที่ 4 ที่ถูกส่งมา
            }
        });
    }

    // ค้นหา ID คลาส
    $(document).on("keyup", ".searchclass", function() {
        var class1 = $('#classid_1').val();
        var class2 = $('#classid_2').val();
        var class3 = $('#classid_3').val();
        var class4 = $('#classid_4').val();

        // เรียก function
        searchclassid(class1, class2, class3, class4);
    });

    function searchclassid(class1, class2, class3, class4) {
        
        $.ajax({
            url: '{{url('searchclass')}}',
            type: 'GET',
            data: {
                class1: class1,
                class2: class2,
                class3: class3,
                class4: class4,
            },
            }).done(function (data) {
                if (data.html1 != null) {
                    $("#class_name_1").html(data.html1); // ชื่อ class ของคนที่ 1 ที่ถูกส่งมา
                }
                if (data.html2 != null) {
                    $("#class_name_2").html(data.html2); // ชื่อ class ของคนที่ 2 ที่ถูกส่งมา
                }
                if (data.html3 != null) {
                    $("#class_name_3").html(data.html3); // ชื่อ class ของคนที่ 3 ที่ถูกส่งมา
                }
                if (data.html4 != null) {
                    $("#class_name_4").html(data.html4); // ชื่อ class ของคนที่ 4 ที่ถูกส่งมา
                }
            });
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script>
    $("#datepicker-inline").datepicker();
    $('#datepicker-inline').datepicker("setDate",  "today");
    $('#datepicker-inline').datepicker().on('changeDate', function (ev) {
        var datenow = $(this).datepicker("getDate");
        var dateString = moment(datenow).format('YYYY-MM-DD');
        
        return this.function(selectdate(dateString));
    });

</script>
@stop
