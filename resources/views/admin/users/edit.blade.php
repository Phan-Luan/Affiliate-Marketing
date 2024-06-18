@extends('admin.layouts.master')

@section('page_title', 'Cập nhật Thành viên')

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-datatable bordered">
                <div
                    class="layout-navbar navbar-detached shadow-sm p-3 bg-white rounded row container-xxl flex-grow-1 container-p-y">
                    <div class="caption col-6">
                        <h4 class="mb-0 bold uppercase ">@yield('page_title')</h4>
                    </div>
                    <div class="actions text-right col-6">
                        <a class="btn btn-circle btn-default" href="{{ route('ad.user.index') }}" title="">Quay lại</a>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3">
                        <form action="{{ route('ad.user.update', $user) }}" method="POST" @submit.prevent="onSubmit"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                        <label for="name">Tên <span class="required">*</span></label>
                                        <input type="text" id="name" class="form-control" required name="name"
                                            required value="{{ old('name', $user->name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" class="form-control"
                                            value="{{ old('email', $user->email) }}">
                                    </div>
                                    <div class="form-group" :class="[errors.has('phone') ? 'has-error' : '']">
                                        <label for="phone">SĐT <span class="required">*</span></label>
                                        <input type="text" id="phone" class="form-control" readonly name="phone"
                                            value="{{ old('phone', $user->phone) }}">
                                    </div>
                                    <div class="form-group" :class="[errors.has('phone') ? 'has-error' : '']">
                                        <label for="address">Địa chỉ<span class="required">*</span></label>
                                        <input type="text" id="address" class="form-control" required name="address"
                                            value="{{ old('address', $user->address) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Giới tính</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="2" {{ $user->gender == 2 ? 'selected' : '' }}>Nam</option>
                                            <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Nữ</option>
                                        </select>
                                    </div>
                                    <div class="form-group" :class="[errors.has('phone') ? 'has-error' : '']">
                                        <label for="year_of_birth">Năm sinh<span class="required">*</span></label>
                                        <input type="number" id="year_of_birth" class="form-control" required
                                            name="year_of_birth" value="{{ old('year_of_birth', $user->year_of_birth) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu (Bỏ trống nếu không cập nhật mật khẩu) </label>
                                        <input type="text" id="password" class="form-control" min="6"
                                            max="20" name="password" value="{{ old('password') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Điểm Mua Hàng</label>
                                        <input type="number" id="password" class="form-control" name="point_buy"
                                            value="{{ old('point_buy', $user->point_buy) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="level">Bổ nhiệm</label>
                                        <select class="form-control" name="level" id="level">
                                            <option value="1" {{ $user->level == 1 ? 'selected' : '' }}>Hội Viên
                                            </option>
                                            <option value="2" {{ $user->level == 2 ? 'selected' : '' }}>Thành Viên Kết
                                                Nối</option>
                                            <option value="3" {{ $user->level == 3 ? 'selected' : '' }}>Nhà Sản Xuất,
                                                Kinh Doanh</option>
                                            {{-- <option value="4" {{$user->level == 4 ? 'selected' : ''}}>Giám đốc kinh doanh ***</option>
                                            <option value="5" {{$user->level == 5 ? 'selected' : ''}}>Giám đốc kinh doanh ****</option>
                                            <option value="6" {{$user->level == 6 ? 'selected' : ''}}>Giám đốc kinh doanh *****</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('ad.user.index') }}" class="btn btn-default">Quay lại</a>
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
