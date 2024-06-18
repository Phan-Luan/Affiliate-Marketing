@extends('admin.layouts.master')

@section('page_title', 'Thêm mới Video')

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
                        <form action="{{ route('ad.video.store') }}" method="POST" @submit.prevent="onSubmit" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group" :class="[errors.has('key') ? 'has-error' : '']">
                                        <label for="name">Tên <span class="required">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" required value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group" :class="[errors.has('key') ? 'has-error' : '']">
                                        <label for="position">Vị trí <span class="required">*</span></label>
                                        <input type="number" id="position" class="form-control" name="position" required value="{{ old('position') }}">
                                    </div>
                                    <div class="form-group" :class="[errors.has('value') ? 'has-error' : '']">
                                        <label for="iframe">Iframe <span class="required">*</span></label>
                                        <textarea class="form-control" name="iframe" id="iframe" cols="30" rows="10" required>{{ old('value') }}</textarea>
                                    </div>
                                    <div class="form-group" :class="[errors.has('value') ? 'has-error' : '']">
                                        <label for="description">Mô tả <span class="required">*</span></label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="6" required>{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-primary">Tạo mới</button>
                                <a href="{{ route('ad.video.index') }}" class="btn btn-danger">Quay lại</a>
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
