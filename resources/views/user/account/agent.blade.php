@extends('user.layouts.master')
@section('page_title', 'Chọn gói đại lý')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 881px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <!-- Main row ===========================================================================================-->
                <div class="p-4 bg-white my-4 mx-1 rounded border ">
                    <h2 class="mb-3" style="color:var(--green); font-weight:bold; text-align: center;">
                        CHỌN ĐƠN HÀNG
                        ĐẠI LÝ KÍ KẾT
                    </h2>
                    <div class="row" id="customNavMenus">
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="small-box inner-daily bg-success bg-background" amount="10000000" id="7c758bd6-3b58-4504-924b-53a3240b4a78">
                                <div class="inner ">
                                    <p>NHÂN SỰ KINH DOANH</p>
                                    <h3 style="font-size: 2rem !important;">10,000,000</h3> </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="small-box inner-daily bg-success bg-background" amount="100000000" id="7c758bd6-3b58-4504-924b-53a3240b4a79">
                                <div class="inner ">
                                    <p>CHI NHÁNH XÃ</p>
                                    <h3 style="font-size: 2rem !important;">100,000,000</h3> </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="small-box inner-daily bg-success bg-background" amount="200000000" id="d4219035-15cc-4229-89ab-fa85a2f846f4">
                                <div class="inner ">
                                    <p>CHI NHÁNH HUYỆN</p>
                                    <h3 style="font-size: 2rem !important;">200,000,000</h3> </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="small-box inner-daily bg-success bg-background" amount="300000000" id="eabfb0aa-ad40-44a8-99a7-fff205899499">
                                <div class="inner ">
                                    <p>CHI NHÁNH TỈNH</p>
                                    <h3 style="font-size: 2rem !important;">300,000,000</h3> </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12"></div>
                    </div>
                    <div class="d-flex justify-content-center my-4"> <img src="{{asset('web/images/')}}/a.png" class="img-fluid" alt=""> </div>
                    <div class="custom-price text-center"> <b style="color: red;">Vui lòng chọn sản phẩm phía dưới để xác nhận đơn hàng</b>
                        <h1>TỔNG: <span class="total">--</span>VNĐ</h1>
                        <a href="javascript:void(0)" class="">
                            <button class="boxed-child-price btnBuyPackage bg-background" style="max-width: 250px; margin-top: 20px; border:none">Tiếp tục thanh toán</button>
                        </a>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4 col-sm-12">
                        <div class="card card-sucress">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-top: 5px; font-weight: bold; font-size: 17px !important;-webkit-text-fill-color: #000 !important;">{{$product->name}}</h3>
                                <label class="switch d-none" style="float:right;">
                                    <input type="checkbox" checked="" onchange="tinhgia();" data-price="{{$product->price}}" id="{{$product->id}}" class="skip js-switch js-switch-change clsChongoi"><span></span>
                                </label>
                            </div>
                            <a href="https://trituetunhien.com/eco-life-thuc-pham-bo-sung-dong-mau-sach-cam-nhan-ngay-sau-khi-uong/" target="_blank" style="width: 100%">
                                <div style="background-image: url({{$product->image}}); background-repeat:no-repeat; background-size: contain; background-position:top; width: 100%; height: 300px;"> </div>
                            </a>
                            <div class="card-body" style="font-weight:bold; padding:0px !important">
                                <div class="input-group"> <span class="input-group-append">
                            <button type="button" class="btn btn-default" style="font-weight:bold;">
                                <span id="spanPrice3">{{number_format($product->price)}} đ x </span> </button>
								</span>
                                    <button onclick="minusQ('{{$product->id}}')" style="border: 0.5px solid #80808054;margin-right: 1px; padding: 1px 6px "><i class="nav-icon fas fa-minus"></i></button>
                                    <input id="txtQ_{{$product->id}}" type="number" min="0" placeholder="Nhập số lượng" style="text-align:center;" class="form-control numbers txtQuantity" onkeyup="tinhgia()" onblur="tinhgia()" onmousewheel="tinhgia()">
                                    <button onclick="plusQ('{{$product->id}}')" style="border: 0.5px solid #80808054; margin-left: 1px; padding: 1px 6px"><i class="nav-icon fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12 text-center" style="margin-bottom:20px;">
                        <h1>TỔNG: <span class="total">--</span>VNĐ</h1>
                        <a href="javascript:void(0)" class=""> <span class="boxed-child-price btnBuyPackage bg-background" style="max-width: 250px; padding: 5px 10px; border-radius:10px;">Tiếp tục thanh toán</span> </a>
                    </div>
                </div>
                <script>
                    var ok = false;

                    function plusQ(id) {
                        var q = Number($('#txtQ_' + id).val());
                        $('#txtQ_' + id).val(q + 1);
                        tinhgia();
                    }

                    function minusQ(id) {
                        var q = Number($('#txtQ_' + id).val());
                        if(q >= 1) q = q - 1;
                        $('#txtQ_' + id).val(q);
                        tinhgia();
                    }

                    function tinhgia() {
                        var total = 0;
                        ok = false;
                        $('.clsChongoi:checked').each(function() {
                            var parent = $(this).parent().parent().parent();
                            var price = $(this).attr('data-price');
                            var quantity = parent.find('.txtQuantity').val();
                            if(price && quantity) {
                                total += (parseFloat(price) * parseFloat(quantity));
                            }
                            $('.total').text(formatMoney(total, 0));
                        });
                        $(".inner-daily.active").removeClass("active");
                        $('.inner-daily').each(function() {
                            var amount = Number($(this).attr('amount'));
                            if(total == amount) {
                                $(this).addClass("active");
                                ok = true;
                            }
                        });
                    }
                    $('.btnBuyPackage').click(function() {
                        if(!ok) alert('Tổng tiền đơn hàng phải khớp với số tiền của 01 gói mua');
                        else {
                            var cf = confirm('Xác nhận mua hàng');
                            if(cf) {
                                var listProduct = [];
                                var listQuantity = [];
                                $('.clsChongoi:checked').each(function() {
                                    var parent = $(this).parent().parent().parent();
                                    var quantity = parent.find('.txtQuantity').val();
                                    if(quantity) {
                                        var id = $(this).attr('id');
                                        if(id.toLowerCase() == '0fa9e489-2983-44c2-8551-eb0101837790') quantity = 1;
                                        listProduct.push(id);
                                        listQuantity.push(quantity);
                                    }
                                });
                                if(listProduct.length) {
                                    var button = $(this);
                                    var text = button.text();
                                    button.prop('disabled', true).text('Đang xử lý');
                                    // console.log(listProduct);
                                    // console.log(listQuantity);
                                    // return false;
                                    $.ajax({
                                        url: '{{route('us.account.buy_agent')}}',
                                        type: 'POST',
                                        data: {
                                            listProduct: listProduct,
                                            listQuantity: listQuantity,
                                            _token : '{{csrf_token()}}'
                                        },
                                        success: function(data) {
                                            var res = JSON.parse(data);
                                            if(res.code == 200) {
                                                window.location.href = '/user/agent/checkout';
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
                        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
                    };
                </script>
            </div>
        </section>
    </section>
@endsection
@push('scripts')
    <script>
    </script>
@endpush
