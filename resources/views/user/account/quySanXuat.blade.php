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
                    <div class="col-lg-12 col-md-12 col-sm-12 my-4 rounded border" style="background: #ffd8be">
                        <img width="100%" src="{{ asset('images/z5401507869219_e60c150162d17c26ae205d75b6926950.jpg') }}" alt="">
                    </div>
                    <div id="divBanking" class="col-lg-12 col-md-12 col-sm-12 my-4 rounded border" style="background: #ffeedd">
                        <!-- Button trigger modal -->
                        <div class="card">
                            <div class="card-body">
                                <h4><b class="text-left title-table">Bảng Quỹ Đầu Tư Sản Xuất</b>
                                    <tr>
                                    </tr>
                                </h4>
                                <div class="pt-2 table-responsive">
                                    <table class="table border table-striped table-bordered text-nowrap table-bill-seen">
                                        <thead class="bg-info text-white">
                                            <tr>
                                                <th></th>
                                                <th class="text-uppercase">Quỹ Đầu Tư</th>
                                                {{-- <th class="text-uppercase">Quyền Lợi</th> --}}
                                                <th class="text-uppercase">Tổng</th>
                                                <th class="text-uppercase">% Lợi Nhuận</th>
                                                <th class="text-uppercase"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width: 5%;"><input type="checkbox" name="" id="">
                                                </td>
                                                <td>Hóa dược, mỹ phẩm</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td>{{ number_format($total_money60, 0, ',', '.') }} VNĐ
                                                </td>
                                                <td></td>
                                                <td><button type="button" class="w-100 btn btn-primary "
                                                        data-toggle="modal" id="btn-60"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 5%;"><input type="checkbox" name="" id="">
                                                </td>
                                                <td>Hàng tiêu dùng</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td>{{ number_format($total_money61, 0, ',', '.') }} VNĐ
                                                </td>

                                                <td></td>
                                                <td><button type="button" class="w-100 btn btn-primary" data-toggle="modal"
                                                        id="btn-61" data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 5%;"><input type="checkbox" name="" id="">
                                                </td>
                                                <td>Sữa hạt cân bằng dinh dưỡng</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td>{{ number_format($total_money62, 0, ',', '.') }} VNĐ
                                                </td>

                                                <td></td>
                                                <td><button type="button" class="w-100 btn btn-primary "
                                                        data-toggle="modal" id="btn-62"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 5%;"><input type="checkbox" name="" id="">
                                                </td>
                                                <td>Bữa ăn dinh dưỡng cân bằng
                                                    tế bào gốc <br> giàu Protenin hữu
                                                    cơ: <br>Sp tiểu đường, xương
                                                    khớp, giảm béo ...</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td>{{ number_format($total_money63, 0, ',', '.') }} VNĐ
                                                </td>

                                                <td></td>
                                                <td>
                                                    <button type="button" class="w-100 btn btn-primary" data-toggle="modal"
                                                        id="btn-63" data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 5%;"><input type="checkbox" name="" id="">
                                                </td>
                                                <td>Nước ion kiềm lượng tử giàu
                                                    Hydrogen.</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td>{{ number_format($total_money64, 0, ',', '.') }} VNĐ
                                                </td>

                                                <td></td>
                                                <td><button type="button" class="w-100 btn btn-primary btn-60"
                                                        data-toggle="modal" id="btn-64"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 5%;"><input type="checkbox" name="" id="">
                                                </td>
                                                <td>Trà phổ nhĩ Smie Tea</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td>{{ number_format($total_money65, 0, ',', '.') }} VNĐ
                                                </td>

                                                <td></td>
                                                <td><button type="button" class="w-100 btn btn-primary btn-60"
                                                        data-toggle="modal" id="btn-65"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 5%;"><input type="checkbox" name="" id="">
                                                </td>
                                                <td>Trà Quan âm dưỡng nhan</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td>{{ number_format($total_money66, 0, ',', '.') }} VNĐ
                                                </td>

                                                <td></td>
                                                <td><button type="button" class="w-100 btn btn-primary btn-60"
                                                        data-toggle="modal" id="btn-66"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 5%;"><input type="checkbox" name="" id="">
                                                </td>
                                                <td>Thông kinh lạc Smile: <br> Ứng dụng trong y tế thể thao</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td>{{ number_format($total_money67, 0, ',', '.') }} VNĐ
                                                </td>

                                                <td></td>
                                                <td><button type="button" class="w-100 btn btn-primary btn-60"
                                                        data-toggle="modal" id="btn-67"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 5%;"><input type="checkbox" name=""
                                                        id="">
                                                </td>
                                                <td>Thông mạch</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td>{{ number_format($total_money68, 0, ',', '.') }} VNĐ
                                                </td>

                                                <td></td>
                                                <td><button type="button" class="w-100 btn btn-primary btn-60"
                                                        data-toggle="modal" id="btn-68"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 5%;"><input type="checkbox" name=""
                                                        id="">
                                                </td>
                                                <td>Sản phẩm công nghệ</td>
                                                {{-- <td><a href="#">Xem thêm</a></td> --}}
                                                <td>{{ number_format($total_money69, 0, ',', '.') }} VNĐ
                                                </td>
                                                <td></td>
                                                <td><button type="button" class="w-100 btn btn-primary btn-60"
                                                        data-toggle="modal" id="btn-69"
                                                        data-target="#exampleModal-vip-1">
                                                        Chuyển Khoản
                                                    </button></td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-info">
                                            <tr>
                                                <th colspan="6" class="text-uppercase text-light"></th>
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
                                        <div id="lbApp" style="margin-left:40px;" class="d-none"> <b>Lựa chọn ngân
                                                hàng đã cài
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
                <form action="{{ route('us.manufacture_bill') }}" method="POST" enctype="multipart/form-data">
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
                                                                dau tu + ten quy </b>
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
                                                        <th class="text-right"><input type="text" value="0"
                                                                class="form-control-file text-right"
                                                                placeholder="1.000.000 VNĐ" name="money"
                                                                id="moneyInput" onchange="updateImageSrc()">VNĐ
                                                        </th>
                                                    </tr>
                                                    <tr style="color: red;">
                                                        <th class="text-uppercase">Quỹ Đầu Tư:</th>
                                                        <th class="text-right">
                                                            <select class="form-select mr-sm-2" name="manufacture"
                                                                id="vip_level">
                                                                <option id="btn-60" value="60">Hóa dược, mỹ phẩm
                                                                </option>
                                                                <option id="btn-61" value="61">Hàng tiêu dùng
                                                                </option>
                                                                <option id="btn-62" value="62">Sữa hạt cân bằng
                                                                    dinh dưỡng</option>
                                                                <option id="btn-63" value="63">Bữa ăn dinh dưỡng
                                                                    cân bằng tế bào gốc giàu Protenin hữu cơ</option>
                                                                <option id="btn-64" value="64">Nước ion kiềm lượng
                                                                    tử giàu Hydrogen
                                                                </option>
                                                                <option id="btn-65" value="65">Trà phổ nhĩ Smie Tea
                                                                </option>
                                                                <option id="btn-66" value="66">Trà Quan âm dưỡng
                                                                    nhan</option>
                                                                <option id="btn-67" value="67">Thông kinh lạc
                                                                    Smile: Ứng dụng trong y tế thể thao</option>
                                                                <option id="btn-68" value="68">Thông mạch</option>
                                                                <option id="btn-69" value="69">Sản phẩm công nghệ
                                                                </option>
                                                            </select>
                                                        </th>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td style="color: red;" class=" text-uppercase font-weight-bold"><b>Nhập Số tiền:</b></td>
                                                        <td class="text-right">
                                                            
                                                        </td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td colspan="2"><button class="btn btn-danger text-center">Tạo
                                                                Lệnh Chuyển Tiền QR</button></td>
                                                    </tr>
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
        window.onload = function() {
            updateImageSrc();
        };

        var content = '';

        $('#exampleModal-vip-1').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var buttonId = button.attr('id');
            console.log(buttonId);
            var optionValue = buttonId.replace('btn-', '');
            $('#vip_level').val(optionValue);

            if (buttonId === 'btn-60') {
                content = 'hoa duoc, my pham';
            } else if (buttonId === 'btn-61') {
                content = 'hang tieu dung';

            } else if (buttonId === 'btn-62') {
                content = 'sua hat';

            } else if (buttonId === 'btn-63') {
                content = 'bau an dinh duong';

            } else if (buttonId === 'btn-64') {
                content = 'nuoc ion kiem';

            } else if (buttonId === 'btn-65') {
                content = 'tra pho nhi';

            } else if (buttonId === 'btn-66') {
                content = 'tra quan am';
            } else if (buttonId === 'btn-67') {
                content = 'thong kinh lac';
            } else if (buttonId === 'btn-68') {
                content = 'thong mach';
            } else if (buttonId === 'btn-69') {
                content = 'san pham cong nghe';
            }

            updateImageSrc();
        });

        function updateImageSrc() {
            var moneyValue = document.getElementById("moneyInput").value;

            var imageUrl = "https://img.vietqr.io/image/970407-19031066030011-compact2.png?amount=" + moneyValue +
                "&addInfo={{ users()->user()->phone }} dau tu " + content +
                " &accountName=LO THI THANH THOM";
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

        .w-100.btn.btn-primary {
            padding: 0 !important;
        }

        .vertical-center {
            display: flex;
            align-items: center;
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
