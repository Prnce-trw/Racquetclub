<center><h1>{{ $id }}</h1></center>
<div class="col-md-3 boxContainer" id="div-image{{ $id }}">
    <input type="file" name="imgUser[{{ $id }}]" div-id="div-image{{ $id }}" id="imgUser{{ $id }}" style="display: none;" class="input-image">
    <div class="box">
        <button class="btn" type="button" onclick="document.getElementById('imgUser{{ $id }}').click()"><i class="ion-camera "></i></button>
        <input type="hidden" name="imgBase64[{{ $id }}]" value="">
    </div>
</div>
<div class="col-md-9">
    <div class="form-group col-md-12">
        <label class="col-md-2 control-label"><h5>Member ID :</h5></label>
        <div class="col-md-4">
            <input class="form-control" name="member_num[{{ $id }}]" type="text"/>
        </div>
        <div class="col-md-6">
            <button class="btn btn-primary p-l-40 p-r-40" type="button" onclick="searchMember({{ $id }})">
                Search
            </button>
            <button class="btn btn-white p-l-40 p-r-40" type="button" onclick="clearMember({{ $id }})">
                Clear
            </button>
        </div>
    </div> 
    <div class="form-group col-md-12">
        <label class="col-md-2 control-label"><h5>Register Date :</h5></label>
        <div class="col-md-4">
            <input class="form-control border-input" name="registerdate[{{ $id }}]" placeholder="Register Date" type="date" value="{{ date("Y-m-d") }}" required readonly/>
        </div>                    
        <label class="col-md-2 control-label"><h5>Member Group :</h5></label>
        <div class="col-md-4">
            <input class="form-control group-num" id="membergroup" name="membergroup[{{ $id }}]" type="text" value="" />
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-2 control-label"><h5>Name :</h5></label>
        <div class="col-md-4">
            <input class="form-control border-input" name="name[{{ $id }}]" placeholder="Name" type="text" value="" required/>
        </div>                    
        <label class="col-md-2 control-label"><h5>Last name :</h5></label>
        <div class="col-md-4">
            <input class="form-control border-input" name="surname[{{ $id }}]" placeholder="Surname" type="text" value="" required/>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-2 control-label"><h5>Nationality :</h5></label>
        <div class="col-md-4">
            <input class="form-control border-input" name="nation[{{ $id }}]" placeholder="Nationality" type="text" value="" required/>
        </div>
        <label class="col-md-2 control-label"><h5>BIRTH DAY :</h5></label>
        <div class="col-md-4">
            <input class="form-control border-input birthday" id="birthday" name="birthday[{{ $id }}]" placeholder="วัน/เดือน/ปี" type="date" value="" required>
        </div>  
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-2 control-label"><h5>Occupation :</h5></label>
        <div class="col-md-4">
            <input class="form-control border-input" name="job[{{ $id }}]" placeholder="Occupation" type="text" value="" />
        </div>
        <label class="col-md-2 control-label"><h5>GENDER :</h5></label>
        <div class="col-md-4">
            <select class="default-select2 form-control" name="gender[{{ $id }}]" placeholder="Select Package" required>
                <option value="">
                    ---SELECT GENDER---
                </option>
                <option value="1">
                    MALE
                </option>
                <option value="2">
                    FEMAL
                </option>
            </select>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-2 control-label"><h5>Tel. :</h5></label>
        <div class="col-md-4">
            <input class="form-control border-input" id="" name="tel[{{ $id }}]" placeholder="tel" type="text" value="" required>
        </div>                    
        <label class="col-md-2 control-label"><h5>E-mail :</h5></label>
        <div class="col-md-4">
            <input class="form-control border-input" id="" name="email[{{ $id }}]" placeholder="E-mail" type="text" value="" required>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-2 control-label"><h5>Emergency Tel:</h5></label>
        <div class="col-md-4">
            <input class="form-control border-input" id="" name="Etel[{{ $id }}]" placeholder="tel" type="text" value="">
        </div>                    
        <label class="col-md-2 control-label"><h5>Emergency Name:</h5></label>
        <div class="col-md-4">
            <input class="form-control border-input" id="" name="Ename[{{ $id }}]" placeholder="Name" type="text" value="">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-2 control-label"><h5>Address :</h5></label>
        <div class="col-md-10">
            <textarea class="form-control" rows="4" name="address[{{ $id }}]" placeholder="ที่อยู่" required></textarea>
        </div>                    
    </div>
    <div class="form-group col-md-12">              
        <label class="col-md-2 control-label"><h5>Package :</h5></label>
        <div class="col-md-4">
            <select class="form-control package" name="package[{{ $id }}]" type="text" id="package" required>
                <option value="">
                    - Package -
                </option>
                @foreach($packages as $key => $package)
                <option value="{{ $package->id }}" data-day="{{ $package->package_numday }}" data-price="{{ $package->package_price }}">
                    {{ $package->package_name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="col-md-2 control-label"><h5>START PACKAGE :</h5></label>
        <div class="col-md-4">
            <input class="form-control border-input startdate" id="startPackage" name="startdate[{{ $id }}]" type="date" value="{{ date("Y-m-d") }}" required/>
        </div>                    
        <label class="col-md-2 control-label"><h5>END PACKAGE :</h5></label>
        <div class="col-md-4">
            <input readonly class="form-control border-input enddate" id="endpackage" name="enddate[{{ $id }}]" type="date" value="" required/>
        </div>
    </div>
    <div class="form-group col-md-12">                   
        <label class="col-md-2 control-label"><h5>SPORT :</h5></label>
        <div class="form-group col-md-10">
            @foreach($sports as $sport)
            <div class="col-md-3">
                <label class="checkbox-inline">
                    <input type="checkbox" value="{{ $sport->id_sport }}" name="chSport[{{ $id }}][]">
                    {{ $sport->name_sport }}
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
                    <input type="checkbox" value="1" name="chGoal[{{ $id }}][]">
                    Weight Loss
                </label>
            </div>
            <div class="col-md-3">
                <label class="checkbox-inline">
                    <input type="checkbox" value="2" name="chGoal[{{ $id }}][]">
                    Weight Gain
                </label>
            </div>
            <div class="col-md-3">
                <label class="checkbox-inline">
                    <input type="checkbox" value="3" name="chGoal[{{ $id }}][]">
                    Body Building 
                </label>
            </div>
            <div class="col-md-3">
                <label class="checkbox-inline">
                    <input type="checkbox" value="4" name="chGoal[{{ $id }}][]">
                    Rehab
                </label>
            </div>
            <div class="col-md-3">
                <label class="checkbox-inline">
                    <input type="checkbox" value="5" name="chGoal[{{ $id }}][]">
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
            <input type="file" name="files[{{ $id }}]" class="fileupload" multiple="multiple">
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
                <input type="number" class="form-control discount" name="discount[{{ $id }}]">
                <span class="input-group-addon">
                    % <input type="radio" class="radio-discount" name="typeDis[{{ $id }}]"value="2" checked>
                </span>
            </div>
            <div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group">
                <input type="number" class="form-control money-discount" name="moneydiscount[{{ $id }}]" disabled>
                <span class="input-group-addon">
                    ฿ <input type="radio" class="radio-discount" name="typeDis[{{ $id }}]"value="3">
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
        <label class="col-md-2 control-label"><h5 style="color: red;" id="money{{ $id }}" class="money-pay"></h5></label>
    </div>
</div>
<hr id="hr{{ $id }}">

<script type="text/javascript">
    $('input[name="files[{{ $id }}]"').filer({
        addMore: true,
        showThumbs: true
    }); 
</script>