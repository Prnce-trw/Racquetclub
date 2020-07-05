@extends('layout.template')
@section('css')

@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="table-responsive">
            <div class="form-group">
                <div class="col-md-14">
                    <a class="btn btn-primary btn-sm" href="{{url('exportpackage')}}">
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
                                Id.
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Day
                            </th>
                            <th>
                                Age Not Over
                            </th>
                            <th>
                                Age Not Under
                            </th>
                            <th>
                                Note
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($package as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->package_name}}</td>
                            <td>{{$item->package_price}}</td>
                            <td>{{$item->package_numday}}</td>
                            <td>{{$item->less}}</td>
                            <td>{{$item->more}}</td>
                            <td>{{$item->other}}</td>
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
