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
    <div class="col-md-12">
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
                                {!! $trhtml !!}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="result-modaledit"></div>
@stop

@section('js')
<script type="text/javascript">

    // รับค่าตอนแก้
    $(document).on('click', '.td-have', function (e) {
        // alert('5555');
        var sportid = $(this).attr('data-sportid');
        var cort = $(e.target).attr('id-cort');
        var time = $(this).attr('data-time');
        var date = $(this).parents('table').attr('data-date');
        var bookid = $(this).attr('data-bookid');
        // console.log(sportid);
        // alert(cort + '\n' + time + '\n' + date + '\n' + sportid + '\n' + bookid);
        modalEdit(cort, time, date, sportid, bookid);
    });

    // ajax เรียก model ตอนแก้ไข
    function modalEdit(id, time, date, sportid, bookid) {
        // alert(bookid); 
        $.ajax({
            url: "{{url('court_info')}}/",
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
