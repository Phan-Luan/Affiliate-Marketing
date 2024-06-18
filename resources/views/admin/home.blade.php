@extends('admin.layouts.master')

@section('page_title', 'Trang Dashboard')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-4 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">TỔNG ĐƠN HÀNG / DOANH SỐ 🎉</h5>
                                    <h3 class="mb-4 text-info">{{ number_format($report_order['total_order']) }} /
                                        {{ number_format($report_order['total_sale']) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">TỔNG ĐƠN HÀNG / DOANH SỐ CHƯA DUYỆT </h5>
                                    <h3 class="mb-4 text-danger">{{ number_format($report_order['total_order_not_pay']) }} /
                                        {{ number_format($report_order['total_sale_not_pay']) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">TỔNG ĐƠN HÀNG / DOANH SỐ ĐÃ DUYỆT </h5>
                                    <h3 class="mb-4 text-success">{{ number_format($report_order['total_order_pay']) }} /
                                        {{ number_format($report_order['total_sale_pay']) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">TỔNG THÀNH VIÊN</h5>
                                    <h3 class="mb-4 text-info">{{ number_format($report_user['total_user']) }} TV</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">TỔNG THÀNH VIÊN CHƯA KÍCH HOẠT</h5>
                                    <h3 class="mb-4 text-danger">{{ number_format($report_user['total_user_not_active']) }}
                                        TV</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">TỔNG THÀNH VIÊN ĐÃ KÍCH HOẠT</h5>
                                    <h3 class="mb-4 text-success">{{ number_format($report_user['total_user_active']) }} TV
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">TỔNG HOA HỒNG TỒN ĐỌNG</h5>
                                    <h3 class="mb-4 text-success">{{ number_format($report_money['money']) }} VNĐ</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                <div class="col-lg-4 mb-4 order-0"> --}}
                {{--                    <div class="card"> --}}
                {{--                        <div class="d-flex align-items-end row"> --}}
                {{--                            <div class="col-sm-12"> --}}
                {{--                                <div class="card-body"> --}}
                {{--                                    <h5 class="card-title text-primary">TỔNG ĐIỂM VOUCHER MUA TỒN ĐỌNG</h5> --}}
                {{--                                    <h3 class="mb-4 text-success">{{number_format($report_money['voucher_buy'])}} TV</h3> --}}
                {{--                                </div> --}}
                {{--                            </div> --}}
                {{--                        </div> --}}
                {{--                    </div> --}}
                {{--                </div> --}}
                {{--                <div class="col-lg-4 mb-4 order-0"> --}}
                {{--                    <div class="card"> --}}
                {{--                        <div class="d-flex align-items-end row"> --}}
                {{--                            <div class="col-sm-12"> --}}
                {{--                                <div class="card-body"> --}}
                {{--                                    <h5 class="card-title text-primary">TỔNG ĐIỂM VOUCHER TẶNG TỒN ĐỌNG</h5> --}}
                {{--                                    <h3 class="mb-4 text-success">{{number_format($report_money['voucher_gift'])}} ĐIỂM</h3> --}}
                {{--                                </div> --}}
                {{--                            </div> --}}
                {{--                        </div> --}}
                {{--                    </div> --}}
                {{--                </div> --}}
                <div class="col-lg-4 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">TỔNG DOANH SỐ THEO SẢN PHẨM (ĐÃ DUYỆT)</h5>
                                    <h3 class="mb-4 text-success">{{ number_format($report_order['total_order_product']) }}
                                        VNĐ</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 order-0">
                    <a href="{{ route('ad.refund_warehouse') }}">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-sm-12">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Kho hoàn tiền</h5>
                                        <h3 class="mb-4 text-success">
                                            {{ number_format(Auth()->user()->refund_warehouse) }}
                                            VNĐ</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <hr>
                <h4 class="text-center">SỐ THÀNH VIÊN ĐĂNG KÝ 30 NGÀY GẦN NHẤT</h4>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable(<?= json_encode($report_user_daily) ?>);

                        var options = {
                            chart: {
                                title: 'Báo cáo thành viên đăng ký',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('curve_chart'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="curve_chart" style="width: 100%; height: 500px"></div>

                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , made with ❤️ by
                            <a href="https://ibet66.com" target="_blank" class="footer-link fw-bolder">KẾT NỐI TOÀN CẦU</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->

        @endsection
