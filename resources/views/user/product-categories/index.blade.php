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
                <div class="layout-navbar navbar-detached shadow-sm p-3 bg-white rounded row container-xxl flex-grow-1 container-p-y">
                    <div class="caption col-6">
                        <i class="icon-settings font-dark"></i>
                        <h4 class="mb-0 bold uppercase ">@yield('page_title')</h4>
                    </div>
                    <div class="actions text-right col-6">
                        <a href="{{ route('us.productcategory.create') }}" class="btn btn-circle btn-sm btn-primary"> <i class="fa fa-plus"></i> Tạo mới</a>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3">
                        <hr>
                        <table class="table table-bordered table-hover" id="admin-table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Vị trí</th>
                                <th>Icon</th>
                                <th>Slug</th>
                                <th width="550">Mô tả</th>
                                <th width="110">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $key=>$category)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->position }}</td>
                                    <td><img style="width: 50px" src="{{ $category->image }}" alt=""></td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a class="btn btn-circle btn-sm btn-warning" href="{{ route('us.productcategory.edit', $category) }}"><i class='bx bx-edit' ></i></a>
                                        <form action="{{ route('us.productcategory.destroy', $category) }}" id="delete-course-item-form" style="display: inline-block" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-circle btn-sm btn-danger"><i class='bx bx-trash' ></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
