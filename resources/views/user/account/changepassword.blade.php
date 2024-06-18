@extends('user.layouts.master')
@section('page_title', 'Đổi mật khẩu')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h4 class="card-title ">
                                    <i class="fa fa-key"></i>
                                    ĐỔI MẬT KHẨU ĐĂNG NHẬP
                                </h4> </div>
                            <div class="card-body">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success">Kết nối toàn cầu</div>
                                </div>
                                <form method="post" action="{{route('us.account.change_password')}}" class="profile-form">
                                    @csrf
                                    <div class="form-group"> <span>Mật khẩu cũ</span>
                                        <input required type="password" class="form-control" name="oldPassword"> </div>
                                    <div class="form-group"> <span>Mật khẩu mới</span>
                                        <input required type="password" class="form-control" name="newPassword"> </div>
                                    <div class="form-group"> <span>Nhập lại mật khẩu mới</span>
                                        <input required type="password" class="form-control" name="confirmNewPassword"> </div>
                                    <div class="row form-group">
                                        <div class="col-xl-12 text-center">
                                            <div class="btn">
                                                <button type="submit" class="btn bg-background" style="color:white; font-weight:bold;">Đổi mật khẩu</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
@push('scripts')
    <script>
    </script>
@endpush
