@extends('user.layouts.master')
@section('page_title', 'Trang quản lí sản phẩm')
@section('page_id', 'page-home')
@section('content')
    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <div class="row">
                    <div id="divBanking" class="col-lg-12 col-md-12 col-sm-12 my-4 rounded border" style="background: #ffeedd">
                        <!-- Button trigger modal -->
                        <div class="card">
                            <div class="card-body">
                                
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
                                                    <a href="{{ route('us.product.create') }}"
                                                        class="btn  btn-sm btn-primary"> <i
                                                            class="fa fa-plus"></i> Tạo mới</a>
                                                </div>
                                            </div>
                                            <div class="container-xxl flex-grow-1 container-p-y">
                                                <div class="card p-3">
                                                    <form action="{{ route('us.product.index') }}" method="GET"
                                                        class="row">
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
                                                                <select class="form-control" name="category_id"
                                                                    id="">
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
                                                                <button class="btn btn-success btn-sm"
                                                                    style="height: 32px; float:left">Tìm
                                                                    kiếm</button>
                                                                <a class="btn btn-info btn-sm text-white"
                                                                    href="{{ route('ad.product.index') }}"
                                                                    style="height: 32px">Clear</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <hr>
                                                    <div class="pt-2 table-responsive">
                                                        <table
                                                            class="table border  table-bordered text-nowrap ">
                                                            <thead class="bg-info text-white">
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Tên</th>
                                                                    <th>Thành viên kết nối</th>
                                                                    <th>Ảnh</th>
                                                                    {{--                                <th>Loại</th> --}}
                                                                    <th>Giá bán</th>
                                                                    <th>Giá nhập</th>
                                                                    <th>Giá niêm yết</th>
                                                                    {{--                                <th>Giá khuyến mãi</th> --}}
                                                                    <th width="150">Danh mục</th>
                                                                    <th>Hoàn tiền</th>
                                                                    <th>SP giá gốc</th>
                                                                    <th>SP 1k</th>
                                                                    <th width="110">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($products as $key => $product)
                                                                    <tr>
                                                                        <td>{{ $product->id }}</td>
                                                                        <td>{{ $product->name }}</td>
                                                                        <td>{{ $product->user_id ? $product->user->name : 'Không có' }}
                                                                        </td>
                                                                        <td><img src="{{ $product->image }}"
                                                                                style="max-width: 3em" alt="">
                                                                        </td>
                                                                        {{--                                    <td>{{ $product->type == 0 ? 'Có chia thưởng' : 'Không chia thưởng' }}</td> --}}
                                                                        <td>{{ number_format($product->price) }} VNĐ</td>
                                                                        <td>{{ number_format($product->price_sale) }} VNĐ
                                                                        </td>
                                                                        <td>{{ number_format($product->origin) }} VNĐ
                                                                        </td>
                                                                        {{--                                    <td>{{ number_format($product->price_sale) }} VNĐ</td> --}}
                                                                        <td>{{ $product->category ? $product->category->name : 'Danh mục đã xóa' }}
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check form-switch">
                                                                                <input style="cursor: pointer;"
                                                                                    class="form-check-input mx-auto hot"
                                                                                    type="checkbox"
                                                                                    data-target="{{ $product->id }}"
                                                                                    id="hot" name="hot"
                                                                                    {{ $product->hot == 1 ? 'checked' : '' }}>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check form-switch">
                                                                                <input style="cursor: pointer;"
                                                                                    class="form-check-input mx-auto origin"
                                                                                    type="checkbox"
                                                                                    data-target="{{ $product->id }}"
                                                                                    id="hot" name="hot"
                                                                                    {{ $product->origin == 1 ? 'checked' : '' }}>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check form-switch">
                                                                                <input style="cursor: pointer;"
                                                                                    class="form-check-input mx-auto sale1k"
                                                                                    type="checkbox"
                                                                                    data-target="{{ $product->id }}"
                                                                                    id="hot" name="hot"
                                                                                    {{ $product->sale1k == 1 ? 'checked' : '' }}>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <a class="btn btn-sm btn-warning text-light"
                                                                                href="{{ route('ad.product.edit', $product) }}">Sửa</a>
                                                                            <form
                                                                                action="{{ route('ad.product.destroy', $product) }}"
                                                                                id="delete-course-item-form"
                                                                                style="display: inline-block" method="POST"
                                                                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button
                                                                                    class="btn btn-sm btn-danger">Xoá</button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        {{ $products->links() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
