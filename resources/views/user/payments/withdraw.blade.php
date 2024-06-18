@extends('user.layouts.master')
@section('page_title', 'Thanh khoản')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <h4>Thanh khoản</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row" method="post" action="{{ route('us.payment.withdraw_post') }}">
                                    @csrf
                                    <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Số dư</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i
                                                            class="fas fa-credit-card"></i></span> </div>
                                                <input value="{{ number_format(users()->user()->money) }}"
                                                    readonly="readonly" id="ctl27_txtWallet" class="form-control"
                                                    style="color:Blue;">
                                            </div>
                                        </div>
                                        <div id="divBank" class="form-group table-responsive">
                                            <table border="1" id="divBankInfo"
                                                style="border-collapse: collapse; width: 100%; line-height: 35px; min-width:500px"
                                                bordercolor="#D0D0D0" cellpadding="5">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" align="center">THÔNG TIN NGÂN HÀNG</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%;">Ngân hàng</td>
                                                        <td style="width: 75%;"> <span id="ctl27_lblBank">
                                                                <span
                                                                    id="ctl27_lblAccount">{{ users()->user()->bank->bank }}</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Số tài khoản</td>
                                                        <td> <span
                                                                id="ctl27_lblAccount">{{ users()->user()->bank->number }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Chủ tài khoản</td>
                                                        <td> <span
                                                                id="ctl27_lblHolder">{{ users()->user()->bank->name }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Chi nhánh</td>
                                                        <td> <span
                                                                id="ctl27_lblBranch">{{ users()->user()->bank->branch }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <span style="padding: 5px; margin-top: 5px;display: block;">
                                                                <a style="color: blue"
                                                                    href="{{ route('us.account.bank') }}">Click vào đây để
                                                                    cập nhật lại thông tin tài khoản.</a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <label>Số tiền</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i
                                                            class="fa fa-usd">$</i></span> </div>
                                                <input name="txtAmount" type="text" min="450000"
                                                    placeholder="Nhập số tiền thanh khoản" maxlength="14"
                                                    id="ctl27_txtValue" class="form-control number" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p> Số tiền rút tối thiểu 450,000 đ /lần.
                                                <br> <strong>Phí rút: 1%</strong>
                                                <br> <strong>Thuế thu nhập cá nhân: 5%</strong>
                                                <br> Thời gian rút từ thứ 2 đến thứ 6.
                                                <br> Thời gian xử lý yêu cầu trong vòng 48h.
                                                <br> Tài khoản phải được định danh mới có thể thanh khoản.
                                            </p>
                                        </div>
                                        <center>
                                            <button type="submit" id="ctl27_btnReg" class="btn bg-background"
                                                style="width: 180px; margin-bottom:10px;color:white; font-weight:bold;">Gửi
                                                yêu cầu rút tiền</button>
                                        </center>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="total-table table-responsive" style="margin-top: 20px; overflow-x: auto;">
                        <table class="table table-bordered table-striped bg-white table-hover"
                            style="margin: 0;font-size:15px; min-width: 1000px">
                            <thead>
                                <tr>
                                    <th style="color: black !important">Thời gian</th>
                                    <th style="color: black !important">Số tiền rút</th>
                                    <th style="color: black !important">Số tiền nhận</th>
                                    <th style="color: black !important">Phí</th>
                                    <th style="color: black !important">Thuế thu nhập</th>
                                    <th style="color: black !important">Điểm tiêu dùng</th>
                                    <th style="color: black !important">Ngân hàng</th>
                                    <th style="color: black !important">Chủ tài khoản</th>
                                    <th style="color: black !important">Số tài khoản</th>
                                    <th style="color: black !important">Trạng thái</th>
                                    <th style="color: black !important">Ghi chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($payments->count() > 0)
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::createFromDate($payment->created_at)->format('d/m/Y H:i') }}
                                            </td>
                                            <td>-{{ number_format($payment->amount) }} VND</td>
                                            <td>{{ number_format(($payment->amount * 70) / 100) }} VND</td>
                                            <td>{{ number_format(($payment->amount * 1) / 100) }} VND</td>
                                            <td>{{ number_format(($payment->amount * 5) / 100) }} VND</td>
                                            <td>{{ number_format(($payment->amount * 24) / 100) }} VND</td>
                                            <td>{{ $payment->bank }}</td>
                                            <td>{{ $payment->name }}</td>
                                            <td>{{ $payment->number }}</td>
                                            <td>
                                                @if ($payment->status == 0)
                                                    <span class="text-blink">Đang chờ</span>
                                                @elseif ($payment->status == 1)
                                                    <span class="text-success">Đã chi</span>
                                                @else
                                                    <span class="text-danger">Đã hủy</span>
                                                @endif
                                            </td>
                                            <td>{{ $payment->note }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="11">Không có bản ghi nào</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $payments->links() }}
                    </div>
                </div>
                <style type="text/css">
                    #divBankInfo tr td {
                        padding: 0px 10px !important;
                    }
                </style>
            </div>
        </section>
    </section>
@endsection
@push('scripts')
    <script>
        function autoFormatNumber() {
            var $form = $("form");
            var $input = $form.find(".number");
            $input.on("keyup", function(event) {
                var selection = window.getSelection().toString();
                if (selection !== '') {
                    return;
                }
                if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
                    return;
                }
                var $this = $(this);
                var input = $this.val();
                var input = input.replace(/[\D\s\._\-]+/g, "");
                input = input ? parseInt(input, 10) : 0;
                $this.val(function() {
                    return (input === 0) ? "0" : input.toLocaleString("en-US");
                });
            });
        }
        $(window).on("load", function() {
            autoFormatNumber();
        });
    </script>
@endpush
