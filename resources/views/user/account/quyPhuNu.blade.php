@extends('user.layouts.master')
@section('page_title', 'Nộp phí thành viên')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                {{-- <h4>Đăng Ký Thành Viên Kết Nối</h4> --}}
                <div class="row">
                    <div id="divBanking" class="col-lg-12 col-md-12 col-sm-12 my-4 rounded border" style="background: #ffeedd">
                        <!-- Button trigger modal -->
                        <div class="card">
                            <div class="card-body">
                                    <tr>
                                        <img width="100%" src="{{ asset('images/z5401507869221_697c160bd0f741f941ff5d9369a356c3.jpg') }}" alt="">

                                    </tr>
                                </h4>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pt-4 rounded border" style="background: #ffd8be">
                        <div class="card">
                            <div class="card-body">
                                <h4><b class="text-left text-dark title-table">Quỹ Phụ Nữ Khởi Nghiệp</b></h4>
                                <form action="{{ route('us.womenfund_bill') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
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
                                                                    <tr>
                                                                        <th colspan="2" class="text-danger">
                                                                            <p class="text-dark">Nội dung chuyển khoản:</p>
                                                                            <b>{{ users()->user()->phone }}
                                                                                chuyen tien quy phu nu khoi nghiep </b>
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
                                                                    <tr style="color: red;">
                                                                        <th class="text-uppercase">Nhập Số tiền:</th>
                                                                        <th class="text-right"><input type="text" value="0" class="form-control-file text-right"
                                                                            placeholder="Danh Hiệu tiếp theo cần: 0 VNĐ"
                                                                            name="money" id="moneyInput"
                                                                            onchange="updateImageSrc()">VNĐ
                                                                        </th>
                                                                    </tr>
                                                                    {{-- <tr>
                                                                        <td style="color: red;" class=" text-uppercase font-weight-bold"><b>Nhập Số tiền:</b></td>
                                                                        <td class="text-right">
                                                                            
                                                                        </td>
                                                                    </tr> --}}
                                                                    <tr>
                                                                        <td colspan="2"><button class="btn btn-danger text-center">Tạo Lệnh Chuyển Tiền QR</button></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
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
                    <div class="col-md-6 row col-sm-6">
                        <div class="text-center mt-2">
                            <div class="mt-1" id="qrcode"
                                style="padding: 10px; border: 3px solid #07256aab; border-radius: 10px; ">
                                <img id="imagePlaceholder" width="50%" src="" alt="">
                            </div>
                        </div>
                        <div class="pt-2 table-responsive">
                            <div class="text-danger bottom-0 bg-white border-1 p-2">
                                <p><b class="text-light p-2 text-uppercase bg-danger">Lưu ý khi chuyển khoản:</b></p>
                                <ul class="note-bill" style="line-height:30px; list-style: none">
                                    <li>- Chuyển khoản xong vui lòng ấn 'Đã chuyển khoản' để tải ảnh chuyển
                                            khoản</li>
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
                <form action="{{ route('us.memberconnect_bill') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Tải ảnh chuyển khoản của bạn</label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Số tiền</label>
                            <input readonly type="text" class="form-control-file" value="0"
                                name="money" id="exampleFormControlFile1">
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
        window.onload = function() {
        updateImageSrc();
    };
        function updateImageSrc() {
            var moneyValue = document.getElementById("moneyInput").value;
            var imageUrl = "https://img.vietqr.io/image/970407-19031066030011-compact2.png?amount=" + moneyValue +
                "&addInfo={{ users()->user()->phone }} chuyen tien quy phu nu khoi nghiep&accountName=LO THI THANH THOM";
            document.getElementById("imagePlaceholder").src = imageUrl;
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
