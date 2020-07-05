@extends('layout.template')
@section('css')

@stop

@section('body')
<h1 class="page-header">User</h1>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
                <h4>TOTAL MEMBER</h4>
                <p>{{$member_count}}</p>	
            </div>
            <div class="stats-link">
                <a href="{{url('backend/reportmember')}}">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon"><i class="fa fa-mortar-board"></i></div>
            <div class="stats-info">
                <h4>TOTAL TEACHER</h4>
                <p>{{$teacher_count}}</p>	
            </div>
            <div class="stats-link">
                <a href="{{url('backend/reportteacher')}}">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-user"></i></div>
            <div class="stats-info">
                <h4>TOTAL ADMIN</h4>
                <p>{{$admin_count}}</p>	
            </div>
            <div class="stats-link">
                <a href="{{url('backend/reportadmin')}}">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
</div>
<h1 class="page-header">Sport</h1>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-soccer-ball-o"></i></div>
            <div class="stats-info">
                <h4>TOTAL SPORT</h4>
                <p>{{$sport_count}}</p>	
            </div>
            <div class="stats-link">
                <a href="{{url('backend/reportsport')}}">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
</div>
<h1 class="page-header">Class</h1>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-folder"></i></div>
            <div class="stats-info">
                <h4>TOTAL CLASS</h4>
                <p>{{$class_count}}</p>	
            </div>
            <div class="stats-link">
                <a href="{{url('backend/reportclass')}}">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon"><i class="fa fa-folder-open"></i></div>
            <div class="stats-info">
                <h4>TOTAL BUYCLASS</h4>
                <p>{{$teacher_count}}</p>	
            </div>
            <div class="stats-link">
                <a href="{{url('backend/reportbuyclass')}}">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
</div>
<h1 class="page-header">Package</h1>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-inbox"></i></div>
            <div class="stats-info">
                <h4>TOTAL PACKAGE</h4>
                <p>{{$package_count}}</p>	
            </div>
            <div class="stats-link">
                <a href="{{url('backend/reportpackage')}}">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
</div>
<h1 class="page-header">Booking</h1>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-calendar"></i></div>
            <div class="stats-info">
                <h4>TOTAL BOOKING</h4>
                <p>{{$booking_count}}</p>	
            </div>
            <div class="stats-link">
                <a href="{{url('backend/reportbooking')}}">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-inverse" data-sortable-id="form-stuff-1">
    <div class="panel-body">
        <form action="" method="POST" id="search" enctype="multipart/form-data">
            
            <div class="form-inline">
                <div class="form-group m-r-10">
                    <label class="col-md-3 control-label">Select Court</label>
                    <div class="col-md-9">
                        <select class="form-control search" id="sport" name="sport" required>
                            <option selected disabled>Select Sport...</option>
                            @foreach ($allsport as $item)
                            <option value="{{$item->as_id}}">{{$item->as_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group m-r-10">
                    <label class="col-md-3 control-label">Status</label>
                    <div class="col-md-9">
                        <select class="form-control" name="status">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Start Date</label>
                    <div class="col-md-9">
                        <input type="date" id="startdate" name="startdate" class="form-control search" placeholder="Start Date...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">End Date</label>
                    <div class="col-md-9">
                        <input type="date" id="enddate" name="enddate" class="form-control search" placeholder="Start Date...">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9">
                        <input type="reset" value="Reset" id="reset" name="reset" class="btn btn-sm btn-primary" form="search">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="panel panel-inverse" data-sortable-id="form-stuff-1">
    <div class="panel-body">
        <div id="btn"></div>
        <br>
        <table class="table table-striped table-bordered" >
            <thead>
                <tr>
                    <th>
                        Id 
                    </th>
                    <th>
                        Court
                    </th>
                    <th>
                        Court No.
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Time
                    </th>
                    <th>
                        Type
                    </th>
                    <th>
                        Reservation Name
                    </th>
                    <th>
                        Teach Name
                    </th>
                    <th>
                        Admin Name
                    </th>
                    <th>
                        Reservation Admin
                    </th>
                    <th>
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@stop

@section('js')
<script>
    $('.search').on('change', function() {
        
        $value = $('#sport').val();
        $startdate = $('#startdate').val();
        $enddate = $('#enddate').val();
        $.ajax({
            url: "{{url('search')}}/",
            type: 'GET',
            data:{
                'sportid':$value,
                'startdate':$startdate,
                'enddate':$enddate
            },
            success:function(data) {
                $('tbody').html(data.output);
                $('#btn').html(data.btnexport);
            }
        });
    });
    $('#reset').click(function(){
        location.reload();
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@stop
