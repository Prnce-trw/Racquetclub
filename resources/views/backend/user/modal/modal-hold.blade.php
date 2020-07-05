<div class="modal fade in" id="hold" style="display: block; padding-right: 17px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close"  data-dismiss="modal" aria-label="Close">×</button>
				<h4 class="modal-title">Hold พักอายุสมาชิกชั่วคราว</h4>				
			</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<thead>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Document</th>
						<th>Number of days</th>
					</thead>
					<tbody>
						@foreach($holds as $key => $hold)
						<tr>
							<td>{{ $hold->start_hold }}</td>
							<td>{{ $hold->end_hold }}</td>
							<td><a href="{{ url($hold->file_hold) }}" target="blank"><i class="fa fa-file"></i></a></td>
							<td>{{ $hold->day }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<form id="form-hold" action="{{ url('store-hold/'.$member->memberID) }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-3">
							<label class="control-label"><h4> Start Hold Date :</h4></label>
						</div>
						<div class="col-md-3">
							<input type="date" class="form-control" name="start" placeholder="Date Start" id="startHold" required>
						</div>
						<div class="col-md-3">
							<label class="control-label"><h4> End Hold Date :</h4></label>
						</div>
						<div class="col-md-3">
							<input type="date" class="form-control" name="end" readonly placeholder="Date End" id="endHold" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label class="control-label"><h4> Total Hold Date :</h4></label>
						</div>
						<div class="col-md-3">
							<input type="number" class="form-control" name="total" required id="totalHold">
						</div>
						<div class="col-md-3">
							<label class="control-label"><h4><i class="fa fa-file"></i>  Document :</h4></label>
						</div>
						<div class="col-md-3">
							<input type="file" name="files" id="file-hold" class="form-control" required>
						</div>
					</div>
				</form>
			</div>	
			<div class="modal-footer">
				<button type="button" class="btn btn-inverse" data-dismiss="modal">Close</button>
				<button class="btn btn-danger" type="submit" form="form-hold">Hold</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
	function totalDateHold (sdate,totaldate) {
		var edate = new Date(sdate);
		edate.setDate(edate.getDate(sdate) + (totaldate-1));
		edate = edate.toISOString().split('T')[0];
		$('#endHold').val(edate);
	}
	$('#startHold').change(function() {
		var totalHold = $('#totalHold').val();
		totalDateHold($(this).val(),totalHold)
	});
	$('#totalHold').change(function() {
		var startHold = $('#startHold').val();
		totalDateHold(startHold,$(this).val())
	});
	$('#form-hold').submit(function(e) {
		var form = this;
		var totalhold = $('#totalHold').val()
		var idmember = '{{ $member->memberID }}';
		var bool = false;
		$.ajax({
			url: '{{ url('checkdate-hold') }}',
			type: 'GET',
			async:false,
			data: {totalhold: totalhold,
				id: idmember
			},
			success: function (data) {
				bool = data;
				if (!bool) {
					Swal.fire({
						title: 'Are you sure?',
						html: "You won't be able to revert this!<br>จำนวนวันที่เพิ่มจะไม่เลยวันสิ้นสุด ของคนแรก",
						type: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
						if (result.value) {
							form.submit();
						} 	
					})
				}
			}
		})
		return bool;
	});
</script>