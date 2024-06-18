@extends('admin.layouts.master')

@section('page_title', 'Quản lý CMS')

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
                    <div class="actions text-right col-6">
                        <a href="{{ route('ad.cms.create') }}" class="btn btn-circle btn-sm btn-primary"> <i class="fa fa-plus"></i> Tạo mới</a>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tiêu đề</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="exampleInputEmail1" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="">&nbsp;</label>
                                        <button class="btn btn-primary form-control" type="submit">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table class="table table-bordered table-hover" id="admin-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Link</th>
                                <th width="550">Mô tả</th>
                                <th width="110">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cms as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><img src="{{ $item->image }}" style="max-width: 200px" alt=""></td>
                                    <th>{{ route('w.cms',  $item->slug) }}</th>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <a class="btn btn-circle btn-sm btn-warning" href="{{ route('ad.cms.edit', $item) }}"><i class='bx bx-edit' ></i></a>
                                        <form action="{{ route('ad.cms.destroy', $item) }}" id="delete-course-item-form" style="display: inline-block" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-circle btn-sm btn-danger"><i class='bx bx-trash' ></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $cms->links() }}
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
