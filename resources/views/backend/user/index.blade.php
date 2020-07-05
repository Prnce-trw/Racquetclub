@extends('layout.template')
@section('css')
@stop

@section('body')
<div class="panel">
    <div class="panel-body">
        <div class="row" style="position: relative;">
            <form id="form-filter"method="post">
                @csrf
                <div class="col-md-2">
                    Member ID
                    <input class="form-control" name="memberID" type="text"/>
                </div>
                <div class="col-md-2">
                    Group Number
                    <input class="form-control" name="groupNumber" type="text"/>
                </div>
                <div class="col-md-2" >
                    Name
                    <input class="form-control" name="name" type="text"/>
                </div>
                <div class="col-md-2" >
                    Last name
                    <input class="form-control" name="surname" type="text"/>
                </div>
                <div class="col-md-2" >
                    Email
                    <input class="form-control" name="email" type="text"/>
                </div>
                <div class="col-md-2" >
                    Age
                    <div class="input-group input-daterange">
                        <input type="number" class="form-control" name="ageStart">
                        <span class="input-group-addon">to</span>
                        <input type="number" class="form-control" name="ageEnd">
                    </div>
                </div>
                <div class="col-md-2" >
                    Gender
                    <select class="default-select2 form-control" name="gender">
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
                <div class="col-md-2" >
                    Nationality
                    <input class="form-control" name="nation" type="text"/>
                </div>
                <div class="col-md-2" >
                    Package
                    <select class="form-control" name="package">
                        <option value="">- Package -</option>
                        @foreach($packages as $key => $pack)
                        <option value="{{ $pack->id }}">{{ $pack->package_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2" >
                    Status
                    <select class="form-control" name="status">
                        <option value="">- Status -</option>
                        <option value="1">Active</option>
                        <option value="2">Hold</option>
                        <option value="0">Expire</option>
                    </select>
                </div>
                <div class="col-md-4" >
                    Date Expire
                    <div class="input-group input-daterange">
                        <input type="date" class="form-control" name="start">
                        <span class="input-group-addon">to</span>
                        <input type="date" class="form-control" name="end">
                    </div>
                </div>
                <div class="col-md-2">
                    Discount <br>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="1" name="disyear">
                        Years
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="2" name="disother">
                        Other
                    </label>
                </div>
            </form>
            <div class="col-md-12" align="center" style="padding-top: 20px;padding-bottom: 20px;">
                <button class="btn btn-primary" onclick="filterMember()" type="button" style="width: 30%;"><b>Search</b></button>
            </div>
        </div>
        <div class="table-responsive" id="divTable">
            <table class="table table-bordered" id="data-table">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Package</th>
                    <th>Register Date</th>
                    <th>START PACKAGE</th>
                    <th>END PACKAGE</th>
                    <th>Note discount</th>
                    <th></th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<input type="hidden" id="url-upgrade" value="{{ url('modal-upgrade') }}">
<input type="hidden" id="url-renewal" value="{{ url('modal-renewal') }}">
<input type="hidden" id="url-profile" value="{{ url('modal-profile') }}">
<input type="hidden" id="url-hold" value="{{ url('modal-hold') }}">
<div id="resultModal">

</div>
@stop

@section('js')
<script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript" src="{{ asset('jquery-qrcode-master/jquery.qrcode.min.js') }}"></script>
<script type="text/javascript">
    function upgrade(id) {
        $.ajax({
            url: $('#url-upgrade').val(),
            type: 'GET',
            data:{
                'id':id,
            },
            success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#upgrade-package").modal('show');
                }
            });
    }

    function renewal(id) {
        $.ajax({
            url: $('#url-renewal').val(),
            type: 'GET',
            data:{
                'id':id,
            },
            success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#renewal").modal('show');
                }
            });
    }



    function hold(id) {
        $.ajax({
            url: $('#url-hold').val(),
            type: 'GET',
            data:{
                'id':id,
            },
            success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#hold").modal('show');
                }
            });
    }
    function card(id) {
        $.ajax({
            url: '{{ url('member-card') }}'+'/'+id,
            type: 'GET',
            success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#card").modal('show');
                }
            });
    }
    function filterMember () {
        var dataFilter = $('#form-filter').serialize();
        $.ajax({
            url: '{{ url('filter-member') }}',
            type: 'post',
            data: dataFilter,
            success: function(data) {
                // alert(data);
                $('#divTable').html(data);
            },
        })
    }
</script>
@stop
