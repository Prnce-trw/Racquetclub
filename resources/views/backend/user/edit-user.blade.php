<center><h1>{{ $id }}</h1></center>
<form action="{{ url('manage-user/'.$member->memberID) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="col-md-3 boxContainer" id="div-image{{ $id }}" {!! ($image!==null)?'style="background-image: url('.url($image->path).')"':'' !!}>
        <input type="file" name="imgUser" div-id="div-image{{ $id }}" id="imgUser{{ $id }}" style="display: none;" class="input-image">
        <div class="box">
            <button class="btn" type="button" onclick="document.getElementById('imgUser{{ $id }}').click()"><i class="ion-camera "></i></button>
            <input type="hidden" name="imgBase64" id="imgBase{{ $id }}" value="">
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label"><h5>Member ID :</h5></label>
            <div class="col-md-4">
                <input class="form-control" name="member_num" type="text" value="{{ $member->memberID }}" readonly />
            </div>
        </div> 
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label"><h5>Register Date :</h5></label>
            <div class="col-md-4">
                <input class="form-control border-input" name="registerdate" placeholder="Register Date" type="date" value="{{ $member->registerdate }}" required readonly/>
            </div>                    
            <label class="col-md-2 control-label"><h5>Member Group :</h5></label>
            <div class="col-md-4">
                <input class="form-control" id="membergroup" name="membergroup" type="text" value="{{ $group->group_number }}" readonly />
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label"><h5>Name :</h5></label>
            <div class="col-md-4">
                <input class="form-control border-input" name="name" placeholder="Name" type="text" value="{{ $member->name }}" required/>
            </div>                    
            <label class="col-md-2 control-label"><h5>Last name :</h5></label>
            <div class="col-md-4">
                <input class="form-control border-input" name="surname" placeholder="Surname" type="text" value="{{ $member->surname }}" required/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label"><h5>Nationality :</h5></label>
            <div class="col-md-4">
                <input class="form-control border-input" name="nation" placeholder="Nationality" type="text" value="{{ $member->country }}" required/>
            </div>
            <label class="col-md-2 control-label"><h5>BIRTH DAY :</h5></label>
            <div class="col-md-4">
                <input class="form-control border-input birthday" id="birthday" name="birthday" placeholder="วัน/เดือน/ปี" type="date" value="{{ $member->birthday }}" required>
            </div>  
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label"><h5>Occupation :</h5></label>
            <div class="col-md-4">
                <input class="form-control border-input" name="job" placeholder="Occupation" type="text" value="{{ $member->member_job }}" />
            </div>
            <label class="col-md-2 control-label"><h5>GENDER :</h5></label>
            <div class="col-md-4">
                <select class="default-select2 form-control" name="gender" placeholder="Select Package" required>
                    <option value="">
                        ---SELECT GENDER---
                    </option>
                    <option value="1" {{ ($member->gender=='1')?'selected':'' }}>
                        MALE
                    </option>
                    <option value="2" {{ ($member->gender=='2')?'selected':'' }}>
                        FEMAL
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label"><h5>Tel. :</h5></label>
            <div class="col-md-4">
                <input class="form-control border-input" id="" name="tel" placeholder="tel" type="text" value="{{ $member->tel }}" required>
            </div>                    
            <label class="col-md-2 control-label"><h5>E-mail :</h5></label>
            <div class="col-md-4">
                <input class="form-control border-input" id="" name="email" placeholder="E-mail" type="text" value="{{ $member->email }}" required>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label"><h5>Emergency Tel:</h5></label>
            <div class="col-md-4">
                <input class="form-control border-input" id="" name="Etel" placeholder="tel" type="text" value="{{ $member->emergency_tel }}">
            </div>                    
            <label class="col-md-2 control-label"><h5>Emergency Name:</h5></label>
            <div class="col-md-4">
                <input class="form-control border-input" id="" name="Ename" placeholder="Name" type="text" value="{{ $member->emergency_name }}">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label"><h5>Address :</h5></label>
            <div class="col-md-10">
                <textarea class="form-control" rows="4" name="address" placeholder="ที่อยู่" required>{{ $member->address }}</textarea>
            </div>                    
        </div>
        <div class="form-group col-md-12">              
            <label class="col-md-2 control-label"><h5>Package :</h5></label>
            <div class="col-md-4">
                <select class="form-control package" name="package" type="text" id="package" disabled>
                    <option value="">
                        - Package -
                    </option>
                    @foreach($allpackages as $key => $allpackage)
                    <option value="{{ $allpackage->id }}" data-day="{{ $allpackage->package_numday }}" {{ ($allpackage->id == $package->package_id)?'selected':'' }} data-price="{{ $allpackage->package_price }}">
                        {{ $allpackage->package_name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label"><h5>START PACKAGE :</h5></label>
            <div class="col-md-4">
                <input class="form-control border-input startdate" id="startPackage" name="startdate" type="date" value="{{ $package->start }}"  readonly />
            </div>                    
            <label class="col-md-2 control-label"><h5>END PACKAGE :</h5></label>
            <div class="col-md-4">
                <input readonly class="form-control border-input enddate" id="endpackage" name="enddate" type="date" value="{{ $package->end }}"  readonly/>
            </div>
        </div>
        <div class="form-group col-md-12">                   
            <label class="col-md-2 control-label"><h5>SPORT :</h5></label>
            <div class="form-group col-md-10">
                @foreach($allSport as $aSport)
                <div class="col-md-3">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="{{ $aSport->id_sport }}" name="chSport[]" 
                        {!! (in_array($aSport->id_sport,$sport))?'checked':'' !!} >
                        {{ $aSport->name_sport }}
                    </label>
                </div>
                @endforeach

            </div>
        </div>
        <div class="form-group col-md-12">                   
            <label class="col-md-2 control-label"><h5>Training goals</h5></label>
            <div class="form-group col-md-10">
                <div class="col-md-3">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="1" name="chGoal[]" {!! (in_array('1',$goals))?'checked':'' !!}>
                        Weight Loss
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="2" name="chGoal[]" {!! (in_array('2',$goals))?'checked':'' !!}>
                        Weight Gain
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="3" name="chGoal[]" {!! (in_array('3',$goals))?'checked':'' !!}>
                        Body Building 
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="4" name="chGoal[]" {!! (in_array('4',$goals))?'checked':'' !!}>
                        Rehab
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="5" name="chGoal[]" {!! (in_array('5',$goals))?'checked':'' !!}>
                        Stress relief
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-3 control-label"><h5>How did you hear about us?</h5></label>
            <div class="col-md-9">
                <div class="form-group col-md-10">
                    <div class="col-md-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="1" name="website[{{ $id }}][]">
                            Website
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="2" name="website[{{ $id }}][]">
                            Facebook
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="3" name="website[{{ $id }}][]">
                            Youtube 
                        </label>
                    </div>
                    <div class="col-md-12" >
                        <label class="checkbox-inline" style="padding-bottom: 10px;">
                            <input type="checkbox" value="4" class="check-friend" name="website[{{ $id }}][]">
                            Friend
                        </label>
                        <input class="form-control border-input" name="friend[{{ $id }}]" placeholder="Note Friend" type="text" value="" disabled>
                    </div>
                    <div class="col-md-12">
                        <label class="checkbox-inline" style="padding-bottom: 10px;">
                            <input type="checkbox" value="5" class="check-other" name="website[{{ $id }}][]">
                            Other
                        </label>
                        <input class="form-control border-input" name="other[{{ $id }}]" placeholder="Note Other" type="text" value="" disabled>
                    </div>
                </div>
            </div> 
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label"><h5>Upload Files</h5></label>
            <div class="col-md-4">
                <input type="file" name="files" class="fileupload" multiple="multiple" id="files{{ $id }}">
            </div>                    
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label"><h5>Discount</h5></label>
            <h4 class="col-md-2">0 Years</h4>
            <div class="col-md-2">
                <div class="input-group">
                    <input type="number" class="form-control" name="discountcon[{{ $id }}]" readonly value="0">
                    <span class="input-group-addon">
                        %
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label"><h5>Discount other</h5></label>
            <div class="col-md-2">

                <div class="input-group">
                    <input type="number" class="form-control discount" name="discount[{{ $id }}]" readonly>
                    <span class="input-group-addon">
                        % <input type="radio" class="radio-discount" name="typeDis[{{ $id }}]"value="2" disabled>
                    </span>
                </div>
                <div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <input type="number" class="form-control money-discount" name="moneydiscount[{{ $id }}]" disabled>
                    <span class="input-group-addon">
                        ฿ <input type="radio" class="radio-discount" name="typeDis[{{ $id }}]"value="3" disabled>
                    </span>
                </div>
            </div>
            <label class="col-md-1 control-label"><h5>Note</h5></label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="note[{{ $id }}]">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label"><h5>Total</h5></label>
            <label class="col-md-2 control-label"><h5 style="color: red;" id="money{{ $id }}"></h5></label>
        </div>
        <div class="form-group col-md-12" align="center">
            <button class="btn btn-info" type="button" onclick="upgrade({{ $member->memberID }})">Upgrade</button>
            <button class="btn btn-success" type="button" onclick="renewal({{ $member->memberID }})">Renew</button>
            <button class="btn btn-danger" onclick="hold({{ $member->memberID }})" type="button">Hold</button>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </div>
</form>

<script type="text/javascript">
    $('#files{{ $id }}').filer({
        addMore: true,
        showThumbs: true
    }); 
</script>