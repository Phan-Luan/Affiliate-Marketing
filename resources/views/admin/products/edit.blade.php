@extends('admin.layouts.master')

@section('page_title', 'Cập nhật sản phẩm')

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
                        <form action="{{ route('ad.product.update', $product) }}" method="POST" @submit.prevent="onSubmit" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                        <label for="name">Tiêu đề <span class="required">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                                    </div>
                                    <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                        <label for="price">Giá bán<span class="required">*</span></label>
                                        <input type="number" id="price" class="form-control" name="price" value="{{ old('price', $product->price) }}">
                                    </div>
                                    <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                        <label for="price_sale">Giá nhập<span class="required">*</span></label>
                                        <input type="number" required id="price_sale" class="form-control" name="price_sale" value="{{ old('price_sale', $product->price_sale) }}">
                                    </div>
                                    <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                        <label for="origin">Giá niêm yết<span class="required">*</span></label>
                                        <input type="number" required id="origin" class="form-control" name="origin" value="{{ old('origin', $product->origin) }}">
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="type">Loại sản phẩm<span class="required">*</span></label>--}}
{{--                                        <select name="type" class="form-control" id="type">--}}
{{--                                            <option {{ $product->type == 0 ? 'selected' : '' }} value="0">Có chia thưởng</option>--}}
{{--                                            <option {{ $product->type == 1 ? 'selected' : '' }} value="1">Không chia thưởng</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="user_connect">Thành viên kết nối<span class="required">*</span></label>--}}
{{--                                        <select name="user_connect" class="form-control" id="user_connect">--}}
{{--                                            <option value="default">Không có</option>--}}
{{--                                            @foreach($users as $user)--}}
{{--                                                <option {{$product->user_connect == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}} ({{$user->phone}})</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                    <div class="form-group" >
                                        <label for="content">Nội dung <span class="required">*</span></label>
                                        <textarea  type="text" id="content" class="form-control tinymce" name="content">{!! old('content', $product->content) !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category_id">Danh mục <span class="required">*</span></label>
                                        <select name="category_id" class="form-control" id="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Hình ảnh <span class="required">*</span></label>
                                        <div>
                                            <div class="fileinput fileinput-{{ $product->image ? 'exists' : 'new' }}" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px;">
                                                    <img class="img-responsive" src="{{ asset('images/no_image.png') }}" alt="" />
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="height: 200px">
                                                    @if($product->image)
                                                        <img class="img-responsive" src="{{ $product->image }}" alt="Preview banner"/>
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

                                    <div class="form-group" :class="[errors.has('description') ? 'has-error' : '']">
                                        <label for="description">Mô tả </label>
                                        <textarea  type="text" id="description" class="form-control" name="description" v-validate="'required'" data-vv-as="&quot;Mô tả&quot;">{{ old('description', $product->description) }}</textarea>
                                        {{--                                        <span class="help-block" v-if="errors.has('description')">@{{ errors.first('description') }}</span>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('ad.product.index') }}" class="btn btn-danger">Quay lại</a>
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
