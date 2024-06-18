@extends('user.layouts.master')
@section('page_title', 'Xác nhận đơn hàng')
@section('page_id', 'page-home')
@section('content')
    <section class="content-wrapper bg-background-main" style="min-height: 881px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
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
                                    <a href="{{ route('us.product.create') }}" class="bg-primary p-3"><i
                                            class="nav-icon fas fa-pen"></i> Tạo mới Sản Phẩm</a>
                                </div>
                            </div>
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <div class="card p-3">
                                    <form action="{{ route('ad.product.index') }}" method="GET" class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name') }}" id="exampleInputEmail1">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Danh mục</label>
                                                <select class="form-control" name="category_id" id="">
                                                    <option value="">Tất cả</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 pt-4">
                                            <div>
                                                <button class="btn btn-success btn-sm" style="height: 32px; float:left">Tìm
                                                    kiếm</button>
                                                <a class="btn btn-info btn-sm text-white"
                                                    href="{{ route('ad.product.index') }}" style="height: 32px">Clear</a>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <p>Bảng Sản Phẩm</p>
                                    <table class="table table-bill-seen table-bordered table-hover" id="admin-table">

                                        <thead class="bg-success">
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>Thành viên kết nối</th>
                                                <th>Ảnh</th>
                                                {{--                                <th>Loại</th> --}}
                                                <th>Giá bán</th>
                                                <th>Giá nhập</th>
                                                <th>Giá niêm yết</th>
                                                <th>Đơn vị tính</th>
                                                {{--                                <th>Giá khuyến mãi</th> --}}
                                                <th width="150">Danh mục</th>
                                                <th>Hoàn tiền</th>
                                                <th>SP giá gốc</th>
                                                <th width="70">SP 1k</th>
                                                <th width="110">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $key => $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->user_id ? $product->user->name : 'Không có' }}</td>
                                                    <td><img src="{{ $product->image }}" style="max-width: 3em"
                                                            alt=""></td>
                                                    {{--                                    <td>{{ $product->type == 0 ? 'Có chia thưởng' : 'Không chia thưởng' }}</td> --}}
                                                    <td>{{ number_format($product->price) }} VNĐ</td>
                                                    <td>{{ number_format($product->price_sale) }} VNĐ</td>
                                                    <td>{{ number_format($product->origin) }} VNĐ</td>
                                                    <td>{{ $product->unit }}</td>
                                                    {{--                                    <td>{{ number_format($product->price_sale) }} VNĐ</td> --}}
                                                    <td>{{ $product->category ? $product->category->name : 'Danh mục đã xóa' }}
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-check form-switch text-left">
                                                            <input style="cursor: pointer;"
                                                                class="form-check-input mx-auto hot" type="checkbox"
                                                                data-target="{{ $product->id }}" id="hot"
                                                                name="hot" {{ $product->hot == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-check form-switch text-left">
                                                            <input style="cursor: pointer;"
                                                                class="form-check-input mx-auto origin" type="checkbox"
                                                                data-target="{{ $product->id }}" id="hot"
                                                                name="hot"
                                                                {{ $product->origin == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-check form-switch text-left">
                                                            <input style="cursor: pointer;"
                                                                class="form-check-input mx-auto sale1k" type="checkbox"
                                                                data-target="{{ $product->id }}" id="hot"
                                                                name="hot"
                                                                {{ $product->sale1k == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-circle btn-sm btn-warning"
                                                            href="{{ route('us.product.edit', $product) }}"><i
                                                                class="nav-icon fas fa-pen"></i></a>
                                                        <form action="{{ route('us.product.destroy', $product) }}"
                                                            id="delete-course-item-form" style="display: inline-block"
                                                            method="POST"
                                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-circle btn-sm btn-danger"><i
                                                                    class="nav-icon fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $products->links() }}

                                    <p>Bảng Đơn Hàng</p>
                                    <table id="thistory"
                                        class=" table-bill-seen table table-bordered table-striped bg-white table-hover"
                                        style="font-size:15px; min-width:1000px">
                                        <thead class="bg-success text-light">
                                            <tr>
                                                <th style="min-width:30px;">STT</th>
                                                <th style="min-width:120px;">Mã Đơn hàng</th>
                                                <th style="min-width:120px;">Người Giới Thiệu</th>
                                                <th style="min-width:160px;">Người Mua</th>
                                                <th style="min-width:120px;">Tổng tiền</th>
                                                <th style="min-width:120px;">Trạng Thái</th>
                                                <th style="min-width:120px;">Địa Chỉ Nhận Hàng</th>
                                                <th style="min-width:120px;">Ngày đặt</th>
                                                <th style="min-width:120px;">Chi Tiết</th>
                                                {{-- <th style="min-width:160px;">ĐVT</th>
                                                <th style="min-width:160px;">Số lượng</th>
                                                <th style="min-width:120px;">Đơn giá/ĐVT</th> --}}
                                                {{-- <th style="min-width:120px;">Tổng tiền</th> --}}
                                                {{-- <th style="min-width:140px;">Thanh toán</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($orderdetailsuser->count() > 0)
                                                @foreach ($orderdetailsuser as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->order->user->invite($item->order->user->id) ? $item->order->user->invite($item->order->user->id)->name : '' }}
                                                            ({{ $item->order->user->invite($item->order->user->id) ? $item->order->user->invite($item->order->user->id)->phone : '' }})
                                                        </td>
                                                        <td>{{ $item->order->user->name }}
                                                            ({{ $item->order->user->phone }})</td>

                                                        <td>{{ $item->money * $item->qty }}</td>
                                                        <td class="text-center">
                                                            @if ($item->order->progress == 0)
                                                                Chưa giao hàng
                                                            @elseif($order->progress == 1)
                                                                Đang giao hàng
                                                            @elseif($order->progress == 2)
                                                                Giao thành công
                                                            @elseif($order->progress == 3)
                                                                Giao hàng thất bại
                                                            @else
                                                                Đã giao hàng
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->user->address }}</td>
                                                        {{-- <td>{{ \Carbon\Carbon::createFromDate($order->created_at)->format('H:i d/m/Y') }} --}}
                                                        <td>{{ \Carbon\Carbon::createFromDate($item->created_at)->format('H:i d/m/Y') }}
                                                        <td>Chi Tiết</td>
                                                        {{-- <td>
                                                            {{ $item->product->name }}({{ $item->product->id }})
                                                        </td>
                                                        <td>{{ $item->user->name }} ({{ $item->user->phone }})</td>
                                                        <td>{{ $item->product->unit }}</td>
                                                        <td>{{ $item->qty }}</td>
                                                        <td>{{ $item->money }}</td>

                                                        <td>{{ $item->order->status == 0 ? 'Chưa duyệt' : 'Đã duyệt' }}
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="10">Chưa có dữ liệu để hiển thị
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>

                                    </table>
                                    {{ $orderdetailsuser->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
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

        .btn-warning {
            color: #fff;
            background-color: #ffab00;
            border-color: #ffab00;
            box-shadow: 0 0.125rem 0.25rem 0 rgba(255, 171, 0, 0.4);
        }

        .btn-danger {
            color: #fff;
            background-color: #ff3e1d;
            border-color: #ff3e1d;
            box-shadow: 0 0.125rem 0.25rem 0 rgba(255, 62, 29, 0.4);
        }

        .form-switch {
            padding-left: 1.4em !important;
        }
    </style>
    <!-- END PAGE LEVEL PLUGINS -->
@endpush

@push('scripts')
    <script>
        $(".hot").change(function() {
            var pro_id = $(this).attr('data-target');
            $.ajax({
                type: "GET",
                url: '{{ route('ad.product.hot') }}',
                data: {
                    pro_id: pro_id
                }, // serializes the form's elements.
                success: function(res) {

                }
            });
        });
        $(".origin").change(function() {
            var pro_id = $(this).attr('data-target');
            $.ajax({
                type: "GET",
                url: '{{ route('ad.product.origin') }}',
                data: {
                    pro_id: pro_id
                }, // serializes the form's elements.
                success: function(res) {

                }
            });
        });
        $(".sale1k").change(function() {
            var pro_id = $(this).attr('data-target');
            $.ajax({
                type: "GET",
                url: '{{ route('ad.product.sale1k') }}',
                data: {
                    pro_id: pro_id
                }, // serializes the form's elements.
                success: function(res) {

                }
            });
        });
        $(".display").change(function() {
            var pro_id = $(this).attr('data-target');
            $.ajax({
                type: "GET",
                url: '{{ route('ad.product.display') }}',
                data: {
                    pro_id: pro_id
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
