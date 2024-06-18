@extends('admin.layouts.master')

@section('page_title', 'Lịch sử hoàn tiền')

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
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Thành viên</th>
                                    <th>Số tiền</th>
                                    <th>Nguồn</th>
                                    <th width="200px">Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($refund_warehouses as $refund_warehouse)
                                    <tr class="text-center">
                                        <td>{{ $refund_warehouse->id }}</td>
                                        <td>{{ $refund_warehouse->user->name }}</td>
                                        <td>{{ $refund_warehouse->money }}</td>
                                        <td>{{ $refund_warehouse->reason }}</td>
                                        <td>{{ $refund_warehouse->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $refund_warehouses->links() }}
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
