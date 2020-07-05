@extends('layout.template')

@section('css')
<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/sweetalert/css/sweetalert.css')}}">
@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="table-responsive">
            <div class="form-group">
                <div class="col-md-14">
                    <a class="btn btn-primary btn-sm" href="#" onclick="modalCreate()">
                        <i class="fa fa-group">
                        </i>
                        Create Sport
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <th>
                                No.
                            </th>
                            <th>
                                Sport Name
                            </th>
                            <th>
                                Note
                            </th>
                            <th>
                                Remove
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataSport as $key => $sport)
                        <tr class="odd gradeX">
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $sport->name_sport }}
                            </td>
                            <td>
                               {{ $sport->note_sport }}
                           </td>
                           <td>
                                <a href="#modal-edit" class="bt_sportedit btn btn-sm btn-warning sportid" id="{{$sport->id_sport}}" data-toggle="modal" atr="{{$sport->id_sport}}">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger" onclick="deletesport({{$sport->id_sport}})" value="{{$sport->id_sport}}">Delete</button>
                               
                           </td>
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
<!-- end row -->
<!-- end #content -->
<div class="modal fade" id="modal-edit"></div>

<div id="result-modal"></div>
<form action="" method="post" id="deletesport">
    {{ method_field('delete') }}
    @csrf
</form>
@stop
@section('js')
<!-- sweet alert js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    function deletesport(id) {
        // var id =  $(this).attr('id');
        // alert(id);
        var urlaction =  '{{url('manage-sport')}}'+'/'+id;
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
                    $( "#deletesport" ).attr('action',urlaction);
                    $( "#deletesport" ).submit();
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

<script type="text/javascript">
    function modalCreate (id) {
        $.ajax({
            url: 'manage-sport/create',
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
    $(".bt_sportedit").click(function(){
        var id = $(this).attr('atr');
        // alert('555');
        $.ajax({
            url:"{{url('showsport')}}/",
            type:"GET",
            data: {
                id: id
                },
        }).done(function(data){
            console.log(data);
            $("#modal-edit").html(data);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".sportid").click(function(){ 
            var classid = $(this).attr('id');
            $("#sportid").val(classid);
        });
    });
</script>
@stop
