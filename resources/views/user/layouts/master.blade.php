<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title')</title>
    <meta name="description" content="Kết Nối Phụ Nữ" />
    <meta name="keywords" content="Kết Nối Phụ Nữ" />
    <meta property="og:description" content="Kết Nối Phụ Nữ" />
    <meta property="og:keywords" content="Kết Nối Phụ Nữ" />
    <meta property="og:title" content="Kết Nối Phụ Nữ" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:image" content="{{asset('web/images/logo.png')}}" />
    <meta property="og:image:width" content="1095" />
    <meta property="og:image:height" content="731" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="icon" href="{{asset('web/images/logo.png')}}" type="image/x-icon" />

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
    {{--    <link href="{{ asset('customer/modal.css')}}" rel="stylesheet" />--}}
{{--    <script src="{{ asset('customer/home.js')}}"></script>--}}
    <link href="{{ asset('customer/home.css')}}" rel="stylesheet" />
    {{--    <link href="{{ asset('customer/textScroll.css')}}" rel="stylesheet" />--}}

    {{-- <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script> --}}
    <script src="{{ asset('global/plugins/jquery.slim.min.js')}}"></script>
    <script src="{{ asset('global/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('global/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('global/plugins/bootstrap.bundle.min.js') }}"></script>
    {{--    <script src="{{ asset('global/plugins/sweetalert/sweetalert.min.js')}}"></script>--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">--}}



    {{--    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>--}}
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script type = "text/javascript"  src="{{ asset('global/plugins/charts/loader.js') }}"></script>

{{--    <script type = "text/javascript">--}}
{{--        google.charts.load('current', {packages: ['orgchart']});--}}
{{--    </script>--}}
    <style type="text/css">
        .table-hover tbody tr:hover {
            background-color: #faebd7 !important;
        }
        {{--.bg-background {--}}
        {{--    background-image: url({{ asset('customer/sidebar.jpg') }})--}}
        {{--}--}}
        .bg-success p {
            color: white;
        }
    </style>
    @stack('css')
</head>
<body style="font-family: Play !important;">
<link href="{{ asset('customer/main.css?v=0.1')}}" rel="stylesheet" />
<link href="{{ asset('customer/util.css')}}" rel="stylesheet" />
<div class="wrapper">
    {{-- header  --}}
    <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
        <img class="flip flip-r" src="{{asset('web/images/logo.png')}}" alt="TTTN Logo" height="60" width="60" style="display: none;">
    </div>
    @include('user.layouts.includes.header')

    {{-- page  --}}
    @include('user.layouts.includes.sidebar')
    {{-- @include('sweetalert::alert') --}}
    <main>
        <section class="full-page-bg">
            @yield('content')
        </section>
    </main>
    {{-- footer  --}}
    @include('user.layouts.includes.footer')
</div>

<style type="text/css">
    .paragraph {
        line-height: 35px !important;
        text-align: justify !important;
        margin-bottom: 15px;
    }

    .input100 {
        border: 1px solid #bf585847 !important;
    }
</style>
@include('user.components.alert')

<script src="{{ asset('customer/jquery.min.js')}}"></script>
<script src="{{ asset('customer/jquery-ui.min.js')}}"></script>
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
<script src="{{ asset('customer/bootstrap.min.js')}}"></script>
{{--<script src="{{ asset('customer/bootstrap.bundle.min.js')}}"></script>--}}
<script src="{{ asset('customer/js/adminlte.js')}}"></script>

</body>

</html>
<link href="{{ asset('customer/style.min.css')}}" rel="stylesheet" />
<link href="{{ asset('customer/hotline.css')}}" rel="stylesheet" />
<script src="{{ asset('customer/toastr.min.js')}}"></script>
{{--<script src="{{ asset('customer/unicode.js')}}"></script>--}}
{{--<script src="{{ asset('customer/script.js')}}"></script>--}}
@stack('scripts')
