<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quân mật khẩu</title>
    <meta name="description" content="Kết nối toàn cầu" />
    <meta name="keywords" content="Kết nối toàn cầu" />
    <meta property="og:description" content="Kết nối toàn cầu" />
    <meta property="og:keywords" content="Kết nối toàn cầu" />
    <meta property="og:title" content="Kết nối toàn cầu" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:image" content="/content/layout/assets/img/logo-300.png?v=2" />
    <meta property="og:image:width" content="1095" />
    <meta property="og:image:height" content="731" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="icon" href="/content/layout/assets/img/logo-300.png?v=2" type="image/x-icon" />

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
    <link href="{{ asset('customer/main.css?v=0.1')}}" rel="stylesheet" />
    <link href="{{ asset('customer/util.css')}}" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

    <style type="text/css">
        .table-hover tbody tr:hover {
            background-color: #faebd7 !important;
        }
    </style>
</head>
<body style="font-family: Play !important;">

<form method="post"  action="{{route('us.login.post.forgotPass')}}">
    @csrf
    <div class="limiter" style="overflow: hidden;font-family: Play !important;">
        <div class="container-login100" style="background-image: url('{{ asset('customer/bg-login.jpg')}}'); overflow: hidden;">
            <h3 style="width: 100%;     background: radial-gradient( circle, rgb(6 58 255) 0%, rgb(201, 165, 80) 80% );" class="text-dark text-center">KỲ QUAN THIÊN NHIÊN THỨ 7 - VỊNH HẠ LONG - VIỆT NAM</h3>
            <div class="wrap-login100 p-b-30" style="width:420px; padding-top: 0px !important;">
                <div>
                    <center><span id="lblError" style="color:Black;"></span></center>
                </div>
                <div class="login100-form validate-form">
                    <div class="login100-form-avatar pt-4" style="width:80% !important; height: auto !important; border-radius: 0% !important; text-align: center">
                        {{--                        <img src="{{ asset('customer/logo2.png')}}" alt="AVATAR" class="m-b-10"  style="width:60% !important;" />--}}
                        <h4 class="m-b-10 text-white">Quên mật khẩu</h4>
                        <p style="color: white">Nhập số điện thoại của bạn</p>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                        <input name="phone" type="text" style="font-weight:bold;" maxlength="50" id="txtUsername" class="input100" required="" onkeyup="$(this).val($(this).val().replace(/ /g,''))" placeholder="Số điện thoại của bạn" autocomplete="off" value="{{old('phone')}}"/>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button type="submit" id="btnLogin" class="login100-form-btn">Lấy lại mật khẩu</button>
                    </div>
                    <div class="text-center w-full p-t-25 p-b-230">
                        <a href="{{ route('us.login') }}" style="color:white;text-shadow: 1px 1px 5px #000" class="txt1">
                            Quay lại đăng nhập
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $('.showPass').on('click', function () {
        var cls = $('.showPass i').attr('class');
        if (cls == 'fa fa-eye') {
            $('.showPass i').remove();
            $('.showPass').html('<i class="fa fa-eye-slash" style="color:gray;"></i>');
            $('#txtPassword').attr('type', 'text');
        } else {
            $('.showPass i').remove();
            $('.showPass').html('<i class="fa fa-eye" style="color:gray;"></i>');
            $('#txtPassword').attr('type', 'password');
        }
    })
</script>
<style type="text/css">
    .paragraph {
        line-height: 35px !important;
        text-align: justify !important;
        margin-bottom: 15px;
    }

    .input100 {
        border: 1px solid #bf585847 !important;
    }
    .wrap-login100 {
        background-color: #15a0ffd1;
        border-radius: 11px;
        padding: 1rem;
    }
    .login100-form-btn {
        background: linear-gradient(90deg, rgba(9,9,121,1) 0%, rgba(0,212,255,1) 100%);
        color: #fff;
        font-size: 16px;
        text-transform: uppercase;
        font-weight: bold;
    }
</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@include('user.components.alert')
</body>
</html>
<!-- custom js -->
<link href="{{ asset('customer/hotline.css')}}" rel="stylesheet" />
<script src="{{ asset('customer/toastr.min.js')}}"></script>
<script src="{{ asset('customer/unicode.js')}}"></script>
<script src="{{ asset('customer/script.js')}}"></script>


