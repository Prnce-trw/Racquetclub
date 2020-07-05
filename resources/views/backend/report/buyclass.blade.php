@extends('layout.template')
@section('css')

@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="table-responsive">
            <div class="form-group">
                <div class="col-md-14">
                    <a class="btn btn-primary btn-sm" href="{{url('exportbuyclass')}}">
                        <i class="fa fa-group">
                        </i>
                        Export
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <th>
                                Buyclass Id.
                            </th>
                            <th>
                                Member Id.
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Class No.
                            </th>
                            <th>
                                Member Type
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Hour
                            </th>
                            <th>
                                Note
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buyclass as $item)
                        <tr>
                            <td>{{$item->buy_id}}</td>
                            <td>{{$item->member_id}}</td>
                            <td>{{$item->buy_name}} {{$item->buy_lname}}</td>
                            <td>{{$item->class_no}}</td>
                            <td>
                                @if ($item->buy_type == 1)
                                    <p style="color: green;">เป็นสมาชิก</p>
                                @else
                                    <p style="color: red;">ไม่เป็นสมาชิก</p>
                                @endif
                            </td>
                            <td>{{$item->buy_phone}}</td>
                            <td>{{$item->buy_hour}}</td>
                            <td>{{$item->buy_note}}</td>
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

@stop
