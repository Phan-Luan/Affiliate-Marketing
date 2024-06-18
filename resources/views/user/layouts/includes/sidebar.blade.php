<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-sidebar"
    style="background-image: url({{ asset('customer/sidebar.jpg') }});
background-size:cover; position: fixed;
top: 0;
left:0;">
    <!-- Brand Logo -->
    <a href="{{ route('us.index') }}" class="brand-link img-logo">
        <img src="{{ asset('web/images/logo.png') }}" alt="TTTN Logo" class=" ">
    </a>
    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"
        style="height: calc(100vh - (3.5rem + 1px));overflow: auto !important;">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 696px;"></div>
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ route('us.index') }}"
                                    class="nav-link {{ request()->is('user') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Bảng Điều Khiển</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('us.activeuser') }}" class="nav-link">
                                    <i class="nav-icon fas fa-lock-open"></i>
                                    <p>Kích Hoạt ID</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('us.product.home') }}"
                                    class="nav-link {{ request()->is('user/san-pham*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>Mua Sản Phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('us.order.index') }}"
                                    class="nav-link {{ request()->is('user/don-hang') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>Đơn Hàng Cá Nhân</p>
                                </a>
                            </li>
                            @if (users()->user()->order()->where('pro_type', 4)->where('status', 1)->count() > 0)                                <li class="nav-item">
                                    <a href="{{ route('us.product.index') }}"
                                        class="nav-link {{ request()->is('user/san=pham') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>Quản Lí Bán Hàng</p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('us.womenfund') }}"
                                    class="nav-link {{ request()->is('user/quy-phu-nu-khoi-nghiep') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-female"></i>
                                    <p style="font-size: 15px">Quỹ Phụ Nữ Khởi Nghiệp</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('us.womenfund') }}" class="nav-link d-flex">
                                    <i class="m-2 nav-icon fas fa-female" style="font-size: 1.5rem;"></i>
                                    <p>Quỹ Phụ Nữ</p>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('us.manufacture') }}" class="nav-link">
                                    <i class="nav-icon fas fa-industry"></i>
                                    <p>Quỹ Đầu Tư Sản Xuất</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('us.loansolutions') }}" class="nav-link ">
                                    <i class="nav-icon fas fa-money-bill"></i>
                                    <p>Giải Pháp Vay Vốn</p>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ request()->is(['user/buy-point', 'user/tranfer', 'user/history-transaction', 'user/withdraw']) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->is(['user/buy-point', 'user/tranfer', 'user/history-transaction', 'user/withdraw']) ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-exchange-alt"></i>
                                    <p>Thông Tin Giao Dịch <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    {{--                          <li class="nav-item"> --}}
                                    {{--                              <a href="{{route('us.payment.buypoint')}}" class="nav-link {{request()->is('user/buy-point') ? 'active' : ''}}"> <i class="far fa-circle nav-icon"></i> --}}
                                    {{--                                  <p>Mua điểm Voucher</p> --}}
                                    {{--                              </a> --}}
                                    {{--                          </li> --}}
                                    <li class="nav-item">
                                        <a href="{{ route('us.payment.withdraw') }}"
                                            class="nav-link {{ request()->is('user/withdraw') ? 'active' : '' }}"> <i
                                                class="far fa-circle nav-icon"></i>
                                            <p>Rút Tiền</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('us.payment.tranfer') }}"
                                            class="nav-link {{ request()->is('user/tranfer') ? 'active' : '' }}"> <i
                                                class="far fa-circle nav-icon"></i>
                                            <p>Chuyển nội bộ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('us.payment.history_transaction') }}"
                                            class="nav-link {{ request()->is('user/history-transaction') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Lịch sử giao dịch</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="nav-item {{ request()->is(['user/profile', 'user/profile-bank', 'user/change-password']) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->is(['user/profile', 'user/bank', 'user/change-password']) ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>Thông Tin Cá nhân <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('us.account.profile') }}"
                                            class="nav-link {{ request()->is('user/profile') ? 'active' : '' }}"> <i
                                                class="far fa-circle nav-icon"></i>
                                            <p>Thông tin cá nhân</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('us.account.bank') }}"
                                            class="nav-link {{ request()->is('user/profile-bank') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tài khoản ngân hàng</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('us.account.changepassword') }}"
                                            class="nav-link {{ request()->is('user/change-password') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Đổi mật khẩu</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ asset('web/giayphepdangkykinhdoanh.pdf') }}" class="nav-link">
                                    <i class="nav-icon fas fa-user-alt"></i>
                                    <p>Thông Tin Pháp Lý</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ asset('web/giayphepdangkykinhdoanh2.pdf') }}" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>Tổng Quan</p>

                                </a>
                            </li>




                            {{--                  <li class="nav-item"> --}}
                            {{--                      <a href="{{ route('us.account.agent') }}" class="nav-link {{request()->is(['user/chon-goi-dai-ly','user/agent*']) ? 'active' : ''}}"> --}}
                            {{--                          <i class="nav-icon fas fa-link"></i> --}}
                            {{--                          <p>Chọn gói đại lý</p> --}}
                            {{--                      </a> --}}
                            {{--                  </li> --}}

                            <li class="nav-item">
                                <a href="{{ route('us.logout') }}" class="nav-link">
                                    <i class="nav-icon fa fa-sign-out-alt"></i>
                                    <p>Đăng xuất</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="tel:0847694678" class="nav-link">
                                    <i class="nav-icon fa fa-phone"></i>
                                    <p>Hotline: 0847 694 678</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://zalo.me/0847694678" class="nav-link">
                                    <i class="nav-icon fa fa-info"></i>
                                    <p>Zalo hỗ trợ</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 97.0752%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
    <!-- /.sidebar -->
</aside>

<style>
    i {
        color: #fff;
    }

    .nav-sidebar .nav-item>.nav-link {
        margin-bottom: 0;
    }

    .mb-2,
    {
    margin-bottom: 0 !important;
    }

    .mt-2,
    {
    margin-top: 0;
    }

    .mt-2 {
        margin-top: 1em !important;
    }

    @media screen and (max-width: 992px) {
        .text-hehe p {
            font-size: 12px
        }

        .nav-sidebar .nav-item>.nav-link {
            margin-bottom: 0 !important
        }
    }
</style>
