@extends('user.layouts.master')

@section('page_title', 'Danh sách thành viên đã giới thiệu')

@section('page_id', 'page-order')

@section('content')
    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <h4>Danh sách thành viên đã giới thiệu</h4>
                <div class="container-fluid">
                    <div class="col-md-12"> </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 10px;">
                            <div class="card card-widget widget-user-2">
                                <div class="card-footer p-0">
                                    <div>
                                        <div class="total-table table-responsive p-1" style="background: beige ">
                                            <h4>Danh sách trực tiếp (@f1)</h4>
                                            <form action="" method="GET">
                                                <input type="hidden" value="1" name="type_n">
                                                <div class="row">
                                                    {{--                                                    <div class="col-md-2"> --}}
                                                    {{--                                                        <div class="form-group "> --}}
                                                    {{--                                                            <label for="status" class=" col-form-label">Danh hiệu</label> --}}
                                                    {{--                                                            <div class=""> --}}
                                                    {{--                                                                <select class="form-control" id="search_level" name="level"> --}}
                                                    {{--                                                                    <option value="default" selected>Tất cả</option> --}}
                                                    {{--                                                                    <option {{request()->level == 0 && request()->level != null ? 'selected' : ''}} value="0">0. Thành viên miễn phí</option> --}}
                                                    {{--                                                                    <option {{request()->level == 1 ? 'selected' : ''}} value="1">1. Thành viên</option> --}}
                                                    {{--                                                                    <option {{request()->level == 2 ? 'selected' : ''}} value="2">2. Tình nguyện viên</option> --}}
                                                    {{--                                                                    <option {{request()->level == 3 ? 'selected' : ''}} value="3">3. Đại diện Phường/Xã</option> --}}
                                                    {{--                                                                    <option {{request()->level == 4 ? 'selected' : ''}} value="4">4. Đại diện Quận/Huyện</option> --}}
                                                    {{--                                                                    <option {{request()->level == 5 ? 'selected' : ''}} value="5">5. Đại diện Tỉnh</option> --}}
                                                    {{--                                                                    <option {{request()->level == 6 ? 'selected' : ''}} value="6">6. Đại diện Khu Vực</option> --}}
                                                    {{--                                                                </select> --}}
                                                    {{--                                                            </div> --}}
                                                    {{--                                                        </div> --}}
                                                    {{--                                                    </div> --}}
                                                    <div class="col-md-2">
                                                        <div class="form-group ">
                                                            <label for="status" class=" col-form-label">Trạng thái</label>
                                                            <div class="">
                                                                <select class="form-control" id="search_type"
                                                                    name="type">
                                                                    <option {{ request()->type == null ? 'selected' : '' }}
                                                                        selected {{ request()->type }} value="default">Tất
                                                                        cả</option>
                                                                    <option
                                                                        {{ request()->type == 0 && request()->type != null ? 'selected' : '' }}
                                                                        value="0">Chưa nộp phí</option>
                                                                    <option {{ request()->type == 1 ? 'selected' : '' }}
                                                                        value="1">Đã nộp phí</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 pt-4">
                                                        <div>
                                                            <button class="btn btn-dark btn-sm"
                                                                style="height: 32px; float:left">Tìm kiếm</button>
                                                            <a class="btn btn-info btn-sm text-white ml-1"
                                                                href="{{ route('us.member') }}" style="height: 32px">Xóa</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            @php
                                                $total_money = 0;
                                            @endphp
                                            @foreach ($f1s as $user)
                                                {{--                                                @php --}}
                                                {{--                                                    $total_money += $user->title_sale($user->level); --}}
                                                {{--                                                @endphp --}}
                                            @endforeach
                                            {{--                                            <div class="d-flex "> --}}
                                            {{--                                                <p>Tổng Phí : {{number_format($total_money)}} đ</p> --}}
                                            {{--                                                <p>&nbsp;&nbsp;|&nbsp;&nbsp;</p> --}}
                                            {{--                                                <p>Tổng Thành viên : {{$f1s->count()}} </p> --}}
                                            {{--                                            </div> --}}
                                            <table class="table bg-white table-hover" style="margin: 0; min-width: 960px;">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th>STT</th>
                                                        <th>Ngày gia nhập</th>
                                                        <th>Người giới thiệu</th>
                                                        <th>Thành viên</th>
                                                        <th>Trạng thái</th>
                                                        <th>Sao</th>
                                                        {{--                                                    <th>Danh hiệu</th> --}}
                                                        {{--                                                    <th>Quà tặng</th> --}}
                                                        {{--                                                    <th>Đơn tham gia CLB</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($f1s->count() > 0)
                                                        @foreach ($f1s as $key => $user)
                                                            @php
                                                                $color = 'dark';
                                                                if ($user->level == 0) {
                                                                    $color = 'danger';
                                                                } else {
                                                                    if ($user->type == 0) {
                                                                        $color = 'danger';
                                                                    } else {
                                                                        $color = 'dark';
                                                                    }
                                                                }
                                                            @endphp

                                                            <tr style="line-height:15px"
                                                                class="text-left text-{{ $color }}">
                                                                <td class="text-{{ $color }}"> {{ $key + 1 }}
                                                                </td>
                                                                <td class="text-{{ $color }}">
                                                                    {{ \Carbon\Carbon::createFromDate($user->created_at)->format('H:i:s d/m/Y') }}
                                                                </td>
                                                                <td class="text-{{ $color }}">
                                                                    {{ $user->find_invite($user->invite_user)->phone }}
                                                                    ({{ $user->find_invite($user->invite_user)->name }})
                                                                </td>
                                                                <td class="text-{{ $color }}"> {{ $user->phone }}
                                                                    ({{ $user->name }})</td>
                                                                <td class="text-{{ $color }}">
                                                                    @if ($user->level == 0)
                                                                        Miễn Phí
                                                                    @else
                                                                        {{ $user->type == 0 ? 'Chưa nộp phí' : 'Đã nộp phí' }}
                                                                    @endif
                                                                </td>
                                                                <td class="text-{{ $color }}"> {{ $user->star }}
                                                                    sao </td>
                                                                {{--                                                            <td class="text-{{$color}}"> {{$user->title_user($user->level)}} </td> --}}
                                                                {{--                                                            <td class="text-{{$user->gift == 0 ? 'danger' : 'dark'}}"> {{$user->gift == 0 ? 'Chưa nhận' : 'Đã nhận'}}</td> --}}
                                                                {{--                                                            <td class="text-{{$user->form ? 'dark' : 'danger'}}"> {{$user->form ? 'Đã nộp' : 'Chưa nộp'}}</td> --}}
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr class="text-center no-data">
                                                            <td colspan="7"> Chưa có thành viên nào </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            {{ $f1s->links() }}
                                        </div>
                                        <hr>
                                        <div class="total-table table-responsive p-1" style="background: aquamarine ">
                                            <h4>Danh sách thành viên gián tiếp thế hệ 1 (@f2)</h4>
                                            <form action="" method="GET">
                                                <input type="hidden" value="2" name="type_n">
                                                <div class="row">
                                                    {{--                                                    <div class="col-md-2"> --}}
                                                    {{--                                                        <div class="form-group "> --}}
                                                    {{--                                                            <label for="status" class=" col-form-label">Danh hiệu</label> --}}
                                                    {{--                                                            <div class=""> --}}
                                                    {{--                                                                <select class="form-control" id="search_level" name="level"> --}}
                                                    {{--                                                                    <option value="default" selected>Tất cả</option> --}}
                                                    {{--                                                                    <option {{request()->level == 0 && request()->level != null ? 'selected' : ''}} value="0">0. Thành viên miễn phí</option> --}}
                                                    {{--                                                                    <option {{request()->level == 1 ? 'selected' : ''}} value="1">1. Thành viên</option> --}}
                                                    {{--                                                                    <option {{request()->level == 2 ? 'selected' : ''}} value="2">2. Tình nguyện viên</option> --}}
                                                    {{--                                                                    <option {{request()->level == 3 ? 'selected' : ''}} value="3">3. Đại diện Phường/Xã</option> --}}
                                                    {{--                                                                    <option {{request()->level == 4 ? 'selected' : ''}} value="4">4. Đại diện Quận/Huyện</option> --}}
                                                    {{--                                                                    <option {{request()->level == 5 ? 'selected' : ''}} value="5">5. Đại diện Tỉnh</option> --}}
                                                    {{--                                                                    <option {{request()->level == 6 ? 'selected' : ''}} value="6">6. Đại diện Khu Vực</option> --}}
                                                    {{--                                                                </select> --}}
                                                    {{--                                                            </div> --}}
                                                    {{--                                                        </div> --}}
                                                    {{--                                                    </div> --}}
                                                    <div class="col-md-2">
                                                        <div class="form-group ">
                                                            <label for="status" class=" col-form-label">Trạng thái</label>
                                                            <div class="">
                                                                <select class="form-control" id="search_type"
                                                                    name="type">
                                                                    <option {{ request()->type == null ? 'selected' : '' }}
                                                                        selected {{ request()->type }} value="default">Tất
                                                                        cả</option>
                                                                    <option
                                                                        {{ request()->type == 0 && request()->type != null ? 'selected' : '' }}
                                                                        value="0">Chưa nộp phí</option>
                                                                    <option {{ request()->type == 1 ? 'selected' : '' }}
                                                                        value="1">Đã nộp phí</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 pt-4">
                                                        <div>
                                                            <button class="btn btn-dark btn-sm"
                                                                style="height: 32px; float:left">Tìm kiếm</button>
                                                            <a class="btn btn-info btn-sm text-white ml-1"
                                                                href="{{ route('us.member') }}"
                                                                style="height: 32px">Xóa</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            @php
                                                $total_money = 0;
                                            @endphp
                                            @foreach ($f2s as $user)
                                                {{--                                                @php --}}
                                                {{--                                                    $total_money += $user->title_sale($user->level); --}}
                                                {{--                                                @endphp --}}
                                            @endforeach
                                            {{--                                            <div class="d-flex "> --}}
                                            {{--                                                <p>Tổng Phí : {{number_format($total_money)}} đ</p> --}}
                                            {{--                                                <p>&nbsp;&nbsp;|&nbsp;&nbsp;</p> --}}
                                            {{--                                                <p>Tổng Thành viên : {{$f2s->count()}}</p> --}}
                                            {{--                                            </div> --}}
                                            <table class="table bg-white table-hover" style="margin: 0; min-width: 960px;">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th>STT</th>
                                                        <th>Ngày gia nhập</th>
                                                        <th>Người giới thiệu</th>
                                                        <th>Thành viên</th>
                                                        <th>Trạng thái</th>
                                                        <th>Sao</th>
                                                        {{--                                                    <th>Danh hiệu</th> --}}
                                                        {{--                                                    <th>Quà tặng</th> --}}
                                                        {{--                                                    <th>Đơn tham gia CLB</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($f2s->count() > 0)
                                                        @foreach ($f2s as $key => $user)
                                                            @php
                                                                $color = 'dark';
                                                                if ($user->level == 0) {
                                                                    $color = 'danger';
                                                                } else {
                                                                    if ($user->type == 0) {
                                                                        $color = 'danger';
                                                                    } else {
                                                                        $color = 'dark';
                                                                    }
                                                                }
                                                            @endphp

                                                            <tr style="line-height:15px"
                                                                class="text-left text-{{ $color }}">
                                                                <td class="text-{{ $color }}"> {{ $key + 1 }}
                                                                </td>
                                                                <td class="text-{{ $color }}">
                                                                    {{ \Carbon\Carbon::createFromDate($user->created_at)->format('H:i:s d/m/Y') }}
                                                                </td>
                                                                <td class="text-{{ $color }}">
                                                                    {{ $user->find_invite($user->invite_user)->phone }}
                                                                    ({{ $user->find_invite($user->invite_user)->name }})
                                                                </td>
                                                                <td class="text-{{ $color }}"> {{ $user->phone }}
                                                                    ({{ $user->name }})</td>
                                                                <td class="text-{{ $color }}">
                                                                    @if ($user->level == 0)
                                                                        Miễn Phí
                                                                    @else
                                                                        {{ $user->type == 0 ? 'Chưa nộp phí' : 'Đã nộp phí' }}
                                                                    @endif
                                                                </td>
                                                                <td class="text-{{ $color }}"> {{ $user->star }}
                                                                    sao </td>
                                                                {{--                                                            <td class="text-{{$color}}"> {{number_format($user->title_sale($user->level))}} đ</td> --}}
                                                                {{--                                                            <td class="text-{{$color}}"> {{$user->title_user($user->level)}} </td> --}}
                                                                {{--                                                            <td class="text-{{$user->gift == 0 ? 'danger' : 'dark'}}"> {{$user->gift == 0 ? 'Chưa nhận' : 'Đã nhận'}}</td> --}}
                                                                {{--                                                            <td class="text-{{$user->form ? 'dark' : 'danger'}}"> {{$user->form ? 'Đã nộp' : 'Chưa nộp'}}</td> --}}
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr class="text-center no-data">
                                                            <td colspan="7"> Chưa có thành viên nào </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            {{ $f2s->links() }}
                                        </div>
                                        <hr>
                                        <div class="total-table table-responsive p-1" style="background: aqua ">
                                            <h4>Danh sách thành viên gián tiếp thế hệ 2 (@f3)</h4>
                                            <form action="" method="GET">
                                                <input type="hidden" value="3" name="type_n">
                                                <div class="row">
                                                    {{--                                                    <div class="col-md-2"> --}}
                                                    {{--                                                        <div class="form-group "> --}}
                                                    {{--                                                            <label for="status" class=" col-form-label">Danh hiệu</label> --}}
                                                    {{--                                                            <div class=""> --}}
                                                    {{--                                                                <select class="form-control" id="search_level" name="level"> --}}
                                                    {{--                                                                    <option value="default" selected>Tất cả</option> --}}
                                                    {{--                                                                    <option {{request()->level == 0 && request()->level != null ? 'selected' : ''}} value="0">0. Thành viên miễn phí</option> --}}
                                                    {{--                                                                    <option {{request()->level == 1 ? 'selected' : ''}} value="1">1. Thành viên</option> --}}
                                                    {{--                                                                    <option {{request()->level == 2 ? 'selected' : ''}} value="2">2. Tình nguyện viên</option> --}}
                                                    {{--                                                                    <option {{request()->level == 3 ? 'selected' : ''}} value="3">3. Đại diện Phường/Xã</option> --}}
                                                    {{--                                                                    <option {{request()->level == 4 ? 'selected' : ''}} value="4">4. Đại diện Quận/Huyện</option> --}}
                                                    {{--                                                                    <option {{request()->level == 5 ? 'selected' : ''}} value="5">5. Đại diện Tỉnh</option> --}}
                                                    {{--                                                                    <option {{request()->level == 6 ? 'selected' : ''}} value="6">6. Đại diện Khu Vực</option> --}}
                                                    {{--                                                                </select> --}}
                                                    {{--                                                            </div> --}}
                                                    {{--                                                        </div> --}}
                                                    {{--                                                    </div> --}}
                                                    <div class="col-md-2">
                                                        <div class="form-group ">
                                                            <label for="status" class=" col-form-label">Trạng
                                                                thái</label>
                                                            <div class="">
                                                                <select class="form-control" id="search_type"
                                                                    name="type">
                                                                    <option {{ request()->type == null ? 'selected' : '' }}
                                                                        selected {{ request()->type }} value="default">Tất
                                                                        cả</option>
                                                                    <option
                                                                        {{ request()->type == 0 && request()->type != null ? 'selected' : '' }}
                                                                        value="0">Chưa nộp phí</option>
                                                                    <option {{ request()->type == 1 ? 'selected' : '' }}
                                                                        value="1">Đã nộp phí</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 pt-4">
                                                        <div>
                                                            <button class="btn btn-dark btn-sm"
                                                                style="height: 32px; float:left">Tìm kiếm</button>
                                                            <a class="btn btn-info btn-sm text-white ml-1"
                                                                href="{{ route('us.member') }}"
                                                                style="height: 32px">Xóa</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            @php
                                                $total_money = 0;
                                            @endphp
                                            @foreach ($f3s as $user)
                                                {{--                                                @php --}}
                                                {{--                                                    $total_money += $user->title_sale($user->level); --}}
                                                {{--                                                @endphp --}}
                                            @endforeach
                                            {{--                                            <div class="d-flex "> --}}
                                            {{--                                                <p>Tổng Phí : {{number_format($total_money)}} đ</p> --}}
                                            {{--                                                <p>&nbsp;&nbsp;|&nbsp;&nbsp;</p> --}}
                                            {{--                                                <p>Tổng Thành viên : {{$f3s->count()}}</p> --}}
                                            {{--                                            </div> --}}
                                            <table class="table bg-white table-hover"
                                                style="margin: 0; min-width: 960px;">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th>STT</th>
                                                        <th>Ngày gia nhập</th>
                                                        <th>Người giới thiệu</th>
                                                        <th>Thành viên</th>
                                                        <th>Trạng thái</th>
                                                        <th>Sao</th>
                                                        {{--                                                    <th>Danh hiệu</th> --}}
                                                        {{--                                                    <th>Quà tặng</th> --}}
                                                        {{--                                                    <th>Đơn tham gia CLB</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($f3s->count() > 0)
                                                        @foreach ($f3s as $key => $user)
                                                            @php
                                                                $color = 'dark';
                                                                if ($user->level == 0) {
                                                                    $color = 'danger';
                                                                } else {
                                                                    if ($user->type == 0) {
                                                                        $color = 'danger';
                                                                    } else {
                                                                        $color = 'dark';
                                                                    }
                                                                }
                                                            @endphp

                                                            <tr style="line-height:15px"
                                                                class="text-left text-{{ $color }}">
                                                                <td class="text-{{ $color }}"> {{ $key + 1 }}
                                                                </td>
                                                                <td class="text-{{ $color }}">
                                                                    {{ \Carbon\Carbon::createFromDate($user->created_at)->format('H:i:s d/m/Y') }}
                                                                </td>
                                                                <td class="text-{{ $color }}">
                                                                    {{ $user->find_invite($user->invite_user)->phone }}
                                                                    ({{ $user->find_invite($user->invite_user)->name }})
                                                                </td>
                                                                <td class="text-{{ $color }}"> {{ $user->phone }}
                                                                    ({{ $user->name }})</td>
                                                                <td class="text-{{ $color }}">
                                                                    @if ($user->level == 0)
                                                                        Miễn Phí
                                                                    @else
                                                                        {{ $user->type == 0 ? 'Chưa nộp phí' : 'Đã nộp phí' }}
                                                                    @endif
                                                                </td>
                                                                <td class="text-{{ $color }}"> {{ $user->star }}
                                                                    sao </td>
                                                                {{--                                                            <td class="text-{{$color}}"> {{number_format($user->title_sale($user->level))}} đ</td> --}}
                                                                {{--                                                            <td class="text-{{$color}}"> {{$user->title_user($user->level)}} </td> --}}
                                                                {{--                                                            <td class="text-{{$user->gift == 0 ? 'danger' : 'dark'}}"> {{$user->gift == 0 ? 'Chưa nhận' : 'Đã nhận'}}</td> --}}
                                                                {{--                                                            <td class="text-{{$user->form ? 'dark' : 'danger'}}"> {{$user->form ? 'Đã nộp' : 'Chưa nộp'}}</td> --}}
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr class="text-center no-data">
                                                            <td colspan="7"> Chưa có thành viên nào </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            {{ $f3s->links() }}
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
@push('scripts')
@endpush
@push('css')
    <style>
    </style>
@endpush
