@extends('user.layouts.master')
@section('page_title', 'Đăng Ký Nhà Sản Xuất Kinh Doanh')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <h4>Đăng Ký Nhà Sản Xuất Kinh Doanh</h4>
                <div class="row">
                    <div id="divBanking" class="row bg-white my-4 mx-1 rounded border">
                        <div class="col-12 col-sm-6 col-md-5">
                            <div style="">
                                <table class="table table-bill-seen">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center"><b>Thông Tin Giao Dịch</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="min-width:120px">Ngân hàng</td>
                                            <td class="text-right"><b>TECHCOMBANK</b></td>
                                        </tr>
                                        <tr>
                                            <td>Chủ tài khoản</td>
                                            <td class="text-right"><b>LO THI THANH THOM</b></td>
                                        </tr>
                                        <tr style="color: red;">
                                            <td>Số tài khoản</td>
                                            <td class="text-right"> <b id="lbAccountNumber">19031066030011</b> </td>
                                        </tr>
                                        <tr>
                                            <td>Số tiền</td>
                                            <td class="text-right"><b id="lbAmount2">1.900.000</b></td>
                                        </tr>
                                        <tr style="color: red;">
                                            <td>Nội dung</td>
                                            <td class="text-right"> <b>{{ users()->user()->phone }} phi nha san xuat kinh
                                                    doanh</b> </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td colspan="2"> Mã nạp này là bắt buộc trong nội dung chuyển khoản, nếu nội
                                                dung không đúng giao dịch có thể bị treo tới 24h. </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Button trigger modal -->
                                @if ($order && $order->bill)
                                    @if ($order->status == 1)
                                        <div class="w-100 d-flex justify-content-center pb-4">
                                            <button type="button" class="btn btn-success">
                                                Thành công
                                            </button>
                                        </div>
                                    @else
                                        <div class="w-100 d-flex justify-content-center pb-4">
                                            <button type="button" class="btn btn-danger">
                                                Vui lòng đợi quản trị viên phê duyệt
                                            </button>
                                        </div>
                                    @endif
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
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="text-center"> <b>Quét mã QR để chuyển nhanh</b>
                                {{--                                <div style="margin-top:10px;">Thời hạn thanh toán <span id="cdtime"></span></div> --}}
                                <div id="qrcode"
                                    style="padding: 10px; border: 3px solid #07256aab; border-radius: 10px; ">
                                    <img src="https://img.vietqr.io/image/970407-19031066030011-compact2.png?amount=1900000&addInfo={{ users()->user()->phone }} phi nha san xuat kinh doanh&accountName=LO THI THANH THOM
                                    "
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mb-5">
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
        </section>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tải ảnh chuyển khoản lên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('us.upload_bill') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
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
    <script></script>
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
