<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <img class="w-75" style="max-height: 90%" src="{{ asset('web/images/logo.png') }}" alt="">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is(['admin']) ? 'active' : '' }}">
            <a href="{{ route('ad.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        {{--        <li class="menu-header small text-uppercase "> --}}
        {{--            <span class="menu-header-text">Tư vấn</span> --}}
        {{--        </li> --}}
        {{--        <!-- Tư vấn --> --}}
        {{--        <li class="menu-item {{ request()->is(['net5s/contact']) ? 'active' : '' }}"> --}}
        {{--            <a href="{{route('ad.contact.index')}}" class="menu-link"> --}}
        {{--                <i class="menu-icon tf-icons bx bxs-contact"></i> --}}
        {{--                <div data-i18n="Analytics">Tư vấn</div> --}}
        {{--            </a> --}}
        {{--        </li> --}}

        <!-- Sản phẩm -->

        <li class="menu-header small text-uppercase ">
            <span class="menu-header-text">Sản phẩm</span>
        </li>
        <li class="menu-item {{ request()->is(['net5s/productcategory*', 'net5s/product*']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxl-product-hunt"></i>
                <div data-i18n="Account Settings">Quản lý sản phẩm</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is(['net5s/productcategory*']) ? 'active' : '' }}">
                    <a href="{{ route('ad.productcategory.index') }}" class="menu-link">
                        <div data-i18n="Account">Danh mục sản phẩm</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is(['net5s/product*']) ? 'active' : '' }}">
                    <a href="{{ route('ad.product.index') }}" class="menu-link">
                        <div data-i18n="Account">Sản phẩm</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Thành viên -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Đơn hàng</span></li>
        <li class="menu-item {{ request()->is(['net5s/order']) && request()->pro_type == 0 ? 'active' : '' }}">
            <a href="{{ route('ad.order.index', ['pro_type' => 0]) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Support">Quản lý đơn hàng sản phẩm</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is(['net5s/order-refund*']) && request()->refund == 1 ? 'active' : '' }}">
            <a href="{{ route('ad.order.order_refund', ['refund' => 1]) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Support">Đơn hàng đã hoàn</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is(['net5s/order-refund*']) && request()->refund == 2 ? 'active' : '' }}">
            <a href="{{ route('ad.order.order_refund', ['refund' => 2]) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Support">Đơn hàng chưa hoàn</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is(['net5s/order*']) && request()->pro_type == 1 ? 'active' : '' }}">
            <a href="{{ route('ad.order.index', ['pro_type' => 1]) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Support">Quản lý phí thành viên</div>
            </a>
        </li>
        </li>
        <li class="menu-item {{ request()->is(['net5s/order*']) && request()->pro_type == 4 ? 'active' : '' }}">
            <a href="{{ route('ad.order.index', ['pro_type' => 4]) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Support">Quản lý phí NSX, KD</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is(['net5s/order*']) && request()->pro_type == 2 ? 'active' : '' }}">
            <a href="{{ route('ad.order.index', ['pro_type' => 2]) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Support">Quản lý thành viên kết nối</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is(['net5s/order*']) && request()->pro_type == 3 ? 'active' : '' }}">
            <a href="{{ route('ad.order.index', ['pro_type' => 3]) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Support">Quản lý điểm đại diện</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is(['net5s/order*']) && request()->pro_type == 5 ? 'active' : '' }}">
            <a href="{{ route('ad.order.index', ['pro_type' => 5]) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Support">Quản lý quỹ phụ nữ</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('net5s/order*') && request()->pro_type == 60 ? 'active' : '' }}">
            <a href="{{ route('ad.order.index', ['pro_type' => 60]) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Support">Quỹ Sản Xuất/Kinh Doanh</div>
            </a>
            <ul>
                @php
                    $proTypeNames = [
                        60 => 'Hóa dược, mỹ phẩm',
                        61 => 'Hàng tiêu dùng',
                        62 => 'Sữa hạt cân bằng dinh dưỡng',
                        63 => 'Bữa ăn dinh dưỡng cân bằng tế bào giàu Protenin hữu cơ',
                        64 => 'Nước ion kiềm lượng tử giàu Hydrogen',
                        65 => 'Trà phố nhĩ Smie Tea',
                        66 => 'Trà Quan âm dưỡng nhan',
                        67 => 'Thông kinh lạc Smile',
                        68 => 'Thông mạch',
                        69 => 'Sản phẩm công nghệ',
                    ];
                @endphp
                @foreach ($proTypeNames as $key => $value)
                    <li
                        class="menu-item {{ request()->is('net5s/order*') && request()->pro_type == $key ? 'active' : '' }}">
                        <a href="{{ route('ad.order.index', ['pro_type' => $key]) }}" class="menu-link">
                            <div data-i18n="Support">{{ $value }}</div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>



        <!-- Giao dịch -->

        <li class="menu-header small text-uppercase ">
            <span class="menu-header-text">Giao dịch</span>
        </li>
        <li
            class="menu-item {{ request()->is(['net5s/withdraw*', 'net5s/buy-point*', 'net5s/transaction*']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-bank"></i>
                <div data-i18n="Account Settings">Quản lý giao dịch</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is(['net5s/withdraw*']) ? 'active' : '' }}">
                    <a href="{{ route('ad.payment.withdraw') }}" class="menu-link">
                        <div data-i18n="Account">Rút tiền</div>
                    </a>
                </li>
                {{--                <li class="menu-item {{ request()->is(['net5s/buy-point*']) ? 'active' : '' }}"> --}}
                {{--                    <a href="{{route('ad.payment.buy_point')}}" class="menu-link"> --}}
                {{--                        <div data-i18n="Account">Mua điểm Voucher</div> --}}
                {{--                    </a> --}}
                {{--                </li> --}}
                <li class="menu-item {{ request()->is(['net5s/transaction*']) ? 'active' : '' }}">
                    <a href="{{ route('ad.payment.transaction') }}" class="menu-link">
                        <div data-i18n="Notifications">Lịch sử giao dịch</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Nội dung -->

        <li class="menu-header small text-uppercase ">
            <span class="menu-header-text">Nội dung</span>
        </li>
        <li
            class="menu-item {{ request()->is(['net5s/category*', 'net5s/blog*', 'net5s/cms*', 'net5s/video*']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxl-blogger"></i>
                <div data-i18n="Account Settings">Quản lý nội dung</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is(['net5s/category*']) ? 'active' : '' }}">
                    <a href="{{ route('ad.category.index') }}" class="menu-link">
                        <div data-i18n="Account">Danh mục</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is(['net5s/blog*']) ? 'active' : '' }}">
                    <a href="{{ route('ad.blog.index') }}" class="menu-link">
                        <div data-i18n="Notifications">Bài viết</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is(['net5s/banner*']) ? 'active' : '' }}">
                    <a href="{{ route('ad.banner.index') }}" class="menu-link">
                        <div data-i18n="Notifications">Banner</div>
                    </a>
                </li>
                {{--                <li class="menu-item {{ request()->is(['net5s/video*']) ? 'active' : '' }}"> --}}
                {{--                    <a href="{{route('ad.video.index')}}" class="menu-link"> --}}
                {{--                        <div data-i18n="Notifications">Video</div> --}}
                {{--                    </a> --}}
                {{--                </li> --}}
            </ul>
        </li>

        <!-- Thành viên -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Thành viên</span></li>
        <li class="menu-item {{ request()->is(['net5s/user*']) ? 'active' : '' }}">
            <a href="{{ route('ad.user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-circle"></i>
                <div data-i18n="Support">Quản lý thành viên</div>
            </a>
        </li>


        <!-- Quản lý hệ thống -->

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Quản lý hệ thống</span></li>
        <!-- User interface -->
        <li class="menu-item {{ request()->is(['net5s/slider*', 'net5s/config*']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div data-i18n="User interface">Quản lý hệ thống</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is(['net5s/config*']) ? 'active' : '' }}">
                    <a href="{{ route('ad.config.index') }}" class="menu-link">
                        <div data-i18n="Accordion">Cấu hình</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Admin -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin</span></li>
        <li class="menu-item {{ request()->is(['net5s/admin*']) ? 'active' : '' }}">
            <a href="{{ route('ad.admin.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-circle"></i>
                <div data-i18n="Support">Quản trị viên</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:dev();" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <div data-i18n="Documentation">Log Admin</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
