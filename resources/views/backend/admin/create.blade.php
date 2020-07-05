@extends('layout.template')

@section('css')
<style type="text/css">
    .field-icon {
      float: right;
      margin-left: -25px;
      margin-top: -25px;
      position: relative;
      z-index: 2;
  }
</style>
@stop

@section('body')

<div class="panel">
    <div class="panel-heading">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class="col-md-14">
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-6 -->
                                        <div class="col-md-6">
                                            <!-- begin panel -->
                                            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                                                <h3 class="panel-title">
                                                    Create Admin
                                                </h3>
                                            </div>
                                            <div class="panel-body panel-form">
                                                <form class="form-horizontal form-bordered" name="demo-form" id="form-admin" action="{{ url('manage-admin') }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                                                            Username :
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input class="form-control" data-parsley-required="true" id="fullname" name="userName" placeholder="*Username" type="text" required />
                                                            <span id="user-error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                            Email :
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input class="form-control" data-parsley-type="email" id="email" name="email" placeholder="example@email.com" type="email"required/>
                                                            <span id="message-error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="firstname">
                                                            First Name :
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input class="form-control" data-parsley-required="true"  id="firstname" name="firstname" placeholder="First Name" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="lastname">
                                                            Last Name :
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input class="form-control" data-parsley-type="url" id="lastname" name="lastname" placeholder="lastname" type="text"required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="password">
                                                            Password :
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input class="form-control" id="password" name="password" min="4" type="password" required/>
                                                            <span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="checkpass">
                                                            Repeat Password :
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input class="form-control" id="checkpass" name="" type="password"required/>
                                                            <span id="pass-error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4">
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fa fa-save nn">
                                                                    Save  
                                                                </i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- end panel -->
                                    </div>
                                    <!-- end col-6 -->
                                </div>
                            </div>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@stop
@section('js')
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

    $('#form-admin').submit(function() {
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
    });

</script>
@stop
