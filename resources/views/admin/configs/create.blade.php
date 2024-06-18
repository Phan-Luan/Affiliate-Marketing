@extends('admin.layouts.master')

@section('page_title', 'Tạo mới cấu hình')

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-datatable bordered">
                <div class="layout-navbar navbar-detached shadow-sm p-3 bg-white rounded row container-xxl flex-grow-1 container-p-y">
                    <div class="caption col-6">
                        <h4 class="mb-0 bold uppercase ">@yield('page_title')</h4>
                    </div>
                    <div class="actions text-right col-6">

                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3">
                        <form action="{{ route('ad.config.store') }}" method="POST" @submit.prevent="onSubmit" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group" :class="[errors.has('key') ? 'has-error' : '']">
                                        <label for="key">Key <span class="required">*</span></label>
                                        <input type="text" id="key" class="form-control" name="key" v-validate="'required'" data-vv-as="&quot;Key&quot;" value="{{ old('key') }}">
{{--                                        <span class="help-block" v-if="errors.has('key')">@{{ errors.first('key') }}</span>--}}
                                    </div>
                                    <div class="form-group" :class="[errors.has('value') ? 'has-error' : '']">
                                        <label for="value">Value <span class="required">*</span></label>
                                        <textarea class="form-control" name="value" id="value" cols="30" rows="10" v-validate="'required'" data-vv-as="&quot;Value&quot;">{{ old('value') }}</textarea>
{{--                                        <span class="help-block" v-if="errors.has('value')">@{{ errors.first('value') }}</span>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-primary">Tạo mới</button>
                                <a href="{{ route('ad.config.index') }}" class="btn btn-danger">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
@endpush

@push('scripts')
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    @include('admin.lib.tinymce-setup')
    {{-- <script src="{{ asset('global/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
