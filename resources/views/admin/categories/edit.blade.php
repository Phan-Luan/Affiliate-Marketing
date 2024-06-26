@extends('admin.layouts.master')

@section('page_title', 'Cập nhật danh mục')

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
                        <form action="{{ route('ad.category.update', $category) }}" method="POST" @submit.prevent="onSubmit" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                        <label for="name">Tên <span class="required">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" v-validate="'required'" data-vv-as="&quot;Tên&quot;" value="{{ old('name', $category->name) }}">
{{--                                        <span class="help-block" v-if="errors.has('name')">@{{ errors.first('name') }}</span>--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Vị trí</label>
                                        <input type="number" id="position" class="form-control" name="position" value="{{ old('position', $category->position) }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="image">Hình ảnh <span class="required">*</span></label>
                                            <div>
                                                <div class="fileinput fileinput-{{ $category->image ? 'exists' : 'new' }}" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px;">
                                                        <img class="img-responsive" src="{{ asset('images/no_image.png') }}" alt="" />
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="height: 200px">
                                                        @if($category->image)
                                                            <img class="img-responsive" src="{{ $category->image }}" alt="Preview banner"/>
                                                        @endif
                                                    </div>
                                                    <div>
                                                    <span class="btn default btn-file btn-danger">
                                                        <span class="fileinput-new">Chọn ảnh</span>
                                                        <span class="fileinput-exists">Đổi ảnh</span>
                                                        <input type="file" name="image">
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" :class="[errors.has('description') ? 'has-error' : '']">
                                        <label for="description">Mô tả <span class="required">*</span></label>
                                        <textarea  type="text" id="description" class="form-control" name="description" v-validate="'required'" data-vv-as="&quot;Mô tả&quot;">{{ old('description', $category->description) }}</textarea>
{{--                                        <span class="help-block" v-if="errors.has('description')">@{{ errors.first('description') }}</span>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('ad.category.index') }}" class="btn btn-danger">Quay lại</a>
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
