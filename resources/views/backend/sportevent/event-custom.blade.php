<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Color Admin | Page without Sidebar</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{asset('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style-responsive.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/theme/default.css')}}" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>
    <!-- ================== END BASE JS ================== -->

    <link
        href="{{asset('assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}"
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

        a.disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
</head>

<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-without-sidebar page-header-fixed">
        <!-- begin #header -->
        <div id="header" class="header navbar navbar-default navbar-fixed-top">
            <!-- begin container-fluid -->
            <div class="container-fluid">
                <!-- begin mobile sidebar expand / collapse button -->
                <div class="navbar-header">
                    <a href="#" class="navbar-brand"><span class="navbar-logo"></span> Racquetclub</a>
                </div>
                <!-- end mobile sidebar expand / collapse button -->
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end #header -->

        <!-- begin #content -->
        <div id="content" class="content">

            <!-- begin page-header -->
            <h1 class="page-header">FACILITY RESERVATIONS</h1>
            <!-- end page-header -->

            <div class="panel panel-inverse">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="form-group">
                            <div class="row">
                                @foreach ($sport as $item)
                                <a href="{{url('schedule-cus', $item->as_id)}}" class="btn {{ (in_array($item->as_id, explode('/',URL::current())) ? 'btn-success disabled' : 'btn-primary') }}">{{$item->as_name}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="table-responsive gradeX">
                            <h3>{{$select_sport->as_name}}</h3>
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
            <div id="result-modaledit"></div>
        </div>
        <!-- end #content -->
        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{asset('assets/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
    <script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-cookie/jquery.cookie.js')}}"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{asset('assets/js/apps.min.js')}}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
        $(document).ready(function () {
            App.init();
        });

    </script>

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
        $('#datepicker-inline').datepicker("setDate", "today");
        $('#datepicker-inline').datepicker().on('changeDate', function (ev) {
            var datenow = $(this).datepicker("getDate");
            var dateString = moment(datenow).format('YYYY-MM-DD');
            return this.function(selectdate(dateString));
        });

    </script>
</body>

</html>
