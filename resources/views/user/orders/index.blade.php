@extends('user.layouts.master')
@section('page_title', 'Trang tài khoản')
@section('page_id', 'page-home')
@section('content')
    <style>
        #history-mobile {
            display: none;
        }

        .history-mobile-item {
            border: 1px solid #ccc;
            padding: 1rem;
        }

        @media (max-width: 768px) {
            #history-desktop {
                display: none;
            }

            #history-mobile {
                display: block;
            }
        }
    </style>
    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <h4>Lịch sử đặt hàng</h4>

                <div id="history-desktop" class="row bg-white my-4 mx-1 rounded border" style="padding-top: 8px;">
                    <p>Trạng Thái Đơn Hàng</p>
                    <table id="thistory"
                        class="table table-bill-seen table-bordered table-striped bg-white table-hover table-responsive-md"
                        style="font-size:15px; min-width:1000px">
                        <thead class="bg-success text-light">
                            <tr>
                                <th style="min-width:30px;" class="text-center">STT</th>
                                <th style="min-width:120px;" class="text-center">Mã Đơn Hàng</th>
                                <th style="min-width:120px;" class="text-center">Sản Phẩm</th>
                                <th style="min-width:120px;" class="text-center">Số Tiền</th>
                                <th style="min-width:140px;" class="text-center">Tình Trạng</th>
                                <th style="min-width:160px;" class="text-center">Địa Chỉ Giao</th>
                                <th style="min-width:160px;" class="text-center">Trạng Thái Giao</th>
                                <th style="min-width:160px;" class="text-center">Trạng Thái Hoàn</th>
                                <th style="min-width:120px;" class="text-center">Ngày Đặt</th>
                                <th style="min-width:100px;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders->count() > 0)
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><b>#{{ $order->order_id }}</b>
                                            {{--                                                            <br> <a style="color: #007bff" onclick="showorderdetail('IV02745587')" href="javascript:void(0)">Xem chi tiết</a> --}}
                                        </td>

                                        <td>

                                            @if ($order->product)
                                                {{ $order->product->name }} / Số lượng: {{ $order->qty }} /
                                                Đơn giá: {{ number_format($order->money) }}
                                            @endif

                                            <br>
                                            {{--                                                            ECO LIFE / Số lượng: 20 / Đơn giá: 2,000,000 --}}
                                            {{--                                                            <br>ECO PLUS / Số lượng: 5 / Đơn giá: 2,000,000 --}}
                                        </td>
                                        <td style="text-align:right;">
                                            {{ number_format($order->money * $order->qty) }}
                                        </td>
                                        <td class="text-center">
                                            @if ($order->order)
                                                {{ $order->order->status == 0 ? 'Chưa thanh toán' : ($order->order->status == 2 ? 'Đã hủy' : 'Đã thanh toán') }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($order->payment_method == 1)
                                                Tại công ty
                                            @else
                                                Tại nhà
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($order->order)
                                                @if ($order->order->progress == 0)
                                                    Chưa giao hàng
                                                @elseif($order->order->progress == 1)
                                                    Đang giao hàng
                                                @elseif($order->order->progress == 2)
                                                    Giao thành công
                                                @elseif($order->order->progress == 3)
                                                    Giao hàng thất bại
                                                @else
                                                    Đã giao hàng
                                                @endif
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($order->pro_type == 1)
                                                Đã Hoàn
                                            @else
                                                Chưa Hoàn
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::createFromDate($order->created_at)->format('H:i d/m/Y') }}
                                        </td>
                                        <td class="text-center">
                                            @if ($order->order)
                                                @if ($order->order->status == 0)
                                                    <button class="btn btn-sm btn-danger btn-cancel-order"
                                                        data-order-id="{{ $order->order_id }}">Hủy đơn</button>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="10">Chưa có dữ liệu để hiển thị</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                    <d-flex>
                        <p style="margin-bottom: 0em !impo">Trạng thái hoàn từ kho tiền - Đơn được hoàn 100% -
                            Người kết nối 50% - Trả vào ví thu nhập. Gồm:</p>
                        <ol class="ml-3">
                            <li>
                                Đơn hàng mua sản phẩm
                            </li>
                            <li>Phí thành viên kết nối</li>
                            <li>Phí nhà SX, KD</li>
                            <li>Phí điểm đại diện</li>
                            <li>Các phí khác (nếu có)</li>
                        </ol>
                    </d-flex>

                    {{-- Đơn Hàng Được Hoàn --}}

                </div>
                <div id="history-mobile">
                    <p>Trạng thái đơn hàng</p>
                    @if ($orders->count() > 0)
                        @foreach ($orders as $key => $order)
                            <div class="history-mobile-item mt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0"><strong class="fw-bold">Mã đơn hàng:</strong> #{{ $order->order_id }}
                                    </p>
                                    @if ($order->order)
                                        @if ($order->order->status == 0)
                                            <p class="btn btn-primary btn-cancel-order"
                                                data-order-id="{{ $order->order_id }}">
                                                Hủy
                                                đơn hàng</p>
                                        @endif
                                    @endif
                                </div>
                                <p class="mb-0"><strong class="fw-bold">Ngày đặt:</strong>
                                    {{ \Carbon\Carbon::createFromDate($order->created_at)->format('d/m/Y H:i') }}</p>
                                <p class="mb-0"><strong class="fw-bold">Sản phẩm :</strong>
                                    @if ($order->product)
                                        {{ $order->product->name }}
                                    @endif
                                </p>
                                <p class="mb-0"><strong class="fw-bold">Số lượng:</strong> {{ $order->qty }} </p>
                                <p class="mb-0"><strong class="fw-bold">Đơn giá:</strong>
                                    {{ number_format($order->money) }} VND</p>
                                <p class="mb-0"><strong class="fw-bold">Tình trạng:</strong>
                                    @if ($order->order)
                                        {{ $order->order->status == 0 ? 'Chưa thanh toán' : ($order->order->status == 2 ? 'Đã hủy' : 'Đã thanh toán') }}
                                    @endif
                                </p>
                                <p class="mb-0"><strong class="fw-bold">Địa chỉ giao:</strong>
                                    @if ($order->payment_method == 1)
                                        Tại công ty
                                    @else
                                        Tại nhà
                                    @endif
                                </p>
                                <p class="mb-0"><strong class="fw-bold">Trạng thái giao:</strong>
                                    @if ($order->order)
                                        @if ($order->order->progress == 0)
                                            Chưa giao hàng
                                        @elseif($order->order->progress == 1)
                                            Đang giao hàng
                                        @elseif($order->order->progress == 2)
                                            Giao thành công
                                        @elseif($order->order->progress == 3)
                                            Giao hàng thất bại
                                        @else
                                            Đã giao hàng
                                        @endif
                                    @endif
                                </p>
                                <p class="mb-0"><strong class="fw-bold">Hoàn tiền:</strong>
                                    @if ($order->pro_type == 1)
                                        Đã Hoàn
                                    @else
                                        Chưa Hoàn
                                    @endif
                                </p>
                                <p>
                                    @if ($order->product)
                                        <img width="100%" src="{{ $order->product->image }}" alt="product">
                                    @endif
                                </p>

                            </div>
                        @endforeach
                    @else
                        <p class="text-center" colspan="10">Chưa có dữ liệu để hiển thị</p>
                    @endif
                </div>

            </div>
            </div>

            <div class="modal" id="mdOrder" tabindex="-1" data-backdrop="static" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content" style="width:100%;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Thông tin đơn hàng
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                    aria-hidden="true">×</span> </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-2" style="line-height:40px;" id="orderInfo"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style type="text/css">
                .dfl {
                    display: flex;
                    justify-content: space-between;
                }
            </style>
            <script src="/Scripts/pachis.js?vsss=1.3"></script>
            </div>
        </section>
    </section>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cancelButtons = document.querySelectorAll('.btn-cancel-order');

            cancelButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const orderId = this.getAttribute('data-order-id');

                    Swal.fire({
                        title: 'Bạn muốn hủy đơn hàng này?',
                        text: "Bạn sẽ không thể hoàn tác hành động này!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Xác nhận'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.get("{{ route('us.order.update_status', '') }}/" + orderId)
                                .done(function(response) {
                                    if (response.status == 'success') {
                                        Swal.fire(
                                            'Đã hủy!',
                                            response.msg,
                                            'success'
                                        ).then(() => {
                                            location.reload();
                                        });
                                    } else if (response.status == 'error') {
                                        Swal.fire(
                                            'Lỗi!',
                                            response.msg,
                                            'error'
                                        );
                                    }
                                })
                                .fail(function() {
                                    Swal.fire(
                                        'Lỗi!',
                                        'Đã xảy ra lỗi khi hủy đơn hàng.',
                                        'error'
                                    );
                                });
                        }
                    });
                });
            });
        });
    </script>
@endpush
