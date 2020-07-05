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
                <h4 class="modal-title">Create Reservations : Badmintion / Court-{{$booking1->cort_name}}</h4>
            </div>
            <div class="form-horizontal form-bordered">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            Reservation ID:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <p class="form-control">{{$booking1->booking_no}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            Date:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <p class="form-control">{{$booking1->booking_date}}</p>
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
                                <input type="hidden" id="booking_type" value="{{$booking1->booking_type}}">
                                @if ($booking1->booking_type == 1)
                                    <p class="form-control">เล่น</p>
                                @else
                                    <p class="form-control">คลาส</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    {!! $html !!}
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            พนักงานผู้จอง:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <p class="form-control">{{$booking1->booking_employee}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            หมายเหตุ:
                        </label>
                        <div class="co=l-md-6 col-sm-6">
                            <div class="row">
                                <p class="form-control">{{$booking1->booking_note}}</p>
                            </div>
                        </div>
                    </div>
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
        if (booking_type == 2) {
            $("#Cars2").show();
        }
        $("input[name$='playing_type']").click(function () {
            var test = $(this).val();

            $("div.booking").hide(100);
            $("#Cars" + test).show(100);
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
