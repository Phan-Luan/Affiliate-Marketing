@extends('user.layouts.master')
@section('page_title', 'Nộp phí thành viên')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <h4>Đăng Ký Đại Diện SMILE HOME</h4>
                <div class="row">
                    <div id="divBanking" class="row bg-white my-4 mx-1 rounded border">
                        <div class="col-12 col-sm-6 col-md-4">
                            <div style="">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="text-center text-uppercase"><b>Tạo Mã QR</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-right">
                                                <b id="lbAmount2">
                                                    {{-- <select class="form-control" name="vip_level" id="vip_level"> --}}
                                                    <select class="form-select mr-sm-2" name="vip_level" id="vip_level">
                                                        <option selected disabled value="0">Bấm Chọn Danh Hiệu</option>
                                                        <option value="1">Đại Diện: Xã/Phường</option>
                                                        <option value="2">Đại Diện: Quận/Huyện</option>
                                                        <option value="3">Đại Diện: Tỉnh</option>
                                                    </select>
                                                </b>
                                            </th>
                                            <th class="text-right">
                                                <p class="text-dark" id="moneyAccount">0 VNĐ
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><button class="mt-2 w-100 btn btn-danger"
                                                    onclick="updateImageSrc()">Tạo mới mã
                                                    QR</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center text-uppercase"><b>Thông Tin Giao Dịch</b>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="min-width:120px">Ngân hàng</td>
                                            <td class="text-right"><b>TECHCOMBANK</b></td>
                                        </tr>
                                        <tr>
                                            <td>Chủ tài khoản</td>
                                            <td class="text-right"><b>LÒ THÌ THANH THƠM</b></td>
                                        </tr>
                                        <tr style="color: red;">
                                            <td>Số tài khoản</td>
                                            <td class="text-right"> <b id="lbAccountNumber">19031066030011</b> </td>
                                        </tr>
                                        <tr>
                                            <td>Nội dung</td>
                                            <td class="text-right"><b>{{ users()->user()->phone }} đăng ký thành viên kết
                                                    nối</b></td>
                                        </tr>
                                        <tr style="text-align:left">
                                            <td colspan="2"> Mã nạp này là bắt buộc trong nội dung chuyển khoản, nếu nội
                                                dung không đúng giao dịch có thể bị treo tới 24h. </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        <div class="col-12 row col-sm-6 col-md-8">
                            <div class="col-12 col-sm-6 col-md-5">
                                <div class="text-center mt-2"> <b>Quét mã QR để chuyển nhanh</b>
                                    <div class="mt-1" id="qrcode"
                                        style="padding: 10px; border: 3px solid #07256aab; border-radius: 10px; ">
                                        <input type="hidden" id="moneyInput" value="{{ $money_recharge }}">

                                        <!-- Đặt placeholder cho hình ảnh cần cập nhật -->
                                        <img id="imagePlaceholder" src="" alt="QR Code Image">
                                        <!-- Button trigger modal -->
                                @if ($order && $order->bill)
                                <div class="w-100 d-flex justify-content-center pb-4">
                                    <button type="button" class="btn btn-danger">
                                        Vui lòng đợi quản trị viên phê duyệt
                                    </button>
                                </div>
                            @else
                                <div class="w-100 d-flex justify-content-center pb-4">
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Xác Nhận Chuyển Khoản
                                    </button>
                                </div>
                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                        <h4><b class="text-left title-table">Danh Hiệu: {{ $totalvip }}</b>
                                            <tr>
                                            </tr>
                                        </h4>
                                        <div class="pt-2 table-responsive">
                                            <table class="table border table-striped table-bordered text-nowrap">
                                                <thead class="bg-danger text-light">
                                                    <tr>
                                                        <th>Danh Hiệu Đại Diện</th>
                                                        <th>Giá Trị</th>
                                                        <th>Quyền Lợi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>Đại Diện Xã/ Phường</td>
                                                        <td>68.000.000 VNĐ</td>
                                                        <td><a class="text-danger" href="#">Xem thông tin</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Đại Diện Quận/Huyện</td>
                                                        <td>300.000.000 VNĐ</td>
                                                        <td><a class="text-danger" href="#">Xem thông tin</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Đại Diện Tỉnh</td>
                                                        <td>3.000.000.000 VNĐ</td>
                                                        <td><a class="text-danger" href="#">Xem thông tin</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-12 col-sm-12 col-md-12 mb-5">
                                <p>Lưu ý khi chuyển khoản:</p>
                                <ul style="line-height:30px; list-style: none">
                                    <li> <strong>- Chuyển khoản xong vui lòng ấn 'Đã chuyển khoản' để tải ảnh chuyển
                                            khoản</strong> </li>
                                    <li> - Vui lòng chuyển khoản đúng số tiền </li>
                                    <li> - Ghi đúng nội dung chuyển tiền đã được tạo sẵn</li>
                                    <li> - Nội dung chuyển tiền chỉ được sử dụng một lần.</li>
                                    <li> - Tài khoản của bạn sẽ tự động được kích hoạt khi quản trị viên xác nhận</li>
                                </ul>
                                <div id="lbApp" style="margin-left:40px;" class="d-none"> <b>Lựa chọn ngân hàng đã cài
                                        đặt</b> </div>
                                <div style="max-width:100%; overflow-x: auto; margin-left:40px;">
                                    <div id="ulAppBanking"> </div>
                                </div>
                            </div>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p style="font-size: 20px" class="modal-title text-uppercase text-dark font-weight-bold" id="exampleModalLabel">Tải ảnh chuyển khoản lên</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('us.represent_bill') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Tải ảnh chuyển khoản của bạn</label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Số tiền</label>
                            <input readonly type="text" class="form-control-file" name="money" id="moneyBankInput">
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
        var moneyBank = 0;
        document.addEventListener('DOMContentLoaded', function() {
            updateImageSrc();
        });
        document.getElementById('vip_level').addEventListener('change', function() {
            var selectedValue = this.value;
            var lbAccountNumber = document.getElementById('moneyAccount');

            switch (selectedValue) {
                case '1':
                    lbAccountNumber.innerText = '68.000.000đ';
                    moneyBank = 68000000;
                    break;
                case '2':
                    lbAccountNumber.innerText = '300.000.000đ';
                    moneyBank = 300000000;
                    break;
                case '3':
                    lbAccountNumber.innerText = '3.000.000.000đ';
                    moneyBank = 3000000000;
                    break;
                case '0':
                    lbAccountNumber.innerText = '0đ';
                    moneyBank = 0;
                    break;
            }
            updateImageSrc();
        });

        function updateImageSrc() {
            var moneyValue = document.getElementById("moneyInput").value;
            var imageUrl = "https://img.vietqr.io/image/970407-19031066030011-compact2.png?amount=" + moneyBank +
                "&addInfo={{ users()->user()->phone }} đăng ký thành viên kết nối&accountName=LO THI THANH THOM";
            document.getElementById("imagePlaceholder").src = imageUrl;
            document.getElementById("moneyBankInput").value = moneyBank
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
