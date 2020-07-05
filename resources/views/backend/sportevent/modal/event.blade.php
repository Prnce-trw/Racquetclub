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
<div class="modal fade in" id="modal-created" style="display: block;" tabindex="-1">
    <div class="modal-dialog">
        <form class="form-horizontal form-bordered" action="{{ url('booking/create/') }}" method="post"
            data-parsley-validate="true" method="post" enctype="multipart/form-data" id="addevent">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Create Reservations : Badmintion / {{$courtname->cort_name}}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            Date:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="hidden" name="cort_id" id="" value="{{$cort_id}}">
                            <input type="hidden" name="cort_sportid" id="" value="{{$cort_sportid}}">
                            <input type="hidden" name="cort_time" id="" value="{{$cort_time}}">
                            <input type="hidden" name="cort_date" id="" value="{{$cort_date}}">
                            <p class="form-control">{{$cort_date}}</p>
                            {{-- <input class="form-control" data-parsley-required="true" id="package_name" name="date"
                                placeholder="Date..." value="{{$cort_date}}" type="date" required/> --}}
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
                                <input type="radio" name="playing_type" checked="checked" value="1"> เล่น
                                <br>
                                <input type="radio" name="playing_type" value="2"> คลาส
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            1. Member Id
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="radio" class="membertype_1" name="membertype_1" id="membercard_1" value="1"> Yes
                            &nbsp;
                            &nbsp;
                            <input type="radio" class="membertype_1" name="membertype_1" value="2"> No
                            <div id="divmember_1" style="display: none;">
                                <input class="form-control memberid" data-parsley-required="true" id="memberid_1"
                                    placeholder="Member Card..." type="text" name="memberid_1" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            1.ชื่อผู้จอง:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <input type="text" class="form-control" name="booking_name_1" id="booking_name_1"
                                    placeholder="ใช้ชื่อจริงเท่านั้น...">
                            </div>
                        </div>
                    </div>
                    <div id="Cars1" class="booking">
                    </div>
                    <div id="Cars2" class="booking" style="display: none;">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="fullname">
                                1.คลาส
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <input type="text" class="form-control searchclass"
                                        placeholder="ค้นหาค้นหารหัสคลาส..." name="booking_class_1" id="classid_1">
                                    <div id="class_name_1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="fullname">
                                1.ชื่อครูผู้สอน/น็อกเกอร์
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <select name="booking_teacher_1" id="" class="form-control">
                                        <option selected disabled>Select Teacher...</option>
                                        @foreach ($teacher as $item)
                                        <option value="{{$item->id}}">{{$item->Teachername}} {{$item->surename}}
                                            @if ($item->nickname != null)
                                            ({{$item->nickname}})
                                            @endif
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="booking"></div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4" for="fullname">
                                <button type="button" class="btn btn-primary" id="addbook">เพิ่มผู้จอง</button>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            พนักงานผู้จอง:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <input type="text" class="form-control" name="employee_name" id=""
                                    placeholder="พนักงานผู้จอง...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            หมายเหตุ:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <textarea name="note" class="form-control" id="" cols="30" rows="10"
                                    placeholder="หมายเหตุ..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Close</a>
                    <button class="btn btn-sm btn-primary" type="submit" form="addevent">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("input[name$='playing_type']").click(function () {
            var test = $(this).val();

            $("div.booking").hide(100);
            $("#Cars" + test).show(100);
        });
    });

    var count = 2;
    $('#addbook').click(function () {
        if (count < 5) {
            $("#booking").append(
                '<div id="appendbook_'+count+'">'+
                '<div class="form-group">' +
                    '<label class="control-label col-md-4 col-sm-4" for="fullname">' +
                        ''+count+'. Member Id' +
                    '</label>' +
                    '<div class="col-md-6 col-sm-6">' +
                        '<input type="radio" class="membertype_'+count+'" name="membertype_'+count+'" id="membercard_'+count+'" value="1"> Yes' +
                        '&nbsp;' +
                        '&nbsp;' +
                        '<input type="radio" class="membertype_'+count+'" name="membertype_'+count+'" value="2"> No' +
                        '<div id="divmember_'+count+'" style="display: none;">' +
                            '<input class="form-control memberid" data-parsley-required="true" id="memberid_'+count+'"' +
                            'placeholder="Member Card..." type="text" name="memberid_'+count+'"/>' +
                        '</div>' +
                    '</div>' +
                '</div>'+
                '<div class="form-group">'+
                    '<label class="control-label col-md-4 col-sm-4" for="fullname">'+
                        ''+count+'.ชื่อผู้จอง:'+
                    '</label>'+
                    '<div class="col-md-6 col-sm-6">'+
                        '<div class="row">'+
                            '<input type="text" class="form-control" name="booking_name_'+count+'" id="booking_name_'+count+'"'+
                            'placeholder="ใช้ชื่อจริงเท่านั้น...">'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label class="control-label col-md-4 col-sm-4" for="fullname">'+
                        ''+count+'.คลาส'+
                    '</label>'+
                    '<div class="col-md-6 col-sm-6">'+
                        '<div class="row">'+
                            '<input type="text" class="form-control searchclass"'+
                            'placeholder="ค้นหาค้นหารหัสคลาส..." name="booking_class_'+count+'" id="classid_'+count+'">'+
                            '<div id="class_name_'+count+'"></div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label class="control-label col-md-4 col-sm-4" for="fullname">'+
                        ''+count+'.ชื่อครูผู้สอน/น็อกเกอร์'+
                    '</label>'+
                    '<div class="col-md-6 col-sm-6">'+
                        '<div class="row">'+
                            '<select name="booking_teacher_'+count+'" id="" class="form-control">'+
                                '<option selected disabled>Select Teacher...</option>'+
                                '@foreach ($teacher as $item)'+
                                '<option value="{{$item->id}}">{{$item->Teachername}} {{$item->surename}}'+
                                '@if ($item->nickname != null)'+
                                '({{$item->nickname}})'+
                                '@endif'+
                                '</option>'+
                                '@endforeach'+
                            '</select>'+
                        '</div>'+
                        '<br>'+
                        '<div class="row">'+
                            '<div class="col-sm-12 text-right">'+
                                '<button type="button" class="btn btn-danger" onclick="delete_booking('+count+')">ลบ</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'
            );
            if (count < 5) {
                count++;
            }
        } else {
            alert('ผู้จองครบตามจำนวนแล้ว!');
        }
    });
    
    function delete_booking(x) {
        $("#appendbook_"+x).remove();
        count--;
    }
</script>
