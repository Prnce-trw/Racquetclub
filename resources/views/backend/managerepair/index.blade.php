@extends('layout.template')

@section('css')
@stop

@section('body')
<div class="panel">
    <div class="panel-heading">

        <div class="form-group">
            <div class="col-md-14">
                <a class="btn btn-primary btn-sm" href="#" onclick="modalCreate()">
                    <i class="fa fa-group">
                    </i>
                    Manage type
                </a>
                <a class="btn btn-primary btn-sm" href="#" onclick="modalCreatebdf()">
                    <i class="fa fa-group">
                    </i>
                    Manage building,floor
                </a>
                        <!-- <a class="btn btn-primary btn-sm" href="#" onclick="modalCreateg()">
                            <i class="fa fa-group">
                            </i>
                            Manage group
                        </a> -->
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#default-tab-1" data-toggle="tab">Type</a></li>
                    <li class=""><a href="#default-tab-2" data-toggle="tab">Buliding</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="default-tab-1">
                        <h3 class="m-t-10"><i class="fa fa-cog"></i> Type</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="data-table" data-date="{{ date('Y m d') }}">
                                <thead>
                                    <tr>
                                        <th data-th="1">
                                            No.
                                        </th>
                                        <th data-th="1">
                                            Sport Name
                                        </th>
                                        <th data-th="1">
                                            update on
                                        </th>
                                        <th data-th="1">
                                            Remove
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($re_type as $key => $rre_type)
                                    <tr class="odd gradeX" data-test="{{ $key }}">
                                        <td data-th="1">
                                            {{ $key+1 }}
                                        </td>
                                        <td data-th="2">
                                            {{ $rre_type->type }}
                                        </td>
                                        <td data-th="3">
                                            {{ $rre_type->updated_at }}
                                        </td>
                                        <td data-th="4">
                                            <button type="button" class="btn btn-danger btn-sm"
                                            onclick="btn_del({{$rre_type->id_type}})">delete
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="default-tab-2">
                    <h3 class="m-t-10"><i class="fa fa-cog"></i> Buliding</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="bulid-table" data-date="{{ date('Y m d') }}">
                            <thead>
                                <tr>
                                    <th data-th="1">
                                        No.
                                    </th>
                                    <th data-th="1">
                                        Sport Name
                                    </th>
                                    <th data-th="1">
                                        update on
                                    </th>
                                    <th data-th="1">
                                        Remove
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($re_type as $key => $rre_type)
                                <tr class="odd gradeX" data-test="{{ $key }}">
                                    <td data-th="1">
                                        {{ $key+1 }}
                                    </td>
                                    <td data-th="2">
                                        {{ $rre_type->type }}
                                    </td>
                                    <td data-th="3">
                                        {{ $rre_type->updated_at }}
                                    </td>
                                    <td data-th="4">
                                        <button type="button" class="btn btn-danger btn-sm"
                                        onclick="btn_del({{$rre_type->id_type}})">delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <!-- end panel -->
    </div>
    <!-- end col-12 -->
</div>
<!-- end row -->
<!-- end #content -->
<div id="result-modal"></div>
<form action="" method="post" id="form_del">
    @csrf
    @method ('delete')

</form>
@stop


@section('js')
<script type="text/javascript">
    function modalCreate (id) {
        $.ajax({
            url: 'managerepair/{}',
            type: 'GET',
            data: {id: id},
            success:function(data){
                $('#result-modal').html(data);
                $('#modal-created').modal('show');
                    // alert(data);
                }
            })
    }

    function modalCreatebdf(id) {
        $.ajax({
            url: 'createbuilding',
            type: 'get',
            data: {id: id},
            success:function(data){
                $('#result-modal').html(data);
                $('#modal-createdbdf').modal('show');
                    // alert(data);
                }
            })
    }

    function modalCreateg(id) {
        $.ajax({
            url: 'managerepair/{}',
            type: 'GET',
            data: {id: id},
            success:function(data){
                $('#result-modal').html(data);
                $('#modal-created').modal('show');
                    // alert(data);
                }
            })
    }


    function btn_del(id) {
        var url = 'managerepair' + '/' + id;
        if (confirm('Confirm to Delete?')) {
            $('#form_del').attr('action', url);
            $("#form_del").submit();
        }

    }
</script>
@stop
