@extends('admin.layouts.master')

@section('page_title', 'Trang Danh Sách Thành Viên')

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
                    <div class="actions text-right col-6">
                        <a href="{{ route('ad.exportUser') }}" class="btn btn-circle btn-sm btn-primary"> <i
                                class="fa fa-plus"></i> Xuất Excel</a>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3 overflow-auto">
                        <form method="GET">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone">Tìm theo SĐT</label>
                                    <input type="text" class="form-control" placeholder="Nhập số điện thoại"
                                        value="{{ request()->phone }}" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="col-md-2 pt-4">
                                <div>
                                    <button class="btn btn-success btn-sm" style="height: 32px; float:left">Tìm
                                        kiếm</button>
                                    <a class="btn btn-info btn-sm text-white" href="{{ route('ad.user.index') }}"
                                        style="height: 32px">Clear</a>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered table-hover" id="admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kích hoạt</th>
                                    <th>Tên</th>
                                    <th width="110">Danh hiệu</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>TV giới thiệu</th>
                                    <th>Năm sinh</th>
                                    <th>Thu nhập</th>
                                    <th>Điểm Smile</th>
                                    <th>Điểm tiêu dùng</th>
                                    <th>Doanh số nhóm</th>
                                    <th>Ngày đăng ký</th>
                                    <th width="110">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input style="cursor: pointer;" class="form-check-input mx-auto type"
                                                    type="checkbox" data-target="{{ $user->id }}" id="type"
                                                    name="type" {{ $user->type == 2 ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @if ($user->level == 1)
                                                Thành viên
                                            @elseif($user->level == 2)
                                                GĐKD *
                                            @elseif($user->level == 3)
                                                GĐKD **
                                            @elseif($user->level == 4)
                                                GĐKD ***
                                            @elseif($user->level == 5)
                                                GĐKD ****
                                            @elseif($user->level == 6)
                                                GĐKD *****
                                            @endif
                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->invite_user ? $user->invite($user->invite_user)->name : '' }}</td>
                                        <td>{{ $user->year_of_birth }}</td>
                                        <td>{{ number_format($user->money) }} VNĐ</td>
                                        <td>{{ number_format($user->point) }} điểm</td>
                                        <td>{{ number_format(($user->money / 100) * 24) }} điểm</td>
                                        <td>{{ number_format($user->count_money($user->id)) }} VNĐ</td>
                                        <td>{{ \Carbon\Carbon::createFromDate($user->created_at)->format('H:i d/m/Y') }}
                                        </td>
                                        <td>
                                            <a class="btn btn-circle btn-sm btn-warning"
                                                href="{{ route('ad.user.edit', $user) }}"><i class='bx bx-edit'></i></a>
                                            {{--                                        <form action="{{ route('ad.user.destroy', $user) }}" id="delete-course-item-form" style="display: inline-block" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');"> --}}
                                            {{--                                            @csrf --}}
                                            {{--                                            @method('DELETE') --}}
                                            {{--                                            <button class="btn btn-circle btn-sm btn-danger"><i class='bx bx-trash' ></i></button> --}}
                                            {{--                                        </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
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
