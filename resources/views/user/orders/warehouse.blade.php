@extends('user.layouts.master')
@section('page_title', 'Kho Hoàn Tiền')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content row justify-content-center" style="padding:0px;">
            <div class="col-lg-12 col-md-12 col-sm-12 my-4 rounded border" style="background: #ffd8be">
                <img width="100%" src="{{ asset('images/z5401507866211_6b3aa88ba92870237a77523c108b96ce.jpg') }}" alt="">
            </div>
            
            <div class="table-responsive col-11">
                <table class="table border table-striped table-bordered text-nowrap table-bill-seen">
                    <thead class="bg-success text-dark">
                        <tr>
                            <th class="bg-primary text-center text-uppercase" >Kho Hoàn Tiền - Tổng</th>
                            <th class="bg-warning text-center text-uppercase" style="color: #000 !important">Tổng Tiền Đã Hoàn </th>
                            <th class="bg-success text-center text-uppercase">Tổng Tiền Chưa Hoàn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                {{number_format($warehouse)}} VNĐ
                            </td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive col-11">
                <table class="table border table-striped table-bordered text-nowrap table-bill-seen">
                    <thead class="bg-danger text-light">
                        <tr>
                            <th>Nguồn Vào</th>
                            <th>%</th>
                            <th>Thành Tiền</th>
                            <th>Chi Tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Doanh thu từ Phí kết nối Thành viên</td>
                            <td>3%</td>
                            <td>{{number_format($membership_fee * 0.03)}} VNĐ</td>
                            <td><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal-1">
                                Chi Tiết
                            </button></td>
                        </tr>
                        <tr>
                            <td>Doanh thu từ Phí kết nối nhà SX, KD</td>
                            <td>2%</td>
                            <td>{{number_format($production_business)}} VNĐ</td>
                            <td><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal-2">
                                Chi Tiết
                            </button></td>
                        </tr>
                        <tr>
                            <td>Lợi nhuận từ đơn hàng toàn cầu</td>
                            <td>10%</td>
                            <td>{{number_format($totalProfit)}} VNĐ</td>
                            <td><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal-3">
                                Chi Tiết
                            </button></td>
                        </tr>
                        <tr>
                            <td>Doanh thu từ Quỹ Phụ nữ khởi nghiệp, các quỹ khác .</td>
                            <td>2% </td>
                            <td>{{number_format($wallet_woment * 0.02)}} VNĐ</td>
                            <td><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal-4">
                                Chi Tiết
                            </button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- <h3>{{$userId}}</h3> --}}
        </section>
    </section>
@endsection
@push('scripts')
    <script></script>
@endpush
