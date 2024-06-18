@extends('admin.layouts.master')

@section('page_title', 'Quản lý giao dịch')

@section('content')
    <div class="row" style="z-index: 1">
        <div class="col-md-12">
            <div class="portlet light portlet-datatable bordered">
                <div
                    class="layout-navbar navbar-detached shadow-sm p-3 bg-white rounded row container-xxl flex-grow-1 container-p-y">
                    <div class="caption col-6">
                        <i class="icon-settings font-dark"></i>
                        <h4 class="mb-0 bold uppercase ">@yield('page_title')</h4>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3 overflow-auto">
                        <table class="table table-bordered table-hover" id="admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thành viên</th>
                                    <th width="150">Số tiền</th>
                                    <th>Ví</th>
                                    <th>Người gửi / Người nhận</th>
                                    <th>Loại giao dịch</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày giao dịch</th>
                                    <th>Ghi chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ $log->id }}</td>
                                        <td>
                                            @if ($log->user)
                                                {{ $log->user->name }} ({{ $log->user->phone }})
                                            @endif
                                        </td>
                                        <td class="text-{{ $log->add == 0 ? 'success' : 'danger' }}">
                                            {{ $log->add == 0 ? '+' : '-' }}{{ number_format($log->money) }}</td>
                                        <td>
                                            @if ($log->wallet == 0)
                                                Ví hoa hồng
                                            @elseif($log->wallet == 1)
                                                Ví Voucher mua
                                            @elseif($log->wallet == 2)
                                                Ví Voucher tặng
                                            @endif
                                        </td>
                                        <td>
                                            @if ($log->user_gift)
                                                @if ($log->user && $log->user_receive)
                                                    {{ $log->user->name }} / {{ $log->user_receive->name }}
                                                @endif
                                            @else
                                                @if ($log->user)
                                                    {{ $log->user->name }}
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if ($log->type == 0)
                                                Chuyển điểm Voucher
                                            @elseif($log->type == 1)
                                                Nhận điểm Voucher
                                            @elseif($log->type == 2)
                                                Nạp điểm Voucher
                                            @elseif($log->type == 3)
                                                Rút tiền
                                            @elseif($log->type == 4)
                                                Mua sản phẩm
                                            @elseif($log->type == 5)
                                                Thưởng trực tiếp giới thiệu TV
                                            @elseif($log->type == 6)
                                                Tặng Voucher thành viên mới
                                            @elseif($log->type == 7)
                                                Tích điểm khi mua sản phẩm
                                            @elseif($log->type == 8)
                                                Thưởng thu nhập / thu nhập
                                            @elseif($log->type == 9)
                                                Thưởng đồng chia thẻ
                                            @elseif($log->type == 10)
                                                Thưởng đồng chia doanh số bán hàng
                                            @elseif($log->type == 11)
                                                Thưởng bán hàng giỏi
                                            @elseif($log->type == 12)
                                                Thưởng nhà kết nối
                                            @elseif($log->type == 13)
                                                Mua điểm Voucher bằng ví hoa hồng
                                            @endif
                                        </td>
                                        <td>
                                            @if ($log->status == 0)
                                                <span class="text-blink">Đang chờ</span>
                                            @elseif ($log->status == 1)
                                                <span class="text-success">Thành công</span>
                                            @else
                                                <span class="text-danger">Đã hủy</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::createFromDate($log->created_at)->format('d/m/Y H:i') }}</td>
                                        <td>{{ $log->reason }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $logs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
@endpush

@push('scripts')
    <script>
        $(".type").change(function() {
            var user_id = $(this).attr('data-target');
            $.ajax({
                type: "GET",
                url: '{{ route('ad.user.type') }}',
                data: {
                    user_id: user_id
                }, // serializes the form's elements.
                success: function(res) {

                }
            });
        });
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{-- <script src="{{ asset('global/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
