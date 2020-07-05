<form action="{{ url('updatememberbuyclass',$buyclass->buy_id) }}" method="POST" enctype="multipart/form-data" id="updateclass"
    class="form-horizontal form-bordered" data-parsley-validate="true">
    {{ csrf_field() }}
    <input type="hidden" id="id" name="classid">
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4" for="fullname">
            Member Id:
        </label>
        <div class="col-md-6 col-sm-6">
            @if ($buyclass->buy_type == 1)
                <p class="form-control"><span style="color: green;">เป็นสมาชิก</span></p>
                <br>
                <label>รหัสสมาชิก</label>
                <p class="form-control">{{$buyclass->member_id}}</p>
            @else
                <p class="form-control"><span style="color: red;">ไม่เป็นสมาชิก</span></p>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4" for="email">
            Name:
        </label>
        <div class="col-md-6 col-sm-6">
            <p class="form-control">{{$buyclass->buy_name}}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4" for="email">
            Last Name:
        </label>
        <div class="col-md-6 col-sm-6">
            <p class="form-control">{{$buyclass->buy_lname}}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4" for="email">
            Phone:
        </label>
        <div class="col-md-6 col-sm-6">
            <p class="form-control">{{$buyclass->buy_phone}}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4" for="email">
            Address:
        </label>
        <div class="col-md-6 col-sm-6">
            <p class="form-control">{{$buyclass->buy_address}}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4" for="email">
            Note:
        </label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control border-input" name="buy_note" placeholder="Note..." type="text" cols="20" rows="3">{{$buyclass->buy_note}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4" for="email">
            จำนวนชั่วโมงที่ถูกใช้ไปแล้ว:
        </label>
        <div class="col-md-6 col-sm-6">
            <p class="form-control">{{$buyclass->buy_hour}}</p>
        </div>
    </div>
</form>