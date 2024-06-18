@extends('admin.layouts.master')

@section('page_title', 'Cập nhật Admin')

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
                        <a class="btn btn-circle btn-default" href="{{ route('ad.admin.index') }}" title="">Quay lại</a>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3">
                        <form action="{{ route('ad.admin.update', $admin) }}" method="POST" @submit.prevent="onSubmit" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                        <label for="name">Tên <span class="required">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" v-validate="'required'" data-vv-as="&quot;Tên&quot;" value="{{ old('name', $admin->name) }}">
{{--                                        <span class="help-block" v-if="errors.has('name')">@{{ errors.first('name') }}</span>--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email <span class="required">*</span></label>
                                        <input type="text" id="email" class="form-control" disabled value="{{ old('email', $admin->email) }}">
                                    </div>
                                    <div class="form-group" :class="[errors.has('phone') ? 'has-error' : '']">
                                        <label for="phone">SĐT <span class="required">*</span></label>
                                        <input type="text" id="phone" class="form-control" name="phone" v-validate="'required'" data-vv-as="&quot;SĐT&quot;" value="{{ old('phone', $admin->phone) }}">
{{--                                        <span class="help-block" v-if="errors.has('phone')">@{{ errors.first('phone') }}</span>--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu </label>
                                        <input type="text" id="password" class="form-control" name="password"  value="{{ old('password') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('ad.admin.index') }}" class="btn btn-default">Quay lại</a>
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
    <!-- END PAGE LEVEL PLUGINS -->
@endpush

@push('scripts')
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{-- <script src="{{ asset('global/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
