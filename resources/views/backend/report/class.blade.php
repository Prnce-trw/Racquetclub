@extends('layout.template')
@section('css')

@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="table-responsive">
            <div class="form-group">
                <div class="col-md-14">
                    <a class="btn btn-primary btn-sm" href="{{url('exportclass')}}">
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
                                Class Id.
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Hour
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Price / Hour
                            </th>
                            <th>
                                Note
                            </th>
                            <th>
                                End At
                            </th>
                            <th>
                                Management
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($class as $item)
                        <tr>
                            <td>{{$item->classID}}</td>
                            <td>{{$item->class_title}}</td>
                            <td>{{$item->hour}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->price_hour}}</td>
                            <td>{{$item->other}}</td>
                            <td>{{$item->enddate_at}}</td>
                            <td></td>
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
