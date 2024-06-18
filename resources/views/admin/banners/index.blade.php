@extends('admin.layouts.master')

@section('page_title', 'Quản lý banner')

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
                        <a href="{{ route('ad.banner.create') }}" class="btn btn-circle btn-sm btn-primary"> <i class="fa fa-plus"></i> Tạo mới</a>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3">
                        <table class="table table-bordered table-hover" id="admin-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Vị trí</th>
                                <th>Hiển thị</th>
                                <th width="110">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($banners as $key=>$banner)
                                <tr>
                                    <td>{{ $banner->id }}</td>
                                    <td>{{ $banner->name }}</td>
                                    <td><img src="{{ $banner->images }}" style="max-width: 200px" alt=""></td>
                                    <td>{{ $banner->position }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input style="cursor: pointer;" class="form-check-input mx-auto display" type="checkbox" data-target="{{$banner->id}}" id="display" name="display" {{$banner->display == 1 ? 'checked' : ''}}>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-circle btn-sm btn-warning" href="{{ route('ad.banner.edit', $banner) }}"><i class='bx bx-edit' ></i></a>
                                        <form action="{{ route('ad.banner.destroy', $banner) }}" id="delete-course-item-form" style="display: inline-block" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-circle btn-sm btn-danger"><i class='bx bx-trash' ></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $banners->links() }}
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
    <script>
        $(".display").change(function () {
            var banner_id = $(this).attr('data-target');
            $.ajax({
                type: "GET",
                url: '{{route('ad.banner.display')}}',
                data: {
                    banner_id : banner_id
                }, // serializes the form's elements.
                success: function(res)
                {

                }
            });
        });
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{-- <script src="{{ asset('global/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
