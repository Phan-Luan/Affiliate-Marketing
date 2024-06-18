<style>
    /* CSS for vertically aligning table cell content to the top */
    .text-align-top td {
        vertical-align: top !important;
    }
</style>
<table class="table table-striped table-bordered table-hover" id="admin-table">
    <thead>
        <tr>
            <th width="50px"> <b>STT</b></th>
            <th width="150px"> <b>TV mua</b></th>
            <th width="150px"><b>TÊN NGƯỜI NHẬN</b></th>
            <th width="150px"><b>SĐT NGƯỜI NHẬN</b></th>
            <th width="250px"><b>ĐỊA CHỈ NHẬN</b></th>
            <th width="150px"><b>TỔNG TIỀN</b></th>
            <th width="170px"><b>HÌNH THỨC THANH TOÁN</b></th>
            <th width="150px"><b>TRẠNG THÁI</b></th>
            <th width="150px"><b>TRẠNG THÁI VẬN ĐƠN</b></th>
            <th width="100px" colspan="2"><b>NGÀY ĐẶT HÀNG</b></th>
            <th width="1000px"><b>Chi tiết đơn</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $key => $order)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $order->user_id ? $order->user->name : 'Khách hàng vãng lai' }}</td>
                <td style="font-weight: {{ $order->pro_type == 1 ? 'bold' : '' }}">{{ $order->name }}
                    {{ $order->pro_type == 1 ? '(Phí thành viên)' : '' }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->total_money }}</td>
                <td>
                    @if ($order->payment_method == 0)
                        Tiền mặt
                    @else
                        Voucher {{ $order->voucher == 1 ? 'Mua' : 'Tặng' }}
                    @endif
                </td>
                <td>{{ $order->status == 0 ? 'Chưa duyệt' : 'Đã duyệt' }}</td>
                <td>
                    @if ($order->progress == 0)
                        Chưa giao hàng
                    @elseif($order->progress == 1)
                        Đang giao hàng
                    @elseif($order->progress == 2)
                        Giao thành công
                    @elseif($order->progress == 3)
                        Giao hàng thất bại
                    @elseif($order->progress == 4)
                        Được hoàn
                    @elseif($order->progress == 5)
                        Chưa hoàn
                    @else
                        Đã giao hàng
                    @endif
                </td>
                <<<<<<< HEAD <td>{{ \Carbon\Carbon::createFromDate($order->created_at)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::createFromDate($order->created_at)->format('H:i') }}</td>
                    =======
                    <td>{{ \Carbon\Carbon::createFromDate($order->created_at)->format('H:i d/m/Y') }}</td>
                    >>>>>>> 321a799 (update warehouse)
                    <td>
                        @if ($order->order_detail)
                            @foreach ($order->order_detail as $item)
                                Sản phẩm :{{ $item->product->name }} <br>
                                Số lượng :{{ $item->qty }} <br>
                                Đơn giá :{{ $item->money }} <br>
                                Thành tiền :{{ $item->money * $item->qty }} <br>
                            @endforeach
                        @endif
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>
