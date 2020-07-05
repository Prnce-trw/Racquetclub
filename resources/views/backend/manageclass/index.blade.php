@extends('layout.template')

@section('css')
<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/sweetalert/css/sweetalert.css')}}">
<style>
    .font-black {
        color: black !important;
    }
    .myDiv {
        display: none;
    }
</style>
@stop

@section('body')
<div class="page-header">
    <a href="#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-plus"></i> Create Class</a>
</div>

<div class="row">
    @foreach ($manageclass as $product)
    <div class="col-md-4 col-sm-6">
        <div class="panel">
            <div class="panel-body">
                <div class="text-center">
                    <h4>{{$product->class_title}}</h4>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6"><strong>Class ID</strong></div>
                    <div class="col-md-6 col-sm-6"><p>{{$product->classID}}</p></div>
                    <div class="col-md-6 col-sm-6"><strong>Sport</strong></div>
                    <div class="col-md-6 col-sm-6"><p>{{$product->name_sport}}</p></div>
                    <div class="col-md-6 col-sm-6"><strong>Hour</strong></div>
                    <div class="col-md-6 col-sm-6"><p>{{$product->hour}} Hrs.</p></div>
                    <div class="col-md-6 col-sm-6"><strong>Price</strong></div>
                    <div class="col-md-6 col-sm-6"><p>{{$product->price}} Baht.</p></div>
                    <div class="col-md-6 col-sm-6"><strong>Price/Hour</strong></div>
                    <div class="col-md-6 col-sm-6"><p>{{$product->price_hour}} Baht.</p></div>
                    <div class="col-md-6 col-sm-6"><strong>Create At</strong></div>
                    <div class="col-md-6 col-sm-6"><p>{{(date('d / m / Y', strtotime($product->created_at)))}}</p></div>
                    <div class="col-md-6 col-sm-6"><strong>End At</strong></div>
                    <div class="col-md-6 col-sm-6"><p style="color: red;">{{(date('d / m / Y', strtotime($product->enddate_at)))}}</p></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3 col-md-3">
                        <a href="#modal-buyclass" class="bt_buyclass btn btn-success form-control" id="{{$product->id}}" data-toggle="modal" atr="{{$product->id}}">Buy</a>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <a href="#modal-edit" class="bt_classedit btn btn-warning classid form-control" id="{{$product->id}}" data-toggle="modal" atr="{{$product->id}}">Edit</a>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <a href="{{ url('/infomember_buyclass',$product->id) }}" class="btn btn-info form-control">Member</a>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <button type="button" class="btn btn-danger form-control" onclick="deleteclass({{$product->id}})" value="{{$product->id}}">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- #modal-dialog -->
<div class="modal fade" id="modal-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Insert Class</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body panel-form">
                    <form action="{{ url('/manageclass/create/') }}" class="form-horizontal form-bordered"
                        data-parsley-validate="true" method="post" name="demo-form" id="insertclass">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="fullname">
                                Sport:
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="sport_id" id="">
                                    <option selected disabled>Select Sport...</option>
                                    @foreach ($sport as $item)
                                        <option value="{{$item->id_sport}}">{{$item->name_sport}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="fullname">
                                ID Class:
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" data-parsley-required="true" id="classID" name="classID"
                                    placeholder="ID Class..." type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="email">
                                Class name:
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" data-parsley-required="true" id="class_title"
                                    name="class_title" placeholder="Class name..." type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="email">
                                Hour:
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" data-parsley-required="true" id="fullname" name="hour"
                                    placeholder="Hour..." type="number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="email">
                                Price:
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" data-parsley-required="true" id="fullname" name="price"
                                    placeholder="Price..." type="number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="email">
                                Price/Hour:
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" data-parsley-required="true" id="fullname" name="price_hour"
                                    placeholder="Price/Hour..." type="number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="email">
                                End Date:
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="date" class="form-control" name="enddate" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="email">
                                Other:
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control border-input" name="other" placeholder="Other..." type="text" cols="20" rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                <input type="submit" class="btn btn-sm btn-primary" form="insertclass" value="Save">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-buyclass">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Buy Class</h4>
            </div>
            <div id="md-buyclass"></div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                <input type="submit" class="btn btn-sm btn-primary" form="createbuyclass" value="Save">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit Class</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body panel-form">
                    <form action="{{ url('/updateclass') }}" method="POST" enctype="multipart/form-data" id="updateclass" class="form-horizontal form-bordered" data-parsley-validate="true">
                        {{ csrf_field() }}
                        <input type="hidden" id="id" name="classid">
                        <div id="show_dataclass"></div>
                    </form>
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
<form action="" method="post" id="deleteclass">
    
    @csrf
</form>
@stop
@section('js')
<script>
	// showhide button 
    
    $(document).on( "click", "input[name='membertype']", function() {
        if ($("#membercard").is(":checked")) {
                $("#divmember").show(100);
            } else {
                $("#divmember").hide(100);
            }
    });
    // ค้นหาไอดี
    $(document).on( "keyup", "#classID", function() {
        var id = this.value;
        
        // เรียก function
        searchmemberid(id);
    });
    // เรียกข้อมูล
    function searchmemberid(id) {
        // alert(id)
        $.ajax({
            url:"{{url('showmemberinfo')}}/"+id,
            type:"get",
            data: {
                id: "id"
                },
        }).done(function(data){
            $("#name").val(data.member['name']);
            $("#surname").val(data.member['surname']);
            $("#tel").val(data.member['tel']);
            $("#address").val(data.member['address']);
        });
    }
</script>
<!-- sweet alert js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    function deleteclass(id) {
        // var id =  $(this).attr('id');
        // alert(id);
        var urlaction =  '{{url('delclass')}}'+'/'+id;
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
                    $( "#deleteclass" ).attr('action',urlaction);
                    $( "#deleteclass" ).submit();
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
    // ajax modal edit
    $(".bt_classedit").click(function(){
        var id = $(this).attr('atr');
        // alert('555');
        $.ajax({
            url:"{{url('showclass')}}/"+id,
            type:"get",
            data: {
                id: "id"
                },
        }).done(function(data){
            $("#show_dataclass").html(data);
        });
    });

    // ajax buy class
    $(".bt_buyclass").click(function(){
        var id = $(this).attr('atr');
        // alert(id);
        $.ajax({
            url:"{{url('buyclass')}}/"+id,
            type:"get",
            data: {
                id: "id"
                },
        }).done(function(data){
            $("#md-buyclass").html(data);

        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".classid").click(function(){ 
            var classid = $(this).attr('id');
            $("#id").val(classid);
        });
    });
</script>
@stop
