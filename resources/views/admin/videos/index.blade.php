@extends('admin.layouts.master')

@section('page_title', 'Quản lý Video')

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-datatable bordered">
                <div class="layout-navbar navbar-detached shadow-sm p-3 bg-white rounded row container-xxl flex-grow-1 container-p-y">
                    <div class="caption col-6">
                        <h4 class="mb-0 bold uppercase ">@yield('page_title')</h4>
                    </div>
                    <div class="actions text-right col-6">
                        <a href="{{ route('ad.video.create') }}" class="btn btn-circle btn-sm btn-primary"> <i class="fa fa-plus"></i> Tạo mới</a>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3">
                        <table class="table table-striped table-bordered table-hover" id="admin-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vị trí</th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Video</th>
                                <th width="110">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($videos as $video)
                                <tr>
                                    <td>{{ $video->id }}</td>
                                    <td>{{ $video->position }}</td>
                                    <td>{{ $video->name }}</td>
                                    <td>{{ $video->description }}</td>
                                    <td>{!! $video->iframe !!}</td>
                                    <td>
                                        <a class="btn btn-circle btn-sm btn-warning" href="{{ route('ad.video.edit', $video) }}"><i class="bx bx-edit"></i></a>
                                        <form action="{{ route('ad.video.destroy', $video) }}" id="delete-course-item-form" style="display: inline-block" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-circle btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $videos->links('web.layouts.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
@endpush

@push('scripts')
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    @include('admin.lib.tinymce-setup')
    {{-- <script src="{{ asset('global/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
