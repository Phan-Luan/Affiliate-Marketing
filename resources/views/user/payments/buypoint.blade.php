@extends('user.layouts.master')
@section('page_title', 'Chuyển khoản nhanh')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <h4>Chuyển khoản nhanh</h4>
                    <div class="row mb-2">
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="small-box bg-success bg-background">
                                <div class="inner inner-box" style="margin-bottom: 20px;">
                                    <p>Số điểm hiện có</p>
                                    <h3>{{number_format(users()->user()->point_buy)}}</h3> </div>
                                <div class="icon">
                                    <i class="fas fa-wallet"></i> </div>
                                <a href="/transaction/history?wallet=0" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        @if (!session('buy_point'))
                        <div class="col-12 col-sm-6 col-md-6 divNap">
                            <div class="small-box bg-success bg-background p-1">
                                <form action="{{route('us.payment.buy_point')}}" method="POST">
                                    @csrf
                                    <div class="inner inner-box" style="margin-bottom: 20px;">
                                        <p>Nhập số điểm muốn mua (1 điểm = 1.000 vnđ)</p>
                                        <input type="text" name="amount" id="txtAmount" maxlength="11" min="10" required value="0" class="form-control number" placeholder="Nhập số tiền >= 10000" style=" font-size: 20px; font-weight: bold; height: 48px; text-align: center;">
                                        <p>Thành tiền = <span id="money_real">0</span> VNĐ</p>
                                    </div>
                                    <div class="form-group form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" value="0" name="payment_method" required> Thanh toán bằng ví hoa hồng.
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Check this checkbox to continue.</div>
                                        </label>
                                    </div>
                                    <div class="form-group form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" value="1" name="payment_method" required> Thanh toán bằng tiền mặt.
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Check this checkbox to continue.</div>
                                        </label>
                                    </div>
                                    <input type="submit" class="small-box-footer btnCreatePayOsMB" style="width:100%; border:none; height: 3rem; font-weight:bold;" value="Thanh toán">
                                </form>
                            </div>
                        </div>
                        @endif
                        <div class="col-12">
                            <p>Nhập số tiền cần chuyển, sau đó nhấn <b>Tạo mã nạp</b> để lấy thông tin chuyển khoản. Nếu số tiền không đúng hoặc muốn thay đổi lại số tiền, vui lòng nhấn vào <b>Hủy lệnh nạp này</b> để tạo lệnh nạp mới</p>
                        </div>
                    </div>
                    @if ($status = session('buy_point'))
                    <div id="divBanking" class="row bg-white my-4 mx-1 rounded border">
                        <div class="col-12 col-sm-6 col-md-5">
                            <div style="">
                                <table class="table">
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
                                        <td class="text-right"><b>DƯƠNG MẠNH QUYỀN</b></td>
                                    </tr>
                                    <tr style="color: red;">
                                        <td>Số tài khoản</td>
                                        <td class="text-right"> <b id="lbAccountNumber">19037246840018</b> </td>
                                    </tr>
                                    <tr>
                                        <td>Số tiền</td>
                                        <td class="text-right"><b id="lbAmount2">{{number_format($status->money*1000)}}</b></td>
                                    </tr>
                                    <tr style="color: red;">
                                        <td>Nội dung</td>
                                        <td class="text-right"> <b>{{users()->user()->phone}} mua diem ma {{$status->id}}</b> </td>
                                    </tr>
                                    <tr style="text-align:right">
                                        <td colspan="2"> Mã nạp này là bắt buộc trong nội dung chuyển khoản, nếu nội dung không đúng giao dịch có thể bị treo tới 24h, chạm vào để copy mã. </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <form action="{{route('us.payment.destroy.transaction',$status->id)}}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy?');">
                                                @csrf
                                                <input type="submit" value="Hủy lệnh nạp này" class="btn bg-background text-bold text-white btnDestroyMB">
                                            </form>
                                            <br>
                                            <p>Nếu số tiền không đúng hoặc muốn thay đổi lại số tiền, vui lòng nhấn vào <b>Hủy lệnh nạp này</b> để tạo lệnh nạp mới</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="text-center"> <b>Quét mã QR để chuyển nhanh</b>
                                <div style="margin-top:10px;">Thời hạn thanh toán <span id="cdtime"></span></div>
                                <div id="qrcode" style="padding: 10px; border: 3px solid #07256aab; border-radius: 10px; ">
                                    <img src="{{asset('web/images/qr_code.jpg')}}" alt="">
                                </div> <a href="javascript:void(0)" class="mt-2" onclick="download_qr('qrdownload')">Tải ảnh QR xuống</a> </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mb-5">
                            <p>Lưu ý khi chuyển khoản:</p>
                            <ul style="line-height:30px;">
                                <li>Vui lòng chuyển khoản đúng số tiền muốn nạp</li>
                                <li>Không thay đổi lại số tiền khi chuyển khoản</li>
                                <li>Ghi đúng nội dung chuyển tiền đã được tạo sẵn</li>
                                <li>Nội dung chuyển tiền chỉ được sử dụng một lần.</li>
                                <li>Số dư của bạn sẽ tự động cập nhật khi hệ thống ngân hàng xác nhận.</li>
                            </ul>
                            <div id="lbApp" style="margin-left:40px;" class="d-none"> <b>Lựa chọn ngân hàng đã cài đặt</b> </div>
                            <div style="max-width:100%; overflow-x: auto; margin-left:40px;">
                                <div id="ulAppBanking"> </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="total-table table-responsive" style="margin-top: 20px; overflow-x: auto;">
                                <table class="table table-bordered table-striped bg-white table-hover" style="margin: 0;font-size:15px; min-width: 900px">
                                    <thead>
                                    <tr>
                                        <th>Thời gian</th>
                                        <th>Mã giao dịch</th>
                                        <th>Số điểm</th>
                                        <th>Số tiền</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($logs->count() > 0)
                                        @foreach($logs as $log)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::createFromDate($log->created_at)->format('d/m/Y H:i') }}</td>
                                            <td>#{{$log->id}}</td>
                                            <td>{{number_format($log->money)}}</td>
                                            <td>{{number_format($log->money*1000)}}</td>
                                            <td>
                                                @if($log->status == 0)
                                                <span class="text-blink">Đang chờ</span>
                                                @elseif ($log->status == 1)
                                                    <span class="text-success">Thành công</span>
                                                @else
                                                    <span class="text-danger">Đã hủy</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                    <tr class="text-center no-data">
                                        <td colspan="5"> Chưa có dữ liệu để hiển thị </td>
                                    </tr>
                                    @endif
                                    </tbody>
                                </table>
                                {{$logs->links()}}
                            </div>
                            <div>
                                <div class="pagination-container">
                                    <ul class="pagination"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                <input type="hidden" id="hdBanking" value="1">--}}
{{--                <input type="hidden" id="hdMinDeposit" value="10000">--}}
{{--                <input type="hidden" id="hdUser" value="e75c1699-5104-4d82-841c-263d23916f26">--}}
{{--                <input type="hidden" id="hdCodeDeposit" data-codenew="1" value="535423664">--}}
{{--                <input type="hidden" id="hdQrCode">--}}
{{--                <input type="hidden" id="hdExpriedTime" value="0">--}}
{{--                <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>--}}
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
            </div>
        </section>
    </section>
@endsection
@push('scripts')
    <script>
        $("#txtAmount").keyup(function () {
            var point = $(this).val();
            $("#money_real").html(addCommas(point*1000));
        })

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
        function download_qr(name) {
            var canvas = $("#qrcode img").attr('src');
            console.log(canvas);
            image = canvas.replace("image/png", "image/octet-stream");
            var link = document.createElement('a');
            link.download = name + ".png";
            link.href = image;
            link.click();
        }
    </script>
@endpush
