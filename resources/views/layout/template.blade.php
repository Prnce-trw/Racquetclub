<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>RacquestClub</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ asset('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/theme/default.css') }}" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <link href="{{ asset('assets/plugins/bootstrap3-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap3-editable/inputs-ext/address/address.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap3-editable/inputs-ext/typeaheadjs/lib/typeahead.css') }}"
    rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css') }}" rel="stylesheet" />
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{ asset('assets/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- =================== DATA TABLE =================-->
    <link href="{{ asset('assets/plugins/DataTables/css/data-table.css') }}" rel="stylesheet" />
    <!-- =================== DATA TABLE =================-->

    <!--==================== Edit table =================-->
    <link href="{{ asset('assets/plugins/bootstrap3-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap3-editable/inputs-ext/address/address.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap3-editable/inputs-ext/typeaheadjs/lib/typeahead.css') }}"
    rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css') }}" rel="stylesheet" />
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{ asset('assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== File upload ================== -->
    <link href="{{ asset('fileupload/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('fileupload/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css"
    rel="stylesheet" />
    <!-- ================== END FILE UPLOAD ================== -->

    <!---================ Crop Image -------==================-->
    <link href="{{ asset('assets/plugins/crop/croppie.css') }}" type="text/css" rel="stylesheet" />

    @yield('css')
    <style type="text/css">
        .btn-green{
            background-color: green;
            color: white;
        }
    </style>
</head>

<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <div id="header" class="header navbar navbar-default navbar-fixed-top">
            <!-- begin container-fluid -->
            <div class="container-fluid">
                <!-- begin mobile sidebar expand / collapse button -->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> Racquetclub</a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- end mobile sidebar expand / collapse button -->

                <!-- begin header navigation right -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown navbar-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="assets/img/user-13.jpg" alt="" />
                            <span class="hidden-xs">Adam Schwartz</span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li class="arrow"></li>
                            <li><a href="javascript:;">Edit Profile</a></li>
                            <!--<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
                            <li><a href="javascript:;">Calendar</a></li>
                            <li><a href="javascript:;">Setting</a></li>
                            <li class="divider"></li>-->
                            <li><a href="javascript:$('#flogout').submit();">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- end header navigation right -->
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end #header -->

        <!-- begin #sidebar -->
        <div id="sidebar" class="sidebar">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar user -->
                <ul class="nav">
                    <li class="nav-profile">
                        <div class="image">
                            <a href="javascript:;"><img src="{{ asset('images/user-icon.png') }}" alt="" /></a>
                        </div>
                        <div class="info">
                            Sean Ngu
                            <small>Front end developer</small>
                        </div>
                    </li>
                </ul>
                <!-- end sidebar user -->
                <!-- begin sidebar nav -->
                <ul class="nav">
                    <li class="nav-header">Navigation</li>

                    <!--<li class="has-sub">
                        <a href="javascript:;">
                            <span class="badge pull-right">10</span>
                            <i class="fa fa-inbox"></i>
                            <span>Manage</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="email_inbox.html">Admin</a></li>
                            <li><a href="email_inbox_v2.html">Admin Permission</a></li>
                            <li><a href="email_compose.html">Teacher</a></li>
                            <li><a href="email_detail.html">Detail</a></li>
                        </ul>
                    </li>-->
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <i class="fa fa-2x fa-users"></i>
                            <span>Manage</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{!! url('manage-admin') !!}">Admin</a></li>
                            <li><a href="{!! url('backend/teacher') !!}">Teacher</a></li>

                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="{!! url('manage-card') !!}">

                            <i class="fa fa-2x fa-money"></i>
                            <span>Card RFID</span>
                        </a>
                    </li>
                    <li class="has-sub {!! (in_array('manage-user',explode('/',URL::current())) ? 'active' : '')  !!}">
                        <a href="javascript:;">
                         <b class="caret pull-right"></b>
                         <i class="fa fa-2x fa-users"></i>
                         <span>Member</span>
                     </a>
                     <ul class="sub-menu">
                        <li><a href="{!! url('manage-user/') !!}">Member</a></li>
                        <li><a href="{!! url('/manage-user/create') !!}">Create Member</a></li>
                        <li><a href="{!! url('daypass') !!}">Daypass</a></li>

                    </ul>
                    <li class="has-sub">
                        <a href="{!! url('manage-sport') !!}">

                            <i class="fa fa-2x fa-money"></i>
                            <span>Manage Sport</span>
                        </a>

                    </li>
                    <li class="has-sub">
                        <a href="{!! url('backend/manageclass') !!}">
                            <i class="fa fa-2x fa-money"></i>
                            <span>Manage Class</span>
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="{!! url('backend/managepackage') !!}">
                            <i class="fa fa-file-o"></i>
                            <span>
                                Manage Package
                            </span>
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="{!! url('backend/report') !!}">
                            <i class="fa fa-file-o"></i>
                            <span>
                                Report
                            </span>
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <i class="fa fa-2x fa-file-text-o"></i>
                            <span>Repair</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{!! url('managerepair') !!}">manage repair</a></li>

                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <i class="fa fa-2x fa-file-text-o"></i>
                            <span>Reservetions</span>
                        </a>
                        @php
                        $sport = App\Allsport::all();
                        @endphp
                        <ul class="sub-menu">
                          <li><a href="{{url('searchby')}}">Search</a></li>
                          <li><a href="{{url('createsport')}}">Create Sports</a></li>
                          <li class="has-sub">
                             <a href="javascript:;"><b class="caret pull-right"></b>All Sport</a>
                             <ul class="sub-menu">
                                @foreach ($sport as $item)
                                <li><a href="{{url('schedule', $item->as_id)}}">{{$item->as_name}}</a></li>
                                @endforeach
                                {{-- {{url('',{{$item->as_id}})}} --}}
                            </ul>
                        </li>
                        <li class="has-sub">
                         <a href="javascript:;"><b class="caret pull-right"></b>All Sport (Customer)</a>
                         <ul class="sub-menu">
                            @foreach ($sport as $item)
                            <li><a href="{{url('schedule-cus', $item->as_id)}}" target="_blank">{{$item->as_name}}</a></li>
                            @endforeach
                            {{-- {{url('',{{$item->as_id}})}} --}}
                        </ul>
                    </li>
                </ul>
            </li>
                    <!--<li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <i class="fa fa-2x fa-wrench"></i>
                            <span>แจ้งซ่อม</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{!! url('index') !!}">แจ้งซ่อม</a></li>
                            <li><a href="{!! url('worksheet') !!}">จ่ายงานซ่อม</a></li>
                            <li><a href="{!! url('manageworksheet') !!}">บันทึกการซ่อม</a></li>
                            <li><a href="{!! url('viewworksheet') !!}">ดูงานซ่อมทั้งหมด</a></li>
                            <li><a href="{!! url('viewworksheet') !!}">Report</a></li>
                        </ul>
                    </li>-->




                    <li class="has-sub">
                        <a href="javascript:;">

                            <i class="fa fa-2x fa-sign-out"></i>
                            <span>Sign Out</span>
                        </a>

                        <!-- begin sidebar minify button -->
                        <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                            class="fa fa-angle-double-left"></i></a></li>
                            <!-- end sidebar minify button -->
                        </ul>
                        <!-- end sidebar nav -->
                    </div>
                    <!-- end sidebar scrollbar -->
                </div>
                <div class="sidebar-bg"></div>
                <!-- end #sidebar -->

                <!-- begin #content -->
                <div id="content" class="content">
                    @yield('body')
                </div>
                <!-- end #content -->

                <!-- begin theme-panel -->
                <div class="theme-panel">
                    <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i
                        class="fa fa-cog"></i></a>
                        <div class="theme-panel-content">
                            <h5 class="m-t-0">Color Theme</h5>
                            <ul class="theme-list clearfix">
                                <li class="active"><a href="javascript:;" class="bg-green" data-theme="default"
                                    data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body"
                                    data-title="Default">&nbsp;</a></li>
                                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector"
                                        data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a>
                                    </li>
                                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector"
                                        data-toggle="tooltip" data-trigger="hover" data-container="body"
                                        data-title="Blue">&nbsp;</a></li>
                                        <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector"
                                            data-toggle="tooltip" data-trigger="hover" data-container="body"
                                            data-title="Purple">&nbsp;</a></li>
                                            <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector"
                                                data-toggle="tooltip" data-trigger="hover" data-container="body"
                                                data-title="Orange">&nbsp;</a></li>
                                                <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector"
                                                    data-toggle="tooltip" data-trigger="hover" data-container="body"
                                                    data-title="Black">&nbsp;</a></li>
                                                </ul>
                                                <div class="divider"></div>
                                                <div class="row m-t-10">
                                                    <div class="col-md-5 control-label double-line">Header Styling</div>
                                                    <div class="col-md-7">
                                                        <select name="header-styling" class="form-control input-sm">
                                                            <option value="1">default</option>
                                                            <option value="2">inverse</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row m-t-10">
                                                    <div class="col-md-5 control-label">Header</div>
                                                    <div class="col-md-7">
                                                        <select name="header-fixed" class="form-control input-sm">
                                                            <option value="1">fixed</option>
                                                            <option value="2">default</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row m-t-10">
                                                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                                                    <div class="col-md-7">
                                                        <select name="sidebar-styling" class="form-control input-sm">
                                                            <option value="1">default</option>
                                                            <option value="2">grid</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row m-t-10">
                                                    <div class="col-md-5 control-label">Sidebar</div>
                                                    <div class="col-md-7">
                                                        <select name="sidebar-fixed" class="form-control input-sm">
                                                            <option value="1">fixed</option>
                                                            <option value="2">default</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row m-t-10">
                                                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                                                    <div class="col-md-7">
                                                        <select name="content-gradient" class="form-control input-sm">
                                                            <option value="1">disabled</option>
                                                            <option value="2">enabled</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row m-t-10">
                                                    <div class="col-md-5 control-label double-line">Content Styling</div>
                                                    <div class="col-md-7">
                                                        <select name="content-styling" class="form-control input-sm">
                                                            <option value="1">default</option>
                                                            <option value="2">black</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row m-t-10">
                                                    <div class="col-md-12">
                                                        <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i
                                                            class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end theme-panel -->

                                            <!-- begin scroll to top btn -->
                                            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
                                            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
                                            <!-- end scroll to top btn -->
                                        </div>
                                        <!-- end page container -->

                                        <!--Form logout---->
                                        <form action="{{ route('logout') }}" method="post" id="flogout">
                                            @csrf
                                        </form>
                                        <!-- ================== BEGIN BASE JS ================== -->
                                        <script src="{{ asset('assets/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
                                        <script src="{{ asset('assets/plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
                                        <script src="{{ asset('assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
                                        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--[if lt IE 9]>

    <![endif]-->
    <script src="{{ asset('assets/crossbrowserjs/html5shiv.js') }}"></script>
    <script src="{{ asset('assets/crossbrowserjs/respond.min.js') }}"></script>
    <script src="{{ asset('assets/crossbrowserjs/excanvas.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('assets/plugins/fullcalendar/fullcalendar/fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/js/calendar.demo.min.js') }}"></script>
    <script src="{{ asset('assets/js/apps.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->




    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('assets/plugins/bootstrap3-editable/js/bootstrap-editable.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap3-editable/inputs-ext/address/address.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap3-editable/inputs-ext/typeaheadjs/lib/typeahead.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap3-editable/inputs-ext/typeaheadjs/typeaheadjs.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap3-editable/inputs-ext/wysihtml5/wysihtml5.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/mockjax/jquery.mockjax.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-editable.min.js') }}"></script>
    <script src="{{ asset('assets/js/apps.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== DATA TABLE ================== -->

    <script src="{{ asset('assets/plugins/DataTables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/table-manage-default.demo.min.js') }} "></script>
    <!-- ================== file upload ================== -->
    <script src="{{ asset('fileupload/js/jquery.filer.min.js') }}"></script>
    <!-- ================== end file upload ================== -->
    <!--=================== Date Time Range =================---->
    <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!--=================== End Date Time Range =================---->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script src="{{ asset('assets/plugins/crop/croppie.js') }}"></script>
    <script>
        $(document).ready(function () {
            App.init();
            Calendar.init();
            TableManageDefault.init();
            FormEditable.init();
            // App.init();
            ///FormEditable.init();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var path = document.URL;
            // alert(path);
            $('.sidebar li').filter(function () {
                return $('a', this).attr('href') === path;
            }).parents("li").addClass('active');
            $('.sidebar li').filter(function () {
                return $('a', this).attr('href') === path;
            }).addClass('active');
            console.log("ready!");
        });
    </script>
    @if(session('success'))
    <script type="text/javascript">
        Swal.fire({
            type: 'success',
            title: 'Good job!',
            text: '{{ session()->get('success') }}',
        })
    </script>
    @elseif(session('error'))
    <script type="text/javascript">
        Swal.fire({
            type: 'error',
            title: 'Can not do!',
            text: 'Please try again later.',
        })
    </script>
    @endif

    @yield('js')
</body>

</html>
