@extends('admin.layouts.master')

@section('page_title', 'Quản lý đơn hàng')

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
                        {{--                        <a href="{{ route('ad.product.create') }}" class="btn btn-circle btn-sm btn-primary"> <i class="fa fa-plus"></i> Tạo mới</a>--}}
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card p-3">
                        <div class="row">
                           <div class="col-12 col-md-6">
                                <h3>Thông tin đơn hàng</h3>
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>
                                           <th>Tên sản phẩm</th>
                                           <th>Số lượng</th>
                                           <th>Đơn giá</th>
                                           <th>Tổng</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                   @php
                                       $total_money = 0;
                                   @endphp
                                   @foreach($order->order_detail as $item)
                                       <tr>
                                           <td>{{$item->product->name}}</td>
                                           <td>{{$item->qty}}</td>
                                           <td>{{number_format($item->money)}}</td>
                                           <td>{{number_format($item->money * $item->qty)}}</td>
                                       </tr>
                                       @php
                                           $total_money += $item->money * $item->qty;
                                       @endphp
                                   @endforeach
                                       <tr style="font-weight: bold">
                                           <td class="text-right" colspan="3">Tổng thanh toán</td>
                                           <td>{{number_format($total_money)}}</td>
                                       </tr>
                                   </tbody>
                               </table>
                           </div>
                           <div class="col-12 col-md-6">
                               <h3>Thông khách hàng</h3>
                               <ul class="list-group">
                                   <li class="list-group-item p-2"><span style="font-weight: 700;">Tên thành viên mua:</span> {{$order->user_id ? $order->user->name : ' Khách hàng vãng lai'}} </li>
                                   <li class="list-group-item p-2"><span style="font-weight: 700;">Tên người nhận:</span> {{$order->name}} </li>
                                   <li class="list-group-item p-2"><span style="font-weight: 700;">SĐT người nhận:</span> {{$order->phone}}</span></li>
                                   <li class="list-group-item p-2"><span style="font-weight: 700;">Địa chỉ người nhận:</span> {{$order->address}} </li>
                               </ul>
                               <hr>
                               <a class="btn btn-primary mt-2" href="{{route('ad.order.index',['pro_type'=>1])}}">Quay lại</a>
{{--                               <div class="border rounded p-2">--}}
{{--                                    <h5>Trạng thái vận đơn</h5>--}}
{{--                                   <form action="{{route('ad.order.update_progress',$order->id)}}" method="GET">--}}
{{--                                       <select class="form-select" name="progress" aria-label="Trạng thái vận đơn">--}}
{{--                                           <option {{$order->progress == 0 ? 'selected' : ''}} value="0">Chưa giao hàng</option>--}}
{{--                                           <option {{$order->progress == 1 ? 'selected' : ''}} value="1">Đang giao hàng</option>--}}
{{--                                           <option {{$order->progress == 2 ? 'selected' : ''}} value="2">Đã giao hàng</option>--}}
{{--                                       </select>--}}
{{--                                       <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>--}}
{{--                                   </form>--}}
{{--                               </div>--}}
                           </div>
                        </div>
                        <hr>
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
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{-- <script src="{{ asset('global/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
