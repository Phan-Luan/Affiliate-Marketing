@extends('user.layouts.master')
@section('page_title', 'Chi Tiết Sản Phẩm')
@section('page_id', 'page-home')
@section('content')
    <section class="content-wrapper bg-background-main" style="min-height: 881px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light portlet-datatable bordered">
                            <div
                                class="layout-navbar navbar-detached shadow-sm p-3 bg-white rounded row container-xxl flex-grow-1 container-p-y">
                                <div class="caption col-6">
                                    <h4 class="mb-0 bold uppercase ">@yield('page_title')</h4>
                                </div>
                                <div class="actions text-right col-6">

                                </div>
                            </div>
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <div class="card p-3">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </section>
@endsection

@push('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- END PAGE LEVEL PLUGINS -->
@endpush

@push('scripts')
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var $disabledResults = $("#user_connect");
        $disabledResults.select2();
    </script>
    @include('admin.lib.tinymce-setup')
    {{-- <script src="{{ asset('global/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
