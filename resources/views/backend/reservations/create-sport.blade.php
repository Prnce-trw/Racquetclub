@extends('layout.template')

@section('css')
<style>
    .text-mid {
        vertical-align: middle !important;
    }
</style>
@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class="col-md-14">
                                    <a href="#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-plus"></i> Create Sport</a>
                                    {{-- <a class="btn btn-primary btn-sm" href="{!! url('/manageclass/create/') !!}">
                                        <i class="fa fa-2x fa-money">
                                        </i>
                                        Create Class
                                    </a> --}}
                                </div>
                            </div>
                        </td>
                        <div class="panel-title">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                No.
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Code Name
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
                                        @foreach ($allsport as $item_as)
                                        <tr class="odd gradeX">
                                            <td class="text-center text-mid">
                                                {{$item_as->as_id}}
                                            </td>
                                            <td class="text-mid">
                                                {{$item_as->as_name}}
                                            </td>
                                            <td class="text-mid">
                                                {{$item_as->as_codename}}
                                            </td>
                                            <td class="text-mid">
                                                {{$item_as->as_note}}
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{url('schedule', $item_as->as_id)}}" class="btn btn-sm btn-primary">Add Event</a>
                                                    <a href="#modal-edit" class="bt_sportedit btn btn-sm btn-warning classid" id="{{$item_as->as_id}}" data-toggle="modal" atr="{{$item_as->as_id}}">Edit</a>
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="deletepackage({{$item_as->as_id}})" value="{{$item_as->as_id}}">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div id="modal-edit"></div>
<div class="modal fade" id="modal-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Insert Sport</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body panel-form">
                    <form action="{{ url('createsport') }}" class="form-horizontal form-bordered"
                        data-parsley-validate="true" method="post" name="demo-form" id="insertsport">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="fullname">
                                Name
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" data-parsley-required="true" id="classID" name="name"
                                    placeholder="Name..." type="text" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="fullname">
                                Code Name
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" data-parsley-required="true" id="codename" name="codename"
                                    placeholder="Code Name..." type="text" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="email">
                                Note
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <textarea name="note" id="" class="form-control" cols="30" rows="10" placeholder="Note..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="email">
                                <button type="button" onclick="AddCourseList()" class="btn btn-primary">Add Court</button>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div id="CortList"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                <input type="submit" class="btn btn-sm btn-primary" form="insertsport" value="Save">
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(".bt_sportedit").click(function(){
        var id = $(this).attr('atr');
        // alert(id);
        $.ajax({
            url:"{{url('editsport')}}/",
            type:"GET",
            data: {
                id: id
                },
        }).done(function(data){
            console.log(data);
            $("#modal-edit").html(data);
            $("#upgrade-sport").modal('show')
        });
    });
</script>

<script>
    var list = 1;
    function AddCourseList() {
        $("#CortList").append(
            '<div class="row" id="List_'+list+'">'+
                '<div class="row">'+
                    '<div class="col-lg-9">'+
                        '<input type="text" class="form-control" name="cortname[]" placeholder="Court Name..." value="Court '+list+'">'+
                    '</div>'+
                    '<div class="col-lg-3">'+
                        '<button type="button" class="btn btn-danger" onclick="delete_add('+list+')">x</button>'+
                    '</div>'+
                '</div>'+
            '</div>'
        );
    list++;
    }
    function delete_add(qq) {
        $("#List_"+qq).remove();
    }
</script>
@stop
