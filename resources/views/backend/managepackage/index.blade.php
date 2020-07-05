@extends('layout.template')

@section('css')
<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert/css/sweetalert.css')}}">
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
                                    <a href="#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-plus"></i> Create Package</a>
                                    <center>
                                        <h3>managepackage</h3>
                                    </center>
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
                                                Name package
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                Number Day
                                            </th>
                                            <th>
                                                Management
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($package as $product)

                                        <tr class="odd gradeX">
                                            <td>
                                                {{$product->id}}
                                            </td>
                                            <td>
                                                {{$product->package_name}}
                                            </td>
                                            <td>
                                                {{$product->package_price}}
                                            </td>
                                            <td>
                                                {{$product->package_numday}}
                                            </td>
                                            <td>
                                                {{-- <a title="Edit" href="{{url('editpackage',$product->id)}}"
                                                    class="btn btn-success btn-sm">Edit</a> --}}
                                                <a href="#modal-edit" class="bt_packageedit btn btn-sm btn-warning" id="{{$product->id}}" data-toggle="modal" atr="{{$product->id}}">Edit</a>
                                                <button type="button" class="btn btn-sm btn-danger" onclick="deletepackage({{$product->id}})" value="{{$product->id}}">Delete</button>

                                                {{-- <form action="{{ url('delpackage') }}" method="post"
                                                    enctype="multipart/form-data">

                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form> --}}
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
<div class="modal fade" id="modal-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Insert Package</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body panel-form">
                    <form class="form-horizontal form-bordered" action="{{ url('/managepackage/create/') }}" method="post"
                        data-parsley-validate="true" method="post" enctype="multipart/form-data" id="insertpackage">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="fullname">
                                    Name Package:
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" data-parsley-required="true"
                                        id="package_name" name="package_name" placeholder="Name Package..."
                                        type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="email">
                                    Package Price:
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" data-parsley-required="true"
                                        id="fullname" name="package_price" placeholder="Package Price..."
                                        type="number" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="email">
                                    Number of Days:
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" data-parsley-required="true"
                                        id="fullname" name="package_numday" placeholder="Number of Days..."
                                        type="number" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="email">
                                    Age Over:
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control border-input" name="more"
                                        type="number"  placeholder="Age Over...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="email">
                                    Age Less than:
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control border-input" name="less"
                                        type="number" placeholder="Age Less than...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="email">
                                    Number:
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control border-input" name="astext"
                                        type="number" placeholder="Number..." max="6" min="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="email">
                                    Note:
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea class="form-control border-input" name="other" id="" placeholder="Write Something..." cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                <input type="submit" class="btn btn-sm btn-primary" form="insertpackage" value="Save">
                {{-- <a href="javascript:;" class="btn btn-sm btn-success">Action</a> --}}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit"></div>

<form action="" method="post" id="deletepackage">
    {{-- {{ method_field('delete') }} --}}
    @csrf
</form>
@stop
@section('js')
<!-- sweet alert js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    function deletepackage(id) {
        // var id =  $(this).attr('id');
        // alert(id);
        var urlaction =  '{{url('delpackage')}}'+'/'+id;
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
                    $( "#deletepackage" ).attr('action',urlaction);
                    $( "#deletepackage" ).submit();
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
    $(".bt_packageedit").click(function(){
        var id = $(this).attr('atr');
        // alert('555');
        $.ajax({
            url:"{{url('showpackage')}}/",
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
@stop
