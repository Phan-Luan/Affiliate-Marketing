@extends('admin.layouts.master')

@section('page_title', 'Quản lý liên hệ')

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-datatable bordered">
                <div class="layout-navbar navbar-detached shadow-sm p-3 bg-white rounded row container-xxl flex-grow-1 container-p-y">
                    <div class="caption col-6">
                        <i class="icon-settings font-dark"></i>
                        <h4 class="mb-0 bold uppercase ">@yield('page_title')</h4>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3">
                        <form action="" method="GET">
                        </form>
                        <hr>
                        <table class="table table-bordered table-hover" id="admin-table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Thành viên giới thiệu</th>
                                <th>Ngày đăng ký form tư vấn</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Năm sinh</th>
                                <th>Sản phẩm cần tư vấn</th>
                                <th>Ghi chú</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($contacts as $key=>$contact)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $contact->user->phone }}</td>
                                    <td>{{ \Carbon\Carbon::createFromDate($contact->created_at)->format('H:i d/m/Y') }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->address }}</td>
                                    <td>{{ $contact->birth }}</td>
                                    <td>{{ $contact->type }}</td>
                                    <td>{{ $contact->note }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $contacts->links() }}
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
            color : red;
        }
        .green {
            color : green;
        }
    </style>
    <!-- END PAGE LEVEL PLUGINS -->
@endpush

@push('scripts')
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{-- <script src="{{ asset('global/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
