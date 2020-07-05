<div class="modal fade in" id="upgrade-package" style="display: block; padding-right: 17px;">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close"  data-dismiss="modal" aria-label="Close">×</button>
				<h4 class="modal-title">Upgrade Package</h4>				
			</div>
			<div class="modal-body">
				<form action="{{ url('package-upgrade/'.$package->id_rpackage) }}" method="post" id="form-upgrade">
					@csrf
					<input type="hidden" name="groupid" value="{{ $group->group_number }}">
					<div class="row">
						@if($package->status_upgrade=='1')
						<div class="col-md-3 ml-auto">
							<h5 style="color: red;">ไม่สามารถอัปเกรดได้</h5>
						</div>
						@else
						<div class="col-md-3 ml-auto">
							<h5 style="color: green;">สามารถอัปเกรดได้</h5>
						</div>
						@endif
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Member ID : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<h5>{{ $member->memberID }}</h5>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Name Surname : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<h5>{{ $member->name.'  '.$member->surname }}</h5>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Current Package : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<h5>{{ $package->package_name }}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Upgrade To : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<select class="form-control" id="package" name="package">
								<option value="">
									- Package -
								</option>
								@foreach($allPack as $selPack)
								@if($selPack->less >= $age && $selPack->more <= $age )
								@if($selPack->astext==null||$selPack->astext==$group->grade)
								<option value="{{ $selPack->id }}" data-day="{{ $selPack->package_numday }}"
									data-money="{{ $selPack->package_price }}">
									{{ $selPack->package_name }}
								</option>
								@endif
								@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Start Date : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<input type="date" class="form-control" name="" id="start" value="{{ date($package->start) }}" readonly>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Expire Date : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<input type="date" class="form-control" name="end" id="end" value="{{ date($package->end) }}" readonly>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Discount : </h5>
						</div>
						<h4 class="col-md-2">0 Years</h4>
						<div class="col-md-4">
							<div class="input-group">
								<input type="number" class="form-control" name="discountcon" readonly value="0">
								<span class="input-group-addon">
									%
								</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Discount other: </h5>
						</div>
						<div class="col-md-4">

							<div class="input-group">
								<input type="number" class="form-control" name="discount" id="discount">
								<span class="input-group-addon">
									% <input type="radio" class="radio-discount" name="typeDis"value="2" checked>
								</span>
							</div>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<input type="number" class="form-control" id="moneydiscount" name="moneydiscount" disabled>
								<span class="input-group-addon">
									฿ <input type="radio" class="radio-discount" name="typeDis"value="3">
								</span>
							</div>
						</div>
					</div>
					<div class="row">
						
						<div class="col-md-3 ml-auto">
							
						</div>
						<label class="col-md-1 control-label"><h5>Note</h5></label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="note">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Pay more : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<h5 id="pay"></h5>	
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-inverse" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" {!! ($package->status_upgrade=='1')?'disabled':'' !!} form="form-upgrade">Save Changes</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var oldMoney = {{ $package->package_price }};
	var strday = $('#start').val();
	function endpackage (day,sday) {
		var date = new Date(sday);
		date.setDate(date.getDate(sday) + parseInt(day));
		var dateString = date.toISOString().split('T')[0];
		$('#end').val(dateString);
	}
	function paymore (oldMoney,newMoney) {
		var moremoney = parseInt(newMoney)-parseInt(oldMoney);
		$('#pay').html('฿ '+moremoney);
	}
	$('.radio-discount').change(function(){
		// var money = $('#package').find(':selected').attr('data-money');
		var type = $(this).val();
		// alert(type);
        if (type==2) {
            $('#discount').removeAttr('disabled');
            $('#moneydiscount').attr('disabled','disabled');
        }else{
            $('#discount').attr('disabled','disabled');
            $('#moneydiscount').removeAttr('disabled','disabled');
        }
    });
	$('#package').change(function(){
		var day = $(this).find(':selected').attr('data-day');
		var money = $(this).find(':selected').attr('data-money');
		endpackage(day,strday);
		paymore(oldMoney,money);
	});
	$('#form-upgrade').submit(function(event) {
		event.preventDefault();
		$.ajax({
			type: 'post',
			url: '{{ url('package-upgrade/'.$package->id_rpackage) }}',
			data: $('#form-upgrade').serialize(),
			success: function (data) {
				if (data==1) {
					Swal.fire({
						type: 'success',
						title: 'OK Updated Success!',
					})
					$('#upgrade-package').modal('hide');
				}else{
					Swal.fire({
						type: 'error',
						title: 'Cannot be update',
						text: 'Please try again later.',
					})
				}

			}
		})
	});

</script>