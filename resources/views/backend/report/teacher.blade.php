@extends('layout.template')
@section('css')

@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="table-responsive">
            <div class="form-group">
                <div class="col-md-14">
                    <a class="btn btn-primary btn-sm" href="{{url('exportteacher')}}">
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
                                Nick Name
                            </th>
                            <th>
                                Create At
                            </th>
                            <th>
                                Update At
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Management
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teacher as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->Teachername}} {{$item->surename}}</td>
                            <td>{{$item->nickname}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->phone_teacher}}</td>
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
