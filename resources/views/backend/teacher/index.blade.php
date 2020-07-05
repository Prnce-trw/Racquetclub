@extends('layout.template')

@section('css')
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
                                    <a class="btn btn-primary btn-sm" onclick="modalCreated()">
                                        <i class="fa fa-group">
                                        </i>
                                        Create Teacher
                                    </a>
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
                                                Teacher Name
                                            </th>
                                            <th>
                                                Last name
                                            </th>

                                            <th>
                                                Status
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($teacher as $product)
                                        <tr class="odd gradeX">
                                            <td>
                                                {{ $product->Teachername }}
                                            </td>
                                            <td>
                                                {{ $product->surename }}
                                            </td>
                                            <td>
                                                {{ $product->nickname }}
                                            </td>

                                            <td>
                                                @if ($product->status==1)
                                                <i class="ion-checkmark-circled fa-2x text-success"></i>
                                                @else
                                                <i class="ion-close-circled fa-2x text-danger"></i>
                                                @endif

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning"
                                                    onclick="modalEdit({{ $product->id }})">Edit</button>
                                                <button type="button" class="btn btn-danger" onclick="deleteteacher({{ $product->id }})">Delete</button>
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
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
</div>
<div class="modal fade in" id="modal-teacher">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="title-h4">Teacher</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/teacher/create/') }}" method="post" class="form-horizontal form-bordered"
                    data-parsley-validate="true" id="form-teacher">
                    @csrf
                    <input type="hidden" id="id_teacher" name="id_teacher" value="">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            First Name:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-parsley-required="true" id="fullname" name="Teachername"
                                placeholder="Required" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            Last name:
                        </label>
                        <div class="col-md-6 col-sm-6">

                            <input class="form-control" data-parsley-required="true" id="surename" name="surename"
                                placeholder="Required" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            Nickname:
                        </label>
                        <div class="col-md-6 col-sm-6">

                            <input class="form-control" data-parsley-required="true" id="nickname" name="nickname"
                                placeholder="Required" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            Phone number:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-parsley-required="true" id="phone" name="phone"
                                placeholder="Required" type="text" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm pull-left" type="button" onclick="" id="btn-teacher-block">Block</button>
				<a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Close</a>
                <button class="btn btn-sm btn-primary" type="submit" form="form-teacher">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<!-- end #content -->
<form action="" method="post" id="form-block">
    @csrf
</form>
@stop


@section('js')
<script>
    function modalCreated() {
        $('#id_teacher').val('');
        $('#fullname').val('');
        $('#surename').val('');
        $('#nickname').val('');
        $('#phone').val('');
        $('#title-h4').html('Teacher')
        $('#btn-teacher-block').hide()
        $('#modal-teacher').modal('show');
    }

    function modalEdit(id) {
        $.ajax({
            url: '{{ url('teacher-edit') }}' + '/' + id,
            type: 'GET',
            data: {
                id: id
            },
            success: function (data) {
                $('#id_teacher').val(data['id']);
                $('#fullname').val(data['Teachername']);
                $('#surename').val(data['surename']);
                $('#nickname').val(data['nickname']);
                $('#phone').val(data['phone_teacher']);
                $('#title-h4').html('Edit teacher')
                if (data['status']==0) {
                    $('#btn-teacher-block').attr('onclick','block('+data['id']+',1)')
                    $('#btn-teacher-block').removeClass('btn-danger btn-success')
                    $('#btn-teacher-block').addClass('btn-success')
                    $('#btn-teacher-block').html('unBlock')
                }else{
                    $('#btn-teacher-block').attr('onclick','block('+data['id']+',0)')
                    $('#btn-teacher-block').removeClass('btn-danger btn-success')
                    $('#btn-teacher-block').addClass('btn-danger')
                    $('#btn-teacher-block').html('Block')
                }
                $('#btn-teacher-block').show()
                $('#modal-teacher').modal('show');
            },
            error: function () {

            }
        })

    }
    function block(id,status) {
        $('#form-block').attr('action','{{url('block-teacher')}}'+'/'+id+'/'+status)
        $('#form-block').submit();
    }
    function deleteteacher(id) {

        var urlaction =  '{{url('delete-teacher')}}'+'/'+id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'คุณแน่ใจหรือ?',
            text: "ผู้ใช้งานจะถูกลบ!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            reverseButtons: true
        }).then((result) => {
                // alert(result.value);
                if (result.value) {
                    $( "#form-block" ).attr('action',urlaction);
                    $( "#form-block" ).submit();

                } else if (result.dismiss === Swal.DismissReason.cancel)
                {
                    swalWithBootstrapButtons.fire(
                        'ยกเลิก',
                        'ยกเลิกการลบ',
                        'error'
                        )
                }
            })

    }

</script>
@stop
