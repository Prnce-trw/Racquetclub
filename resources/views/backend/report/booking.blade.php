@extends('layout.template')
@section('css')

@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="row" style="position: relative;">
            <form action="{{url('exportbooking')}}" id="form-filterBooking" method="GET">
                <div class="col-md-2">
                    <label class="control-label">Sport</label>
                    <select class="form-control sportId" name="sport" id="sport">
                        <optgroup label="Selete Sport...">
                            <option selected disabled>Select Sport...</option>
                            @foreach ($allsport as $item)
                                <option value="{{$item->as_id}}">{{$item->as_name}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="control-label">Court</label>
                    <select class="form-control" name="court" id="resultCourt">
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="control-label">Status Check</label><br>
                    <input type="checkbox" name="check" value="1">
                </div>
                <div class="col-md-2">
                    <label class="control-label" >Time</label><br>
                    <select name="time" class="form-control">
                        @for ($i = 0; $i < 17; $i++)
                        <option value="{{$i}}">{{$i+6}} : 00</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2" >
                    <label class="control-label">Date</label>
                    <div class="input-group input-daterange">
                        <input type="date" class="form-control" name="dateStart">
                        <span class="input-group-addon">to</span>
                        <input type="date" class="form-control" name="dateEnd">
                    </div>
                </div>
                
            
            <div class="col-md-12" align="center" style="padding-top: 20px;padding-bottom: 20px;">
                <button class="btn btn-primary" onclick="filterBooking()" type="button" style="width: 30%;"><b>Search</b></button>
            </div>
        </div>
   </div>
   <div class="panel-body">
    <div class="table-responsive">
        <div class="form-group">
            <div class="col-md-14"> 
                {{-- <a class="btn btn-primary btn-sm" href="{{url('exportbooking')}}" onclick="getExportBooking()">
                    <i class="fa fa-group">
                    </i>
                    Export
                </a> --}}
                <button type="submit" class="btn btn-primary">Export</button>
            </div>
        </div>
    </form>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="data-table">
                <thead>
                    <tr>
                        <th>
                            No.
                        </th>
                        <th>
                            Code.
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Time
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Employee
                        </th>
                        <th>
                            Note
                        </th>
                    </tr>
                </thead>
                <tbody id="resultBooking">
                    @foreach ($booking as $item)
                    <tr>
                        <td>{{$item->booking_id}}</td>
                        <td>{{$item->booking_no}}</td>
                        <td>{{$item->booking_date}}</td>
                        <td>{{$item->booking_name1}}</td>
                        <td>{{$item->changeDatatoTime()}}</td>
                        <td>{!!$item->playingtype()!!}</td>
                        <td>{{$item->booking_employee}}</td>
                        <td>{{$item->booking_note}}</td>
                    </tr>
                    @endforeach
               </tbody>
           </table>
       </div>
   </div>
   <!-- end panel -->
</div>
   <!-- end col-12 -->
</div>
@stop

@section('js')
<script>
    $(document).on('change', '.sportId', function () {
        var sportId = $(this).val();
        $.ajax({
            url: '{{ url('filterCourt') }}',
            type: 'GET',
            data: {sportId: sportId},
        }).done(function (data) {
            $('#resultCourt').html(data.htmlCourt);
        });
    })

    function getExportBooking() {
        var dataFilter = $('#form-filterBooking').serialize();
        alert(dataFilter);
        $.ajax({
            url: '{{ url('exportbooking') }}',
            type: 'default GET (Other values: POST)',
            dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {param1: 'value1'},
        }).done(function (data) {
            // body...
        }).fail(function (data) {
            // body...
        });
    }

    function filterBooking () {
        var dataFilter = $('#form-filterBooking').serialize();
        $.ajax({
            url: '{{ url('filterBooking') }}',
            type: 'get',
            data: dataFilter,
            success: function(data) {
                $('#resultBooking').html(data.html);
            },
        })
    }
</script>
@stop
