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
                        <form class="card" method="post" action="{{ route('us.product.thanhtoan') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div id="divDetail" style="min-width: 100%; overflow-x: hidden;">
                                        <label>Thông tin sản phẩm</label>
                                        <table id="example1" class="table table-bordered table-striped"
                                            style="font-size: 14px;">
                                            <thead>
                                                <tr>
                                                    <th style="color:black !important;">Sản phẩm</th>
                                                    <th style="color:black !important;">Điểm Smile</th>
                                                    <th style="text-align: right;color:black !important;">Giá X SL = Thành
                                                        tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($carts['carts'] as $cart)
                                                    <tr>
                                                        <td>{{ $cart['name'] }}</td>
                                                        <td>{{ number_format($cart['point_buy']) ?? 0 }}</td>
                                                        <td style="text-align:right;color:blue;">
                                                            {{ number_format($cart['price']) }} x {{ $cart['qty'] }} =
                                                            {{ number_format($cart['price'] * $cart['qty']) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2" style="text-align: right; font-size:15px;"> Tổng
                                                        Điểm: <span id="lblTotal"
                                                            style="color:Blue;">{{ number_format($carts['total_point_buy']) }}</span>
                                                    </th>
                                                    <th colspan="1" style="text-align: right; font-size:15px;"> Tổng
                                                        tiền: <span id="lblTotal"
                                                            style="color:Blue;">{{ $carts['total'] }}</span> </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <h5>NGƯỜI NHẬN HÀNG</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Họ và tên người nhận (*)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"> <span class="input-group-text"><i
                                                                    class="fas fa-user"></i></span> </div>
                                                        <input name="name" type="text"
                                                            value="{{ users()->user()->name }}" id="name"
                                                            class="form-control" placeholder="Bắt buộc nhập" required=""
                                                            style="text-transform:uppercase;">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Điện thoại người nhận (*)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"> <span class="input-group-text"><i
                                                                    class="fas fa-phone"></i></span> </div>
                                                        <input name="phone" type="tel"
                                                            value="{{ users()->user()->phone }}" maxlength="10"
                                                            id="phone" class="form-control numbers" required=""
                                                            placeholder="Số điện thoại của bạn">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>ĐỊA CHỈ NHẬN HÀNG</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Địa chỉ (*)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"> <span class="input-group-text"><i
                                                                    class="fas fa-map-marked-alt"></i></span> </div>
                                                        <input name="address" type="text"
                                                            value="{{ users()->user()->address }}" id="address"
                                                            class="form-control numbers" required=""
                                                            placeholder="Địa chỉ nhận hàng">
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
                                                        <div class="input-group-prepend"> <span class="input-group-text"><i
                                                                    class="fas fa-map-marked-alt"></i></span> </div>
                                                        <select name="ShipType" id="dlShipType" class="form-control"
                                                            required="">
                                                            {{--                                                            <option value="0">Chọn hình thức nhận hàng</option> --}}
                                                            <option value="1">Nhận hàng tại công ty</option>
                                                            <option value="2">Nhận hàng tại nhà</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label>Ghi chú đơn hàng (Nếu có)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"> <span class="input-group-text"><i
                                                                    class="fas fa-comments"></i></span> </div>
                                                        <input name="txtNote" type="text" id="txtNote"
                                                            class="form-control" placeholder="Ghi chú cho đơn hàng nếu có">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>PHƯƠNG THỨC THANH TOÁN</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input name="payment_method" class="type_payment"
                                                            style="margin-right: 10px" type="radio" value="1"
                                                            checked> Tiền mặt
                                                    </div>
                                                    <div class="input-group">
                                                        <input name="payment_method" class="type_payment"
                                                            style="margin-right: 10px" type="radio" value="2">
                                                        Chuyển khoản
                                                    </div>
                                                    <div class="form-group d-none" id="image_payment">

                                                    </div>
                                                    {{-- <div class="input-group">
                                                        <input name="payment_method" class="type_payment"
                                                            style="margin-right: 10px" type="radio" value="3">
                                                        Điểm
                                                        tiêu dùng
                                                        ({{ number_format(users()->user()->use_point) }} VND)
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row" style="margin: 0px !important;">
                                                <div class="col-md-12">
                                                    <div class="mt-2" style="text-align:justify;">
                                                        <div>Lưu ý:
                                                            <br>- Mọi thông tin đặt đơn hàng phải chính xác để công ty giao
                                                            hàng, nếu sai thông tin công ty không chịu trách nhiệm về tình
                                                            trạng giao hàng trễ.
                                                        </div>
                                                        <div>- Chúng tôi là đơn vị kết nối nhà sản xuất, kinh doanh sản phẩm
                                                            đến nhười tiêu dùng. phần pháp lý và chất lượng của sản phẩm
                                                            thuộc trách nhiệm của nhà sản xuất, kinh doanh.</div>
                                                        <div>- Số điện thoại phải là số của người nhận hàng để công ty hoặc
                                                            kho giao hàng liên hệ được để xác nhận đơn.</div>
                                                        <div>- Nhận hàng tại công ty: Quý khách sẽ lên văn phòng tại các cơ
                                                            sở của công ty để nhận hàng trực tiếp.</div>
                                                        <div class="d-none"> - Nhận hàng tại kho: Quý khách sẽ đến kho đã
                                                            chọn để nhận hàng trực tiếp. </div>
                                                        <div> - Nhận hàng tại nhà: Hàng sẽ được gửi về địa chỉ nhận hàng của
                                                            Quý khách, công ty hoặc kho gần nhất sẽ vận chuyển đơn hàng tới
                                                            Quý khách. </div>
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
                                            <input type="button" name="ctl27$btnBack" value="Chọn lại"
                                                onclick="return goBackOrder()" id="btnBack"
                                                class="btn btn-block bg-background col-md-2"
                                                style="float: left; margin-bottom: 10px; margin-right: 5px; font-size: 20px;color: white; font-weight: bold;">
                                            <label>
                                                <input type="checkbox" class="checkPolicy1"
                                                    style="width:20px; height:20px;"> &nbsp;Tôi đã đọc, hiểu và đồng ý với
                                                các điều khoản mua hàng của công ty. </label>
                                            <label id="lbPolicy" style="cursor:pointer; color: purple">Xem điều khoản
                                                &amp; chính sách mua hàng</label>
                                            <button type="submit" class="btn btn-block bg-background col-md-2"
                                                style="font-weight:bold;float: right; color:white; font-size:20px; margin-top: 0px !important;">Xác
                                                nhận mua hàng</button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="warehouseName" id="warehouseId" value="">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal" id="mdPolicy" tabindex="-1" data-backdrop="static" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true"
                    style="z-index: 99999999; padding-right: 0px !important;">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="width:100%;">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">
                                    Chính sách &amp; điều khoản
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                        aria-hidden="true">×</span> </button>
                            </div>
                            <div class="modal-body divPolicy">
                                <h4 style="text-align: center;">HỢP ĐỒNG ĐẠI LÝ PHÂN PHỐI<br>Số: ............2023/HĐPP/TTTN
                                </h4>
                                <ul>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Căn cứ vào Bộ luật dân sự và Luật Thương mại
                                            hiện hành và các văn bản hướng dẫn ban hành;</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Căn cứ theo nhu cầu và khả năng thực tế của
                                            hai bên.</p>
                                    </li>
                                </ul>
                                <p dir="ltr">Hôm nay, ngày 26 tháng 12 năm 2023 tại LK16-1 Ngô Thì Nhậm - Phường La
                                    Khê, Quận Hà Đông,&nbsp; TP.Hà Nội &nbsp;Chúng tôi gồm :</p>
                                <p dir="ltr" class="text-bold">BÊN BÁN ( BÊN A ):&nbsp; CÔNG TY CỔ PHẦN THƯƠNG MẠI
                                    TRÍ TUỆ TỰ NHIÊN</p>
                                <p dir="ltr">Địa chỉ: LK16 -1 Ngô Thì Nhậm - Phường La Khê - Quận Hà Đông - TP. Hà Nội
                                </p>
                                <p dir="ltr">Mã số thuế: 0109934914, cấp ngày 17/03/2022</p>
                                <p dir="ltr" class="text-bold">Đại diện: Bà TÔ THỊ THỦY</p>
                                <p dir="ltr">Chức vụ:&nbsp; Tổng giám đốc - Điện thoại: 08 999 888 48</p>
                                <p dir="ltr">Tài khoản giao dịch: 2681693951 (User name tài khoản ngân hàng:
                                    trituetunhien).</p>
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
                                <p dir="ltr">Sau khi thỏa thuận, Hai Bên thống nhất ký Hợp đồng Đại lý phân phối với
                                    điều khoản sau:</p>
                                <p dir="ltr" class="text-bold">Điều 1. Các điều khoản chung:</p>
                                <ol>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Hai bên cùng có quan hệ mua bán với nhau
                                            theo quan hệ mua bán hàng trên cơ sở hai bên cùng hợp tác;</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Trong khuôn khổ Hợp đồng này, hai bên sẽ ký
                                            tiếp các phụ lục Hợp đồng phân phối hoặc Đơn đặt hàng (bằng văn bản, điện thoại
                                            và thư điện tử) đối với từng đơn hàng cụ thể: chi tiết hàng hóa, số lượng, giá
                                            cả, thời gian giao hàng, phương thức thanh toán và các điều khoản khác đã được
                                            ghi rõ trong Phụ lục Hợp đồng phân phối hoặc Đơn đặt hàng tương ứng.</p>
                                    </li>
                                </ol>
                                <p dir="ltr" class="text-bold">Điều 2. Hàng hóa:</p>
                                <p dir="ltr">2.1. Hàng hóa do Bên A cung cấp đảm bảo đúng chủng loại, tiêu chuẩn chất
                                    lượng và các thông số kỹ thuật của Hãng cấp hàng/Nhà sản xuất.</p>
                                <p dir="ltr">2.2. Chi tiết về hàng hóa sẽ được các bên chỉ rõ trong các đơn đặt hàng
                                    trong khuôn khổ của Hợp đồng này.</p>
                                <p dir="ltr" class="text-bold">Điều 3. Giao nhận hàng hóa:</p>
                                <p dir="ltr">3.1. Số lượng hàng hóa, địa điểm giao nhận được quy định trong các Đơn
                                    đặt hàng.</p>
                                <p dir="ltr">3.2. Hàng hóa có thể giao một lần hoặc nhiều lần tùy theo hai bên thỏa
                                    thuận.</p>
                                <p dir="ltr">3.3. Giao nhận sản phẩm.</p>
                                <ul>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Hai bên thực hiện giao dịch bằng Đơn đặt
                                            hàng do Bên B đặt hàng với Bên A.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Sau khi bên B hoàn thành tất cả các nghĩa vụ
                                            về tài chính thì bên A sẽ cung cấp hàng cho bên B.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Phụ thuộc vào nội dung bản Hợp đồng này, Bên
                                            B đồng ý với Bên A là không rút lại số tiền hàng đã đặt vì bất kỳ lý do gì khi
                                            Bên A đã đặt hàng với đối tác cung cấp.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Bên A chỉ giao hàng cho Bên B khi được xác
                                            nhận là Bên B đã đạt được thoả thuận thanh toán.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Bên A sẽ không chịu trách nhiệm đối với Bên
                                            B trong trường hợp giao hàng trễ do những nguyên nhân bất khả kháng theo quy
                                            định pháp luật.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Địa điểm giao hàng: Theo thỏa thuận với đơn
                                            hàng lớn hơn 50 triệu vnđ thì bên A chịu phí vận chuyển. Với đơn hàng nhỏ hơn 50
                                            triệu vnđ thì bên B chịu phí vận chuyển.</p>
                                    </li>
                                </ul>
                                <p dir="ltr" class="text-bold">Điều 4. Giá cả và phương thức thanh toán:</p>
                                <p dir="ltr">4.1. Đơn giá, tổng giá trị hàng hóa, thuế VAT sẽ được ghi cụ thể trong
                                    các đơn đặt hàng được ký kết bởi hai bên. Tỷ lệ chiết khấu sẽ được tính theo chính sách
                                    chung của Bên A cho từng thời điểm</p>
                                <p dir="ltr">4.2. Phương thức thanh toán:</p>
                                <p dir="ltr">- Thanh toán bằng tiền mặt hoặc chuyển khoản</p>
                                <p dir="ltr">- Thời hạn thanh toán: thanh toán 100% đơn hàng trước khi giao hàng.</p>
                                <p dir="ltr" class="text-bold">Điều 5. Quyền và nghĩa vụ của các Bên:</p>
                                <p dir="ltr">5.1. Bên bán:</p>
                                <p dir="ltr">5.1.1. Đảm bảo cung cấp hàng hóa đúng chủng loại, chất lượng và tiêu
                                    chuẩn kỹ thuật của Hãng cung cấp/Nhà sản xuất.</p>
                                <p dir="ltr">5.1.2. Bên A đào tạo cho Bên B các khóa đào tạo về phát triển bản thân,
                                    các khóa marketing, khoá tư vấn bán hàng, khoá chăm sóc khách hàng. Bên A hỗ trợ đào tạo
                                    cho bên B bởi các chuyên gia trong nước hoặc quốc tế về cách sử dụng sản phẩm và vận
                                    hành kinh doanh.</p>
                                <p dir="ltr">5.1.3. Đối với khách hàng của đối tác giới thiệu, bắt buộc khách hàng khi
                                    hợp tác kinh doanh cùng công ty sẽ phải là đại lý dưới của người đã giới thiệu mình đến
                                    công ty, thông tin khách hàng sẽ được bảo lưu trong 30 ngày, sau 30 ngày khách hàng có
                                    thể lựa chọn đối tác đại lý khác để kết hợp. Đối với khách hàng tự đi tìm hiểu thì khách
                                    hàng tự lựa chọn đối tác để làm việc.</p>
                                <p dir="ltr">5.1.4. Bên A có quyền kiểm tra, giám sát hoạt động của Bên B trên địa bàn
                                    mà Bên B hoạt động.</p>
                                <p dir="ltr">5.1.5. Bên A có quyền đơn phương chấm dứt hợp đồng với Bên B nếu Bên B
                                    không tuân thủ theo đúng các quy định về kinh doanh do Bên A đưa ra.</p>
                                <p dir="ltr">5.1.6. Bên A thực hiện đặt hàng đối với các nhà cung cấp sản phẩm của
                                    nước ngoài sau khi nhận được Đơn đặt hàng bằng văn bản của Bên B và đảm bảo sản phẩm
                                    cung cấp cho Bên B không quá 30 ngày.</p>
                                <p dir="ltr">5.1.7. Bên A sẽ tuân thủ chặt chẽ các quy định trong hợp đồng này, đáp
                                    ứng kịp thời yêu cầu của Bên B liên quan đến việc mua bán hàng.</p>
                                <p dir="ltr">5.1.8.Thực hiện đúng cam kết được ghi trong Hợp đồng.</p>
                                <p dir="ltr">5.2. Bên mua:</p>
                                <ul>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Được Bên A cung cấp sản phẩm đúng tiêu chuẩn
                                            của nhà sản xuất; được hỗ trợ khi mở địa điểm kinh doanh, hỗ trợ đào tạo, chuyển
                                            giao mô hình và được hưởng các chính sách, quyền lợi của bên B và chỉ được thực
                                            hiện với đại diện hợp pháp của bên B.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B có quyền phát triển Đại lý trên toàn
                                            quốc nếu xét thấy cá nhân hoặc đơn vị đó có đủ tiêu chuẩn với quy định của bên
                                            A. .</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B chịu hoàn toàn trách nhiệm về vận
                                            chuyển, trưng bày các sản phẩm, thực hiện đúng các quy định về vận hành, bảo
                                            quản, giữ được phẩm chất hàng hóa sản phẩm như Bên A cung cấp đến người tiêu
                                            dùng.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B tự chịu trách nhiệm về việc thực hiện,
                                            tuân thủ đầy đủ các quy định hiện hành về an toàn thực phẩm, PCCC, an ninh trật
                                            tự…</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B được Bên A hỗ trợ khi mở Đại lý và
                                            được hưởng các chính sách, quyền lợi của Đại lý. Theo tình hình thực tế, Bên A
                                            có quyền thay đổi các chính sách, quyền lợi của Đại lý để phù hợp với quyền lợi
                                            của 2 bên.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Thực hiện nghiêm túc các quy định, hướng dẫn
                                            của Bên A trong việc phục vụ, phân phối sản phẩm, chuyển giao, đào tạo, bảo quản
                                            sản phẩm…. theo tiêu chuẩn quy định của nhà sản xuất. Không tư vấn, kinh doanh
                                            các sản phẩm không phải của Bên A cung cấp hay ủy quyền; không quảng cáo sai sự
                                            thật về sản phẩm, mô hình kinh doanh của Bên A khi phân phối.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Thanh toán đầy đủ với Bên A sau khi đặt
                                            hàng; không trả lại hàng hoặc đưa ra yêu cầu hoàn lại tiền sau khi đã đặt hàng
                                            với Bên A trong mọi điều kiện.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B và người góp vốn cùng Bên B mở Đại lý
                                            không được tham gia tư vấn, góp vốn đầu tư mở đại lý hoặc chuỗi hệ thống phân
                                            phối cho các bên khác hoặc tương tự về sản phẩm hay mô hình của Bên A.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Mọi hoạt động quảng cáo do Bên B tự thực
                                            hiện nếu có sử dụng đến logo hay nhãn hiệu hàng hóa của Bên A phải được sự đồng
                                            ý của Bên A (bằng văn bản); không được khuếch trương, quảng cáo sai sự thật về
                                            sản phẩm hay mô hình của Bên A. Nội dung của việc quảng cáo, tờ rơi và cách thức
                                            bán hàng khác và tài liệu tiếp thị (“Tài liệu quảng cáo”) mà Bên B thực hiện
                                            phải được Bên A chấp thuận bằng văn bản trước khi thực hiện quảng cáo đến khách
                                            hàng hoặc phương tiện truyền thông.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Không được nhân danh là đại diện hoặc nhân
                                            viên Bên A trong việc trả lời các cơ quan Nhà nước hoặc cơ quan truyền thông
                                            (Trừ trường hợp có ủy quyền của Bên A).</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B không được phép bán phá giá hoặc lôi
                                            kéo người từ nhóm đại lý khác sang đại lý nhóm của mình và không được phép bán
                                            hàng chồng chéo sang nhóm đại lý khác, nếu phát hiện bên B sai phạm thì bên B sẽ
                                            bị phạt theo qui định của bên A và nghiêm trọng&nbsp; hơn thì bên A có quyền đơn
                                            phương chấm dứt hợp đồng mà không phải đền bù bất cứ chi phí nào cho bên B.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Bên B có trách nhiệm hỗ trợ, đào tạo chuyên
                                            môn, giúp bán hàng, lên kế hoạch làm việc,….. cho các cửa hàng thuộc đại lý của
                                            mình trong quá trình các cửa hàng của nhóm mình hoạt động.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">Thực hiện nghiêm chỉnh các quy định của Pháp
                                            luật Việt Nam về quản lý và lưu thông hàng hóa. Bên bán không chịu trách nhiệm
                                            về các hành vi, vi phạm pháp luật này của bên mua.</p>
                                    </li>
                                    <li dir="ltr" aria-level="3">
                                        <p dir="ltr" role="presentation">&nbsp;Giá bán lẻ quy định cho từng sản phẩm:
                                            Bên B bán đúng giá quy định cho từng sản phẩm theo thông báo của Bên A cho từng
                                            thời điểm cụ thể, Bên B không được bán thấp hoặc cao hơn giá bán lẻ quy định.
                                            Nếu vi phạm Bên A sẽ tạm ngừng cung cấp sản phẩm hoặc có quyền đơn phương chấm
                                            dứt Hợp Đồng này mà không phải bồi thường. Thực hiện đúng các cam kết được ghi
                                            trong Hợp đồng.</p>
                                    </li>
                                </ul>
                                <p dir="ltr" class="text-bold">Điều 6. Thuế và các khoản có tính chất thuế.</p>
                                <p dir="ltr">Các bên có trách nhiệm độc lập trong việc khai báo và nộp các loại thuế
                                    thuộc trách nhiệm của mình, bao gồm thuế giá trị gia tăng (VAT), thuế TNDN, thuế TNCN và
                                    các loại thuế hoặc phí khác liên quan hoặc phát sinh từ Hợp đồng với cơ quan thuế theo
                                    quy định của pháp luật.&nbsp;&nbsp;</p>
                                <p dir="ltr" class="text-bold">Điều 7. Tính bảo mật</p>
                                <p dir="ltr">7.1. Bên B phải bảo mật tất cả các thông tin liên quan đến kế hoạch bán
                                    sản phẩm, nghiên cứu thị trường, chiến dịch khuyến mãi, số liệu bán hàng, các hoạt động
                                    tiếp thị, số liệu kế toán thống kê, báo cáo, và các hoạt động khác có thể được quy định
                                    bởi Bên A trong từng thời điểm theo Hợp Đồng này (thông tin bảo mật). Bên B không được
                                    thực hiện các điều sau đây nếu không có sự đồng ý trước bằng văn bản của Bên A:&nbsp;
                                </p>
                                <p dir="ltr">7.2. Khai thác bất cứ phần nào của thông tin bảo mật.&nbsp;&nbsp;</p>
                                <p dir="ltr">7.3. Tiết lộ cho bên thứ ba hoặc bất cứ người nào về một phần hoặc toàn
                                    bộ các thông tin bảo mật, trừ các nhân viên của mình, những người cần biết các thông tin
                                    bảo mật để tiến hành nhiệm vụ tương ứng như quy định trong Hợp Đồng này.&nbsp;</p>
                                <p dir="ltr" class="text-bold">Điều 8: Hiệu lực và chấm dứt hợp đồng.&nbsp;</p>
                                <ul>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Hợp đồng này có hiệu lực kể từ ngày
                                            ký.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Hợp đồng này có hiệu lực trong vòng 12 tháng
                                            kể từ ngày Hợp đồng có hiệu lực.</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Hợp đồng này có quyền được thừa kế.</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Hợp Đồng này có thể chấm dứt trong các
                                            trường hợp sau đây:</p>
                                    </li>
                                </ul>
                                <ul>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Bên B mất năng lực hành vi dân sự.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Các trường hợp khác theo quy định của pháp
                                            luật.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Do tình huống bất khả kháng.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Các bên thương lượng ký hợp đồng phân phối
                                            mới và thanh lý hợp đồng này trước thời hạn.</p>
                                    </li>
                                    <li dir="ltr" aria-level="1">
                                        <p dir="ltr" role="presentation">Thời hạn hiệu lực của hợp đồng này đã hết,
                                            các bên đã hoàn thành tất cả các nghĩa vụ của mình liên quan đến hợp đồng và
                                            không có thỏa thuận nào khác về việc gia hạn Hợp Đồng.</p>
                                    </li>
                                </ul>
                                <ul start="5">
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Chấm dứt hợp đồng trước thời hạn:</p>
                                    </li>
                                </ul>
                                <ul>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Trong quá trình thực hiện hợp đồng, Bên A có
                                            quyền đơn phương chấm dứt hợp đồng nếu Bên B vi phạm những điều khoản đã ghi
                                            trong hợp đồng này và Bên A đã thông báo bằng văn bản cho Bên B, trong thời hạn
                                            15 ngày kể từ ngày Bên A thông báo mà Bên B không khắc phục. Để chấm dứt hợp
                                            đồng, Bên A phải thông báo bằng văn bản cho Bên B trước 07 ngày.</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Vì những lý do của mình, Bên B có quyền đơn
                                            phương chấm dứt hợp đồng nhưng phải báo trước bằng văn bản cho Bên A trước 15
                                            ngày. Trong trường hợp này Bên B không có quyền yêu cầu Bên A bồi thường bất cứ
                                            khoản tiền nào liênquan tới việc làm Đại lý của mình và phải bồi thường cho Bên
                                            A những tổn thất do việc đơn phương chấm dứt hợp đồng gây ra.</p>
                                    </li>
                                </ul>
                                <p dir="ltr">8.6. Hết thời hạn hợp đồng Bên A và bên B sẽ tiếp tục gia hạn hợp đồng
                                    bằng việc ký hợp đồng mới thay thế hợp đồng này.</p>
                                <p dir="ltr" class="text-bold">Điều 9: Cam kết chung:</p>
                                <p dir="ltr">9.1. Nếu có bất cứ tranh chấp nào phát sinh từ Hợp Đồng này hoặc trong
                                    quá trình thực hiện Hợp Đồng thì sẽ được các bên giải quyết trên tinh thần thiện chí,
                                    hợp tác. Nếu tranh chấp không thể giải quyết được thông qua hòa giải, thương lượng giữa
                                    các bên trong vòng 15 ngày kể từ khi bắt đầu thảo luận, thì tranh chấp đó có thể được
                                    một hoặc&nbsp; cả hai bên đưa ra giải quyết tại Trọng tài kinh tế Hà Nội nơi Bên A đặt
                                    trụ sở.</p>
                                <p dir="ltr">9.2. Phán quyết của Trọng tài kinh tế Hà Nội cuối cùng, bên thua kiện sẽ
                                    chịu án phí.</p>
                                <p dir="ltr" class="text-bold">Điều 10. Điều khoản thi hành:</p>
                                <ul>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Tất cả các thông báo đặt hàng theo quy định
                                            của Hợp Đồng này đều phải được lập thành văn bản và phải được gửi đến trụ sở
                                            chính của bên A.&nbsp;</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Nếu có bất kì sửa đổi bổ sung nào phải được
                                            sự nhất trí của cả 2 Bên thì sẽ được ghi trong phụ lục hợp đồng hoặc Biên bản
                                            làm việc, có chữ kí của hai bên thì đây cũng được coi là một phần không thể tách
                                            rời của hợp đồng này.</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Nếu bất cứ điều khoản nào trong Hợp Đồng này
                                            không có hiệu lực thi hành vì bất kỳ lý do nào, thì giá trị pháp lý của những
                                            điều khoản còn lại sẽ không bị ảnh hưởng. “Bất khả kháng” theo quy định của pháp
                                            luật các bên sẽ không chịu phạt. Khi xảy ra sự kiện bất khả kháng, hai Bên sẽ
                                            trao đổi với nhau để tìm giải pháp hợp lý và sẽ cố gắng một cách hợp lý nhằm
                                            giảm thiểu hậu quả của sự kiện bất khả kháng</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Hai bên ký hợp đồng dựa trên tinh thần tự
                                            nguyện, không ép buộc, hoàn toàn tỉnh táo và có đầy đủ năng lực hành vi dân sự
                                            theo quy định của pháp luật.</p>
                                    </li>
                                    <li dir="ltr" aria-level="2">
                                        <p dir="ltr" role="presentation">Hợp đồng này gồm 06 trang và được lập thành
                                            02 bản, mỗi bên giữ 01 bản và có giá trị pháp lý như nhau</p>
                                    </li>
                                </ul>
                                <div style="margin-bottom: 25px;"> <img src="/Content/Image/196161.png" width="50"
                                        style=" position: absolute; transform: rotate(100deg);"> <i
                                        style=" margin-left: 50px;">Vui lòng nhấn vào đây để đồng ý</i> </div>
                                <p>
                                    <label>
                                        <input type="checkbox" class="checkPolicy2" style="width:20px; height:20px;">
                                        &nbsp;Tôi đã đọc, hiểu và đồng ý với các điều khoản mua hàng của công ty. </label>
                                    <br>
                                </p>
                                <div style="text-align:center"> <a href="javascript:void(0)" data-dismiss="modal"
                                        class="btn btn-sm btn-danger">Đã hiểu</a> </div>
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
                        if (confirm('Bạn chắc chắn muốn quay lại chọn sản phẩm khác ?')) {
                            window.location.href = '/user/san-pham-reset';
                            return false;
                        }
                        return false;
                    }
                </script>
            </div>
        </section>
    </section>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
            paymentRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const image = document.getElementById('image_payment');
                    image.innerHTML = '';
                    image_payment.classList.add('d-none');
                    if (this.value == '2') {
                        const image_payment = document.getElementById('image_payment');
                        image_payment.classList.remove('d-none');

                        const moneyWithCommas = document.getElementById('lblTotal').innerText
                            .trim();
                        const money = moneyWithCommas.replace(/,/g, '');
                        image.innerHTML = `<div>
                                                <label for="">Tải ảnh chuyển khoản của bạn</label>
                                                <input class="form-control" name="bill" style="margin-right: 10px" type="file" accept="image/*">
                                            </div>`;
                        Swal.fire({
                            title: 'Thông tin giao dịch',
                            html: `
                            <table class="table table-bill-seen">
                                <thead>
                                    <tr>
                                        <th style="min-width:120px">Ngân hàng</th>
                                        <th class="text-right"><b>TECHCOMBANK</b></th>
                                    </tr>
                                    <tr>
                                        <th>Chủ tài khoản</th>
                                        <th class="text-right"><b>LÒ THỊ THANH THƠM</b></th>
                                    </tr>
                                    <tr style="color: red;">
                                        <th>Số tài khoản</th>
                                        <th class="text-right"><b id="lbAccountNumber">19031066030011</b></th>
                                    </tr>
                                    <tr style="color: red;">
                                        <th>Số tiền</th>
                                        <th class="text-right"><b id="lbAccountMoney">{{ $carts['total'] }} VND</b></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-danger">
                                            <p class="text-dark">Nội dung chuyển khoản:</p>
                                            <b>{{ users()->user()->phone }} thanh toan don hang</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <div class="text-center mt-2">
                                            <div class="mt-1" id="qrcode"
                                                style="padding: 10px; border: 3px solid #07256aab; border-radius: 10px; ">
                                                <img style="width:100%" src="https://img.vietqr.io/image/970407-19031066030011-compact2.png?amount=${money}
                &addInfo={{ users()->user()->phone }} thanh toan don hang&accountName=LO THI THANH THOM" alt="">
                                            </div>
                                        </div>
                                    </div>    
                                    </tr>
                                </thead>
                            </table>
                        `,
                            icon: 'info',
                            confirmButtonText: 'Đóng'
                        });
                    }
                });
            });
        });
    </script>
@endpush
