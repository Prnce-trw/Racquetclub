<div class="modal-body">
	<div class="panel-body panel-form">
		<form action="{{ url('/createbuyclass') }}" class="form-horizontal form-bordered"
			data-parsley-validate="true" method="post" name="demo-form" id="createbuyclass">
			@csrf
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-4" for="fullname">
					Member Id:
				</label>
				<div class="col-md-6 col-sm-6">
					<input type="radio" name="membertype" id="membercard" value="1"> Yes
					&nbsp;
					&nbsp;
					<input type="radio" name="membertype" value="2"> No
					<div id="divmember" style="display: none;">
						<input class="form-control" data-parsley-required="true" id="classID"
							placeholder="Member Card..." type="text" name="classID"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-4" for="email">
					Name:
				</label>
				<div class="col-md-6 col-sm-6">
					<input type="hidden" value="{{$id}}" name="class_id">
					<input class="form-control" data-parsley-required="true" id="name"
						name="buy_name" placeholder="Name..." type="text" value=""/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-4" for="email">
					Last Name:
				</label>
				<div class="col-md-6 col-sm-6">
					<input class="form-control" data-parsley-required="true"  name="buy_lname"  id="surname"
						placeholder="Last Name..." type="text" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-4" for="email">
					Phone:
				</label>
				<div class="col-md-6 col-sm-6">
					<input class="form-control" data-parsley-required="true" name="buy_phone" id="tel"
						placeholder="Phone..." type="text" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-4" for="email">
					Address:
				</label>
				<div class="col-md-6 col-sm-6">
					<textarea class="form-control border-input" name="buy_address" placeholder="Address..." id="address" cols="20" rows="3"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-4" for="email">
					Note:
				</label>
				<div class="col-md-6 col-sm-6">
					<textarea class="form-control border-input" name="buy_note" placeholder="Note..." type="text" cols="20" rows="3"></textarea>
				</div>
			</div>
		</form>
	</div>
</div>
