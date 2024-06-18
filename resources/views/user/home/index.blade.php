@extends('user.layouts.master')
@section('page_title', 'Trang tài khoản')
@section('page_id', 'page-home')
@section('content')
    @php
        use Carbon\Carbon;
        use App\Models\Order;
    @endphp

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <div class="row">
                    <div class="container-fluid mb-1 m-0">
                        {{--                        @if (auth('user')->user()->type != 1) --}}
                        <div class="link-introduce bg-background p-3 rounded text-white text-center">
                            <span>Link Giới Thiệu:</span>
                            <strong
                                class="">{{ request()->getHttpHost() . '/register?href=' . '' . auth('user')->user()->phone }}</strong>
                            <button class="btn btn-light " id="linkIntroduce">Copy</button>
                        </div>
                        {{--                        @endif --}}
                    </div>
                </div>
                <div class="row bg-white my-4 mx-1 rounded border justify-content-center"
                    style="margin: 5px -10px 20px -10px !important; position: relative;">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6" style="margin-top:5px;">
                        <div class="small-box bg-success bg-background" style="">
                            <img src="{{ asset('web/images/logo.png') }}"
                                style="width: 12%; position: absolute; right: 5px; top: 5px;" class="">
                            <div class="inner inner-box" style="display: inline-block; width:100%">
                                <div class="content-box1" style="padding-left: 0px !important;">
                                    @if (users()->user()->level > 1)
                                        <span class="clsRank"
                                            style="cursor: pointer;font-size: 17px; padding: 5px 20px; background-color: white; border-radius: 10px; font-weight: bold;">
                                        @else
                                            <span
                                                style="cursor: pointer;font-size: 17px; padding: 5px 20px; border: 1px solid wheat;; border-radius: 10px; font-weight: bold;">
                                    @endif
                                    <i class="fas fa-check"></i>
                                    @if (users()->user()->level == 1)
                                        Hội Viên
                                    @elseif(users()->user()->level == 2)
                                        Thành Viên Kết Nối
                                    @elseif(users()->user()->level == 3)
                                        Đăng Ký Đại Diện
                                    @elseif(users()->user()->level == 4)
                                        Nhà Sản Xuất Kinh Doanh
                                    @elseif(users()->user()->level == 5)
                                        Hội Viên, Thành Viên Kết Nối
                                    @elseif(users()->user()->level == 6)
                                        Hội Viên, Đăng Ký Đại Diện
                                    @elseif(users()->user()->level == 7)
                                        Hội Viên, Nhà Sản Xuất Kinh Doanh
                                    @elseif(users()->user()->level == 8)
                                        Thành Viên Kết Nối, Đăng Ký Đại Diện
                                    @elseif(users()->user()->level == 9)
                                        Thành Viên Kết Nối, Nhà Sản Xuất Kinh Doanh
                                    @elseif(users()->user()->level == 10)
                                        Đăng Ký Đại Diện, Nhà Sản Xuất Kinh Doanh
                                    @elseif(users()->user()->level == 11)
                                        Hội Viên, Thành Viên Kết Nối, Đăng Ký Đại Diện
                                    @elseif(users()->user()->level == 12)
                                        Hội Viên, Thành Viên Kết Nối, Nhà Sản Xuất Kinh Doanh
                                    @elseif(users()->user()->level == 13)
                                        Hội Viên, Đăng Ký Đại Diện, Nhà Sản Xuất Kinh Doanh
                                    @elseif(users()->user()->level == 14)
                                        Thành Viên Kết Nối, Đăng Ký Đại Diện, Nhà Sản Xuất Kinh Doanh
                                    @elseif(users()->user()->level == 15)
                                        Hội Viên, Thành Viên Kết Nối, Đăng Ký Đại Diện, Nhà Sản Xuất Kinh Doanh
                                    @endif
                                    </span>
                                    <h6 style="margin-top: 0.5rem;">
                                        <strong>{{ auth('user')->user()->phone }}</strong>
                                        <img src="{{ asset('customer/img/verify.png') }}" width="30">
                                    </h6>
                                    <h3>{{ auth('user')->user()->name }}</h3>
                                    @if (!users()->user()->cccd_before)
                                        <span onclick="location.href='{{ route('us.account.kyc') }}'"
                                            style="cursor: pointer;font-size: 17px; padding: 5px 20px; background-color: white; color: #659702; border-radius: 10px; font-weight: bold;">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            Bạn chưa KYC
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bg-white my-4 mx-1 rounded border justify-content-center"
                    style="margin: 5px -10px 20px -10px !important; position: relative;">
                    {{-- <div class="col-12 col-sm-4 col-md-4 col-lg-4" style="margin-top:5px;">
                        <div class="small-box bg-success bg-background">
                            <div class="inner inner-box">
                                <p>1. Ví hoa hồng 🌹🌹🌹 trực tiếp</p>
                                <h3>{{ number_format(auth('user')->user()->money, 0, ',', '.') }} ₫</h3>
                            </div>
                            <div class="icon" style="display:block !important">
                                <i class="fas fa-wallet"></i>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4" style="margin-top:5px;">
                        <div class="small-box bg-success bg-background">
                            <div class="inner inner-box">
                                <p>Ví Tổng Thu Nhập</p>
                                <h3>
                                    {{ number_format(users()->user()->money) }}
                                </h3>
                            </div>
                            <a href="{{ route('us.payment.history_transaction') }}">
                                <div class="icon" style="display:block !important">
                                    <i class="fas fa-wallet"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4 col-md-4 col-lg-4" style="margin-top:5px;">
                        <div class="small-box bg-success bg-background">
                            <div class="inner inner-box">
                                <p>Tổng Thành Viên</p>
                                <h3>{{ number_format(users()->user()->count_invite(users()->user()->id)) }}
                                </h3>
                            </div>
                            <a href="{{ route('us.member') }}">
                                <div class="icon" style="display:block !important">
                                    <i class="fas fa-users"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{-- <div class="col-12 col-sm-4 col-md-4 col-lg-4" style="margin-top:5px;">
                        <div class="small-box bg-success bg-background">
                            <div class="inner inner-box">
                                <p>Kho Tiền Hoàn 150%</p>
                                <h3>
                                    {{ isset(users()->user()->point) ? number_format(users()->user()->point, 0, ',', '.') . 'VNĐ' : '0 ₫' }}
                                </h3>
                            </div>
                            <a href="{{ route('us.order.warehouse') }}">
                                <div class="icon" style="display:block !important">
                                    <i class="fas fa-money-bill"></i>
                                </div>
                            </a>
                        </div>
                    </div> --}}

                    <div class="col-12 col-sm-4 col-md-4 col-lg-4" style="margin-top:5px;">
                        <div class="small-box bg-success bg-background">
                            <div class="inner inner-box">
                                <p>Điểm tiêu dùng</p>
                                <h3>
                                    {{ number_format(users()->user()->use_point) }}
                                </h3>
                            </div>
                            <a href="">
                                <div class="icon" style="display:block !important">
                                    <i class="fas fa-wallet"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4 col-md-4 col-lg-4" style="margin-top:5px;">
                        <div class="small-box bg-success bg-background">
                            <div class="inner inner-box">
                                <p>Ví Điểm SMILE</p>
                                <h3>
                                    {{ number_format(users()->user()->point) }}
                                </h3>
                            </div>
                            <a href="">
                                <div class="icon" style="display:block !important">
                                    <i class="fas fa-wallet"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
                <!-- Main row -->
                {{-- <div class="row d-flex justify-content-center">
                    <div id="exTab2" style="width: 100%; max-width: 1000px;">
                        <ul class="nav nav-tabs justify-content-center active-tab-custom">
                            <li class="active w-25" data-type="1">
                                <a href="#1" data-toggle="tab">Thống kê thành viên</a>
                            </li>
                            <li data-type="2" class="w-25">
                                <a href="#2" data-toggle="tab">Thống kê hoa hồng</a>
                            </li>
                            <li data-type="3" class="w-25">
                                <a href="#3" data-toggle="tab">Thống kê doanh số</a>
                            </li>
                            <li data-type="4" class="w-25">
                                <a href="#4" data-toggle="tab">Nhà Sản Xuất Kinh Doanh</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" style="transform: scale(1.0) !important;">
                        <div class="tab-pane active" id="1">
                            <div class="row bg-white my-4 mx-1 rounded border" style="padding-top: 8px;">
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Thành viên đã giới thiệu <br>
                                                <small>Thành viên trực thuộc</small>
                                            </p>
                                            <h3 class="resetText" id="lbTotalMember">
                                                {{ number_format(users()->user()->count_invite(users()->user()->id)) }}</h3>
                                        </div>
                                        <div class="icon" style="display:block !important">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Thành viên hoạt động <br>
                                                <small>Thành viên đã kích hoạt</small>
                                            </p>
                                            <h3 class="resetText" id="lbMemberActive">
                                                {{ number_format(users()->user()->count_invite_active(users()->user()->id)) }}
                                            </h3>
                                        </div>
                                        <div class="icon" style="display:block !important">
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
                                        <div class="icon" style="display:block !important">
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
                                        <div class="icon" style="display:block !important">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Doanh số nhóm <br>
                                                <small>Tổng doanh số đội nhóm</small>
                                            </p>
                                            <h3 class="resetText" id="lbDSN">Đang cập nhật</h3>
                                        </div>
                                        <div class="icon" style="display:block !important">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="2">
                            <div class="row bg-white my-4 mx-1 rounded border" style="padding-top: 8px;">
                                <div class="col-xl-4 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Hoa hồng trực tiếp</p>
                                            <h3 class="resetText" id="lbCommissionType_0">
                                                {{ number_format(users()->user()->total_money_type(users()->user()->id, 0)) }}
                                                ₫</h3>
                                        </div>
                                        <div class="icon" style="display:block !important">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Hoa hồng thu nhập/ thu nhập</p>
                                            <h3 class="resetText" id="lbCommissionType_1">
                                                {{ number_format(users()->user()->total_money_type(users()->user()->id, 1)) }}
                                                ₫</h3>
                                        </div>
                                        <div class="icon" style="display:block !important">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="3">
                            <h2 class="text-center">Doanh số thẻ</h2>
                            <div class="row bg-white my-4 mx-1 rounded border" style="padding-top:8px;">
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Hôm nay</p>
                                            <h3>{{ number_format(users()->user()->total_sale_card_time(users()->user()->id, 'today')) }}
                                                ₫</h3>
                                        </div>
                                        <div class="icon" style="display:block !important">
                                            <i class="fas fa-calendar-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Hôm qua</p>
                                            <h3>{{ number_format(users()->user()->total_sale_card_time(users()->user()->id, 'yesterday')) }}
                                                ₫</h3>
                                        </div>
                                        <div class="icon" style="display:block !important">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Tháng này</p>
                                            <h3>{{ number_format(users()->user()->total_sale_card_time(users()->user()->id, 'thisMonth')) }}
                                                ₫</h3>
                                        </div>
                                        <div class="icon" style="display:block !important">
                                            <i class="fa fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Tháng trước</p>
                                            <h3>{{ number_format(users()->user()->total_sale_card_time(users()->user()->id, 'lastMonth')) }}
                                                ₫</h3>
                                        </div>
                                        <div class="icon" style="display:block !important">
                                            <i class="fas fa-calendar-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="4">
                            <h2 class="text-center">Sản Phẩm</h2>
                            <div class="row bg-white my-4 mx-1 rounded border" style="padding-top:8px;">
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Sản Phẩm</p>
                                            <a href="{{ route('us.product.index') }}"><button
                                                    class="btn btn-light text-dark">Quản Trị</button></a>
                                        </div>
                                        <div class="icon" style="display:block !important">
                                            <i class="fas fa-calendar-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Tổng Doanh Thu</p>
                                            <h3></h3>
                                        </div>
                                        <div class="icon" style="display:block !important">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Tháng này</p>
                                            <h3>{{ number_format(users()->user()->total_sale_card_time(users()->user()->id, 'thisMonth')) }}
                                                ₫</h3>
                                        </div>
                                        <div class="icon" style="display:block !important">
                                            <i class="fa fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12 ">
                                    <div class="small-box bg-success bg-background">
                                        <div class="inner">
                                            <p>Tháng trước</p>
                                            <h3>{{ number_format(users()->user()->total_sale_card_time(users()->user()->id, 'lastMonth')) }}
                                                ₫</h3>
                                        </div>
                                        <div class="icon" style="display:block !important">
                                            <i class="fas fa-calendar-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
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
