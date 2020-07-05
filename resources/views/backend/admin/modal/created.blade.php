<style type="text/css">
	.field-icon {
		float: right;
		margin-left: -25px;
		margin-top: -25px;
		position: relative;
		z-index: 2;
	}
</style>

<div class="modal fade in" id="modal-created" style="display: block;" tabindex="-1">
	<div class="modal-dialog">
		<form class="form-horizontal form-bordered" name="demo-form" id="form-admin" action="{{ url('manage-admin') }}" method="post">
			@csrf
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Personal Information</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id_admin" name="id_admin" value="{{ ($dataAdmin != null)?$dataAdmin->id_admin:'' }}">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4" for="fullname">
							Username :
						</label>
						<div class="col-md-6 col-sm-6">
							<input class="form-control" data-parsley-required="true" id="fullname" name="userName" placeholder="*Username" type="text" required value="{{ ($dataAdmin != null)?$dataAdmin->username:'' }}" />
							<span id="user-error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4" for="email">
							Email :
						</label>
						<div class="col-md-6 col-sm-6">
							<input class="form-control" data-parsley-type="email" id="email" name="email" placeholder="example@email.com" type="email"required value="{{ ($dataAdmin != null)?$dataAdmin->email:'' }}" />
							<span id="message-error"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4" for="firstname">
							First Name :
						</label>
						<div class="col-md-6 col-sm-6">
							<input class="form-control" data-parsley-required="true"  id="firstname" name="firstname" placeholder="First Name" type="text" required value="{{ ($dataAdmin != null)?$dataAdmin->firstname_admin:'' }}" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4" for="lastname">
							Last Name :
						</label>
						<div class="col-md-6 col-sm-6">
							<input class="form-control" data-parsley-type="url" id="lastname" name="lastname" placeholder="lastname" type="text"required value="{{ ($dataAdmin != null)?$dataAdmin->lastname_admin:'' }}"/>
						</div>
					</div>
					@if($dataAdmin!==null)
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4" for="password">
							Old Password :
						</label>
						<div class="col-md-6 col-sm-6">
							<input class="form-control" id="oldpassword" name="oldpassword" min="4" type="password" required value=""/>
							<span toggle="#oldpassword" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
							<span id="old-error"></span>
						</div>
					</div>
					@endif
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4" for="password">
							Password :
						</label>
						<div class="col-md-6 col-sm-6">
							<input class="form-control" id="password" name="password" min="4" type="password" value=""/>
							<span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4" for="checkpass">
							Repeat Password :
						</label>
						<div class="col-md-6 col-sm-6">
							<input class="form-control" id="checkpass" name="" type="password"/>
							<span id="pass-error"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					@if($dataAdmin != null&&$dataAdmin->status_admin == '1')
					<button class="btn btn-warning btn-sm pull-left" type="button" onclick="blockadmin({{ $dataAdmin->id_admin }},0)">Block</button>
					@elseif($dataAdmin != null&&$dataAdmin->status_admin == '0')
					<button class="btn btn-info btn-sm pull-left" type="button" onclick="blockadmin({{ $dataAdmin->id_admin }},1)">Unblock</button>
					@endif
					<a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Close</a>
					<button class="btn btn-sm btn-primary" type="submit">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>
<form action="" method="post" id="form-block">
	@csrf
</form>
<script type="text/javascript">
	$(".toggle-password").click(function() {
		$(this).toggleClass("fa-eye-slash fa-eye");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") 
		{
			input.attr("type", "text");
		} 
		else 
		{
			input.attr("type", "password");
		}
	});
	function checkpassword () {
		var password = $("#password").val();
		var confirmPassword = $("#checkpass").val();
		if (password != confirmPassword) {
			$('#pass-error').html('Password does not match.');
			$('#pass-error').css({
				color: 'red'
			});
			return false;
		}else{
			$('#pass-error').html('Password is matched.');
			$('#pass-error').css({
				color: 'green'
			});
			return true;
		}
	}
	function checkEmail (email) {
		var ckck = false;
		$.ajax({
			type: "get",
			url: '{{ url('manage-admin-checkemail') }}',
			data: {
				email:email,
			},
			async: false,
			success: function(data) {
				if(data == '1'){
					$('#message-error').html('This email is validated.');
					$('#message-error').css({
						color: 'green'
					});
					ckck = true;
				}else{
					$('#message-error').html('That email is taken. Try another.');
					$('#message-error').css({
						color: 'red'
					});
					ckck = false;
				}
			},
		});
		return ckck ;

	}
	function checkUser (username) {
		var ckck ;
		$.ajax({
			type: "get",
			url: '{{ url('manage-admin-checkemail') }}',
			data: {
				username:username,
			},
			async: false,
			success: function(data) {
				if(data == '1'){
					$('#user-error').html('This username is validated.');
					$('#user-error').css({
						color: 'green'
					});
					ckck = true;
				}else{
					$('#user-error').html('That username is taken. Try another.');
					$('#user-error').css({
						color: 'red'
					});
					ckck = false;
				}
			}
		});
		return ckck ;
	}
	function checkPass (oldpassword) {
		var ckck ;
		var oldpassword = $('#oldpassword').val();
		$.ajax({
			type: "get",
			url: '{{ url('manage-admin-checkemail') }}',
			data: {
				oldpassword:oldpassword,
			},
			async: false,
			success: function(data) {
				if(data == '1'){
					$('#old-error').html('Password OK');
					$('#old-error').css({
						color: 'green'
					});
					ckck = true;
				}else{
					$('#old-error').html('Password incorrect. Please enter again.');
					$('#old-error').css({
						color: 'red'
					});
					ckck = false;
				}
			}
		});
		return ckck ;
	}

	$('#form-admin').submit(function() {
		var id_admin = $('#id_admin').val();
		
		if (id_admin!==''&&id_admin!==null) {
			alert(id_admin);
			var email = $('#email').val();
			var username = $('#fullname').val();
			var oldpassword = $('#oldpassword').val();
			var ckpassword = checkPass(oldpassword);
			var ckpass = checkpassword();
			// alert(ckpassword);
			if (!ckpassword) {
				return false;
				// alert('false');
			};

			if (email != '{{ auth('web')->user()->email }}') {
				var checkemail =  checkEmail(email);
				if (!checkemail) {
					return false;
				};

			}
			if (username!='{{ auth('web')->user()->username }}') {
				var checkuser = checkUser(username);
				if (!checkuser) {
					return false;
				};
			}
			if (!checkpassword) {
				return false;
			};	
			
		}else{
			var email = $('#email').val();
			var username = $('#fullname').val();

			var checkpass = checkpassword();
			console.log(checkpass);

			var checkemail =  checkEmail(email);
			console.log(checkemail);

			var checkuser = checkUser(username);
			console.log(checkuser);

			if (!checkpass) {
				return false;
			};
			if (!checkemail) {
				return false;
			};
			if (!checkuser) {
				return false;
			};
		}
	});
	function blockadmin(id,status) {
        var urlaction =  '{{url('block')}}'+'/'+id+'/'+status;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'คุณแน่ใจหรือ?',
            text: "ผู้ใช้งานจะถูกพักสมาชิกชั่วคราว!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            reverseButtons: true
        }).then((result) => {
                // alert(result.value);
                if (result.value) {
                    $( "#form-block" ).attr('action',urlaction);
                    $( "#form-block" ).submit();                    
                    
                } else if (result.dismiss === Swal.DismissReason.cancel) 
                {
                    swalWithBootstrapButtons.fire(
                        'ยกเลิก',
                        'ยกเลิกการพักสถานะ',
                        'error'
                        )
                }
            })

    }
</script>