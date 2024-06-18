@extends('admin.layouts.master')

@section('page_title', 'Cập nhật banner')

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
                        <form action="{{ route('ad.banner.update', $banner) }}" method="POST" @submit.prevent="onSubmit" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                        <label for="name">Tên <span class="required">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $banner->name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Hình ảnh <span class="required">*</span></label>
                                        <div>
                                            <div class="fileinput fileinput-{{ $banner->images ? 'exists' : 'new' }}" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px;">
                                                    <img class="img-responsive" src="{{ asset('images/no_image.png') }}" alt="" />
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="height: 200px">
                                                    @if($banner->images)
                                                        <img class="img-responsive" src="{{ $banner->images }}" alt="Preview banner"/>
                                                    @endif
                                                </div>
                                                <div>
                                                <span class="btn default btn-file btn-danger">
                                                    <span class="fileinput-new">Chọn ảnh</span>
                                                    <span class="fileinput-exists">Đổi ảnh</span>
                                                    <input type="file" name="images">
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('ad.banner.index') }}" class="btn btn-danger">Quay lại</a>
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
