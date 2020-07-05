@extends('layout.template')

@section('css')

@stop

@section('body')
<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="data-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Class Code</th>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Member</th>
                        <th>Class</th>
                        <th>Adress</th>
                        <th>Phone</th>
                        <th>Note</th>
                        <th>Management</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($member as $item)
                    <tr>
                        <td class="text-center">{{$item->buy_id}}</td>
                        <td class="text-center">{{$item->class_no}}</td>
                        <td>{{$item->member_id}}</td>
                        <td>{{$item->buy_name}} {{$item->buy_lname}}</td>
                        <td>
                        @if ($item->buy_type == 1)
                            <span style="color: green;">เป็นสมาชิก</span></strong>
                        @else
                            <strong><span style="color: red;">ไม่เป็นสมาชิก</span></strong>
                        @endif
                        </td>
                        <td>{{$item->class_title}}</td>
                        <td>{{$item->buy_address}}</td>
                        <td>{{$item->buy_phone}}</td>
                        <td>{{$item->buy_note}}</td>
                        <td>
                            <a href="#modal-edit" class="btn btn-sm btn-warning btn_edit_buyclass" id="{{$item->buy_id}}" data-toggle="modal" atr="{{$item->buy_id}}">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="delbuyclass({{$item->buy_id}})" value="{{$item->buy_id}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit Buy Class</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body panel-form">
                    <div id="show_databuyclass"></div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                <input type="submit" class="btn btn-sm btn-primary" form="updateclass" value="Save">
                {{-- <a href="javascript:;" class="btn btn-sm btn-success">Action</a> --}}
            </div>
        </div>
    </div>
</div>
<form action="" method="post" id="delbuyclass">
    @csrf
</form>
@stop
@section('js')
<!-- sweet alert js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    function delbuyclass(id) {
        // var id =  $(this).attr('id');
        // alert(id);
        var urlaction =  '{{url('delmemberbuyclass')}}'+'/'+id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                reverseButtons: true
            }).then((result) => {
                // alert(result.value);
                if (result.value) {
                    //   alert("ผ่าน");
                    //   alert("#deleteclass_"+id );
                    $( "#delbuyclass" ).attr('action',urlaction);
                    $( "#delbuyclass" ).submit();
                    // $(this).closest('form').submit();
                    
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                } else if (
                /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) 
                {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'ยกเลิกการลบข้อมูล',
                        'error'
                    )
                }
            })
        }
</script>

<script>
    // ajax เรียก modal edit member buyclass
    $(".btn_edit_buyclass").click(function(){
        var id = $(this).attr('atr');
        // alert(id);
        $.ajax({
            url:"{{url('editmemberinfo')}}/"+id,
            type:"get",
            data: {
                id: "id"
                },
        }).done(function(data){
            console.log(data);
            $("#show_databuyclass").html(data);
        });
    });

    // showhide button 
    $(document).on( "click", "input[name='membertype']", function() {
        if ($("#membercard").is(":checked")) {
                $("#divmember").show(100);
            } else {
                $("#divmember").hide(100);
            }
    });
</script>
@stop
