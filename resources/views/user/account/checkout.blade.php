@extends('user.layouts.master')
@section('page_title', 'Xác nhận đơn hàng')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 881px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <h4>Xác nhận đơn hàng </h4>
                <div class="row">
                    <div class="col-md-12">
                        <form class="card" method="post" action="{{route('us.account.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div id="divDetail" style="min-width: 100%; overflow-x: hidden;">
                                        <label>Thông tin sản phẩm</label>
                                        <table id="example1" class="table table-bordered table-striped" style="font-size: 14px;">
                                            <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th style="text-align: right;">Giá X SL = Thành tiền</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($carts['carts'] as $cart)
                                            <tr>
                                                <td>{{$cart->name}}</td>
                                                <td style="text-align:right;color:blue;">{{number_format($cart->price)}} x {{$cart->qty}} = {{number_format($cart->price * $cart->qty)}}</td>
                                            </tr>
                                            @endforeach
{{--                                            <tr>--}}
{{--                                                <td>BAGININE (ECO PLUS)</td>--}}
{{--                                                <td style="text-align:right;color:blue;">2,000,000 x 2 = 4,000,000</td>--}}
{{--                                            </tr>--}}
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="2" style="text-align: right; font-size:15px;"> Tổng tiền: <span id="lblTotal" style="color:Blue;">{{($carts['total'])}}</span> </th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <h5>NGƯỜI NHẬN HÀNG</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Họ và tên người nhận (*)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                                                        <input name="name" type="text" value="{{users()->user()->name}}" id="name" class="form-control" placeholder="Bắt buộc nhập" required="" style="text-transform:uppercase;"> </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Điện thoại người nhận (*)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-phone"></i></span> </div>
                                                        <input name="phone" type="tel" value="{{users()->user()->phone}}" maxlength="10" id="phone" class="form-control numbers" required="" placeholder="Số điện thoại của bạn"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>ĐỊA CHỈ NHẬN HÀNG</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Địa chỉ (*)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span> </div>
                                                        <input name="address" type="text" value="{{users()->user()->address}}" id="address" class="form-control numbers" required="" placeholder="Địa chỉ nhận hàng">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>HÌNH THỨC NHẬN HÀNG</h5>
                                        <div class="form-group">
                                            <div class="row" style="margin: 0px !important;">
                                                <div class="col-md-4">
                                                    <label>Hình thức nhận hàng (*)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span> </div>
                                                        <select name="ShipType" id="dlShipType" class="form-control" required="">
{{--                                                            <option value="0">Chọn hình thức nhận hàng</option>--}}
                                                            <option value="1">Nhận hàng tại công ty</option>
                                                            <option value="2">Nhận hàng tại nhà</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <label>Chọn kho giao hàng (*)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span> </div>
                                                        <select name="dlWarehouse" disabled="" id="ddlWarehouse" data-warehouse="277" onchange="setWarehouse()" class="form-control" required="">
                                                            <option value="0">Chọn kho hàng gần nhất</option>
                                                            <option data-area="1" data-warehouse="312" value="d67b52be-9a4f-4a10-8e29-9d93ff32496a">Kho An Dương - Hải Phòng - LÊ THỊ THANH</option>
                                                            <option data-area="1" data-warehouse="329" value="a69ed20e-9ba5-4bba-974f-fce516727e36">Kho Ân Thi - Hưng Yên - NGUYỄN THỊ THU</option>
                                                            <option data-area="1" data-warehouse="6" value="8FABB112-731C-4BB0-80C8-E9D4C27E8C94">Kho Ba Đình - HN - NGUYỄN THỊ HẠNH NGA</option>
                                                            <option data-area="1" data-warehouse="271" value="c68d526a-67ec-4082-8258-e20324026345">KHO BA VÌ-HN - LÊ NỮ HOÀNG ANH</option>
                                                            <option data-area="1" data-warehouse="21" value="994A9718-E2F8-4D1D-B566-1E898872D5C7">Kho Bắc Từ Liêm - HN - TRẦN THỊ MƠ</option>
                                                            <option data-area="2" data-warehouse="673" value="f570631f-d0a2-44f9-bc67-508c9eca7cf2">KHO BẢO LỘC- LÂM ĐỒNG - LÊ NGUYÊN HOÀNG TRÂN</option>
                                                            <option data-area="2" data-warehouse="381" value="a371054d-bcc1-49d9-ba24-54bc70eacc48">Kho Bỉm Sơn -THANH HOÁ - TRỊNH THỊ HIỀN</option>
                                                            <option data-area="3" data-warehouse="785" value="f49dea01-0c40-4b6d-a85e-5d8aca224938">KHO BÌNH CHÁNH- TP HCM - NGUYỄN THU HIỀN</option>
                                                            <option data-area="1" data-warehouse="352" value="5c0e06fd-0b97-43fb-97e6-cf289832bcd6">KHO BINH LỤC- HÀ NAM - BẠCH THỊ QUÍ</option>
                                                            <option data-area="3" data-warehouse="765" value="621D6A7A-7098-4283-8393-B00337B3AF24">Kho Bình Thạnh - HCM - NGUYỄN THỊ BÍCH KIỀU</option>
                                                            <option data-area="1" data-warehouse="183" value="afb4bbf1-62b8-41f8-9652-baea102d334e">KHO CAO LỘC- LẠNG SƠN - ĐẶNG XUÂN TUÂN</option>
                                                            <option data-area="1" data-warehouse="5" value="5ecf157a-000f-448a-8b0c-82bbdb16e3c5">Kho Cầu Giấy - HN - NGUYỄN THU NHUNG</option>
                                                            <option data-area="3" data-warehouse="847" value="dcf5e317-9f47-4c54-881f-2dd261f26f8e">Kho Châu Thành - Trà Vinh - NGUYỄN THỊ PHƯƠNG Ý</option>
                                                            <option data-area="1" data-warehouse="64" value="670DD603-EBE0-437A-A841-E5DAF69D5666">Kho Chợ Đồn - Bắc Kạn - NGUYỄN THỊ THANH MAI</option>
                                                            <option data-area="1" data-warehouse="277" value="b58fd8d0-f3f7-4b8a-a91c-7b8166592ed2">Kho Chương Mỹ - HN - BÙI QUANG TẤN</option>
                                                            <option data-area="2" data-warehouse="648" value="5462CB89-94A8-4B25-816A-B8D8BEDABADE">Kho Cư M-gar - Dak Lak - NGUYỄN ĐỨC TUẤN</option>
                                                            <option data-area="1" data-warehouse="171" value="e978f26b-8dc4-447a-a486-57c7bc0353f7">KHO ĐẠI TỪ -THÁI NGUYÊN - PHẠM QUANG HUY</option>
                                                            <option data-area="2" data-warehouse="665" value="a76e854e-f6ab-449e-88b9-45d800208c06">Kho Đắk Song - Đắk Nông - HỒ THỊ THU HUYỀN</option>
                                                            <option data-area="1" data-warehouse="273" value="70b341c5-8d02-4791-aefa-2d9b34fece67">KHO ĐAN PHƯỢNG-HÀ NỘI - BÙI THỊ THÚY</option>
                                                            <option data-area="3" data-warehouse="724" value="f543dee2-13a8-412e-b598-8565e6434573">KHO DĨ AN- BÌNH DƯƠNG - NGUYỄN THỊ LINH</option>
                                                            <option data-area="2" data-warehouse="679" value="1978dfd4-1c65-4ca9-aa54-77d4545b59f7">Kho Di Linh - Lâm Đồng - BÙI THỊ TUYẾT NHUNG</option>
                                                            <option data-area="1" data-warehouse="167" value="9a936f16-48b6-4a30-9788-5f55be1df70f">Kho Định Hóa - Thái Nguyên - NGUYỄN VĂN MẠNH </option>
                                                            <option data-area="1" data-warehouse="308" value="d3c577f7-ec9b-4acd-a71f-c45800c0374b">Kho Đồ Sơn - Hải Phòng - VŨ THỊ TỐ NGA</option>
                                                            <option data-area="2" data-warehouse="677" value="1fae62d9-db10-4a30-8643-1072667b3ae9">Kho Đơn Dương - Lâm Đồng - HỒ THỊ NHƯ LÝ</option>
                                                            <option data-area="1" data-warehouse="17" value="06c40cb8-183c-474f-ac62-71bcd036f648">Kho Đông Anh - HN - LÊ VIẾT PHÚC</option>
                                                            <option data-area="1" data-warehouse="6" value="1299B9F0-E0B5-4F56-A810-97F472890B4D">Kho Đống Đa - HN - PHẠM THỊ LƯ</option>
                                                            <option data-area="1" data-warehouse="340" value="203DACB5-61ED-40B6-AFCC-7D3AB143752A">Kho Đông Hưng - Thái Bình - MAI THỊ CHUYÊN</option>
                                                            <option data-area="1" data-warehouse="169" value="4ebcd6cc-bb8a-4cf6-9ccb-1471500be911">KHO ĐỒNG HỶ- THÁI NGUYÊN - NGUYỄN HUY NGỌC</option>
                                                            <option data-area="2" data-warehouse="678" value="8443ce6d-7fb3-46f5-b877-6187c2710b24">Kho Đức Trọng - Lâm Đồng - TRIỆU THỊ THIÊN KIM</option>
                                                            <option data-area="1" data-warehouse="349" value="f3ba00a7-8b0b-4612-a376-352cf9a7330f">Kho Duy Tiên - Hà Nam - CAO THỊ THỦY </option>
                                                            <option data-area="1" data-warehouse="18" value="bef6c578-f569-439d-b65b-0868069fca34">Kho Gia Lâm - Hà Nội - NGUYỄN THỊ HOA</option>
                                                            <option data-area="1" data-warehouse="365" value="3be4823d-9863-4a2d-9868-d89e2dbfa3ef">Kho Giao Thủy - Nam Định - NGUYỄN THỊ NHU</option>
                                                            <option data-area="3" data-warehouse="764" value="50204E9A-0EE1-41C6-8CED-E0D498570A6A">Kho Gò Vấp - HCM - NGUYỄN THỊ NHỊ</option>
                                                            <option data-area="1" data-warehouse="268" value="9ff23873-ae72-4158-9704-f639a6fbb562">KHO HÀ ĐÔNG - HN - HÁN THỊ THÙY LINH</option>
                                                            <option data-area="2" data-warehouse="392" value="bd6b4b7c-3191-43cf-a076-212b6199f75d">KHO HÀ TRUNG - THANH HOÁ - NGÔ MINH LAN</option>
                                                            <option data-area="1" data-warehouse="306" value="44f01aa8-4109-45d3-8f20-12c74e31de67">Kho Hải An - Hải Phòng - Vũ Duy Huân</option>
                                                            <option data-area="1" data-warehouse="7" value="e5f64885-7525-4c5a-b313-c5b82e60e3cc">Kho Hai Bà Trưng - HN - ĐINH THỊ TẦN</option>
                                                            <option data-area="1" data-warehouse="366" value="479a944f-af6a-4a4e-ac35-9460e66030fb">KHO HẢI HẬU NAM ĐỊNH - TRẦN THỊ KIM</option>
                                                            <option data-area="1" data-warehouse="223" value="ef01c9d3-f735-45f8-81fc-d26203494c96">Kho Hiệp Hòa - Bắc Giang - NGUYỄN THỊ AN</option>
                                                            <option data-area="1" data-warehouse="274" value="f5c026eb-21a4-42a6-8e62-1c3fb793be60">KHO HOÀI ĐỨC- HN - NGUYỄN THỊ HƯƠNG/DUNG</option>
                                                            <option data-area="1" data-warehouse="2" value="BB8CB9AB-FD0A-474E-B438-753D97E1E258">Kho Hoàn Kiếm - Hà Nội - NGUYỄN THỊ HỒNG TRÂM</option>
                                                            <option data-area="2" data-warehouse="399" value="3f01b938-157d-4de3-b516-15461e7f0587">Kho Hoằng Hóa - Thanh Hóa - TRẦN KHẮC HUY</option>
                                                            <option data-area="1" data-warehouse="8" value="645D1CC3-9B95-4FDB-9A4D-0A988E79D1BA">Kho Hoàng Mai - HN - NGUYỄN THỊ PHƯƠNG HOA</option>
                                                            <option data-area="3" data-warehouse="784" value="14cc4e06-2ce8-4d1e-9500-8cc0ccb97021">Kho Hóc Môn - HCM - TRẦN THỊ NGỌC DUNG</option>
                                                            <option data-area="1" data-warehouse="303" value="3d9c7ae4-a456-4daf-9ab3-768bcf941663">Kho Hồng Bàng - Hải Phòng - HÀ VĂN DUYỀN</option>
                                                            <option data-area="1" data-warehouse="339" value="40ca6ac7-7f25-4cfa-9993-301bef439a57">KHO HƯNG HÀ-THÁI BÌNH - HÀ THỊ SOẠN</option>
                                                            <option data-area="1" data-warehouse="330" value="d963c917-56a5-4af8-a995-95ab060af547">KHO KHOÁI CHÂU -HƯNG YÊN - TỐNG THU TRANG</option>
                                                            <option data-area="1" data-warehouse="343" value="dace135a-d4e7-4039-9894-82001eb8fd33">Kho Kiến Xương - Thái Bình - HỒ QUỲNH NGA</option>
                                                            <option data-area="2" data-warehouse="655" value="41c543fc-51f6-4db0-b411-c36e3b8ca303">Kho Krông A Na - Đắk Lắk - LÊ THỊ NHIỀU</option>
                                                            <option data-area="1" data-warehouse="151" value="e6cba296-cc89-43f4-aaab-0b8f7072f287">Kho Kỳ Sơn - Hòa Bình - NGUYỄN VĂN THẮNG</option>
                                                            <option data-area="2" data-warehouse="675" value="88ca6d9e-2f15-4fb3-9352-87ff0913ef44">Kho Lạc Dương - Lâm Đồng - NGUYỄN THỊ VINH</option>
                                                            <option data-area="1" data-warehouse="159" value="361cf458-b098-4606-bc12-0a88939c14c7">Kho Lạc Thủy - Hòa Bình - VŨ THỊ LƯỢNG</option>
                                                            <option data-area="2" data-warehouse="676" value="7cdb75a4-811a-4238-8660-8de8f2868180">Kho Lâm Hà - Lâm Đồng - BÁCH THỊ THANH</option>
                                                            <option data-area="1" data-warehouse="237" value="aeb194bd-5383-4a6d-99a9-96dc8b118e98">KHO LÂM THAO - PHÚ THỌ - NGHIÊM THỊ OANH</option>
                                                            <option data-area="1" data-warehouse="217" value="245e83e5-8579-4d16-9eca-145a5b2120b8">Kho Lạng Giang - Bắc Giang - BÙI ĐỨC HÒA</option>
                                                            <option data-area="1" data-warehouse="305" value="5CD5F569-303A-494C-A35B-2401DFB03F19">Kho Lê Chân - Hải Phòng - NGUYỄN THỊ QUYẾN</option>
                                                            <option data-area="1" data-warehouse="188" value="bd3d617b-4eac-472e-b48f-9cf7200d7997">Kho Lộc Bình - Lạng Sơn - NGUYỄN NGỌC TRANG</option>
                                                            <option data-area="1" data-warehouse="4" value="a8f7a799-deff-416a-b2b2-4a3fc9cc9a9c">Kho Long Biên - Hà Nội - VŨ THỊ THẮNG</option>
                                                            <option data-area="3" data-warehouse="740" value="08564a4e-c7ff-4d5c-aa4e-f52e6d9414ff">KHO LONG THÀNH - ĐỒNG NAI - TRẦN THỊ VỴ</option>
                                                            <option data-area="1" data-warehouse="218" value="08e7405b-f8ac-45d9-82ee-500cc5a5ea25">Kho Lục Nam - Bắc Giang - NGUYỄN THỊ THOAN</option>
                                                            <option data-area="1" data-warehouse="219" value="3b7a781c-e7d7-4c1a-be7c-c30aebc2fead">Kho Lục Ngạn - Bắc Giang - NGUYỄN HÙNG THÔNG </option>
                                                            <option data-area="1" data-warehouse="152" value="aef8fcf0-0124-431c-8baf-c6457f6bf445">Kho Lương Sơn - Hòa Bình - NGUYỄN THỊ OANH</option>
                                                            <option data-area="1" data-warehouse="353" value="a6b91c38-cbf0-4715-8555-4a43fb3ff2de">Kho Lý Nhân - Hà Nam - ĐẶNG THỊ HẢI SINH</option>
                                                            <option data-area="1" data-warehouse="250" value="5dcc8a29-9b32-4175-b9ff-996ed5bcf7da">Kho Mê Linh - HN - LỖ MINH TUẤN</option>
                                                            <option data-area="1" data-warehouse="282" value="c2740966-6b39-4324-b57a-b4ab2029dfe9">Kho Mỹ Đức - HN - NGUYỄN THỊ THẢO</option>
                                                            <option data-area="1" data-warehouse="328" value="84733f49-9da2-402f-b25a-8e7b07870a15">Kho Mỹ Hào - Hưng Yên - MAI THỊ THỦY</option>
                                                            <option data-area="1" data-warehouse="362" value="7bc905a7-416c-49f1-bcf4-2a9ec6b225be">Kho Nam Trực - Nam Định - NGUYỄN THỊ HIỀN</option>
                                                            <option data-area="1" data-warehouse="19" value="d54b24cf-c555-460d-872d-f6827b23ffbd">KHO NAM TỪ LIÊM - HN - NGUYỄN THỊ KIM HUỆ</option>
                                                            <option data-area="1" data-warehouse="19" value="a71e6e5f-e242-4da5-808f-4c369e7bbb24">KHO NAM TỪ LIÊM-HN - NGUYỄN THỊ THẮM</option>
                                                            <option data-area="2" data-warehouse="407" value="41589e99-7ab0-433a-b181-53e5101840ae">Kho Nghi Sơn - Thanh Hóa - TRẦN THỊ HẬU</option>
                                                            <option data-area="1" data-warehouse="133" value="6C12C117-2D05-4D8E-9AB0-970E540FF6C2">Kho Nghĩa Lộ - Yên Bái - HOÀNG TRƯỜNG GIANG</option>
                                                            <option data-area="1" data-warehouse="304" value="4ef4c6c3-1901-4a93-9009-0355a665c904">KHO NGÔ QUYỀN- HẢI PHÒNG - ĐÀO QUÝ HƯNG</option>
                                                            <option data-area="3" data-warehouse="786" value="78951A6F-7732-4F81-A6FE-24ECE32E8D03">Kho Nhà Bè - HCM - LƯU HOÀNG VINH</option>
                                                            <option data-area="3" data-warehouse="742" value="FC6EB736-DD48-4BBD-BCDD-53C276AE0E0B">Kho Nhơn Trạch - Đồng Nai - AH MATH CẨM NHUNG</option>
                                                            <option data-area="1" data-warehouse="172" value="245907e7-dedb-4bbd-87c7-47401d5aa325">Kho Phổ Yên - Thái Nguyên - NGUYỄN THỊ HUYỀN TRANG</option>
                                                            <option data-area="1" data-warehouse="173" value="ef2f1210-df34-4da9-ac13-12b202b1b0fc">KHO PHÚ BÌNH - THÁI NGUYÊN - AN THỊ NGA</option>
                                                            <option data-area="1" data-warehouse="168" value="efb2ba93-b8e7-45b3-a14d-f7ceb8a586ca">Kho Phú Lương - Thái Nguyên - TRẦN THỊ HÀ</option>
                                                            <option data-area="3" data-warehouse="763" value="06145C49-7E71-4CF1-979C-5445F95CDEA0">Kho Phú Nhuận - HCM - HOÀNG THỊ LIỄU</option>
                                                            <option data-area="3" data-warehouse="768" value="cfc9840b-89d6-4d16-b6cc-b2affa08ea28">Kho Phú Nhuận - HCM - NGUYỄN THỊ LAN</option>
                                                            <option data-area="1" data-warehouse="233" value="F97890BF-AD19-4D9B-BA76-898D37AE1F90">Kho Phù Ninh - Phú Thọ - NGUYỄN TRỌNG VŨ</option>
                                                            <option data-area="3" data-warehouse="911" value="39112093-d31f-4521-9b83-f4248ab983d3">KHO PHÚ QUỐC- KIÊN GIANG - NGUYỄN TIẾN MẠNH</option>
                                                            <option data-area="1" data-warehouse="280" value="7b213238-016a-4be5-a21d-2b4bfc5e13d3">KHO PHÚ XUYÊN-HÀ NỘI - DƯƠNG ĐỨC BẠO</option>
                                                            <option data-area="1" data-warehouse="272" value="b7f345d3-834e-4272-b121-1e3cfa6c4678">Kho Phúc Thọ - HN - NGUYỄN THỊ LỐI</option>
                                                            <option data-area="1" data-warehouse="244" value="dbbc6697-6b44-4940-9356-fe5e0ba40a72">Kho Phúc Yên - Vĩnh Phúc - HÀ MINH NAM</option>
                                                            <option data-area="3" data-warehouse="760" value="e38f2b51-e2f6-4aae-be8e-a2ead52cae8f">KHO QUẬN 1- HCM - ĐẶNG THỊ KIM HOÀNG</option>
                                                            <option data-area="3" data-warehouse="771" value="3c58007c-2fe7-4776-b3db-e5445581a1d8">Kho Quận 10 - Hồ Chí Minh - VŨ THỊ BÍCH THU</option>
                                                            <option data-area="3" data-warehouse="772" value="DFD1813D-89C1-426C-BFB9-720A79528E42">Kho Quận 11 - HCM - TĂNG TIỂU HOA</option>
                                                            <option data-area="3" data-warehouse="761" value="e358d7c8-dfab-4964-acd6-f8c59fc07e65">KHO QUẬN 12- HCM - NGUYỄN THỊ KIM MỸ</option>
                                                            <option data-area="3" data-warehouse="769" value="e2c2b4a4-ef0f-47fe-a77e-7420e8542cb9">Kho Quận 2 - HCM - TRẦN THỊ HÒA</option>
                                                            <option data-area="3" data-warehouse="770" value="bd81e6d0-32df-40c9-bd4c-dd54a7e03cc9">Kho quận 3-HCM - PHAN THỊ THU HÀ</option>
                                                            <option data-area="3" data-warehouse="773" value="da6cae70-e65a-4bf6-a418-3e7223364244">Kho Quận 4 - HCM - CHÂU KIM VÂN</option>
                                                            <option data-area="3" data-warehouse="774" value="959fc8bb-1ac1-42df-b6f9-ba8c3f74a05e">Kho Quận 5 - HCM - DƯƠNG HỮU PHÚ</option>
                                                            <option data-area="3" data-warehouse="775" value="A9D28ABB-ED07-4C1A-ADD0-504AACC5CCFF">Kho Quận 6 - HCM - DIỆP ĐÁO NHƯ</option>
                                                            <option data-area="3" data-warehouse="778" value="D9AC2D56-C646-4563-A134-7097351838D7">Kho Quận 7 - HCM - NGUYỄN THỊ TỐ TRÂM</option>
                                                            <option data-area="3" data-warehouse="776" value="206e0001-1cdb-4e1c-9879-20691751c59c">Kho Quận 8 - HCM - NGUYỄN THỊ NGỌC HÂN</option>
                                                            <option data-area="3" data-warehouse="763" value="7c333f71-03d2-4214-b536-82d0efc27113">Kho Quận 9 - HCM - LƯƠNG NGỌC HÙNG</option>
                                                            <option data-area="1" data-warehouse="259" value="74A71CA9-BB88-4AEF-871C-65EF12F4D4E9">Kho Quế Võ- Bắc Ninh - TRỊNH TOÀN KHOA</option>
                                                            <option data-area="1" data-warehouse="275" value="2862CE6D-3079-4F82-9979-FA7807FFE212">Kho Quốc Oai - HN - NGUYỄN THỊ HƯƠNG</option>
                                                            <option data-area="1" data-warehouse="338" value="5077bcb7-f7d6-4073-959c-278cf3958f9d">KHO QUỲNH PHỤ - THÁI BÌNH - NGUYỄN VĂN TÚY</option>
                                                            <option data-area="2" data-warehouse="382" value="2e03e567-8402-4eba-ab55-764e376ab929">Kho Sầm Sơn - Thanh Hóa - NGÔ NGỌC ANH</option>
                                                            <option data-area="1" data-warehouse="16" value="e79d27cf-da4a-484b-a1c6-a6f2eeb47894">Kho Sóc Sơn - HN - TRỊNH THỊ NHUNG</option>
                                                            <option data-area="1" data-warehouse="269" value="CC6D95A8-8D2E-4061-AA82-21A740C00835">Kho Sơn Tây - HN - LÊ ANH TUẤN ANH</option>
                                                            <option data-area="1" data-warehouse="247" value="9da8d08e-0b68-42c9-a639-d2879f302012">Kho Tam Dương- Vĩnh Phúc - NGUYỄN TUẤN ANH</option>
                                                            <option data-area="1" data-warehouse="236" value="c89becda-d01a-4561-b567-7de2cbcd161f">Kho Tam Nông - Phú Thọ - ĐỖ THỊ TÌNH </option>
                                                            <option data-area="3" data-warehouse="794" value="78b67b41-93bd-47e9-80a3-39ff16977509">KHO TÂN AN- LONG AN - NGUYỄN HỒNG SANG</option>
                                                            <option data-area="3" data-warehouse="766" value="826D0092-B3E4-4412-8B78-144878445CE8">Kho Tân Bình - HCM - NGUYỄN THỊ XUYẾN</option>
                                                            <option data-area="3" data-warehouse="796" value="37415221-c91c-427d-ac9e-e25dd926cb1e">KHO TÂN HƯNG-LONG AN - NGUYỄN MINH CHÂU</option>
                                                            <option data-area="1" data-warehouse="155" value="b78d28cf-25ad-4771-9e64-43bcf69fa6dd">Kho Tân Lạc - Hòa Bình - CẤN THỊ TUYẾT NHUNG</option>
                                                            <option data-area="3" data-warehouse="767" value="95f79285-2eec-4c51-abdc-d9ac2ce14969">Kho Tân Phú - HCM - PHẠM THỊ BÍCH THẢO</option>
                                                            <option data-area="1" data-warehouse="216" value="2bce96e8-cd44-4dcc-90bc-85aebacb46c9">KHO TÂN YÊN- BẮC GIANG - TRƯƠNG THỊ SUỐT</option>
                                                            <option data-area="1" data-warehouse="3" value="32785C79-B330-477F-AC5B-2E9D0C03A1BE">Kho Tây Hồ - HN - PHAN THỊ AN</option>
                                                            <option data-area="1" data-warehouse="276" value="5d99b8d7-026e-4540-bb80-395ae61d3bd4">Kho Thạch Thất- HN - LÊ THỊ HOÀI DIỄM</option>
                                                            <option data-area="1" data-warehouse="341" value="87c112f5-3672-4285-a6b0-963861cbf16f">KHO THÁI THUỴ-THÁI BÌNH - PHẠM THỊ LOAN</option>
                                                            <option data-area="1" data-warehouse="232" value="d856eecc-01eb-46bb-b6a3-9c2272f21582">KHO THANH BA -PHÚ THỌ - PHẠM THỊ HƯƠNG</option>
                                                            <option data-area="1" data-warehouse="351" value="56cc66d9-f39b-4989-8600-02bfee13f55e">KHO THANH LIÊM- HÀ NAM - VŨ THỊ LÝ</option>
                                                            <option data-area="1" data-warehouse="278" value="c88e3d55-c441-4aef-9434-627310e30890">KHO THANH OAI- HÀ NỘI - NGUYỄN ĐĂNG DƯƠNG</option>
                                                            <option data-area="3" data-warehouse="954" value="4c885e5c-f21a-4036-8a48-0cdd57afd17d">Kho Thành phố Bạc Liêu - LÊ THỊ BIÊN</option>
                                                            <option data-area="1" data-warehouse="238" value="1976b5ae-251b-4832-9a52-bdb8e9ec55eb">KHO THANH SƠN- PHÚ THỌ - NGHIÊM THỊ YẾN</option>
                                                            <option data-area="1" data-warehouse="239" value="f1ab2c87-55e0-459e-8820-dfee15c4d54f">Kho Thanh Thủy - Phú Thọ - TRẦN VĂN MẠNH</option>
                                                            <option data-area="1" data-warehouse="20" value="3effaafd-ee35-43a2-8c66-48780386b8be">Kho Thanh Trì - HN - MAI VĂN LÂN</option>
                                                            <option data-area="1" data-warehouse="20" value="9af6079d-4e5c-4426-86d6-cfc8b25fbf6e">KHO THANH TRÌ- HÀ NỘI - NGUYỄN THỊ THANH BÌNH</option>
                                                            <option data-area="1" data-warehouse="9" value="18F658AB-E438-4712-B667-346DB610B021">Kho Thanh Xuân - HN - VŨ THỊ GIANG</option>
                                                            <option data-area="2" data-warehouse="398" value="a370284b-ead0-44db-a4e1-c24c90c1873b">KHO THIỆU HOÁ-THANH HOÁ - ĐỖ THỊ HÀ</option>
                                                            <option data-area="3" data-warehouse="762" value="3ebc6028-1c14-459f-a879-8df4e3c1d0be">Kho Thủ Đức - HCM - PHAN ĐÌNH HÙNG</option>
                                                            <option data-area="1" data-warehouse="279" value="87cdcc5b-9baa-4410-9248-080343830e07">Kho Thường Tín - HN - TẠ THI KHUYÊN</option>
                                                            <option data-area="1" data-warehouse="311" value="88e3a032-fa9f-407b-bde7-718e2d0202db">KHO THUỶ NGUYÊN- HẢI PHÒNG - NGUYỄN THỊ LÝ</option>
                                                            <option data-area="1" data-warehouse="342" value="74a9cb6f-7a62-49ab-b90e-eb4e1538d694">KHO TIỀN HẢI- THÁI BÌNH - HOÀNG THỊ HẢI YẾN</option>
                                                            <option data-area="1" data-warehouse="315" value="36f8c6ac-1550-4f20-af52-83be126429c9">KHO TIÊN LÃNG- HẢI PHÒNG - NGUYỄN MINH TRÍ</option>
                                                            <option data-area="1" data-warehouse="213" value="7c9dde1c-7334-4d51-b7a5-ac76d94ff266">Kho Tỉnh Bắc Giang - BÙI ĐỨC HÒA</option>
                                                            <option data-area="1" data-warehouse="258" value="038d65c4-e9fb-4518-a990-3b72496a3d77">Kho Tỉnh Bắc Ninh - NGUYỄN HÙNG THÔNG</option>
                                                            <option data-area="3" data-warehouse="762" value="ab06d0fb-28f8-47cc-9f69-a9cd2ddaef2c">Kho Tỉnh Hồ Chí Minh - LƯƠNG NGỌC HÙNG</option>
                                                            <option data-area="1" data-warehouse="193" value="7ea14f09-2047-4bb3-b289-22ab5c4ca079">Kho Tỉnh Quảng Ninh - TRẦN TUẤN VIỆT</option>
                                                            <option data-area="1" data-warehouse="343" value="1a4cf32f-697a-4fc4-a3ae-5465d33a0d3d">Kho Tỉnh Thái Bình - NGUYỄN THỊ NGỌC ANH</option>
                                                            <option data-area="1" data-warehouse="268" value="47509AEA-609A-4505-8574-9ECB0D49D5B3">Kho Tổng Hà Nội - KHO TỔNG TTTN HN</option>
                                                            <option data-area="1" data-warehouse="213" value="08614fa6-0a7f-4f7a-86c9-7756dc0d3f63">Kho TP Bắc Giang - LÊ HỮU NAM</option>
                                                            <option data-area="1" data-warehouse="58" value="d30b1f6e-ee79-477c-9231-0b853c6006e7">KHO TP BẮC KẠN - ĐÀO XUÂN TÍNH</option>
                                                            <option data-area="1" data-warehouse="256" value="9743616e-0a14-4717-8106-a1ad0855c577">KHO TP BẮC NINH - PHẠM VĂN SƠN</option>
                                                            <option data-area="3" data-warehouse="829" value="1883c379-3bba-4176-8ada-710a06b680d6">Kho TP Bến Tre - TRƯƠNG THỊ VÚNG</option>
                                                            <option data-area="1" data-warehouse="195" value="cc726175-6865-4bd9-8f41-7ddb0520cd4b">KHO TP CẨM PHẢ - QUẢNG NINH - VŨ THỊ HÀ</option>
                                                            <option data-area="1" data-warehouse="40" value="66b45082-fdbe-4d10-a71e-237e5238995a">Kho TP Cao Bằng - NGUYỄN XUÂN ĐẠT</option>
                                                            <option data-area="2" data-warehouse="672" value="3B6196DF-E2DB-4BF3-8CFD-AAD01097864A">Kho TP Đà Lạt - BÙI VÕ HƯƠNG MAI</option>
                                                            <option data-area="1" data-warehouse="193" value="8fd089f0-4140-4fcb-a677-d8ec70ba64c5">KHO TP HẠ LONG-QUẢNG NINH - NGUYỄN THỊ DIỆU THÚY</option>
                                                            <option data-area="2" data-warehouse="436" value="b401c090-073d-40e7-b9f2-d16bc1ed93a6">KHO TP HÀ TĨNH - NGUYỄN THỊ TRANG LAI</option>
                                                            <option data-area="1" data-warehouse="288" value="299CA371-C068-4D42-9D02-6E33F75C168F">Kho TP Hải Dương - ĐINH THỊ LÀNH</option>
                                                            <option data-area="1" data-warehouse="148" value="56f221de-f2d4-4c07-b9b0-f2b52792dd22">Kho TP Hòa Bình - NGUYỄN THỊ THIÊN LAN</option>
                                                            <option data-area="1" data-warehouse="323" value="617d7c1f-e60c-4b9f-b1e8-9f0fdaace0b9">Kho TP Hưng Yên - LÊ DUY BÌNH</option>
                                                            <option data-area="1" data-warehouse="105" value="0ee0bd5c-9b68-4277-9543-166aba8c9065">KHO TP LAI CHÂU - LÊ VĂN HỮU</option>
                                                            <option data-area="1" data-warehouse="178" value="2e03f77f-8e1b-49a9-8e6c-408060f00985">Kho TP Lạng Sơn - NGUYỄN TRẦN SƠN</option>
                                                            <option data-area="1" data-warehouse="356" value="D68100D4-41E1-4CF2-9250-28CDBEE574BC">Kho TP Nam Định - NGUYỄN PHƯƠNG HOA</option>
                                                            <option data-area="1" data-warehouse="369" value="d3966c64-6aaa-4f51-87d4-15971a72f086">Kho TP Ninh Bình - NGUYỄN THỊ NGHĨA</option>
                                                            <option data-area="1" data-warehouse="347" value="45183a8a-8b76-4774-920e-075af04e947c">KHO TP PHỦ LÝ- HÀ NAM - PHẠM NGỌC KÌNH</option>
                                                            <option data-area="1" data-warehouse="165" value="f79903cb-32bd-485c-b79a-ee6e0e6ad950">KHO TP SÔNG CÔNG -THÁI NGUYÊN - DƯƠNG ĐÌNH NHỊ</option>
                                                            <option data-area="1" data-warehouse="370" value="782dfc72-5862-40d4-b6f7-e640bc30c8ff">Kho TP Tam Điệp - Ninh Bình - BÙI THỊ MINH NGUYỆT</option>
                                                            <option data-area="1" data-warehouse="336" value="1dd8dd64-9a4f-4fa3-b842-befabaa1b2b4">KHO TP THÁI BÌNH - NGUYỄN THỊ THÁI HẬU</option>
                                                            <option data-area="1" data-warehouse="336" value="01a50a20-e1bb-4e63-b62e-37bd584c3416">Kho TP Thái Bình 2 - VŨ THỊ HỒNG THẮM</option>
                                                            <option data-area="1" data-warehouse="164" value="f207cdcd-8fec-4189-95fb-a6db450339f6">KHO TP THÁI NGUYÊN - VI THỊ PHƯƠNG</option>
                                                            <option data-area="2" data-warehouse="380" value="ebf42e1f-9f4e-4ea8-b3bf-a991b9333dcb">KHO TP THANH HÓA - NGUYỄN VĂN MÔN</option>
                                                            <option data-area="2" data-warehouse="412" value="e891bcf2-9c86-4aa6-a85c-22960b7ee03f">KHO TP VINH - Nghệ An - PHAN CÔNG TIẾN</option>
                                                            <option data-area="1" data-warehouse="243" value="8e3be7f6-3460-47ff-90d7-6b0983fa057b">KHO TP VĨNH YÊN- VĨNH PHÚC - PHẠM ĐĂNG HUÂN</option>
                                                            <option data-area="3" data-warehouse="747" value="4121dddd-a263-4211-8c17-1092c7099d8c">Kho TP Vũng Tàu - NGUYỄN QUANG MINH </option>
                                                            <option data-area="1" data-warehouse="298" value="16114542-27fc-4a18-bc68-76e4d0732be2">KHO TỨ KỲ-HẢI DƯƠNG - TRẦN THỊ KHÁNH HUYỀN</option>
                                                            <option data-area="1" data-warehouse="261" value="236f097e-584c-45ab-9d37-eff2dc85510c">Kho Từ Sơn - Bắc Ninh - TRẦN VĂN CƯỜNG</option>
                                                            <option data-area="1" data-warehouse="281" value="60dad132-d720-4cc8-8e4e-2035d6e32ffa">KHO ỨNG HÒA- HN - NGHIÊM ĐỨC THÌN</option>
                                                            <option data-area="1" data-warehouse="196" value="EE38C419-7F29-44BE-887D-7A7E66CA38B4">Kho Uông Bí - Quảng Ninh - NGUYỄN TRỌNG NGHĨA</option>
                                                            <option data-area="1" data-warehouse="326" value="49376991-436f-4658-b032-55822c1bd74e">Kho Văn Giang - Hưng Yên - NGUYỄN VĂN TUÂN</option>
                                                            <option data-area="1" data-warehouse="325" value="a249c992-997d-43fb-9cae-f516e722b1fe">KHO VĂN HƯNG- HƯNG YÊN - PHẠM THỊ SEN</option>
                                                            <option data-area="1" data-warehouse="227" value="F3BEB559-C148-4D7B-AC1E-9ECE63E57A8F">Kho Việt Trì - Phú Thọ - TRỊNH HỒNG LÁNG</option>
                                                            <option data-area="1" data-warehouse="222" value="c2ea9864-4c23-4451-9ac9-5f4e3e8684d7">Kho Việt Yên - Bắc Giang - NGUYỄN ĐỨC QUÂN</option>
                                                            <option data-area="1" data-warehouse="170" value="621ac7f4-cebd-4ec1-8291-177be91404e0">Kho Võ Nhai - Thái Nguyên - NGUYỄN THỊ SÍU</option>
                                                            <option data-area="1" data-warehouse="344" value="f9523d2f-255f-4e29-bb7c-bd4d115e4833">KHO VŨ THƯ- THÁI BÌNH - NGUYỄN THỊ NGỌC ANH</option>
                                                            <option data-area="1" data-warehouse="221" value="9b8d1a2d-e633-4cea-9d30-3020c02ee28f">Kho Yên Dũng - Bắc Giang - HOÀNG VĂN SƠN</option>
                                                            <option data-area="1" data-warehouse="251" value="fe188b26-4b8c-4f41-9253-9a4ff2da899e">Kho Yên Lạc - Vĩnh Phúc - NGUYỄN THỊ LAN ANH</option>
                                                            <option data-area="2" data-warehouse="426" value="a84dda45-f918-4b93-b004-f698316fd8e9">KHO YÊN THÀNH -NGHỆ AN - NGUYỄN CẢNH NGHĨA</option>
                                                            <option data-area="1" data-warehouse="158" value="6c0ed96b-8073-4d66-a5cd-91280bd0bc2e">Kho Yên Thủy - Hòa Bình - TRỊNH CẨM LINH</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label>Ghi chú đơn hàng (Nếu có)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-comments"></i></span> </div>
                                                        <input name="txtNote" type="text" id="txtNote" class="form-control" placeholder="Ghi chú cho đơn hàng nếu có"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row" style="margin: 0px !important;">
                                                <div class="col-md-12">
                                                    <div class="mt-2" style="text-align:justify;">
                                                        <div>Lưu ý:
                                                            <br>- Mọi thông tin đặt đơn hàng phải chính xác để công ty giao hàng, nếu sai thông tin công ty không chịu trách nhiệm về tình trạng giao hàng trễ.</div>
                                                        <div>- Số điện thoại phải là số của người nhận hàng để công ty hoặc kho giao hàng liên hệ được để xác nhận đơn.</div>
                                                        <div>- Nhận hàng tại công ty: Quý khách sẽ lên văn phòng tại các cơ sở của công ty để nhận hàng trực tiếp.</div>
                                                        <div class="d-none"> - Nhận hàng tại kho: Quý khách sẽ đến kho đã chọn để nhận hàng trực tiếp. </div>
                                                        <div> - Nhận hàng tại nhà: Hàng sẽ được gửi về địa chỉ nhận hàng của Quý khách, công ty hoặc kho gần nhất sẽ vận chuyển đơn hàng tới Quý khách. </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <input type="hidden" value="1" name="congHH">
                                            <input type="button" name="ctl27$btnBack" value="Chọn lại" onclick="return goBackOrder()" id="btnBack" class="btn btn-block bg-background col-md-2" style="float: left; margin-bottom: 10px; margin-right: 5px; font-size: 20px;color: white; font-weight: bold;">
                                            <label>
                                                <input type="checkbox" class="checkPolicy1" style="width:20px; height:20px;"> &nbsp;Tôi đã đọc, hiểu và đồng ý với các điều khoản mua hàng của công ty. </label>
                                            <label id="lbPolicy" style="cursor:pointer; color: purple" >Xem điều khoản &amp; chính sách mua hàng</label>
                                            <button type="submit" class="btn btn-block bg-background col-md-2" style="font-weight:bold;float: right; color:white; font-size:20px; margin-top: 0px !important;">Xác nhận mua hàng</button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="warehouseName" id="warehouseId" value="">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal" id="mdPolicy" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999; padding-right: 0px !important;">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="width:100%;">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">
                                    Chính sách &amp; điều khoản
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            </div>
                            <div class="modal-body divPolicy">
                                <h4 style="text-align: center;">HỢP ĐỒNG ĐẠI LÝ PHÂN PHỐI<br>Số: ............2023/HĐPP/TTTN</h4>
                                <ul>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Căn cứ vào Bộ luật dân sự và Luật Thương mại hiện hành và các văn bản hướng dẫn ban hành;</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Căn cứ theo nhu cầu và khả năng thực tế của hai bên.</p>
                                    </li>
                                </ul>
                                <p dir="ltr">Hôm nay, ngày 26 tháng 12 năm 2023 tại LK16-1 Ngô Thì Nhậm - Phường La Khê, Quận Hà Đông,&nbsp; TP.Hà Nội &nbsp;Chúng tôi gồm :</p>
                                <p dir="ltr" class="text-bold">BÊN BÁN ( BÊN A ):&nbsp; CÔNG TY CỔ PHẦN THƯƠNG MẠI TRÍ TUỆ TỰ NHIÊN</p>
                                <p dir="ltr">Địa chỉ: LK16 -1 Ngô Thì Nhậm - Phường La Khê - Quận Hà Đông - TP. Hà Nội</p>
                                <p dir="ltr">Mã số thuế: 0109934914, cấp ngày 17/03/2022</p>
                                <p dir="ltr" class="text-bold">Đại diện: Bà TÔ THỊ THỦY</p>
                                <p dir="ltr">Chức vụ:&nbsp; Tổng giám đốc - Điện thoại: 08 999 888 48</p>
                                <p dir="ltr">Tài khoản giao dịch: 2681693951 (User name tài khoản ngân hàng: trituetunhien).</p>
                                <p dir="ltr">Tại Ngân hàng:&nbsp;BIDV - Chủ TK: Tô Thị Thủy</p>
                                <p dir="ltr" class="text-bold">BÊN MUA ( BÊN B): ĐẠI LÝ PHÂN PHỐI SẢN PHẨM</p>
                                <p dir="ltr" class="text-bold">Đại diện:&nbsp; Ông/bà: NGUYỄN VĂN NAM</p>
                                <p dir="ltr">Số căn cước: </p>
                                <p dir="ltr">Ngày cấp:.........Nơi cấp:..........</p>
                                <p dir="ltr">Địa chỉ thường trú: </p>
                                <p dir="ltr">Điện thoại: 0987042050</p>
                                <p dir="ltr">Tài khoản giao dịch:</p>
                                <p dir="ltr">Chủ tài khoản: </p>
                                <p dir="ltr">Tại Ngân hàng:</p>
                                <p dir="ltr">Chi nhánh Ngân hàng:</p>
                                <p dir="ltr">Sau khi thỏa thuận, Hai Bên thống nhất ký Hợp đồng Đại lý phân phối với điều khoản sau:</p>
                                <p dir="ltr" class="text-bold">Điều 1. Các điều khoản chung:</p>
                                <ol>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Hai bên cùng có quan hệ mua bán với nhau theo quan hệ mua bán hàng trên cơ sở hai bên cùng hợp tác;</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Trong khuôn khổ Hợp đồng này, hai bên sẽ ký tiếp các phụ lục Hợp đồng phân phối hoặc Đơn đặt hàng (bằng văn bản, điện thoại và thư điện tử) đối với từng đơn hàng cụ thể: chi tiết hàng hóa, số lượng, giá cả, thời gian giao hàng, phương thức thanh toán và các điều khoản khác đã được ghi rõ trong Phụ lục Hợp đồng phân phối hoặc Đơn đặt hàng tương ứng.</p>
                                    </li>
                                </ol>
                                <p dir="ltr" class="text-bold">Điều 2. Hàng hóa:</p>
                                <p dir="ltr">2.1. Hàng hóa do Bên A cung cấp đảm bảo đúng chủng loại, tiêu chuẩn chất lượng và các thông số kỹ thuật của Hãng cấp hàng/Nhà sản xuất.</p>
                                <p dir="ltr">2.2. Chi tiết về hàng hóa sẽ được các bên chỉ rõ trong các đơn đặt hàng trong khuôn khổ của Hợp đồng này.</p>
                                <p dir="ltr" class="text-bold">Điều 3. Giao nhận hàng hóa:</p>
                                <p dir="ltr">3.1. Số lượng hàng hóa, địa điểm giao nhận được quy định trong các Đơn đặt hàng.</p>
                                <p dir="ltr">3.2. Hàng hóa có thể giao một lần hoặc nhiều lần tùy theo hai bên thỏa thuận.</p>
                                <p dir="ltr">3.3. Giao nhận sản phẩm.</p>
                                <ul>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Hai bên thực hiện giao dịch bằng Đơn đặt hàng do Bên B đặt hàng với Bên A.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Sau khi bên B hoàn thành tất cả các nghĩa vụ về tài chính thì bên A sẽ cung cấp hàng cho bên B.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Phụ thuộc vào nội dung bản Hợp đồng này, Bên B đồng ý với Bên A là không rút lại số tiền hàng đã đặt vì bất kỳ lý do gì khi Bên A đã đặt hàng với đối tác cung cấp.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Bên A chỉ giao hàng cho Bên B khi được xác nhận là Bên B đã đạt được thoả thuận thanh toán.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Bên A sẽ không chịu trách nhiệm đối với Bên B trong trường hợp giao hàng trễ do những nguyên nhân bất khả kháng theo quy định pháp luật.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Địa điểm giao hàng: Theo thỏa thuận với đơn hàng lớn hơn 50 triệu vnđ thì bên A chịu phí vận chuyển. Với đơn hàng nhỏ hơn 50 triệu vnđ thì bên B chịu phí vận chuyển.</p>
                                    </li>
                                </ul>
                                <p dir="ltr" class="text-bold">Điều 4. Giá cả và phương thức thanh toán:</p>
                                <p dir="ltr">4.1. Đơn giá, tổng giá trị hàng hóa, thuế VAT sẽ được ghi cụ thể trong các đơn đặt hàng được ký kết bởi hai bên. Tỷ lệ chiết khấu sẽ được tính theo chính sách chung của Bên A cho từng thời điểm</p>
                                <p dir="ltr">4.2. Phương thức thanh toán:</p>
                                <p dir="ltr">- Thanh toán bằng tiền mặt hoặc chuyển khoản</p>
                                <p dir="ltr">- Thời hạn thanh toán: thanh toán 100% đơn hàng trước khi giao hàng.</p>
                                <p dir="ltr" class="text-bold">Điều 5. Quyền và nghĩa vụ của các Bên:</p>
                                <p dir="ltr">5.1. Bên bán:</p>
                                <p dir="ltr">5.1.1. Đảm bảo cung cấp hàng hóa đúng chủng loại, chất lượng và tiêu chuẩn kỹ thuật của Hãng cung cấp/Nhà sản xuất.</p>
                                <p dir="ltr">5.1.2. Bên A đào tạo cho Bên B các khóa đào tạo về phát triển bản thân, các khóa marketing, khoá tư vấn bán hàng, khoá chăm sóc khách hàng. Bên A hỗ trợ đào tạo cho bên B bởi các chuyên gia trong nước hoặc quốc tế về cách sử dụng sản phẩm và vận hành kinh doanh.</p>
                                <p dir="ltr">5.1.3. Đối với khách hàng của đối tác giới thiệu, bắt buộc khách hàng khi hợp tác kinh doanh cùng công ty sẽ phải là đại lý dưới của người đã giới thiệu mình đến công ty, thông tin khách hàng sẽ được bảo lưu trong 30 ngày, sau 30 ngày khách hàng có thể lựa chọn đối tác đại lý khác để kết hợp. Đối với khách hàng tự đi tìm hiểu thì khách hàng tự lựa chọn đối tác để làm việc.</p>
                                <p dir="ltr">5.1.4. Bên A có quyền kiểm tra, giám sát hoạt động của Bên B trên địa bàn mà Bên B hoạt động.</p>
                                <p dir="ltr">5.1.5. Bên A có quyền đơn phương chấm dứt hợp đồng với Bên B nếu Bên B không tuân thủ theo đúng các quy định về kinh doanh do Bên A đưa ra.</p>
                                <p dir="ltr">5.1.6. Bên A thực hiện đặt hàng đối với các nhà cung cấp sản phẩm của nước ngoài sau khi nhận được Đơn đặt hàng bằng văn bản của Bên B và đảm bảo sản phẩm cung cấp cho Bên B không quá 30 ngày.</p>
                                <p dir="ltr">5.1.7. Bên A sẽ tuân thủ chặt chẽ các quy định trong hợp đồng này, đáp ứng kịp thời yêu cầu của Bên B liên quan đến việc mua bán hàng.</p>
                                <p dir="ltr">5.1.8.Thực hiện đúng cam kết được ghi trong Hợp đồng.</p>
                                <p dir="ltr">5.2. Bên mua:</p>
                                <ul>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Được Bên A cung cấp sản phẩm đúng tiêu chuẩn của nhà sản xuất; được hỗ trợ khi mở địa điểm kinh doanh, hỗ trợ đào tạo, chuyển giao mô hình và được hưởng các chính sách, quyền lợi của bên B và chỉ được thực hiện với đại diện hợp pháp của bên B.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B có quyền phát triển Đại lý trên toàn quốc nếu xét thấy cá nhân hoặc đơn vị đó có đủ tiêu chuẩn với quy định của bên A. .</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B chịu hoàn toàn trách nhiệm về vận chuyển, trưng bày các sản phẩm, thực hiện đúng các quy định về vận hành, bảo quản, giữ được phẩm chất hàng hóa sản phẩm như Bên A cung cấp đến người tiêu dùng.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B tự chịu trách nhiệm về việc thực hiện, tuân thủ đầy đủ các quy định hiện hành về an toàn thực phẩm, PCCC, an ninh trật tự…</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B được Bên A hỗ trợ khi mở Đại lý và được hưởng các chính sách, quyền lợi của Đại lý. Theo tình hình thực tế, Bên A có quyền thay đổi các chính sách, quyền lợi của Đại lý để phù hợp với quyền lợi của 2 bên.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Thực hiện nghiêm túc các quy định, hướng dẫn của Bên A trong việc phục vụ, phân phối sản phẩm, chuyển giao, đào tạo, bảo quản sản phẩm…. theo tiêu chuẩn quy định của nhà sản xuất. Không tư vấn, kinh doanh các sản phẩm không phải của Bên A cung cấp hay ủy quyền; không quảng cáo sai sự thật về sản phẩm, mô hình kinh doanh của Bên A khi phân phối.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Thanh toán đầy đủ với Bên A sau khi đặt hàng; không trả lại hàng hoặc đưa ra yêu cầu hoàn lại tiền sau khi đã đặt hàng với Bên A trong mọi điều kiện.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B và người góp vốn cùng Bên B mở Đại lý không được tham gia tư vấn, góp vốn đầu tư mở đại lý hoặc chuỗi hệ thống phân phối cho các bên khác hoặc tương tự về sản phẩm hay mô hình của Bên A.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Mọi hoạt động quảng cáo do Bên B tự thực hiện nếu có sử dụng đến logo hay nhãn hiệu hàng hóa của Bên A phải được sự đồng ý của Bên A (bằng văn bản); không được khuếch trương, quảng cáo sai sự thật về sản phẩm hay mô hình của Bên A. Nội dung của việc quảng cáo, tờ rơi và cách thức bán hàng khác và tài liệu tiếp thị (“Tài liệu quảng cáo”) mà Bên B thực hiện phải được Bên A chấp thuận bằng văn bản trước khi thực hiện quảng cáo đến khách hàng hoặc phương tiện truyền thông.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Không được nhân danh là đại diện hoặc nhân viên Bên A trong việc trả lời các cơ quan Nhà nước hoặc cơ quan truyền thông (Trừ trường hợp có ủy quyền của Bên A).</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B không được phép bán phá giá hoặc lôi kéo người từ nhóm đại lý khác sang đại lý nhóm của mình và không được phép bán hàng chồng chéo sang nhóm đại lý khác, nếu phát hiện bên B sai phạm thì bên B sẽ bị phạt theo qui định của bên A và nghiêm trọng&nbsp; hơn thì bên A có quyền đơn phương chấm dứt hợp đồng mà không phải đền bù bất cứ chi phí nào cho bên B.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B có trách nhiệm hỗ trợ, đào tạo chuyên môn, giúp bán hàng, lên kế hoạch làm việc,….. cho các cửa hàng thuộc đại lý của mình trong quá trình các cửa hàng của nhóm mình hoạt động.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Thực hiện nghiêm chỉnh các quy định của Pháp luật Việt Nam về quản lý và lưu thông hàng hóa. Bên bán không chịu trách nhiệm về các hành vi, vi phạm pháp luật này của bên mua.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">&nbsp;Giá bán lẻ quy định cho từng sản phẩm: Bên B bán đúng giá quy định cho từng sản phẩm theo thông báo của Bên A cho từng thời điểm cụ thể, Bên B không được bán thấp hoặc cao hơn giá bán lẻ quy định. Nếu vi phạm Bên A sẽ tạm ngừng cung cấp sản phẩm hoặc có quyền đơn phương chấm dứt Hợp Đồng này mà không phải bồi thường. Thực hiện đúng các cam kết được ghi trong Hợp đồng.</p>
                                    </li>
                                </ul>
                                <p dir="ltr" class="text-bold">Điều 6. Thuế và các khoản có tính chất thuế.</p>
                                <p dir="ltr">Các bên có trách nhiệm độc lập trong việc khai báo và nộp các loại thuế thuộc trách nhiệm của mình, bao gồm thuế giá trị gia tăng (VAT), thuế TNDN, thuế TNCN và các loại thuế hoặc phí khác liên quan hoặc phát sinh từ Hợp đồng với cơ quan thuế theo quy định của pháp luật.&nbsp;&nbsp;</p>
                                <p dir="ltr" class="text-bold">Điều 7. Tính bảo mật</p>
                                <p dir="ltr">7.1. Bên B phải bảo mật tất cả các thông tin liên quan đến kế hoạch bán sản phẩm, nghiên cứu thị trường, chiến dịch khuyến mãi, số liệu bán hàng, các hoạt động tiếp thị, số liệu kế toán thống kê, báo cáo, và các hoạt động khác có thể được quy định bởi Bên A trong từng thời điểm theo Hợp Đồng này (thông tin bảo mật). Bên B không được thực hiện các điều sau đây nếu không có sự đồng ý trước bằng văn bản của Bên A:&nbsp;</p>
                                <p dir="ltr">7.2. Khai thác bất cứ phần nào của thông tin bảo mật.&nbsp;&nbsp;</p>
                                <p dir="ltr">7.3. Tiết lộ cho bên thứ ba hoặc bất cứ người nào về một phần hoặc toàn bộ các thông tin bảo mật, trừ các nhân viên của mình, những người cần biết các thông tin bảo mật để tiến hành nhiệm vụ tương ứng như quy định trong Hợp Đồng này.&nbsp;</p>
                                <p dir="ltr" class="text-bold">Điều 8: Hiệu lực và chấm dứt hợp đồng.&nbsp;</p>
                                <ul>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Hợp đồng này có hiệu lực kể từ ngày ký.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Hợp đồng này có hiệu lực trong vòng 12 tháng kể từ ngày Hợp đồng có hiệu lực.</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Hợp đồng này có quyền được thừa kế.</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Hợp Đồng này có thể chấm dứt trong các trường hợp sau đây:</p>
                                    </li>
                                </ul>
                                <ul>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Bên B mất năng lực hành vi dân sự.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Các trường hợp khác theo quy định của pháp luật.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Do tình huống bất khả kháng.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Các bên thương lượng ký hợp đồng phân phối mới và thanh lý hợp đồng này trước thời hạn.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Thời hạn hiệu lực của hợp đồng này đã hết, các bên đã hoàn thành tất cả các nghĩa vụ của mình liên quan đến hợp đồng và không có thỏa thuận nào khác về việc gia hạn Hợp Đồng.</p>
                                    </li>
                                </ul>
                                <ul start="5">
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Chấm dứt hợp đồng trước thời hạn:</p>
                                    </li>
                                </ul>
                                <ul>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Trong quá trình thực hiện hợp đồng, Bên A có quyền đơn phương chấm dứt hợp đồng nếu Bên B vi phạm những điều khoản đã ghi trong hợp đồng này và Bên A đã thông báo bằng văn bản cho Bên B, trong thời hạn 15 ngày kể từ ngày Bên A thông báo mà Bên B không khắc phục. Để chấm dứt hợp đồng, Bên A phải thông báo bằng văn bản cho Bên B trước 07 ngày.</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Vì những lý do của mình, Bên B có quyền đơn phương chấm dứt hợp đồng nhưng phải báo trước bằng văn bản cho Bên A trước 15 ngày. Trong trường hợp này Bên B không có quyền yêu cầu Bên A bồi thường bất cứ khoản tiền nào liênquan tới việc làm Đại lý của mình và phải bồi thường cho Bên A những tổn thất do việc đơn phương chấm dứt hợp đồng gây ra.</p>
                                    </li>
                                </ul>
                                <p dir="ltr">8.6. Hết thời hạn hợp đồng Bên A và bên B sẽ tiếp tục gia hạn hợp đồng bằng việc ký hợp đồng mới thay thế hợp đồng này.</p>
                                <p dir="ltr" class="text-bold">Điều 9: Cam kết chung:</p>
                                <p dir="ltr">9.1. Nếu có bất cứ tranh chấp nào phát sinh từ Hợp Đồng này hoặc trong quá trình thực hiện Hợp Đồng thì sẽ được các bên giải quyết trên tinh thần thiện chí, hợp tác. Nếu tranh chấp không thể giải quyết được thông qua hòa giải, thương lượng giữa các bên trong vòng 15 ngày kể từ khi bắt đầu thảo luận, thì tranh chấp đó có thể được một hoặc&nbsp; cả hai bên đưa ra giải quyết tại Trọng tài kinh tế Hà Nội nơi Bên A đặt trụ sở.</p>
                                <p dir="ltr">9.2. Phán quyết của Trọng tài kinh tế Hà Nội cuối cùng, bên thua kiện sẽ chịu án phí.</p>
                                <p dir="ltr" class="text-bold">Điều 10. Điều khoản thi hành:</p>
                                <ul>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Tất cả các thông báo đặt hàng theo quy định của Hợp Đồng này đều phải được lập thành văn bản và phải được gửi đến trụ sở chính của bên A.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Nếu có bất kì sửa đổi bổ sung nào phải được sự nhất trí của cả 2 Bên thì sẽ được ghi trong phụ lục hợp đồng hoặc Biên bản làm việc, có chữ kí của hai bên thì đây cũng được coi là một phần không thể tách rời của hợp đồng này.</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Nếu bất cứ điều khoản nào trong Hợp Đồng này không có hiệu lực thi hành vì bất kỳ lý do nào, thì giá trị pháp lý của những điều khoản còn lại sẽ không bị ảnh hưởng. “Bất khả kháng” theo quy định của pháp luật các bên sẽ không chịu phạt. Khi xảy ra sự kiện bất khả kháng, hai Bên sẽ trao đổi với nhau để tìm giải pháp hợp lý và sẽ cố gắng một cách hợp lý nhằm giảm thiểu hậu quả của sự kiện bất khả kháng</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Hai bên ký hợp đồng dựa trên tinh thần tự nguyện, không ép buộc, hoàn toàn tỉnh táo và có đầy đủ năng lực hành vi dân sự theo quy định của pháp luật.</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Hợp đồng này gồm 06 trang và được lập thành 02 bản, mỗi bên giữ 01 bản và có giá trị pháp lý như nhau</p>
                                    </li>
                                </ul>
                                <div style="margin-bottom: 25px;"> <img src="/Content/Image/196161.png" width="50" style=" position: absolute; transform: rotate(100deg);"> <i style=" margin-left: 50px;">Vui lòng nhấn vào đây để đồng ý</i> </div>
                                <p>
                                    <label>
                                        <input type="checkbox" class="checkPolicy2" style="width:20px; height:20px;"> &nbsp;Tôi đã đọc, hiểu và đồng ý với các điều khoản mua hàng của công ty. </label>
                                    <br> </p>
                                <div style="text-align:center"> <a href="javascript:void(0)" data-dismiss="modal" class="btn btn-sm btn-danger">Đã hiểu</a> </div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <style type="text/css">
                    .divPolicy p {
                        text-align: justify;
                        line-height: 30px;
                    }
                </style>
                <script>
                    function goBackOrder() {
                        if(confirm('Bạn chắc chắn muốn quay lại chọn sản phẩm khác ?')) {
                            window.location.href = '/user/agent/reset-agent';
                            return false;
                        }
                        return false;
                    }
                </script>
{{--                <script type="text/javascript">--}}
{{--                    window.onload = function() {--}}
{{--                        getBalance('transfer');--}}
{{--                        var tt = $('#lblTotal').text();--}}
{{--                        if(tt == '200,000,000') $('#lbPolicy').removeClass('d-none');--}}
{{--                        //$('#ddlCity').change(getLocation2('district', $('#ddlCity').val(), true));--}}
{{--                    }--}}
{{--                    $('.checkPolicy1').on('click', function() {--}}
{{--                        var c = $('.checkPolicy1').prop('checked');--}}
{{--                        $('.checkPolicy2').prop('checked', c);--}}
{{--                    });--}}
{{--                    $('.checkPolicy2').on('click', function() {--}}
{{--                        var c = $('.checkPolicy2').prop('checked');--}}
{{--                        $('.checkPolicy1').prop('checked', c);--}}
{{--                    });--}}
{{--                    $(document).on('change', '.selectLocation', function() {--}}
{{--                        var type = $(this).attr('type');--}}
{{--                        var id = $(this).val();--}}
{{--                        getLocation2(type, id, true);--}}
{{--                    });--}}
{{--                    $(document).on('change', '#dlShipType', function() {--}}
{{--                        var id = $(this).val();--}}
{{--                        if(id == '2') {--}}
{{--                            $('#dlArea').val('0');--}}
{{--                            $('#ddlWarehouse').val('0');--}}
{{--                            $('#dlArea').prop('disabled', false);--}}
{{--                            $('#ddlWarehouse').prop('disabled', false);--}}
{{--                        } else {--}}
{{--                            $('#dlArea').val('0');--}}
{{--                            $('#ddlWarehouse').val('0');--}}
{{--                            $('#dlArea').prop('disabled', true);--}}
{{--                            $('#ddlWarehouse').prop('disabled', true);--}}
{{--                        }--}}
{{--                    });--}}

{{--                    function checkPolicy() {--}}
{{--                        var name = $('#txtName').val();--}}
{{--                        if(name == '') {--}}
{{--                            alert('Nhập họ tên người nhận hàng');--}}
{{--                            return false;--}}
{{--                        }--}}
{{--                        var phone = $('#txtMobile').val();--}}
{{--                        if(phone == '' || phone.length != 10) {--}}
{{--                            alert('Nhập số điện thoại người nhận hàng hợp lệ');--}}
{{--                            return false;--}}
{{--                        } else {--}}
{{--                            var ok = false;--}}
{{--                            if(/(84|0[3|5|7|8|9])+([0-9]{8})\b/.test(phone)) {--}}
{{--                                ok = true;--}}
{{--                            }--}}
{{--                            if(ok == false) {--}}
{{--                                alert('Nhập số điện thoại hợp lệ');--}}
{{--                                return false;--}}
{{--                            }--}}
{{--                        }--}}
{{--                        var city = $('#ddlCity').val();--}}
{{--                        if(city == '') {--}}
{{--                            alert('Chọn tỉnh, thành phố nhận hàng');--}}
{{--                            return false;--}}
{{--                        }--}}
{{--                        var district = $('#ddlDistrict').val();--}}
{{--                        if(district == '') {--}}
{{--                            alert('Chọn quận huyện nhận hàng');--}}
{{--                            return false;--}}
{{--                        }--}}
{{--                        var commune = $('#ddlCommune').val();--}}
{{--                        if(commune == '') {--}}
{{--                            alert('Chọn xã phường nhận hàng');--}}
{{--                            return false;--}}
{{--                        }--}}
{{--                        var ship = $('#dlShipType').val();--}}
{{--                        if(ship == '0') {--}}
{{--                            alert('Chọn hình thức nhận hàng');--}}
{{--                            return false;--}}
{{--                        }--}}
{{--                        var tt = $('#lblTotal').text();--}}
{{--                        var c1 = $('.checkPolicy1').prop('checked');--}}
{{--                        var c2 = $('.checkPolicy1').prop('checked');--}}
{{--                        if(c1 == false || c2 == false) {--}}
{{--                            alert('Trước khi đặt đơn hàng, bạn phải đồng ý với chính sách và điều khoản mua hàng của công ty !');--}}
{{--                            showPolicy();--}}
{{--                            return false;--}}
{{--                        } else return true;--}}
{{--                    }--}}

{{--                    function showContract() {--}}
{{--                        $('#mdContract').modal('show');--}}
{{--                    }--}}

{{--                    function showPolicy() {--}}
{{--                        $('#mdPolicy').modal('show');--}}
{{--                    }--}}

{{--                    function goBackOrder() {--}}
{{--                        if(confirm('Bạn chắc chắn muốn quay lại chọn sản phẩm khác ?')) {--}}
{{--                            window.location.href = '/package';--}}
{{--                            return false;--}}
{{--                        }--}}
{{--                        return false;--}}
{{--                    }--}}

{{--                    function changeProvince() {--}}
{{--                        $('#ddlCommune option').remove();--}}
{{--                        $('#ddlCommune').append('<option>Vui lòng chọn</option>');--}}
{{--                    }--}}

{{--                    function getLocation2(type, id, auto = false) {--}}
{{--                        if(type == 'district') {--}}
{{--                            $('#ddlCommune option').remove();--}}
{{--                            $('#ddlCommune').append('<option>Vui lòng chọn</option>');--}}
{{--                        }--}}
{{--                        if(id != '') {--}}
{{--                            $.ajax({--}}
{{--                                url: '/cart/GetLocation',--}}
{{--                                data: {--}}
{{--                                    type: type,--}}
{{--                                    id: id--}}
{{--                                },--}}
{{--                                type: 'POST',--}}
{{--                                success: function(data) {--}}
{{--                                    var html = '<option value="">Vui lòng chọn</option>';--}}
{{--                                    var _selected = '';--}}
{{--                                    for(var i = 0; i < data.length; i++) {--}}
{{--                                        if(type == 'district') {--}}
{{--                                            if($('#ddlDistrict').attr('data-selected') == data[i].Id) _selected = "selected";--}}
{{--                                            else _selected = '';--}}
{{--                                        } else if(type == 'commune') {--}}
{{--                                            if($('#ddlCommune').attr('data-selected') == data[i].Id) _selected = "selected";--}}
{{--                                            else _selected = '';--}}
{{--                                        }--}}
{{--                                        html += '<option ' + _selected + ' value="' + data[i].Id + '">' + data[i].Name + '</option>'--}}
{{--                                    }--}}
{{--                                    if(type == 'district') {--}}
{{--                                        $('[name="txtDistrict"]').html(html);--}}
{{--                                        if(auto == true) getLocation2('commune', $('#ddlDistrict').val());--}}
{{--                                    } else if(type == 'commune') {--}}
{{--                                        $('[name="txtCommune"]').html(html);--}}
{{--                                    }--}}
{{--                                }--}}
{{--                            });--}}
{{--                        }--}}
{{--                    }--}}
{{--                </script>--}}
{{--                <script src="/Scripts/checkout.js?ver=0.1"></script>--}}
            </div>
        </section>
    </section>
@endsection
@push('scripts')
    <script>
    </script>
@endpush
