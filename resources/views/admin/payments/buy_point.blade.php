@extends('admin.layouts.master')

@section('page_title', 'Quản lý mua điểm Voucher')

@section('content')
    <div class="row" style="z-index: 1">
        <div class="col-md-12">
            <div class="portlet light portlet-datatable bordered">
                <div class="layout-navbar navbar-detached shadow-sm p-3 bg-white rounded row container-xxl flex-grow-1 container-p-y">
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
                                <th>Số điểm</th>
                                <th>Thành tiền</th>
                                <th>Trạng thái</th>
                                <th>Nội dung chuyển khoản</th>
                                <th>Ngày tạo</th>
                                <th width="150">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>{{ $log->user->name }} ({{ $log->user->phone }})</td>
                                    <td>{{ number_format($log->money) }} điểm</td>
                                    <td>{{number_format($log->money*1000 )}} VNĐ</td>
                                    <td>
                                        @if($log->status == 0)
                                            <span class="text-info">Đang chờ</span>
                                        @elseif ($log->status == 1)
                                            <span class="text-success">Đã duyệt</span>
                                        @else
                                            <span class="text-danger">Đã hủy</span>
                                        @endif
                                    </td>
                                    <td>{{$log->user->phone}} mua diem ma {{$log->id}}</td>
                                    <td>{{ \Carbon\Carbon::createFromDate($log->created_at)->format('H:i d/m/Y') }}</td>
                                    <td >
                                        @if($log->status == 0)
                                            <div class="d-flex justify-content-around">
                                                <form action="{{route('ad.payment.confirm_buy_point',$log->id)}}" id="delete-course-item-form" style="display: inline-block" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn duyệt?');">
                                                    @csrf
                                                    <button class="btn btn-circle btn-sm btn-success">Duyệt</button>
                                                </form>
                                                <form action="{{route('ad.payment.drop_withdraw',$log->id)}}" id="delete-course-item-form" style="display: inline-block" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
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
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{-- <script src="{{ asset('global/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
