@extends('user.layouts.master')
@section('page_title', 'Trang tài khoản')
@section('page_id', 'page-home')
@section('content')
    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">

                <div class="row d-flex justify-content-left">
                    <div id="exTab2" style="width: 100%; max-width: 100%" class="mb-4">
                        <ul class="nav nav-tabs justify-content-center">
                            <li class="active w-20 bg-success btn text-light m-1" data-type="1">
                                <a href="#1" style="font-size: 25px" data-toggle="tab">Hội Viên</a>
                            </li>
                            <li data-type="2" class="w-20 btn-primary text-light btn m-1">
                                <a class="text-light" style="font-size: 25px" href="#2" data-toggle="tab">Thành Viên
                                    Kết Nối</a>
                            </li>
                            <li data-type="3" class="w-40 btn btn-danger text-light m-1">
                                <a class="text-light" style="font-size: 25px" href="#3" data-toggle="tab">Nhà Sản Xuất
                                    Kinh Doanh</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" style="transform: scale(1.0) !important;">
                        <div class="tab-pane active" id="1">
                            <div class="pt-4 row bg-white my-4 mx-1 rounded border" style="padding-top: 8px;">
                                {{-- <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Thành viên giới thiệu <br>
                                                <small>Thành viên trực thuộc</small>
                                            </p>
                                            <h3 class="resetText" id="lbTotalMember">
                                                {{ number_format(users()->user()->count_invite(users()->user()->id)) }}</h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Thành viên hoạt động <br>
                                                <small>Thành viên đã KÍCH HOẠT</small>
                                            </p>
                                            <h3 class="resetText" id="lbMemberActive">
                                                {{ number_format(users()->user()->count_invite_active(users()->user()->id)) }}
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Đơn hàng cá nhân <br>
                                                <small>Đơn hàng đã thanh toán</small>
                                            </p>
                                            <h3 class="resetText" id="lbDSCN">
                                                {{ number_format(users()->user()->count_order_active(users()->user()->id)) }}
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-shopping-basket"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Doanh số cá nhân <br>
                                                <small>Tổng doanh số cá nhân</small>
                                            </p>
                                            <h3 class="resetText" id="lbDSN">
                                                {{ number_format(users()->user()->total_order_active(users()->user()->id)) }}đ
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="small-box justify-content-center bg-success bg-background">
                                        <div class="inner w-100">
                                            <img width="100%" src="{{ asset('images/z5401507948825_f5f513a1583adaad6fd0f967a64ff45a.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mb-4 text-center col-xl-12 col-lg-12 col-sm-12 col-xs-12"
                                style="position: fixed; top: 0">
                                <button type="button" class="w-50 btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal-hoi-vien">
                                    KÍCH HOẠT
                                </button>
                            </div>
                        </div>
                        <div class="tab-pane" id="2">
                            <div class="pt-4 row bg-white my-4 mx-1 rounded border" style="padding-top: 8px;">
                                {{-- <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Thành viên giới thiệu <br>
                                                <small>Thành viên trực thuộc</small>
                                            </p>
                                            <h3 class="resetText" id="lbTotalMember">
                                                {{ number_format(users()->user()->count_invite(users()->user()->id)) }}</h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Thành viên hoạt động <br>
                                                <small>Thành viên đã KÍCH HOẠT</small>
                                            </p>
                                            <h3 class="resetText" id="lbMemberActive">
                                                {{ number_format(users()->user()->count_invite_active(users()->user()->id)) }}
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Đơn hàng cá nhân <br>
                                                <small>Đơn hàng đã thanh toán</small>
                                            </p>
                                            <h3 class="resetText" id="lbDSCN">
                                                {{ number_format(users()->user()->count_order_active(users()->user()->id)) }}
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-shopping-basket"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Doanh số cá nhân <br>
                                                <small>Tổng doanh số cá nhân</small>
                                            </p>
                                            <h3 class="resetText" id="lbDSN">
                                                {{ number_format(users()->user()->total_order_active(users()->user()->id)) }}đ
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="small-box justify-content-center bg-success bg-background">
                                        <div class="inner w-100">
                                            <img width="100%" src="{{ asset('images/z5401507948704_4fc7c5a8725963b4f8cd2b8345edbe38.jpg') }}" alt="">
                                        </div>
                                        <div class="inner w-100">
                                            <img width="100%" src="{{ asset('images/z5401507948706_c6429b2e348d5ffcb8824dae045a64c4.jpg') }}" alt="">
                                        </div>
                                        <div class="inner w-100">
                                            <img width="100%" src="{{ asset('images/z5401507948705_22983d8339e54f57af877d6e0be7df60.jpg') }}" alt="">
                                        </div>
                                        <div class="inner w-100">
                                            <img width="100%" src="{{ asset('images/z5401507950879_8b8cc0f72d571eb3be9b31eb53b4d171.jpg') }}" alt="">
                                        </div>
                                        <div class="inner w-100">
                                            <img width="100%" src="{{ asset('images/z5401507950881_14a9c2d9034e40ecd114499dfe3d8185.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mb-4 text-center col-xl-12 col-lg-12 col-sm-12 col-xs-12"
                                style="position: fixed; top: 0">
                                <a href="{{ route('us.memberconnect') }}"><button class="w-50 btn btn-danger">KÍCH
                                        HOẠT</button></a>
                            </div>
                        </div>
                        <div class="tab-pane" id="3">
                            <div class="pt-4 row bg-white my-4 mx-1 rounded border" style="padding-top: 8px;">
                                {{-- <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Thành viên giới thiệu <br>
                                                <small>Thành viên trực thuộc</small>
                                            </p>
                                            <h3 class="resetText" id="lbTotalMember">
                                                {{ number_format(users()->user()->count_invite(users()->user()->id)) }}</h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Thành viên hoạt động <br>
                                                <small>Thành viên đã KÍCH HOẠT</small>
                                            </p>
                                            <h3 class="resetText" id="lbMemberActive">
                                                {{ number_format(users()->user()->count_invite_active(users()->user()->id)) }}
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Đơn hàng cá nhân <br>
                                                <small>Đơn hàng đã thanh toán</small>
                                            </p>
                                            <h3 class="resetText" id="lbDSCN">
                                                {{ number_format(users()->user()->count_order_active(users()->user()->id)) }}
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-shopping-basket"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Doanh số cá nhân <br>
                                                <small>Tổng doanh số cá nhân</small>
                                            </p>
                                            <h3 class="resetText" id="lbDSN">
                                                {{ number_format(users()->user()->total_order_active(users()->user()->id)) }}đ
                                            </h3>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="small-box justify-content-center bg-success bg-background">
                                        <div class="inner w-100">
                                            <img width="100%" src="{{ asset('images/z5401507954799_03d761b17a5240143b7d01365899b0f3.jpg') }}" alt="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mb-4 text-center col-xl-12 col-lg-12 col-sm-12 col-xs-12"
                                style="position: fixed; top: 0">
                                <a href="{{ route('us.checkmember') }}"><button class="w-50 btn btn-danger">KÍCH
                                        HOẠT</button></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="exampleModal-hoi-vien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <p class="text-center"><b>Thông Tin Giao Dịch</b></p> --}}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-danger text-center p-4">
                        <h4 class="mt-2 font-weight-bold">Chúc Mừng Bạn Đã Trở Thành Hội Viên</h4>
                        <p class="mt-3 text-danger">"Hãy chung tay cùng chúng tôi hỗ trợ các giải pháp giúp phụ nữ khởi
                            nghiệp tại Việt
                            Nam!"</p>
                        <button type="button" style="background: #cd2020; font-size: 20px" class="p-2 btn btn-info close w-100"
                            data-dismiss="modal" aria-label="Close">Xác
                            nhận</button>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $('#linkIntroduce').click(() => {
            navigator.clipboard.writeText(
                `{{ request()->getHttpHost() . '/register?href=' . '' . auth('user')->user()->phone }}`);
            $('.copy').text('Copy thành công');
            Swal.fire('Thành Công', 'Copy thành công link!', 'success', )
        });

        // Format Number
        function addCommas(str) {
            var amount = new String(str);
            amount = amount.split("").reverse();

            var output = "";
            for (var i = 0; i <= amount.length - 1; i++) {
                output = amount[i] + output;
                if ((i + 1) % 3 == 0 && (amount.length - 1) !== i)
                    output = '.' + output;
            }
            return output;
        }
    </script>
@endpush
