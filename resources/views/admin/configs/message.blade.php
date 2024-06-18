@extends('admin.layouts.master')

@section('page_title', 'Gửi thông báo')

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
                        <a class="btn btn-circle btn-default" href="{{ route('ad.index') }}" title="">Quay lại</a>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <form action="{{ route('ad.send.message') }}" method="POST" @submit.prevent="onSubmit" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group" :class="[errors.has('title') ? 'has-error' : '']">
                                    <label for="title">Tiêu đề <span class="required">*</span></label>
                                    <input type="text" id="title" class="form-control" name="title" v-validate="'required'" data-vv-as="&quot;Tiêu đề&quot;" value="{{ old('title') }}">
                                    <span class="help-block" v-if="errors.has('title')"></span>
                                </div>
                                <div class="form-group" :class="[errors.has('content') ? 'has-error' : '']">
                                    <label for="content">Nội dung <span class="required">*</span></label>
                                    <textarea  name="content" id="editor1" class="tinymce" rows="10" cols="80">&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;Đội ngũ IBET66&lt;br&gt;&nbsp;&nbsp;Trân trọng.</textarea>

                                    <span class="help-block" v-if="errors.has('content')"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type">Danh mục <span class="required">*</span></label>
                                    <select name="type" class="form-control" id="type">
                                        <option value="1">Gửi tới tất cả người chơi</option>
                                        <option value="2">Gửi tới tên nhân vật</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="username">Tên nhân vật <span class="required">*</span></label>
                                    <input type="text" id="username" class="form-control" name="username" >
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn btn-primary">Tạo mới</button>
                            <a href="{{ route('ad.index') }}" class="btn btn-default">Quay lại</a>
                        </div>
                    </form>
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
    <script src="{{ asset('global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    @include('admin.lib.tinymce-setup')
@endpush
