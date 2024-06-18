@extends('user.layouts.master')
@section('page_title', 'Lịch sử giao dịch')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <h4>Lịch sử giao dịch</h4>
                <div>
                    <div class="total-table table-responsive" style="margin-top: 20px; overflow-x: auto;">
                        <table class="table table-bordered table-striped bg-white table-hover"
                            style="margin: 0;font-size:15px; min-width:1000px">
                            <thead>
                                <tr style="background: green">
                                    <th>Thời gian</th>
                                    <th>Mã giao dịch</th>
                                    <th>Số tiền</th>
                                    <th>Ví</th>
                                    {{--                                <th>Người gửi / Người nhận</th> --}}
                                    <th>Loại giao dịch</th>
                                    {{-- <th>Trạng thái</th> --}}
                                    <th>Nội dung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($logs->count() > 0)
                                    @foreach ($logs as $log)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::createFromDate($log->created_at)->format('d/m/Y H:i') }}
                                            </td>
                                            <td>#{{ $log->id }}</td>
                                            <td class="text-{{ $log->add == 0 ? 'success' : 'danger' }}">
                                                {{ $log->add == 0 ? '+' : '-' }}{{ number_format($log->money) }}</td>
                                            <td>
                                                @if ($log->wallet == 1)
                                                    Ví rút tiền
                                                @endif
                                            </td>
                                            {{--                                        <td> --}}
                                            {{--                                            @if ($log->user_gift) --}}
                                            {{--                                                {{$log->user->name}} / {{$log->user_receive->name}} --}}
                                            {{--                                            @else --}}
                                            {{--                                                {{$log->user->name}} --}}
                                            {{--                                            @endif --}}
                                            {{--                                        </td> --}}
                                            <td>
                                                @if ($log->type == 1)
                                                    Thưởng thành viên kết nối
                                                @elseif($log->type == 2)
                                                    Thưởng kết nối nhà sản xuất, Kinh doanh
                                                @elseif($log->type == 3)
                                                    Thưởng kết nối điểm đại diện
                                                @elseif($log->type == 4)
                                                    Thưởng lợi nhuận đơn hàng
                                                @endif
                                            </td>
                                            {{-- <td>
                                            @if ($log->status == 0)
                                                <span class="text-blink">Đang chờ</span>
                                            @elseif ($log->status == 1)
                                                <span class="text-success">Thành công</span>
                                            @else
                                                <span class="text-danger">Đã hủy</span>
                                            @endif
                                        </td> --}}
                                            <td>{{ $log->reason }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" style="text-align: center">Không có giao dịch nào</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{ $logs->links() }}
                </div>
                <script>
                    $('[name="txtUserName"]').change(function() {
                        var username = $(this).val();
                        $.ajax({
                            url: "{{ route('us.payment.get_user') }}",
                            data: {
                                username: username
                            },
                            type: "GET",
                            success: function(data) {
                                $('.fullname').val(data);
                            }
                        })
                    });

                    function getBalance2(type) {
                        var t = $('[name="txtWallet"]').val();
                        $.ajax({
                            url: "{{ route('us.payment.get_balance') }}",
                            data: {
                                wallet: $('[name="txtWallet"]').val(),
                                type: type
                            },
                            type: "GET",
                            success: function(data) {
                                $('#txtAvailable').val(data);
                                $('.fee').text(data.fee);
                            }
                        });
                    }
                </script>
            </div>
        </section>
    </section>
@endsection
@push('scripts')
    <script>
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
