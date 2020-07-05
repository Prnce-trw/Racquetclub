<style type="text/css">
	.div-qrcode{
		width:160px;
		height: 160px;
		border-radius: 5px;
		background-color: white;
		vertical-align: middle;
		display: table-cell;
	}
</style>
<div class="modal fade in" id="card" style="display: block; padding-right: 17px;" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close"  data-dismiss="modal" aria-label="Close">×</button>
				<h4 class="modal-title">Member Card: {{ $member->memberID }}</h4>				
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3 ml-auto">
						<label class="radio-inline">
							<input type="radio" name="radioCode" onchange="changeCard(1)" value="1" id="radioBarcode" checked>
							Barcode
						</label>
					</div>
					<div class="col-md-3 ml-auto">
						<label class="radio-inline">
							<input type="radio" name="radioCode" onchange="changeCard(2)" value="2" id="radioRfid">
							RFID
						</label>
						<form method="post" id="form-code" enctype="multipart/form-data">
							@csrf
							
							<input type="hidden" name="memberID" value="{{ $member->memberID }}">
							<br>
							<input name="QRcode" id="QRcode" style="display: none;" class="form-control" 
							value="{{ ($member->barcode!==null)? $member->barcode : $member->memberID.time() }}">
						</form>
					</div>

				</div>
				<br>
				<br>
				<div class="row">
					<div id='DivIdToPrint' style="margin:0 auto;width:716px;height:450px; background-color: gray;border-radius: 5px 5px;position: relative;">
						<img src="" style="width: 100%;height: 100%;position: absolute;" alt="" id="bgImage">
						<div class="col-md-4 ml-auto">
							<img src="{{ (file_exists($image->path))?url($image->path):asset('images/no-member.jpg') }}" style="padding-left: 20px;padding-top: 70px;">	
						</div>
						<div class="form-group col-md-4" style="padding-top: 70px;">
							<h2 style="color: white;">ID: {{ $member->memberID }}</h2><br>
							<h4 style="color: white;">Name: {{ $member->name }}</h4>
							<h4 style="color: white;">Last name: {{ $member->surname }}</h4>
							<br>
							<br>
							<h4 style="color: white;">Issued: {{ $package->start }}</h4>
							<h4 style="color: white;">Expiry: {{ $package->end }}</h4>
						</div>
						<div class="col-md-4">
							<img src="{{ asset('images/rqsport.png') }}" style="width:210px;padding-top: 30px;padding-bottom: 100px;">
							<div class="div-qrcode text-center" >
								<div id="qrcode" style="margin: 0 auto;"></div>
							</div>
							
						</div>

					</div>
				</div>
				<input type="file" name="file" id="file" style="display: none;">
			</div>	
			<div class="modal-footer">
				<button class="btn btn-primary" onclick="uploadBG()" type="button" style="float: left;"><i class="fa fa-file-image-o"></i> Upload</button>
				<button class="btn btn-warning" type="button" onclick="newcard()" form="form-hold">New Card</button>
				<button type="button" class="btn btn-inverse" data-dismiss="modal">Close</button>
				<button class="btn btn-green" type="button" id="export" form="form-hold">Export PNG</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function exportcard(){
		html2canvas(document.querySelector('#DivIdToPrint'), {
			onrendered: function(canvas) {
				return Canvas2Image.saveAsPNG(canvas);
			}
		});
	}
	genQRcode($('#QRcode').val());
	function genQRcode (id) {
		$('#qrcode').qrcode({
			width: 130,
			height: 130,
			text: id.toString()
		});	

	}

	function saveBarcode () {
		$.ajax({
			url: '{{ url('member-card') }}',
			type: 'POST',
			data: $('#form-code').serialize(),
			success:function (data){
				if (data==1) {
					alert('success');
				}else{
					alert('not success!');
				}
			},
		})
	}
	$('#export').click(function(event) {
		saveBarcode ();
		exportcard();
	});
	function changeCard (ck) {
		// alert(ck);
		if (ck==1) {
			$('#QRcode').hide();
			$('.div-qrcode').show();
		}else{
			$('#QRcode').show();
			$('.div-qrcode').hide();
		}
	}
	$('#file').change(function(event) {
		if (this.files && this.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#bgImage').attr('src', e.target.result);
			}
			reader.readAsDataURL(this.files[0]);
		}
	});
	function uploadBG () {
		$('#file').click();
	}
	function newcard () {
		var code = '{{ $member->memberID.time() }}';
		Swal.fire({
			title: 'Are you sure?',
			html: "Old cards will not be available.!<br>บัตรเก่าจะไม่สามารถใช้งานได้อีกต่อไป",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
			if (result.value) {
				$('#QRcode').val(code)
				$('#qrcode').html('');
				genQRcode(code);
				saveBarcode();
			} 	
		})

	}
</script>