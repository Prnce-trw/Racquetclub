
<div class="modal fade in" id="renewal" style="display: block; padding-right: 17px;">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close"  data-dismiss="modal" aria-label="Close">×</button>
				<h4 class="modal-title">Renewal</h4>				
			</div>
			<div class="modal-body">
				<form method="post" id="form-renewal">
					@csrf
					<div class="row">
						<div class="col-md-3 ml-auto">
							<label class="radio-inline">
								<input type="radio" name="radioRenew" onchange="divShow()" value="3" id="radioOldGroup" checked>
								Old Group
							</label>
						</div>
						<div class="col-md-3 ml-auto">
							<label class="radio-inline">
								<input type="radio" name="radioRenew" onchange="divShow()" value="1" id="radioAlone">
								Leave Group
							</label>
						</div>
						<div class="col-md-3 ml-auto">
							<label class="radio-inline">
								<input type="radio" name="radioRenew" onchange="divShow()" value="2" id="radioGroup" >
								New Group
							</label>
						</div>
					</div>
					<br>
					<div class="row" style="display: none;" id="divGroupNum">
						<div class="col-md-3 ml-auto">
							<h5>Group number : </h5>
						</div>
						<div class="col-md-4">
							<input type="text" name="groupNumber"class="form-control" id="txtGN">							
						</div>
						<div class="col-md-1">
							<button class="btn btn-primary" type="button" id="btnSearch">Search</button>
						</div>
					</div>
					<div class="row" style="display: none;" id="divMember">
						<div class="col-md-3 ml-auto">
							<h5>Member id : </h5>
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control" id="txtMID">							
						</div>
						<div class="col-md-1">
							<button class="btn btn-primary" type="button" onclick="searchMember()">Search</button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 ml-auto" id="divPreviewGroup">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Member ID : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<h5 id="h5ID">{{ $member->memberID }}</h5>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Group number : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<h5 id="h5numgroup">{{ $group->group_number }}</h5>	
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
							<h5>Select Package : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<select class="form-control" id="package" name="package" required>
								<option value="">
									- Package -
								</option>
								@foreach($allPack as $selPack)
								@if($selPack->less >= $age && $selPack->more <= $age && $selPack->astext==null)
								<option value="{{ $selPack->id }}" data-day="{{ $selPack->package_numday }}"
									data-money="{{ $selPack->package_price }}">
									{{ $selPack->package_name }}
								</option>
								@endif
								@endforeach
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Status Renewal : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<h5 id="status"></h5>
							<input type="hidden" name="status" id="txtstatus" value="1">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>Expire Date : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<input type="date" id="exday" name="exday" class="form-control" readonly value="{{ date($package->end) }}" data-expireTrue="{{ date('Y-m-d', strtotime($package->end. '+1 days')) }}">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>START PACKAGE : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<input type="date" name="start" id="start" class="form-control" value="{{ date('Y-m-d', strtotime($package->end. '+1 days')) }}" required>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 ml-auto">
							<h5>END PACKAGE : </h5>
						</div>
						<div class="col-md-9 ml-auto">
							<input type="date" name="end" id="end" class="form-control" readonly required>	
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
				<button type="submit" class="btn btn-primary" form="form-renewal">Save Changes</button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	
	renewStatus();
	function endpackage (day,sday) {
		var date = new Date(sday);
		date.setDate(date.getDate(sday) + parseInt(day));
		var dateString = date.toISOString().split('T')[0];
		$('#end').val(dateString);

	}
	function renewStatus () {
		var sday = $('#start').val();
		var exday = $('#exday').attr('data-expireTrue');
		if (sday<=exday) {
			$('#status').html('ต่อเนื่อง').css('color', 'green');
			$('#txtstatus').val(1);
		}else{
			$('#status').html('ไม่ต่อเนื่อง').css('color', 'red');
			$('#txtstatus').val(0);
		}
	}
	$('.radio-discount').change(function(){
		var money = $('#package').find(':selected').attr('data-money');
		var type = $(this).val();
		// alert(type);
		if (type==2) {
			$('#discount').removeAttr('disabled');
			$('#moneydiscount').attr('disabled','disabled');
			paymore(money);
		}else{
			$('#discount').attr('disabled','disabled');
			$('#moneydiscount').removeAttr('disabled','disabled');
			calpaymoney(money);
		}
	});
	$('#moneydiscount').change(function(){
		var money = $('#package').find(':selected').attr('data-money');
		calpaymoney(money);
	});
	$('#package').change(function(){
		var day = $(this).find(':selected').attr('data-day');
		var sday = $('#start').val();
		var money = $(this).find(':selected').attr('data-money');
		endpackage(day,sday);
		paymore(money);
		renewStatus ();
		
	});
	$('#start').change(function(){
		var sday = $(this).val();
		var day = $('#package').find(':selected').attr('data-day');
		var money = $('#package').find(':selected').attr('data-money');
		endpackage(day,sday);
		paymore(money);
		renewStatus ();
	});
	function calpaymoney (newMoney) {
		var discount = parseInt($('#moneydiscount').val());
		if (discount==0) {
			var money   = parseInt(newMoney);
		}else{
			var money   = parseInt(newMoney)-parseInt(discount);   
		}

		$('#pay').html('฿ '+money);
	}
	function paymore (newMoney) {   

		var discount = parseInt($('#discount').val());
		if (discount==0) {
			var money   = parseInt(newMoney);
		}else{
			var money   = parseInt(newMoney)-(parseInt(newMoney)*(discount/100));   
		}

		$('#pay').html('฿ '+money);
	}
	$('#discount').change(function(event) {
		var newMoney = $('#package').find(':selected').attr('data-money');
		paymore(newMoney);
	});

	divShow()
	function divShow() {
		if ($("#radioGroup").is(":checked")) {
			$('#divGroupNum').show();
			$('#divMember').show();
		}else{
			$('#divGroupNum').hide();
			$('#divPreviewGroup').html('');
			$('#txtGN').val('');
			$('#divMember').hide();
			$('#txtMID').val('');
		}
	}
	$('#btnSearch').click(function(event) {
		var id = $('#txtGN').val();
		var idMember = {{ $member->memberID }};
		searchGroup(id,idMember)
	});
	function searchGroup(numGroup,idMember) {
		$.ajax({
			url: '{{ url('search-renew') }}',
			type: 'get',
			data: {
				numGroup: numGroup,
				idMember:idMember
			},
			success: function(data) {
				// console.log(data['members'])
				var checkId = true;
				if (data['members'].length!=0) {
					$.each(data['members'], function(index, val) {
						if (val.member_id=={{ $member->memberID }}) {
							checkId = false
						}
					});
					if (checkId) {
						$('#divPreviewGroup').html(data['html']);
						if (data['packHtml']!='') {
							$('#package').html(data['packHtml']);
						}
					}else{
						$('#txtGN').val('');
						Swal.fire({
							type: 'error',
							title: 'Cannot be Search',
							html: 'ไม่สามารถเข้ากลุ่มเดิมได้ <br> กรุณาเข้ากลุ่มใหม่',
						})
					}
				}else{
					$('#txtGN').val('');
					Swal.fire({
						type: 'error',
						title: 'Cannot be Search',
						html: 'ไม่พบข้อมูลของกลุ่มนี้ <br> กรุณากรอกใหม่อีกครั้ง',
					})
				}
			}
		})
	}
	function searchMember () {
		var memberId = $('#txtMID').val();
		$.ajax({
			type: 'get',
			url: '{{ url('renewSearch-member') }}',
			data: {
				memberId:memberId,
			},
			success: function (data) {
				// console.log(data)
				if (data) {
					$('#txtGN').val(data.group_number)
					$('#btnSearch').click();
				}else{
					$('#txtGN').val('');
					$('#txtMID').val('');
					Swal.fire({
						type: 'error',
						title: 'Cannot be update',
						html: 'ไม่พบข้อมูลของหมายเลขสมาชิกนี้<br>กรุณาลองใหม่อีกครั้ง',
					})
				}
			}
		})
	}
	$('#form-renewal').submit(function(event) {
		$.ajax({
			type: 'post',
			url: '{{ url('package-renewal/'.$member->memberID) }}',
			data: $('#form-renewal').serialize(),
			success: function (data) {
				if (data==1) {
					Swal.fire({
						type: 'success',
						title: 'OK Updated Success!',
					})
					$('#renewal').modal('hide');
				}else{
					Swal.fire({
						type: 'error',
						title: 'Cannot be update',
						text: 'Please try again later.',
					})
				}
			}
		})
		return false;
	});
</script>