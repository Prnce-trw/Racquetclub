@extends('layout.template')

@section('css')
@stop

@section('body')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="panel">
    <div class="panel-heading">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class="col-md-14">
                                    <a class="btn btn-primary btn-sm" href="#" onclick="modalCreate(0)">
                                        <i class="fa fa-group">
                                        </i>
                                        Create User
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
                                                Username
                                            </th>
                                            <th>
                                                Name Surname
                                            </th>
                                            <th>
                                                E-mail
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Permission
                                            </th>
                                            <th>
                                                Remove
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admins as $key => $admin)
                                        <tr class="tr-admin" data-id="{{ $admin->id_admin }}" {!! ($admin->id_admin==auth('web')->user()->id_admin||auth('web')->user()->capacity=='1')?'style="cursor: pointer;"':'' !!}>
                                         <td {!! ($admin->id_admin==auth('web')->user()->id_admin||auth('web')->user()->capacity=='1')?'onclick="modalCreate('.$admin->id_admin.')"':'' !!}>
                                            {{ $admin->username }}
                                        </td>
                                        <td {!! ($admin->id_admin==auth('web')->user()->id_admin||auth('web')->user()->capacity=='1')?'onclick="modalCreate('.$admin->id_admin.')"':'' !!}>
                                            {{ $admin->firstname_admin.'  '.$admin->lastname_admin }}
                                        </td>
                                        <td {!! ($admin->id_admin==auth('web')->user()->id_admin||auth('web')->user()->capacity=='1')?'onclick="modalCreate('.$admin->id_admin.')"':'' !!}>
                                            {{ $admin->email }}
                                        </td>
                                        <td {!! ($admin->id_admin==auth('web')->user()->id_admin||auth('web')->user()->capacity=='1')?'onclick="modalCreate('.$admin->id_admin.')"':'' !!}>
                                            @if($admin->status_admin=='1')
                                            <i class="ion-checkmark-circled fa-2x text-success"></i>
                                            @else
                                            <i class="ion-close-circled fa-2x text-danger"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" {!! ($admin->capacity!='1')?'class="rating"':'' !!}  data-type="select" data-name="status_id" data-pk="{{ $admin->id_admin }}" data-value="5" data-title="Select Permissions">
                                                {{ $admin->capacity=='1'?'Admin'
                                                : ($admin->capacity=='2'? 'Cs':'Reception') }}
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger" type="button" {!! (auth('web')->user()->capacity=='1')?'':'disabled' !!} 
                                                onclick="deladmin({{ $admin->id_admin }})">ลบ</button>
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
<!-- end row -->
<!-- end #content -->
<div id="result-modal"></div>
<form action="" method="post" id="form-delete">
    @csrf
    @method('DELETE')
</form>
@stop


@section('js')
<link href="{{ asset('x-editer/bootstrap3-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
<script src="{{ asset('x-editer/bootstrap3-editable/js/bootstrap-editable.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if ({{ auth('web')->user()->capacity }} == '1') {
            $('.rating').editable({
                url: '{{ url('update-permission') }}',
                source: [
                {value: 4, text: 'SuperAdmin'},
                {value: 2, text: 'Cs'},
                {value: 3, text: 'Reception'}
                ],
                success: function(response, newValue) {
                    Swal.fire({
                        type: 'success',
                        title: 'OK Updated Success!',
                    })
                },
                error: function() {
                    Swal.fire({
                        type: 'error',
                        title: 'Cannot be update',
                        text: 'Please try again later.',

                    })
                }
            });
            $('.status').editable({
                url: '{{ url('update-permission') }}',
                source: [
                {value: 0, text: 'Block'},
                {value: 1, text: 'Unblock'}
                ],
                success: function(response, newValue) {
                    Swal.fire({
                        type: 'success',
                        title: 'OK Updated Success!',
                    })
                },
                error: function() {
                    Swal.fire({
                        type: 'error',
                        title: 'Cannot be update',
                        text: 'Please try again later.',

                    })
                }
            });
        }
        $('.rating').click(function() {
            if ({{ auth('web')->user()->capacity }} != '1') {
                alert('คุณไม่มีสิทธิ์ในการเปลี่ยนแปลงข้อมูลในส่วนนี้');
            }
        });
    }); 
</script>
<script type="text/javascript">
    function modalCreate (id) {
        $.ajax({
            url: 'manage-admin/create',
            type: 'GET',
            data: {id: id},
            success:function(data){
                $('#result-modal').html(data);
                $('#modal-created').modal('show');
                // alert(data);
            }
        })
    }
</script>
<script>
    function deladmin(id) {
        var urlaction =  '{{url('manage-admin')}}'+'/'+id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'คุณแน่ใจหรือ?',
            text: "ข้อมูลจะไม่สามารถกู้กลับมาได้อีก!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            reverseButtons: true
        }).then((result) => {
                // alert(result.value);
                if (result.value) {
                    $( "#form-delete" ).attr('action',urlaction);
                    $( "#form-delete" ).submit();                    
                    
                } else if (result.dismiss === Swal.DismissReason.cancel) 
                {
                    swalWithBootstrapButtons.fire(
                        'ยกเลิก',
                        'ยกเลิกการลบข้อมูล',
                        'error'
                        )
                }
            })

    }
</script>
@if($message = Session::get('success'))
<script type="text/javascript">
    Swal.fire({
        type: 'success',
        title: 'OK Updated Success!',
    })
</script>
@elseif($message = Session::get('fail'))
<script type="text/javascript">
    Swal.fire({
        type: 'error',
        title: 'Cannot be update',
        text: 'Please try again later.',

    })
</script>
@endif
@stop
