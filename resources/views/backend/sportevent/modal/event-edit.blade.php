<style type="text/css">
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }

    .hide {
        display: none;
    }

</style>
<div class="modal fade in" id="modal-edit" style="display: block;" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Create Reservations : Badmintion / {{$booking->cort_name}}</h4>
            </div>
            <form class="form-horizontal form-bordered" action="{{ url('booking/update',$booking->booking_id) }}"
                method="post" data-parsley-validate="true" method="post" enctype="multipart/form-data" id="updateevent">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            Reservation ID:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="hidden" name="booking_no" value="{{$booking->booking_no}}">
                            <p class="form-control">{{$booking->booking_no}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            Date:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="hidden" name="date" value="{{$booking->booking_date}}">
                            <p class="form-control">{{$booking->booking_date}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            Time:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            @switch($cort_time)
                            @case(0)
                            06 : 00
                            @break
                            @case(1)
                            07 : 00
                            @break
                            @case(2)
                            08 : 00
                            @break
                            @case(3)
                            09 : 00
                            @break
                            @case(4)
                            10 : 00
                            @break
                            @case(5)
                            11 : 00
                            @break
                            @case(6)
                            12 : 00
                            @break
                            @case(7)
                            13 : 00
                            @break
                            @case(8)
                            14 : 00
                            @break
                            @case(9)
                            15 : 00
                            @break
                            @case(10)
                            16 : 00
                            @break
                            @case(11)
                            17 : 00
                            @break
                            @case(12)
                            18 : 00
                            @break
                            @case(13)
                            19 : 00
                            @break
                            @case(14)
                            20 : 00
                            @break
                            @case(15)
                            21 : 00
                            @break
                            @case(16)
                            22 : 00
                            @break
                            @default
                            @endswitch
                            {{-- {{$cort_time}} --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            ชนิดการเล่น:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <input type="hidden" id="booking_type" value="{{$booking->booking_type}}">
                                <input type="radio" name="playing_type" id="playing_type1" value="1"
                                    {{$booking->booking_type == 1 ? 'checked="checked"' : ''}}> เล่น
                                <br>
                                <input type="radio" name="playing_type" id="playing_type2" value="2"
                                    {{$booking->booking_type == 2 ? 'checked="checked"' : ''}}> คลาส
                            </div>
                        </div>
                    </div>
                    <div id="Cars1" class="booking" style="display: none;">
                        <div class="form-group" id="Member_show">
                            <label class="control-label col-md-4 col-sm-4" for="fullname">
                                1. Member Id:
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control memberid" data-parsley-required="true" id="memberid_1"
                                    placeholder="Member Card..." type="text" name="memberid_1" value="{{$booking->booking_memberID1}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="fullname">
                                1. Name:
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" value="{{$booking->booking_name1}}" name="booking_name_1" placeholder="Name..." id="booking_name_1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="fullname">
                                1. Check:
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="checkbox" name="booking_status_1" value="1" {{$booking->booking_status1 == 1 ? 'checked' : ''}}>
                            </div>
                        </div>
                    </div>
                    <div id="Cars2" class="booking" style="display: none;">
                        {!! $html !!}
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            พนักงานผู้จอง:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <input type="text" class="form-control" name="employee_name" id=""
                                    placeholder="พนักงานผู้จอง..." value="{{$booking->booking_employee}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            หมายเหตุ:
                        </label>
                        <div class="co=l-md-6 col-sm-6">
                            <div class="row">
                                <textarea name="note" class="form-control" id="" cols="30" rows="10"
                                    placeholder="หมายเหตุ...">{{$booking->booking_note}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <div class="col-md-6 text-left">
                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteevent({{$booking->booking_id}})" value="{{$booking->booking_id}}">Cancel</button>
                </div>
                <div class="col-md-6">
                    <a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Close</a>
                <button class="btn btn-sm btn-primary" type="submit" form="updateevent">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="" method="post" id="deleteevent">
    @csrf
</form>
<!-- sweet alert js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    $(document).ready(function () {
        var booking_type = $("#booking_type").val();
        if (booking_type == 1) {
            $("#Cars1").show();
            $("#Member_show" ).show(100);
        } else {
            $("#Cars2").show();
        }
        $("input[name$='playing_type']").click(function () {
            var test = $(this).val();
            $("div.booking").hide(100);
            $("#Cars" + test).show(100);
            if (test == 1) {
                $("#Member_show" ).show(100);
            }
        });
    });
</script>

<script>
    function deleteevent(id) {
        // var id =  $(this).attr('id');
        // alert(id);
        var urlaction =  '{{url('delevent')}}'+'/'+id;
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
                    $( "#deleteevent" ).attr('action',urlaction);
                    $( "#deleteevent" ).submit();
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