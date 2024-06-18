<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng ký tài khoản</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:image:width" content="1095" />
    <meta property="og:image:height" content="731" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('customer/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('customer/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('customer/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('customer/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('customer/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('customer/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('customer/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('customer/summernote-bs4.min.css')}}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('customer/custom.css')}}">
    <link href="{{ asset('customer/toastr.min.css')}}" rel="stylesheet" />
    <script src="{{ asset('customer/jquery-2.1.1.js')}}"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <style type="text/css">
        .table-hover tbody tr:hover {
            background-color: #faebd7 !important;
        }
    </style>
</head>
<body style="font-family: Play !important;">
<link href="{{ asset('customer/main.css?v=0.1')}}" rel="stylesheet" />
<link href="{{ asset('customer/util.css')}}" rel="stylesheet" />


<form method="post"  action="{{ route('us.register.store') }}">
    @csrf
    <div class="limiter" style="overflow: hidden;">
        <div class="container-login100" style="background-image: url('{{ asset('customer/bg-login.jpg')}}'); overflow: hidden;">
            <h3 style="width: 100%;     background: radial-gradient( circle, rgb(6 58 255) 0%, rgb(201, 165, 80) 80% );" class="text-dark text-center">Kết Nối Phụ Nữ</h3>
            <div class="wrap-login100 p-b-30" style="width:100%;  max-width :700px; padding-top: 0px !important;">
                <div>
                    <center><span id="lblError" style="color:Black;"></span></center>
                </div>
                <div class="login100-form validate-form row">
                    <div class="col-12">
                        <div class="login100-form-avatar m-b-30 text-center" style="width:100% !important; height: auto !important; border-radius: 0% !important; text-align: center">
{{--                            <img src="{{ asset('customer/logo2.png')}}" style="max-width:200px;" alt="AVATAR" class="m-b-10" />--}}
                            <h4 style="color:white;text-shadow: 1px 1px 5px #000 ;" class="m-b-10 title-res">Đăng ký tài khoản</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="font-size: 13px; margin-left: 10px; margin-bottom: 5px;">Họ và tên </div>
                        <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                            <input name="name" type="text" maxlength="50" required id="txtUsername" class="input100" placeholder="Họ và tên" autocomplete="off" value="{{ old('name') }}"/>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="font-size: 13px; margin-left: 10px; margin-bottom: 5px;">Số điện thoại (Dùng để đăng nhập)</div>
                        <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                            <input name="phone" type="tel" maxlength="10"  required id="txtUsername" onkeyup="$(this).val($(this).val().replace(/\D/g,''))" class="input100" placeholder="Tên đăng nhập bằng số điện thoại" value="{{ old('username') }}" autocomplete="off" />
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="font-size: 13px; margin-left: 10px; margin-bottom: 5px;">Mật khẩu </div>
                        <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                            <input name="password" type="password" maxlength="50" required id="txtPassword" class="input100" placeholder="Mật khẩu" autocomplete="off" />
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock"></i>
                            </span>
                            <span class="showPass" style="right: 20px !important; position: absolute; bottom: 10px; cursor: pointer;">
                                <i class="fa fa-eye" style="color:gray;"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div style="font-size: 13px; margin-left: 10px; margin-bottom: 5px;">Năm sinh </div>
                        <div class="wrap-input100  m-b-10" >
                            <input name="year_of_birth" type="text" maxlength="4" required  class="input100" placeholder="Nhập năm sinh"  value="{{ old('year_of_birth') }}"/>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="font-size: 13px; margin-left: 10px; margin-bottom: 5px;">Địa chỉ </div>
                        <div class="wrap-input100 validate-input m-b-10" >
                            <input name="address" type="text" maxlength="100" required id="txtEmail" class="input100" placeholder="Địa chỉ" autocomplete="off" />
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="font-size: 13px; margin-left: 10px; margin-bottom: 5px;">Giới tính</div>
                        <div class="wrap-input100 validate-input m-b-10" >
                            <select class="form-select input100" name="gender" aria-label="Chọn giới tính">
                                <option value="1">Nữ</option>
                                <option value="2" selected>Nam</option>
                            </select>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div style="font-size: 13px; margin-left: 10px; margin-bottom: 5px;">Thành viên giới thiệu  </div>
                        <div class="wrap-input100 validate-input m-b-10" data-validate="Sponsor is required">
                            @if(isset($user))
                                <input  type="text" maxlength="50" class="input100" value="{{ $user->name }}" readonly autocomplete="off" />
                                <input name="invite_user" type="hidden" maxlength="50" class="input100" value="{{ $user->phone }}" readonly autocomplete="off" />
                            @else
                                <input  type="text" maxlength="50" class="input100" value="" readonly autocomplete="off" />
                            @endif
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-link"></i>
                            </span>
                        </div>
                    </div>
                    <div class="container-login100-form-btn p-t-10">
                        <input class="check-submit" type="checkbox" name="" id=""> Tôi đồng ý với tất cả các điều khoản, nội quy, quy định của công ty
                    </div>
                    <div class="container-login100-form-btn p-t-10">
                        <button type="submit" id="btnLogin" class="login100-form-btn"  style="color:white;text-shadow: 1px 1px 5px #000 ;">Xác nhận đăng ký</button>
                    </div>
                    <div class="text-center w-full p-t-25 p-b-230">
                        <a class="title-res" href="{{ route('us.login.index') }}" style="color:white;text-shadow: 1px 1px 5px #000 ; width:50%; font-size:16px;display:inherit " class="txt1">
                            Quay lại đăng nhập
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style type="text/css">
    @media only screen and (max-width: 1024px) {
        .login100-form-btn, .title-res {
            width: 100% !important;
        }
    }
    .title-res {
        background-color: #2af1e6  !important;
    }
    .paragraph {
        line-height: 35px !important;
        text-align: justify !important;
        margin-bottom: 15px;
    }

    .input100 {
        border: 1px solid #bf585847 !important;
    }
    .login100-form {
        background-color: #15a0ffd1;
        border-radius: 11px;
        padding: 1rem;
        color: #000;
        font-weight: bold
    }

    .login100-form-btn{
        background-color: #FF4500	;
        color: #fff;
        font-size: 18px;
        width: 50%;
        font-weight: bold;
    }

    .title-res {
        background-color: #FF4500	;
        color: #fff;
        padding: 10px;
        width: 80%;
        border-radius: 25px;
        margin: 0 auto;
    }

    .check-submit{
        width: 25px;
        /* height: 15px; */
        margin-right: 5px;
    }
</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $('.showPass').on('click', function () {
        var cls = $('.showPass i').attr('class');
        if (cls == 'fa fa-eye') {
            $('.showPass i').remove();
            $('.showPass').html('<i class="fa fa-eye-slash" style="color:gray;"></i>');
            $('#txtPassword').attr('type', 'text');
            $('#txtPasswordConfirm').attr('type', 'text');
        } else {
            $('.showPass i').remove();
            $('.showPass').html('<i class="fa fa-eye" style="color:gray;"></i>');
            $('#txtPassword').attr('type', 'password');
            $('#txtPasswordConfirm').attr('type', 'password');
        }
    })
</script>
@include('user.components.alert')

</body>
</html>
<!-- custom js -->
<link href="{{ asset('customer/hotline.css')}}" rel="stylesheet" />
<script src="{{ asset('customer/toastr.min.js')}}"></script>
<script src="{{ asset('customer/unicode.js')}}"></script>
<script src="{{ asset('customer/script.js')}}"></script>

