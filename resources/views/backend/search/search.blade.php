@extends('layout.template')

@section('css')

@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="row">
            <div class="col-sm-6 text-right">
                <input type="text" class="form-control" placeholder="Search..." name="search" id="search">
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-sm btn-primary" onclick="btnreset()"><i class="fa fa-refresh"></i> Reset</button>
            </div>
        </div>
    </div>
</div>
<div id="show"></div>
@stop

@section('js')
<script>
    $('#search').on('keyup', function () {
        $value = $(this).val();
        // alert($value);
        $.ajax({
            type: "get",
            url: "{{url('sendvalue')}}",
            data: {
                'value': $value
            },
            success: function (data) {
                $('#show').html(data);
            }
        });
    });

    function btnreset() {
        location.reload();
    }
</script>
@stop
