@extends('admin.layouts.master')

@section('page_title', 'Quản lý đơn hàng')

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-datatable bordered">
                <div
                    class="layout-navbar navbar-detached shadow-sm p-3 bg-white rounded row container-xxl flex-grow-1 container-p-y">
                    <div class="caption col-6">
                        <i class="icon-settings font-dark"></i>
                        <h4 class="mb-0 bold uppercase ">@yield('page_title')</h4>
                    </div>
                    <div class="actions text-right col-6">
                        <a href="{{ route('ad.exportOrder', ['type' => 2]) }}" class="btn btn-circle btn-sm btn-primary">
                            <a href="{{ route('ad.exportOrder', ['type' => 0]) }}"
                                class="btn btn-circle btn-sm btn-primary"> <i class="fa fa-plus"></i> Xuất Excel
                            </a>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3">
                        <form action="{{ route('ad.order.index') }}" method="GET" class="row">
                            {{--                            <div class="col-md-4"> --}}
                            {{--                                <div class="form-group"> --}}
                            {{--                                    <label for="exampleInputEmail1">Tên sản phẩm</label> --}}
                            {{--                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="exampleInputEmail1" > --}}
                            {{--                                </div> --}}
                            {{--                            </div> --}}
                            {{--                            <div class="col-md-4"> --}}
                            {{--                                <div class="form-group"> --}}
                            {{--                                    <label for="exampleInputEmail1">Danh mục</label> --}}
                            {{--                                    <select class="form-control" name="category_id" id=""> --}}
                            {{--                                        <option value="">Tất cả</option> --}}
                            {{--                                        @foreach ($categories as $category) --}}
                            {{--                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option> --}}
                            {{--                                        @endforeach --}}
                            {{--                                    </select> --}}
                            {{--                                </div> --}}
                            {{--                            </div> --}}
                            {{--                            <div class="col-md-2 pt-4"> --}}
                            {{--                                <div> --}}
                            {{--                                    <button class="btn btn-success btn-sm" style="height: 32px; float:left">Tìm kiếm</button> --}}
                            {{--                                    <a class="btn btn-info btn-sm text-white" href="{{route('ad.product.index')}}" style="height: 32px">Clear</a> --}}
                            {{--                                </div> --}}
                            {{--                            </div> --}}
                        </form>
                        <hr>
                        <table class="table table-bordered table-hover" id="admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Người giới thiệu</th>
                                    <th>Thành viên</th>
                                    <th>SĐT người nhận</th>
                                    <th>Địa chỉ nhận</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Hình thức nhận hàng</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Bill</th>
                                    <th>Ngày đặt hàng</th>
                                    <th width="200">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr class="{{ $order->status == 0 ? 'text-danger' : 'text-dark' }}">
                                        <td>{{ $order->id }}</td>
                                        <td>
                                            {{ $order->user->invite($order->user->invite_user) ? $order->user->invite($order->user->invite_user)->name : '' }}
                                            ({{ $order->user->invite($order->user->invite_user) ? $order->user->invite($order->user->invite_user)->phone : '' }})
                                        </td>
                                        <td>{{ $order->user_id ? $order->user->name : 'Khách hàng vãng lai' }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ number_format($order->total_money) }}</td>
                                        <td>{{ $order->status == 0 ? 'Chưa duyệt' : 'Đã duyệt' }}</td>
                                        <td>
                                            @if ($order->payment_method == 1)
                                                Nhận hàng tại công ty
                                            @else
                                                Nhận hàng tại nhà
                                        <td>
                                            <?php
                                            $inviteUser = null;
                                            if ($order->user && $order->user->invite_user) {
                                                $inviteUser = $order->user->invite($order->user->invite_user);
                                            }
                                            ?>
                                            @if ($inviteUser)
                                                {{ $inviteUser ? $inviteUser->name : '' }}
                                                ({{ $inviteUser ? $inviteUser->phone : '' }})
                                            @else
                                            @endif
                                        </td>
                                        <td>{{ $order->user_id && $order->name ? $order->name : 'Khách hàng vãng lai' }}
                                        </td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ number_format($order->total_money) }}</td>
                                        <td>{{ $order->status == 0 ? 'Chưa duyệt' : ($order->status == 2 ? 'Đã hủy' : 'Đã duyệt') }}
                                        <td>
                                            @if ($order->payment_method == 0)
                                                Tiền mặt
                                            @elseif ($order->payment_method == 2)
                                                Ví tiêu dùng
                                            @else
                                                Chuyển khoản
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->bill)
                                                <img style="width: 15rem" src="{{ $order->bill }}" alt="">
                                            @else
                                                Chưa có
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::createFromDate($order->created_at)->format('H:i d/m/Y') }}
                                        </td>
                                        <td>
                                            @if ($order->status == 0)
                                                <a class="btn btn-circle btn-sm text-dark btn-success btn-approve"
                                                    data-order-id="{{ $order->id }}" data-status="1">Duyệt</a>
                                                <a class="btn btn-circle btn-sm text-light btn-danger btn-cancel"
                                                    data-order-id="{{ $order->id }}" data-status="2">Hủy</a>
                                                <a class="btn btn-circle btn-sm text-light btn-danger btn-delete"
                                                    data-order-id="{{ $order->id }}">Xóa</a>
                                            @elseif ($order->status == 1 && $order->pro_type == 0 && $order->is_refund == 0)
                                                <a class="btn btn-circle btn-sm text-light btn-primary btn-refund"
                                                    data-order-id="{{ $order->id }}">Hoàn tiền</a>
                                            @endif
                                            <a class="btn btn-circle btn-sm btn-warning"
                                                href="{{ route('ad.order.edit', $order) }}"><i class='bx bx-edit'></i></a>
                                        </td>
                                        </td>
                                        <td>{{ $order->user_id ? $order->user->name : 'Khách hàng vãng lai' }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ number_format($order->total_money) }}</td>
                                        <td>
                                            @switch($order->status)
                                                @case(1)
                                                    {{ __('Đã duyệt') }}
                                                @break

                                                @case(2)
                                                    {{ __('Đã hủy') }}
                                                @break

                                                @default
                                                    {{ __('Chưa duyệt') }}
                                            @endswitch
                                        </td>>
                                        <td>
                                            @if ($order->payment_method == 1)
                                                Nhận hàng tại công ty
                                            @else
                                                Nhận hàng tại nhà
                                            @endif
                                        </td>

                                        <td>
                                            @if ($order->payment_method == 0)
                                                Tiền mặt
                                            @elseif ($order->payment_method == 2)
                                                Ví tiêu dùng
                                            @else
                                                Chuyển khoản
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->bill)
                                                <img style="width: 15rem" src="{{ $order->bill }}" alt="">
                                            @else
                                                Chưa có
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::createFromDate($order->created_at)->format('H:i d/m/Y') }}
                                        </td>
                                        <td>
                                            @if ($order->status == 0)
                                                <a class="btn btn-circle btn-sm text-dark btn-success btn-approve"
                                                    data-order-id="{{ $order->id }}" data-status="1">Duyệt</a>
                                                <a class="btn btn-circle btn-sm text-light btn-danger btn-cancel"
                                                    data-order-id="{{ $order->id }}" data-status="2">Hủy</a>
                                                <a class="btn btn-circle btn-sm text-light btn-danger btn-delete"
                                                    data-order-id="{{ $order->id }}">Xóa</a>
                                            @elseif ($order->status == 1 && $order->pro_type == 0 && $order->is_refund == 0)
                                                <a class="btn btn-circle btn-sm text-light btn-primary btn-refund"
                                                    data-order-id="{{ $order->id }}">Hoàn tiền</a>
                                            @elseif ($order->status == 2)
                                                <a class="btn btn-circle btn-sm text-light btn-danger btn-delete"
                                                    data-order-id="{{ $order->id }}">Xóa</a>
                                            @endif
                                            <a class="btn btn-circle btn-sm btn-warning"
                                                href="{{ route('ad.order.edit', $order) }}"><i class='bx bx-edit'></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <style>
        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
    <!-- END PAGE LEVEL PLUGINS -->
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const approveButtons = document.querySelectorAll('.btn-approve');
            const cancelButtons = document.querySelectorAll('.btn-cancel');
            const deleteButtons = document.querySelectorAll('.btn-delete');
            const refundButtons = document.querySelectorAll('.btn-refund');

            refundButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const orderId = this.getAttribute('data-order-id');
                    Swal.fire({
                        title: `Bạn có chắc chắn muốn hoàn tiền đơn hàng này?`,
                        text: "Bạn sẽ không thể hoàn tác hành động này!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Xác nhận'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.get(`{{ route('ad.order.refundOrder', '') }}/${orderId}`)
                                .done(function(response) {
                                    if (response.error) {
                                        Swal.fire(
                                            'Thất bại!',
                                            response.error,
                                            'error'
                                        )
                                    } else if (response.success) {
                                        Swal.fire(
                                            'Thành công!',
                                            response.success,
                                            'success'
                                        ).then(() => {
                                            location.reload();
                                        });
                                    }
                                })
                                .fail(function() {
                                    Swal.fire(
                                        'Lỗi!',
                                        `Đã xảy ra lỗi khi hoàn tiền đơn hàng.`,
                                        'error'
                                    );
                                });
                        }
                    });
                });
            });

            function handleDeleteOrder(event) {
                event.preventDefault();
                const orderId = this.getAttribute('data-order-id');

                Swal.fire({
                    title: `Bạn có chắc chắn muốn xóa đơn hàng này?`,
                    text: "Bạn sẽ không thể hoàn tác hành động này!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác nhận'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.get(`{{ route('ad.order.deleteOrder', '') }}/${orderId}`)
                            .done(function(response) {
                                Swal.fire(
                                    'Thành công!',
                                    `Đơn hàng đã được xóa.`,
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            })
                            .fail(function() {
                                Swal.fire(
                                    'Lỗi!',
                                    `Đã xảy ra lỗi khi xóa đơn hàng.`,
                                    'error'
                                );
                            });
                    }
                });
            }

            deleteButtons.forEach(button => {
                button.addEventListener('click', handleDeleteOrder);
            });


            function handleButtonClick(event) {
                event.preventDefault();
                const orderId = this.getAttribute('data-order-id');
                const status = this.getAttribute('data-status');
                const action = status === '1' ? 'duyệt' : 'hủy';

                Swal.fire({
                    title: `Bạn có chắc chắn muốn ${action} đơn hàng này?`,
                    text: "Bạn sẽ không thể hoàn tác hành động này!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác nhận'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.get("{{ route('ad.order.update_status', ['id' => 'ORDER_ID', 'status' => 'STATUS']) }}"
                                .replace('ORDER_ID', orderId)
                                .replace('STATUS', status))
                            .done(function(response) {
                                Swal.fire(
                                    'Thành công!',
                                    `Đơn hàng đã được ${action}.`,
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            })
                            .fail(function() {
                                Swal.fire(
                                    'Lỗi!',
                                    `Đã xảy ra lỗi khi ${action} đơn hàng.`,
                                    'error'
                                );
                            });
                    }
                });
            }

            approveButtons.forEach(button => {
                button.addEventListener('click', handleButtonClick);
            });

            cancelButtons.forEach(button => {
                button.addEventListener('click', handleButtonClick);
            });
        });
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{-- <script src="{{ asset('global/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
