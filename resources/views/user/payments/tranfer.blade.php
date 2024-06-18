@extends('user.layouts.master')
@section('page_title', 'Chuyển nội bộ')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <h4>Chuyển nội bộ</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row" method="post" action="{{route('us.payment.tranfer_post')}}">
                                    @csrf
                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Chọn nguồn tài khoản cần chuyển</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-credit-card"></i></span> </div>
                                                <select name="txtWallet" id="dlWallet" class="form-control">
                                                    <option value="2" selected>Ví Voucher Mua</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Số dư tài khoản</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-credit-card"></i></span> </div>
                                                <input type="text" readonly="readonly" id="txtAvailable" value="{{number_format(users()->user()->point_buy)}}" class="form-control" style="color:Blue;"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Người nhận (*)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-user"></i></span> </div>
                                                <input name="txtUserName" required type="text" maxlength="50" id="txtMember" class="form-control" placeholder="Số điện thoại người nhận" autocomplete="off"> </div>
                                        </div>
{{--                                        <div class="lbTrian form-group d-none">Nhập ID người nhận là: ketoan để đổi sản phẩm tri ân.</div>--}}
                                        <div class="form-group">
                                            <label>Họ tên</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-user"></i></span> </div>
                                                <input type="text" maxlength="50" class="form-control fullname" placeholder="Họ tên - Tự động hiển thị" readonly=""> </div>
                                        </div>
                                        <div class="form-group">Kiểm tra đúng họ tên hãy thực hiện giao dịch, tránh nhầm sang người khác</div>
                                        <div class="form-group">
                                            <label>Số điểm chuyển(*)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-usd">$</i></span> </div>
                                                <input name="txtAmount" type="text" required maxlength="14" id="txtValue" class="form-control number" autocomplete="off"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Ghi chú</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-edit"></i></span> </div>
                                                <input name="txtNote" type="text" maxlength="256" id="txtMember" class="form-control" placeholder="Nếu có"> </div>
                                        </div>
                                        <center>
                                            <button type="submit" id="btnTransfer" class="btn bg-background" style="width: 180px; margin-bottom:10px; color:white; font-weight:bold;">Xác nhận chuyển</button>
                                        </center>
                                    </div>
                                </form>
                                <div class="card-footer" style="margin-top:10px;">
                                    <div class="" style="color: orangered;">
                                        <div>Lưu ý: Số tiền chuyển tối thiểu: 10,000 đ</div>
                                        <div>Số tiền duy trì tối thiểu ví thanh toán: 10,000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="total-table table-responsive" style="margin-top: 20px; overflow-x: auto;">
                        <table class="table table-bordered table-striped bg-white table-hover" style="margin: 0;font-size:15px; min-width:1000px">
                            <thead>
                            <tr>
                                <th>Thời gian</th>
                                <th>Số điểm</th>
                                <th>Người gửi / Người nhận</th>
                                <th>Ghi chú</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($logs->count() > 0)
                                @foreach($logs as $log)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::createFromDate($log->created_at)->format('d/m/Y H:i') }}</td>
                                        <td>{{number_format($log->money)}}</td>
                                        <td>{{$log->user->name}} / {{$log->user_receive->name}}</td>
                                        <td>{{$log->note}}</td>
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
                                <tr>
                                    <td colspan="6">Không có giao dịch nào</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{$logs->links()}}
                </div>
                <script>
                    $('[name="txtUserName"]').change(function() {
                        var username = $(this).val();
                        $.ajax({
                            url: "{{route('us.payment.get_user')}}",
                            data: {
                                username: username
                            },
                            type: "GET",
                            success: function(data) {
                                $('.fullname').val(data);
                            }
                        })
                    });

                    {{--function getBalance2(type) {--}}
                    {{--    var t = $('[name="txtWallet"]').val();--}}
                    {{--    $.ajax({--}}
                    {{--        url: "{{route('us.payment.get_balance')}}",--}}
                    {{--        data: {--}}
                    {{--            wallet: $('[name="txtWallet"]').val(),--}}
                    {{--            type: type--}}
                    {{--        },--}}
                    {{--        type: "GET",--}}
                    {{--        success: function(data) {--}}
                    {{--            $('#txtAvailable').val(data);--}}
                    {{--            $('.fee').text(data.fee);--}}
                    {{--        }--}}
                    {{--    });--}}
                    {{--}--}}
                </script>
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
    </script>
@endpush
