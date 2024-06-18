@extends('admin.layouts.master')

@section('page_title', 'Quản lý rút tiền')

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
                    <div class="col-6 ">
                        <form action="" method="get">

                        </form>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3 overflow-auto">
                        <table class="table table-bordered table-hover" id="admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thành viên</th>
                                    <th>Số tiền</th>
                                    <th>Phí</th>
                                    <th>Cần chuyển</th>
                                    <th>Ngân hàng</th>
                                    <th>Chủ tài khoản</th>
                                    <th>Số tài khoản</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>
                                            @if ($payment->user)
                                                {{ $payment->user->name }} ({{ $payment->user->phone }})
                                            @endif
                                        </td>
                                        <td>{{ number_format($payment->amount) }} VNĐ</td>
                                        <td>{{ number_format(($payment->amount * 6) / 100) }} VNĐ</td>
                                        <td>{{ number_format(($payment->amount * 70) / 100) }} VNĐ</td>
                                        <td>{{ $payment->bank }}</td>
                                        <td>{{ $payment->name }}</td>
                                        <td>{{ $payment->number }}</td>
                                        <td>
                                            @if ($payment->status == 0)
                                                <span class="text-info">Đang chờ</span>
                                            @elseif ($payment->status == 1)
                                                <span class="text-success">Đã chi</span>
                                            @else
                                                <span class="text-danger">Đã hủy</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::createFromDate($payment->created_at)->format('H:i d/m/Y') }}
                                        </td>
                                        <td>
                                            @if ($payment->status == 0)
                                                <div class="d-flex justify-content-around">
                                                    <form action="{{ route('ad.payment.confirmWithdraw', $payment->id) }}"
                                                        id="delete-course-item-form" style="display: inline-block"
                                                        method="POST"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn duyệt?');">
                                                        @csrf
                                                        <button class="btn btn-circle btn-sm btn-success">Duyệt</button>
                                                    </form>
                                                    <form action="{{ route('ad.payment.drop_withdraw', $payment->id) }}"
                                                        id="delete-course-item-form" style="display: inline-block"
                                                        method="POST"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn hủy?');">
                                                        @csrf
                                                        <button class="btn btn-circle btn-sm btn-danger">Hủy</button>
                                                    </form>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $payments->links() }}
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
