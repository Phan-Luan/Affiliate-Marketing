@extends('admin.layouts.master')

@section('page_title', 'Tạo mới danh mục sản phẩm')

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
                        <form action="{{ route('ad.productcategory.store') }}" method="POST" @submit.prevent="onSubmit" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                        <label for="name">Tên <span class="required">*</span></label>
                                        <input type="text" id="name" required class="form-control" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                        <label for="position">Vị trí <span class="required">*</span></label>
                                        <input type="number" id="position" required class="form-control" name="position" value="{{ old('position') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Icon<span class="required">*</span></label>
                                        <div>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px;">
                                                    <img class="img-responsive" src="{{ asset('images/no_image.png') }}" alt="" />
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="height: 200px"></div>
                                                <div>
                                                <span class="btn default btn-file" style="background: green; color: white; font-weight: bold">
                                                    <span class="fileinput-new" >Chọn ảnh</span>
                                                    <span class="fileinput-exists" >Đổi ảnh</span>
                                                    <input type="file" accept="image/*" name="image">
                                                </span>
                                                    <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Xóa</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <label for="description">Mô tả</label>
                                        <textarea  type="text" id="description" class="form-control" name="description" >{!! old('description') !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-primary">Tạo mới</button>
                                <a href="{{ route('ad.productcategory.index') }}" class="btn btn-default">Quay lại</a>
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
