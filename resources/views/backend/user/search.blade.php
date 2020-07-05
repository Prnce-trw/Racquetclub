@extends('layout.template')
@section('css')
<style type="text/css">
	.boxContainer {
		display: table;
		background-color: gray;
		width: 195px;
		height: 260px;
	}
	.box {
		display: table-cell;
		text-align: center;
		vertical-align: bottom; 
	}
	.freedom {
		position: fixed;
		bottom: 50px;
		left: 16%;
	}
	.right {
		float: right;
	}
</style>
@stop

@section('body')
<div class="panel-group" id="accordion">
	@foreach($members as $key => $member)
	<div class="panel panel-inverse overflow-hidden">
		<div class="panel-heading">
			<h3 class="panel-title" align="center">
				<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion" href="#{{$member->memberID}}">
					<i class="fa fa-plus-circle pull-right"></i> 
					{{ 'Member id :'.$member->memberID }} Name :{{ $member->name.' '.$member->surname }}
				</a>
			</h3>
		</div>
		<div id="{{$member->memberID}}" data-grade="{{ $key+1 }}" class="panel-collapse collapse {{ ($member->memberID==$id)?'in':'' }}">
		</div>
	</div>
	@endforeach
</div>
<div class="panel">
	<form id="form-register" action="{{ url('manage-user') }}" method="post" enctype="multipart/form-data">	
		@csrf
	</form>	
	<div class="panel-footer text-right" id="div-btn" style="display: none;">
		<button class="btn btn-success" type="button">
			PRINT
		</button>
		<button class="btn btn-primary" type="submit" form="form-register" value="Save">
			REGISTER
		</button>
	</div>
</div>
<div class="panel col-md-6" id="div-foot" style="float: right;display: none;">
	<div class="panel-body">
		<div class="form-group">
			<label class="col-md-8"><h4>Total register</h4></label>
			<label class="col-md-4"><h4 id="totalregister">0</h4></label>
		</div>
		<div class="form-group">
			<label class="col-md-8"><h4>Total pay</h4></label>
			<label class="col-md-4"><h4 id="totalPay">0</h4></label>
		</div>
	</div>
</div>


<div id="resultModal"></div>

<!--===================== Modal Crop ========================--->
<div id="cropImageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upload & Crop Image</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-8 text-center">
						<div id="image_demo" style="width:350px; margin-top:30px"></div>
					</div>
					<div class="col-md-4" style="padding-top:30px;">
						<button class="btn btn-success crop_image" data-id="">Crop & Upload Image</button>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>    
</div>


<div class="freedom">
	<button class="btn btn-primary" type="button" id="addgroup">+Add</button>
	<button class="btn btn-danger" type="button" id="removegroup">remove</button>
</div>
@stop



@section('btnFree')
@stop

@section('js')
<script type="text/javascript">

	var ids = $('.panel-collapse');
	var i = ids.length ;
	// console.log(ids)
	ids.each(function(index, el) {
		var id = this.id;
		var grade =  this.dataset.grade
		searchMemberall(grade,id)
	});
	// console.log(IDs)
	function appendform (id) {
		// alert(id);
		$.ajax({
			type: 'GET',
			url: '{{ url('append-div') }}'+'/'+id,
			data: {
				'id': id
			},

			success: function (data) {
				$('#form-register').append(data);
				$('#totalregister').html(i);
				member_num(i);
			}
		});
	}
	function calpayone (id) {
		var discount = $('input[name="discount'+id+'"').val();

		if (discount==''||discount==null) {

			discount = 0;
		}
		var pay = $('select[name="package'+id+'"').find(':selected').attr('data-price');
		var totalone = parseInt(pay)-(parseInt(pay)*(parseInt(discount)/100));

		$('#money'+id.substring(1,id.length-1)).html(totalone);

	}
	function calpaymoney (id) {

        var discount = $('input[name="moneydiscount'+id).val();
        if (discount==''||discount==null) {

            discount = 0;
        }
        var pay = $('select[name="package'+id+'"').find(':selected').attr('data-price');
        var totalone = parseInt(pay)-parseInt(discount);

        $('#money'+id.substring(1,id.length-1)).html(totalone);
        
    }
	function totalPay () {
		var x = $('.money-pay');
		var total = 0;
		x.each(function(index, el) {
			if (this.innerHTML!=null&&this.innerHTML!='') {
				total += parseInt(this.innerHTML)
			}
			total += 0;
			console.log(this.innerHTML);
		});
		$('#totalPay').html(total);
	}
	function searchMember (grade) {
		var memberID = $('input[name="member_num['+grade+']"').val();
		if (memberID!==null&&memberID!=='') {
			$.ajax({
				type: 'GET',
				url: '{{ url('search-div') }}'+'/'+memberID,
				data: {
					'grade': grade
				},

				success: function (data) {
					if (data!=0) {
						$('#panel-body'+grade).html(data);
						member_num(i);
						totalPay();
					}else{
						Swal.fire({
							type: 'error',
							title: 'Cannot Search',
							text: 'ต้องยังไม่เป็นสมาชิกกลุ่มใดดทั้งนั้น Please enter Member ID again.',

						})
						clearMember(grade);

					}

				},
				error: function () {
					Swal.fire({
						type: 'error',
						title: 'Cannot Search',
						text: 'Please enter Member ID again.',

					})
					clearMember(grade);
				}
			});
		}else{
			Swal.fire({
				type: 'error',
				title: 'Cannot Search',
				text: 'Please enter Member ID again.',

			})
		}
	}
	function searchMemberall (grade,memberID) {
		if (memberID!==null&&memberID!=='') {
			$.ajax({
				type: 'GET',
				url: '{{ url('search-edit') }}'+'/'+memberID,
				data: {
					'grade': grade
				},

				success: function (data) {
					if (data!=0) {
						$('#'+memberID).html(data);
						// member_num(i);
						// totalPay();
					}else{
						Swal.fire({
							type: 'error',
							title: 'Cannot Search',
							text: 'ต้องยังไม่เป็นสมาชิกกลุ่มใดดทั้งนั้น Please enter Member ID again.',

						})
						// clearMember(grade);

					}

				},
				error: function () {
					Swal.fire({
						type: 'error',
						title: 'Cannot Search',
						text: 'Please enter Member ID again.',

					})
					// clearMember(grade);
				}
			});
		}else{
			Swal.fire({
				type: 'error',
				title: 'Cannot Search',
				text: 'Please enter Member ID again.',

			})
		}
	}
	function clearMember(grade) {
        // alert(grade)
        $.ajax({
        	type: 'GET',
        	url: '{{ url('search-div') }}'+'/'+'0',
        	data: {
        		'grade': grade
        	},

        	success: function (data) {
        		$('#panel-body'+grade).html(data);
        		member_num(i);
        		totalPay();
        	},
        	error: function () {
        		Swal.fire({
        			type: 'error',
        			title: 'Cannot Clear',
        			text: 'Please enter Member ID again.',

        		})
        	}
        });
    }
    function member_num (i) {
    	$('.group-num').val('{{ $members[0]->group_number }}');
    }
    function selectPackage (date,inputName) {
    	var birthday = +new Date(date);
    	var age = ~~((Date.now() - birthday) / (31557600000));
    	$.ajax({
    		type: 'GET',
    		url: '{{ url('select-package') }}',
    		data: {
    			'age': age
    		},
    		success: function (data) {
    			$('select[name="package'+inputName+'"').html(data);

    		}
    	});
    }
    function endpackage (day,sday,name) {
    	var date = new Date(sday);
    	date.setDate(date.getDate(sday) + parseInt(day));
    	var dateString = date.toISOString().split('T')[0];
    	$('input[name="enddate'+name+'"').val(dateString);
    }



    $(document).on('change','.radio-discount', function(){
        var grade = $(this).attr('name').substring(7);
        var type = $(this).val();
        if (type==2) {
            $('input[name="discount'+grade).removeAttr('disabled');
            $('input[name="moneydiscount'+grade).attr('disabled','disabled');
            calpayone(grade);
        }else{
            $('input[name="discount'+grade).attr('disabled','disabled');
            $('input[name="moneydiscount'+grade).removeAttr('disabled','disabled');
            calpaymoney(grade);
        }
        totalPay();
    });
    $(document).on('change','.money-discount', function(){
        var name = $(this).attr('name').substring(13);
        calpaymoney(name);
        totalPay();
    });
    $(document).on('change','.birthday', function(){
    	var dateBirth = $(this).val();
    	var input = $(this).attr('name').substring(8);
        // alert(input);
        selectPackage(dateBirth,input);
    });
    $(document).on('change','.package', function(){
    	var day = $(this).find(':selected').attr('data-day');
    	var name = $(this).attr('name').substring(7);
    	var sday = $('input[name="startdate'+name+'"').val();
    	endpackage(day,sday,name);
    	calpayone(name);
    	totalPay();
    });
    $(document).on('change','.startdate', function(){
    	var sday = $(this).val();
    	var name = $(this).attr('name').substring(9);
    	var day = $('select[name="package'+name+'"').find(':selected').attr('data-day');
    	endpackage(day,sday,name);
    });
    $(document).on('change','.discount', function(){
    	var name = $(this).attr('name').substring(8);
    	calpayone(name);
    	totalPay();
    });
    $(document).on('change','.check-other', function(){
        var grade = $(this).attr('name').substring(8,9);
        if ($(this).is(':checked')) {
            $('input[name="other['+grade+']"').removeAttr('disabled');
        }else{
            $('input[name="other['+grade+']"').attr('disabled','disabled');
        }
    });
    $(document).on('change','.check-friend', function(){
        var grade = $(this).attr('name').substring(8,9);
        if ($(this).is(':checked')) {
            $('input[name="friend['+grade+']"').removeAttr('disabled');
        }else{
            $('input[name="friend['+grade+']"').attr('disabled','disabled');
        }
    });
	//append group
	$('#addgroup').click(function() {
		var groupNum = $('#membergroup').val();
		if (groupNum.substring(0,3)=='fam') {
			if(i < 6){
				i = i+1;
				$('.panel-collapse').removeClass('in');
				appendform(i);
				$('#div-foot').css('display', 'block');
				$('#div-btn').css('display', 'block');
			}else{
				Swal.fire({
					type: 'error',
					title: 'Cannot Add',
					text: 'This group has been full.',

				})
			}			
		}else if(groupNum.substring(0,3)=='one'){
			Swal.fire({
				type: 'error',
				title: 'Cannot Add',
				text: 'Cannot to add group.',

			})
		}else{
			i = i+1;
			$('.panel-collapse').removeClass('in');
			appendform(i);
			$('#div-foot').css('display', 'block');
			$('#div-btn').css('display', 'block');
		}
	});
	$('#removegroup').click(function() {
		if (i!=ids.length) {
			$('#panel-body'+i).remove();
			$('#hr'+i).remove();
			i = i-1;
			if (i==ids.length) {
				$('#div-foot').css('display', 'none');
				$('#div-btn').css('display', 'none');
			}
            $('#totalregister').html(i);
            member_num(i);
        }
        totalPay();
    });


	//crop image

	var image_crop = $('#image_demo').croppie({
		enableExif: true,
		viewport:{
			width:195,
			height:260,
			type:'square'
		},
		boundary:{
			width:300,
			height:300
		}
	});
	$(document).on('change', '.input-image', function() {
		var reader = new FileReader();
		reader.onload = function (event) {
			image_crop.croppie('bind',{
				url: event.target.result
			}).then(function(){
				console.log('jQuery bind complete');
			})
		}
		reader.readAsDataURL(this.files[0]);
		var strID = $(this).attr('div-id')
		$('#cropImageModal').modal('show');
		$('.crop_image').attr('data-id',strID);
	});

	$('.crop_image').click(function(event) {
		var divID = $(this).attr('data-id');
		var idgrade = $(this).attr('data-id').substring(9);
		image_crop.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function(response){
			$('#cropImageModal').modal('hide');
			$('#'+divID).css('background-image', 'url("'+response+'")');
			$('#imgBase'+idgrade).val(response);
		})
	});
</script>
<script type="text/javascript">
	function upgrade(id) {
		$.ajax({
			url: '{{ url('modal-upgrade') }}',
			type: 'GET',
			data:{
				'id':id,
			},
			success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#upgrade-package").modal('show');
                }
            });
	}
	function renewal(id) {
		$.ajax({
			url: '{{ url('modal-renewal') }}',
			type: 'GET',
			data:{
				'id':id,
			},
			success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#renewal").modal('show');
                }
            });
	}
	function hold(id) {
		$.ajax({
			url: '{{ url('modal-hold') }}',
			type: 'GET',
			data:{
				'id':id,
			},
			success: function (data) {
                    // alert(data);
                    $('#resultModal').html(data);
                    $("#hold").modal('show');
                }
            });
	}
	
</script>
@stop