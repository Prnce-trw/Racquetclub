@extends('layout.template')
@section('css')

@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="table-responsive">
            <div class="form-group">
                <div class="col-md-14">
                    <a class="btn btn-primary btn-sm" href="{{url('exportsport')}}">
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
                                Sport
                            </th>
                            <th>
                                Note
                            </th>
                            <th>
                                Management
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sport as $item)
                        <tr>
                            <td>{{$item->id_sport}}</td>
                            <td>{{$item->name_sport}}</td>
                            <td>{{$item->note_sport}}</td>
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
