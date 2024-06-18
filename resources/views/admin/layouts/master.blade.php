<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../web/admin/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>@yield('page_title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('web/admin/img/favico.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
          rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('web/admin/css/bootstrap.min.css')}}">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('web/admin/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('web/admin/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('web/admin/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('web/admin/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('web/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('web/admin/vendor/libs/apex-charts/apex-charts.css')}}" />
    <script src="{{asset('js/loader.js')}}"></script>

@stack('css')
<!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('web/admin/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('web/admin/js/config.js')}}"></script>
    <style>
        a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body style="overflow-x: clip;">
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
    @include('admin.layouts.includes.sidebar')

    <!-- Layout container -->
        <div class="layout-page">
            @include('admin.layouts.includes.navbar')

            @yield('content')

        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<script rel="stylesheet" src="{{asset('web/admin/js/jquery-3.6.4.min.js')}}"> </script>
<script rel="stylesheet" src="{{asset('web/admin/js/bootstrap.min.js')}}"> </script>
<script src="{{asset('js/sweetalert2@11.js')}}"></script>
@include('admin.components.alert')
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js web/admin/vendor/js/core.js -->
<script src="{{asset('web/admin/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('web/admin/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('web/admin/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('web/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('web/admin/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('web/admin/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('web/admin/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('web/admin/js/dashboards-analytics.js')}}"></script>
<script src="{{asset('web/admin/js/core.js')}}"></script>



@stack('scripts')
<!-- Place this tag in your head or just before your close body tag. -->
</body>
</html>
