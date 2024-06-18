@extends('user.layouts.master')
@section('page_title', 'Nộp phí thành viên')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <h4>Đăng Ký Thành Viên Kết Nối</h4>
                <div class="row">
                    <div id="divBanking" class="col-lg-6 col-md-6 col-sm-12 my-4 rounded border" style="background: #ffeedd">
                        <!-- Button trigger modal -->
                        <div class="card">
                            <div class="card-body">
                                <h4><b class="text-left title-table">Bảng Danh Hiệu Thành Viên</b>
                                    <tr>
                                    </tr>
                                </h4>
                                <div class="pt-2 table-responsive">
                                    <table class="table border table-striped table-bordered text-nowrap">
                                        <thead class="bg-info text-white">

                                            <tr>
                                                <th class="text-uppercase">Danh Hiệu Thành Viên</th>
                                                <th class="text-uppercase">Giá Trị</th>
                                                <th class="text-uppercase"><button type="button"
                                                        class="w-100 btn btn-light" data-toggle="modal"
                                                        data-target="#exampleModal-desc">
                                                        Đặc Quyền
                                                    </button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1 Sao</td>
                                                <td>1.000.000 VNĐ</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td><button onclick="updateImageSrc(1000000,1)" type="button" class="w-100 btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td>2 Sao</td>
                                                <td>3.000.000 VNĐ</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td><button onclick="updateImageSrc(3000000,2)" type="button" class="w-100 btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td>3 Sao</td>
                                                <td>6.000.000 VNĐ</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td><button onclick="updateImageSrc(6000000,3)" type="button" class="w-100 btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td>4 Sao</td>
                                                <td>50.000.000 VNĐ</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td><button onclick="updateImageSrc(50000000,4)" type="button" class="w-100 btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td>5 Sao</td>
                                                <td>100.000.000 VNĐ</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td><button onclick="updateImageSrc(100000000,5)" type="button" class="w-100 btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-info">
                                            <tr>
                                                <th colspan="4" class="text-uppercase text-light"> Danh Hiệu Hiện Tại:
                                                    {{ $totalvip }} ⭐</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="text-danger bottom-0 bg-white border-1 p-2">
                                        <p><b class="text-light p-2 text-uppercase bg-danger">Lưu ý khi chuyển khoản:</b>
                                        </p>
                                        <ul class="note-bill" style="line-height:30px; list-style: none">
                                            <li>- Chuyển khoản xong vui lòng ấn 'Đã chuyển khoản' để tải ảnh chuyển
                                                khoản</li>
                                            <li> - Vui lòng chuyển khoản đúng số tiền </li>
                                            <li> - Ghi đúng nội dung chuyển tiền đã được tạo sẵn</li>
                                            <li> - Nội dung chuyển tiền chỉ được sử dụng một lần.</li>
                                            <li> - Tài khoản của bạn sẽ tự động được kích hoạt khi quản trị viên xác nhận
                                            </li>
                                        </ul>
                                        <div id="lbApp" style="margin-left:40px;" class="d-none"> <b>Lựa chọn ngân hàng
                                                đã cài
                                                đặt</b> </div>
                                        <div style="max-width:100%; overflow-x: auto; margin-left:40px;">
                                            <div id="ulAppBanking"> </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 my-4 rounded border" style="background: #ffd8be">
                        <div class="card">
                            <div class="card-body">
                                <h4><b class="text-left text-dark title-table">Cấp Quản Lý Hiện Tại</b></h4>
                                <div class="table-responsive">
                                    <table class="table border table-striped table-bordered text-nowrap mt-2"
                                        style="background: #F8F7FF">
                                        <thead class="bg-success text-white">
                                            <tr>
                                                <th class="text-uppercase">Danh Hiệu</th>
                                                <th><button type="button" class="w-100 btn btn-light" data-toggle="modal"
                                                        data-target="#exampleModal-desc-2">
                                                        Đặc Quyền
                                                    </button>
                                                </th>
                                                {{-- <th class="text-left text-uppercase" colspan="2">Quyền Lợi</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Giám Đốc Kinh Doanh</td>
                                                {{-- <td><a href="#" class="text-dark">Xem thông tin</a></td> --}}
                                                <td><a href="{{ route('us.represent') }}"><button
                                                            class="btn btn-success text-light">Đăng
                                                            Ký Xét Duyệt</button></a></td>
                                            </tr>
                                            <tr>
                                                <td>Phó Tổng Giám Đốc Kinh Doanh</td>
                                                {{-- <td><a href="#" class="text-dark">Xem thông tin</a></td> --}}
                                                <td><a href="{{ route('us.represent') }}"><button
                                                            class="btn btn-success text-light">Đăng
                                                            Ký Xét Duyệt</button></a></td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-success text-white">
                                            <tr>
                                                <td colspan="3" class="text-uppercase"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="margin-top: 3.7em">
                            <div class="card-body">
                                <h4><b class="text-left text-dark title-table">Danh Hiệu Điểm Đại Diện SMILE HOME</b></h4>
                                <div class="table-responsive">
                                    <table class="table border table-striped table-bordered text-nowrap"
                                        style="background: #F8F7FF">
                                        <thead style="background: #cd2020" class="text-ligth">
                                            {{-- <tr>
                                    <th class="text-center"><b>V.I.P Hiện Tại: </b></th>
                                    <th class="text-center bg-danger text-light" style="font-size: 25px">{{ $totalvip }}
                                        <i class="nav-icon fas fa-star"></i>
                                    </th>
                                    <th><button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal-vip-1">
                                            Chuyển Khoản
                                        </button></th>
                                </tr> --}}
                                            <tr>
                                                <th>Thành Viên</th>
                                                <th>Giá Trị</th>
                                                <th>
                                                    <button type="button" class="w-100 btn btn-light" data-toggle="modal"
                                                        data-target="#exampleModal-desc-3">
                                                        Đặc Quyền
                                                    </button>
                                                </th>
                                                {{-- <th colspan="2" class="text-left">Quyền Lợi</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Đại Diện: Xã/Phường</td>
                                                <td>68.000.000 VNĐ</td>
                                                {{-- <td><a style="color: #cd2020" href="#">Xem thông tin</a></td> --}}
                                                <td><a href="{{ route('us.represent') }}"><button
                                                            class="btn btn-primary text-light"
                                                            style="background: #cd2020">Chuyển Khoản</button></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Đại Diện: Quận/Huyện</td>
                                                <td>300.000.000 VNĐ</td>
                                                {{-- <td><a style="color: #cd2020" href="#">Xem thông tin</a></td> --}}
                                                <td><a href="{{ route('us.represent') }}"><button class="btn text-light"
                                                            style="background: #cd2020">Chuyển Khoản</button></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Đại Diện: Tỉnh</td>
                                                <td>3.000.000.000 VNĐ</td>
                                                {{-- <td><a style="color: #cd2020" href="#">Xem thông tin</a></td> --}}
                                                <td><a href="{{ route('us.represent') }}"><button
                                                            class="btn btn-primary text-light"
                                                            style="background: #cd2020">Chuyển Khoản</button></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="text-white" style="background: #cd2020">
                                            <tr>
                                                <td colspan="4" class="text-uppercase"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            </div>
            </div>
        </section>
    </section>
    <!-- Modal -->
    {{-- Đặc quyền thành viên kết nối --}}
    <div class="modal fade" id="exampleModal-desc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="small-box justify-content-center bg-success bg-background">
                        <div class="inner w-100">
                            <img width="100%"
                                src="{{ asset('images/z5401507948704_4fc7c5a8725963b4f8cd2b8345edbe38.jpg') }}"
                                alt="">
                        </div>
                        <div class="inner w-100">
                            <img width="100%"
                                src="{{ asset('images/z5401507948706_c6429b2e348d5ffcb8824dae045a64c4.jpg') }}"
                                alt="">
                        </div>
                        <div class="inner w-100">
                            <img width="100%"
                                src="{{ asset('images/z5401507948705_22983d8339e54f57af877d6e0be7df60.jpg') }}"
                                alt="">
                        </div>
                        <div class="inner w-100">
                            <img width="100%"
                                src="{{ asset('images/z5401507950879_8b8cc0f72d571eb3be9b31eb53b4d171.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Đặc quyền cấp quản lí --}}
    <div class="modal fade" id="exampleModal-desc-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="small-box justify-content-center bg-success bg-background">
                        <div class="inner w-100">
                            <img width="100%"
                                src="{{ asset('images/z5401507950881_14a9c2d9034e40ecd114499dfe3d8185.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Đặc quyền điểm đại diện --}}
    <div class="modal fade" id="exampleModal-desc-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="small-box justify-content-center bg-success bg-background">
                        <div class="inner w-100">
                            <img width="100%"
                                src="{{ asset('images/z5401507869552_095959496ed735a9faabec2baebb1b7a.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal-vip-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="text-center"><b>Thông Tin Giao Dịch</b></p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('us.memberconnect_bill') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="star" name="star">
                    <input type="hidden" id="money" name="money">
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="row">
                                <div id="divBanking" class="row bg-white mx-1 rounded border">
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div style="">
                                            {{-- <style></style> --}}
                                            <table class="table table-bill-seen">
                                                <thead>
                                                    <tr>
                                                        <th style="min-width:120px">Ngân hàng</th>
                                                        <th class="text-right"><b>TECHCOMBANK</b></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Chủ tài khoản</th>
                                                        <th class="text-right"><b>LÒ THỊ THANH THƠM</b></th>
                                                    </tr>
                                                    <tr style="color: red;">
                                                        <th>Số tài khoản</th>
                                                        <th class="text-right"> <b id="lbAccountNumber">19031066030011</b>
                                                        </th>
                                                    </tr>
                                                    <tr style="color: red;">
                                                        <th>Số tiền</th>
                                                        <th class="text-right"> <b id="lbAccountMoney">Đang tải...</b>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2" class="text-danger">
                                                            <p class="text-dark">Nội dung chuyển khoản:</p>
                                                            <b>{{ users()->user()->phone }}
                                                                dang ky
                                                                thanh vien ket
                                                                noi </b>
                                                        </th>
                                                        {{-- <th class="text-right text-danger">
                                                        </th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="text-align:left">
                                                        <td colspan="2"><i>Mã nạp này là bắt buộc trong nội dung chuyển
                                                                khoản, nếu nội
                                                                dung không đúng giao dịch có thể bị treo tới 24h. </i></td>
                                                    </tr>
{{--                                                    <tr>--}}
{{--                                                        <td>Danh Hiệu Thành Viên</td>--}}
{{--                                                        <td class="text-right">--}}
{{--                                                            <b id="lbAmount2">--}}
{{--                                                                <p class="text-warning">{{ $vipnext }} ⭐</p>--}}
{{--                                                            </b>--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr style="color: red;">--}}
{{--                                                        <th class="text-uppercase">Nhập Số tiền:</th>--}}
{{--                                                        <th class="text-right"><input type="text" value="0"--}}
{{--                                                                class="form-control-file text-right"--}}
{{--                                                                placeholder="Danh Hiệu tiếp theo cần: {{ $money_recharge }} VNĐ"--}}
{{--                                                                name="money" id="moneyInput"--}}
{{--                                                                onchange="updateImageSrc()">VNĐ--}}
{{--                                                        </th>--}}
{{--                                                    </tr>--}}
                                                    {{-- <tr>
                                                        <td style="color: red;" class=" text-uppercase font-weight-bold"><b>Nhập Số tiền:</b></td>
                                                        <td class="text-right">

                                                        </td>
                                                    </tr> --}}
{{--                                                    <tr>--}}
{{--                                                        <td colspan="2"><button class="btn btn-danger text-center">Tạo--}}
{{--                                                                Lệnh Chuyển Tiền QR</button></td>--}}
{{--                                                    </tr>--}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-12 row col-sm-6 col-md-12">
                                        <div class="text-center mt-2">
                                            <div class="mt-1" id="qrcode"
                                                style="padding: 10px; border: 3px solid #07256aab; border-radius: 10px; ">
                                                <img id="imagePlaceholder" src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="exampleFormControlFile1">Tải ảnh chuyển khoản của bạn</label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.
        document.getElementById('vip_level').addEventListener('change', function() {
            var selectedValue = this.value;
            var moneyValue = 0
            var lbAccountNumber = document.getElementById('moneyAccount');
            switch (selectedValue) {
                case '1':
                    lbAccountNumber.innerText = '1.000.000đ';
                    break;
                case '2':
                    lbAccountNumber.innerText = '3.000.000đ';
                    break;
                case '3':
                    lbAccountNumber.innerText = '6.000.000đ';
                    break;
                case '4':
                    lbAccountNumber.innerText = '68.000.000đ';
                    break;
                case '5':
                    lbAccountNumber.innerText = '300.000.000đ';
                    break;
                case '6':
                    lbAccountNumber.innerText = '900.000.000đ';
                    break;
                default:
                    lbAccountNumber.innerText = '0đ'; // Nếu không có giá trị nào khớp, hiển thị 0
                    break;
            }
        });
    </script>
    <script>
        // window.onload = function() {
        //     updateImageSrc();
        // };

        function updateImageSrc(money,star) {
            // var moneyValue = document.getElementById("moneyInput").value;
            $("#lbAccountMoney").html(addCommas(money));
            $("#star").val(star);
            $("#money").val(money);
            var imageUrl = "https://img.vietqr.io/image/970407-19031066030011-compact2.png?amount=" + money +
                "&addInfo={{ users()->user()->phone }} dang ky nha san xuat kinh doanh&accountName=LO THI THANH THOM";
            document.getElementById("imagePlaceholder").src = imageUrl;
        }
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
@push('css')
    <style type="text/css">
        #ulAppBanking a {
            list-style: none;
            display: table-cell;
        }

        #ulAppBanking img {
            width: 60px;
            border: 1px solid #80808063;
            border-radius: 10px;
            margin-bottom: 10px;
            margin-right: 10px;
        }

        .div290 {
            display: flex;
            justify-content: space-between;
            line-height: 50px;
            border-bottom: 1px solid #8080803b;
            align-items: center;
        }

        #cdtime {
            font-weight: bold;
            font-size: 20px;
            color: red;
        }

        #qrcode img {
            margin: 0 auto !important;
            max-width: 100% !important;
        }
    </style>
@endpush
