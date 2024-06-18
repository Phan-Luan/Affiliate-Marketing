@extends('user.layouts.master')
@section('page_title', 'Mua sản phẩm')
@section('page_id', 'page-home')
@section('content')
    <section class="content-wrapper bg-background-main" style="min-height: 881px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <!-- Main row ===========================================================================================-->
                <div class="p-4 bg-white my-4 mx-1 rounded border ">
                    <h2 class="mb-3" style="color:var(--green); font-weight:bold; text-align: center;">
                        CHỌN MUA SẢN PHẨM
                    </h2>

                    <div class="d-flex justify-content-center my-4"> <img src="{{ asset('web/images/') }}/a.png"
                            class="img-fluid" alt=""> </div>
                    <div class="custom-price text-center"> <b style="color: red;">Vui lòng chọn sản phẩm phía dưới để xác
                            nhận đơn hàng</b>
                        <h1>TỔNG: <span class="total">--</span>VNĐ</h1>
                        <a href="javascript:void(0)" class="">
                            <button class="boxed-child-price btnBuyPackage bg-background"
                                style="max-width: 250px; margin-top: 20px; border:none">Tiếp tục thanh toán</button>
                        </a>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <h4 style="color: red; font-weight: bold">CHỢ TOÀN CẦU - CHỢ GIÁ GỐC - CHỢ HOÀN TIỀN MẶT 150%</h4>
                    <form action="" class="d-flex gap-2">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm...">
                        <button style="width:150px" class="btn btn-primary" type="submit">Tìm kiếm</button>
                    </form>
                </div>
                @foreach ($categories as $category)
                    @if ($category->product_homes($category->id)->count() > 0)
                        <br>
                        <h5 style="background: red">Danh mục: {{ $category->name }}</h5>
                        <div class="row">
                            <style>
                                .multiline-truncate {
                                    display: -webkit-box;
                                    -webkit-box-orient: vertical;
                                    -webkit-line-clamp: 2;
                                    /* Number of lines to show */
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                }
                            </style>
                            @foreach ($category->product_homes($category->id) as $product)
                                <div class="col-md-4 col-sm-12">
                                    <div class="card card-sucress">
                                        <div class="card-header">
                                            <h3 class="card-title multiline-truncate"
                                                style="margin-top: 5px; font-weight: bold; font-size: 17px !important; -webkit-text-fill-color: #000 !important; overflow: hidden !important;">
                                                {{ $product->name }}
                                            </h3>
                                            <label class="switch d-none" style="float:right;">
                                                <input type="checkbox" checked="" onchange="tinhgia();"
                                                    data-price="{{ $product->price }}" id="{{ $product->id }}"
                                                    class="skip js-switch js-switch-change clsChongoi"><span></span>
                                            </label>
                                        </div>
                                        <a href="javascript:getProduct({{ $product->id }});" style="width: 100%">
                                            <div
                                                style="background-image: url({{ $product->image }}); background-repeat:no-repeat; background-size: contain; background-position:top; width: 100%; height: 300px;">
                                            </div>
                                        </a>
                                        <div class="card-body" style="font-weight:bold; padding:0px !important">
                                            <div class="input-group"> <span class="input-group-append">
                                                    <button type="button" class="btn btn-default"
                                                        style="font-weight:bold;">
                                                        <span id="spanPrice3">{{ number_format($product->point_buy ?? 0) }}
                                                            Điểm Smile
                                                        </span> + <span id="spanPrice3">{{ number_format($product->price) }}
                                                            VNĐ x
                                                        </span> </button>
                                                </span>
                                                <button onclick="minusQ('{{ $product->id }}')"
                                                    style="border: 0.5px solid #80808054;margin-right: 1px; padding: 1px 6px "><i
                                                        class="nav-icon fas fa-minus"></i></button>
                                                <input id="txtQ_{{ $product->id }}" type="number" min="0"
                                                    placeholder="Nhập số lượng" style="text-align:center;"
                                                    class="form-control numbers txtQuantity" onkeyup="tinhgia()"
                                                    onblur="tinhgia()" onmousewheel="tinhgia()">
                                                <button onclick="plusQ('{{ $product->id }}')"
                                                    style="border: 0.5px solid #80808054; margin-left: 1px; padding: 1px 6px"><i
                                                        class="nav-icon fas fa-plus"></i></button>

                                            </div>
                                            <p></p>
                                            <div class="input-group justify-content-center">
                                                <button type="button" class="w-100 btn btn-light" data-toggle="modal"
                                                    data-target="#exampleModal-desc-{{ $product->id }}">
                                                    Chi Tiết
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModal-desc-{{ $product->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    @if ($product->image)
                                                        <img style="max-width: 100%" class="img-responsive"
                                                            src="{{ $product->image }}" alt="Preview banner" />
                                                    @endif

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group p-5">
                                                        <h1 class=" text-uppercase">{{ $product->name }}</h1>
                                                        <div class="d-flex">
                                                            <p class="m-1 font-20 text-danger">{{ $product->price }}</p>
                                                            <del>
                                                                <p class="m-1 font-20 ">{{ $product->origin }}
                                                                </p>
                                                            </del> VNĐ
                                                            <div>
                                                                <p class="m-1 font-20 text-dark">
                                                                    + <span
                                                                        class="text-danger">{{ $product->point_buy ?? 0 }}</span>
                                                                    Điểm Smile</p>

                                                            </div>
                                                        </div>
                                                        <p>
                                                            Danh Mục: {{ $category->name }}
                                                        </p>
                                                        <p>Mô tả: {{ $product->description }}</p>
                                                        @foreach ($categories as $category)
                                                        @endforeach

                                                    </div>
                                                </div>
                                                <div class="col-md-12 p-5">
                                                    <p class="m-2">Chi Tiết: {!! $product->content !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach




                        </div>
                        <hr>
                    @endif
                @endforeach

                {{--                <h3>Tiêu Dùng Giá Gốc</h3> --}}
                {{--                <div class="row"> --}}
                {{--                    @foreach ($product_origins as $product) --}}
                {{--                        <div class="col-md-4 col-sm-12"> --}}
                {{--                            <div class="card card-sucress"> --}}
                {{--                                <div class="card-header"> --}}
                {{--                                    <h3 class="card-title" style="margin-top: 5px; font-weight: bold; font-size: 17px !important;-webkit-text-fill-color: #000 !important;">{{$product->name}}</h3> --}}
                {{--                                    <label class="switch d-none" style="float:right;"> --}}
                {{--                                        <input type="checkbox" checked="" onchange="tinhgia();" data-price="{{$product->price}}" id="{{$product->id}}" class="skip js-switch js-switch-change clsChongoi"><span></span> --}}
                {{--                                    </label> --}}
                {{--                                </div> --}}
                {{--                                <a href="https://trituetunhien.com/eco-life-thuc-pham-bo-sung-dong-mau-sach-cam-nhan-ngay-sau-khi-uong/" target="_blank" style="width: 100%"> --}}
                {{--                                    <div style="background-image: url({{$product->image}}); background-repeat:no-repeat; background-size: contain; background-position:top; width: 100%; height: 300px;"> </div> --}}
                {{--                                </a> --}}
                {{--                                <div class="card-body" style="font-weight:bold; padding:0px !important"> --}}
                {{--                                    <div class="input-group"> <span class="input-group-append"> --}}
                {{--                            <button type="button" class="btn btn-default" style="font-weight:bold;"> --}}
                {{--                                <span id="spanPrice3">{{number_format($product->price)}} đ x </span> </button> --}}
                {{--								</span> --}}
                {{--                                        <button onclick="minusQ('{{$product->id}}')" style="border: 0.5px solid #80808054;margin-right: 1px; padding: 1px 6px "><i class="nav-icon fas fa-minus"></i></button> --}}
                {{--                                        <input id="txtQ_{{$product->id}}" type="number" min="0" placeholder="Nhập số lượng" style="text-align:center;" class="form-control numbers txtQuantity" onkeyup="tinhgia()" onblur="tinhgia()" onmousewheel="tinhgia()"> --}}
                {{--                                        <button onclick="plusQ('{{$product->id}}')" style="border: 0.5px solid #80808054; margin-left: 1px; padding: 1px 6px"><i class="nav-icon fas fa-plus"></i></button> --}}
                {{--                                    </div> --}}
                {{--                                </div> --}}
                {{--                            </div> --}}
                {{--                        </div> --}}
                {{--                    @endforeach --}}
                {{--                </div> --}}
                {{--                <hr> --}}
                {{--                <h3>Tiêu Dùng 1K - Thiện Nguyện Online</h3> --}}
                {{--                <div class="row"> --}}
                {{--                    @foreach ($product_sale1ks as $product) --}}
                {{--                        <div class="col-md-4 col-sm-12"> --}}
                {{--                            <div class="card card-sucress"> --}}
                {{--                                <div class="card-header"> --}}
                {{--                                    <h3 class="card-title" style="margin-top: 5px; font-weight: bold; font-size: 17px !important;-webkit-text-fill-color: #000 !important;">{{$product->name}}</h3> --}}
                {{--                                    <label class="switch d-none" style="float:right;"> --}}
                {{--                                        <input type="checkbox" checked="" onchange="tinhgia();" data-price="{{$product->price}}" id="{{$product->id}}" class="skip js-switch js-switch-change clsChongoi"><span></span> --}}
                {{--                                    </label> --}}
                {{--                                </div> --}}
                {{--                                <a href="https://trituetunhien.com/eco-life-thuc-pham-bo-sung-dong-mau-sach-cam-nhan-ngay-sau-khi-uong/" target="_blank" style="width: 100%"> --}}
                {{--                                    <div style="background-image: url({{$product->image}}); background-repeat:no-repeat; background-size: contain; background-position:top; width: 100%; height: 300px;"> </div> --}}
                {{--                                </a> --}}
                {{--                                <div class="card-body" style="font-weight:bold; padding:0px !important"> --}}
                {{--                                    <div class="input-group"> <span class="input-group-append"> --}}
                {{--                            <button type="button" class="btn btn-default" style="font-weight:bold;"> --}}
                {{--                                <span id="spanPrice3">{{number_format($product->price)}} đ x </span> </button> --}}
                {{--								</span> --}}
                {{--                                        <button onclick="minusQ('{{$product->id}}')" style="border: 0.5px solid #80808054;margin-right: 1px; padding: 1px 6px "><i class="nav-icon fas fa-minus"></i></button> --}}
                {{--                                        <input id="txtQ_{{$product->id}}" type="number" min="0" placeholder="Nhập số lượng" style="text-align:center;" class="form-control numbers txtQuantity" onkeyup="tinhgia()" onblur="tinhgia()" onmousewheel="tinhgia()"> --}}
                {{--                                        <button onclick="plusQ('{{$product->id}}')" style="border: 0.5px solid #80808054; margin-left: 1px; padding: 1px 6px"><i class="nav-icon fas fa-plus"></i></button> --}}
                {{--                                    </div> --}}
                {{--                                </div> --}}
                {{--                            </div> --}}
                {{--                        </div> --}}
                {{--                    @endforeach --}}
                {{--                </div> --}}
                <script>
                    var ok = false;

                    function plusQ(id) {
                        var q = Number($('#txtQ_' + id).val());
                        $('#txtQ_' + id).val(q + 1);
                        tinhgia();
                    }

                    function minusQ(id) {
                        var q = Number($('#txtQ_' + id).val());
                        if (q >= 1) q = q - 1;
                        $('#txtQ_' + id).val(q);
                        tinhgia();
                    }

                    function tinhgia() {
                        var total = 0;
                        ok = true;
                        $('.clsChongoi:checked').each(function() {
                            var parent = $(this).parent().parent().parent();
                            var price = $(this).attr('data-price');
                            var quantity = parent.find('.txtQuantity').val();
                            if (price && quantity) {
                                total += (parseFloat(price) * parseFloat(quantity));
                            }
                            $('.total').text(formatMoney(total, 0));
                        });
                    }
                    $('.btnBuyPackage').click(function() {
                        if (!ok) alert('Vui lòng chọn sản phẩm muốn mua!');
                        else {
                            var cf = confirm('Xác nhận mua hàng');
                            if (cf) {
                                var listProduct = [];
                                var listQuantity = [];
                                $('.clsChongoi:checked').each(function() {
                                    var parent = $(this).parent().parent().parent();
                                    var quantity = parent.find('.txtQuantity').val();
                                    if (quantity) {
                                        var id = $(this).attr('id');
                                        if (id.toLowerCase() == '0fa9e489-2983-44c2-8551-eb0101837790') quantity = 1;
                                        listProduct.push(id);
                                        listQuantity.push(quantity);
                                    }
                                });
                                if (listProduct.length) {
                                    var button = $(this);
                                    var text = button.text();
                                    button.prop('disabled', true).text('Đang xử lý');
                                    // console.log(listProduct);
                                    // console.log(listQuantity);
                                    // return false;
                                    $.ajax({
                                        url: '{{ route('us.product.add_to_cart') }}',
                                        type: 'POST',
                                        data: {
                                            listProduct: listProduct,
                                            listQuantity: listQuantity,
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function(data) {
                                            var res = JSON.parse(data);
                                            if (res.code == 200) {
                                                window.location.href = '/user/san-pham-checkout';
                                            } else {
                                                alert(data.ms);
                                                //toast('error', data.ms);
                                                button.prop('disabled', false).text(text);
                                            }
                                        }
                                    });
                                }
                            }
                        }
                    });

                    function formatMoney(n, c, d, t) {
                        var
                            c = isNaN(c = Math.abs(c)) ? 2 : c,
                            d = d == undefined ? "." : d,
                            t = t == undefined ? "," : t,
                            s = n < 0 ? "-" : "",
                            i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
                            j = (j = i.length) > 3 ? j % 3 : 0;
                        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(
                            n - i).toFixed(c).slice(2) : "");
                    };
                </script>
            </div>
        </section>
    </section>
    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="background: red">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-2">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function getProduct(id) {
            $.ajax({
                type: "GET",
                url: '{{ route('w.getProduct') }}',
                data: {
                    id: id
                }, // serializes the form's elements.
                success: function(data) {
                    var res = JSON.parse(data);
                    $("#exampleModalLabel").html(res.name);
                    $(".modal-body").html(res.content);
                    $("#exampleModal").modal();
                }
            });
        }
    </script>
@endpush
