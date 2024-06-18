        <div class="col-md-4 col-sm-12">
            <div class="box-left">
                <div class="box-image">
                    <img src="{{ asset('web/images/default_avatar.jpg')}}" alt="">
                </div>
                <div class="user-account text-center my-4">
                    <h5 class="font-weight-bold ">{{ auth('user')->user()->name}}</h5>
                </div>
                <div class="menu-acount my-4">
                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link d-flex align-items-center justify-content-between {{ request()->is('customers/account') ? 'active' : '' }}"  href="{{route('us.account.index')}}" >
                            <div><i class="fa-solid fa-user"></i><span class="text-center">Tài Khoản</span></div>
                            <i class="fa-solid fa-chevron-right "></i>
                          </a>
                          {{-- <a class="nav-link  d-flex align-items-center justify-content-between {{ request()->is('customers/bank_wallet') ? 'active' : '' }}"  href="{{route('us.bank.bank_wallet_view')}}">
                            <div> <i class="fa-solid fa-wallet"></i></i><span>Chuyển ví</span></div>
                           <i class="fa-solid fa-chevron-right"></i>
                          </a> --}}
                          {{-- <a class="nav-link  d-flex align-items-center justify-content-between {{ request()->is('customers/bank/bank_out') ? 'active' : '' }}"  href="{{route('us.bank.bank_out')}}">
                            <div> <i class="fa-solid fa-money-bill-transfer"></i></i><span>Chuyển khoản</span></div>
                           <i class="fa-solid fa-chevron-right"></i>
                          </a> --}}
                          <a class="nav-link d-flex align-items-center justify-content-between {{ request()->is('customers/bank') ? 'active' : '' }}"  href="{{route('us.bank.index')}}">
                            <div> <i class="fa-solid fa-money-check-dollar"></i></i><span>Tài khoản ngân hàng</span></div>
                           <i class="fa-solid fa-chevron-right"></i>
                          </a>
                        {{-- <a class="nav-link d-flex align-items-center justify-content-between {{ request()->is('customers/payment-withdraw') ? 'active' : '' }}"  href="{{route('us.payment.withdraw')}}">
                            <div> <i class="fa-solid fa-money-check-dollar"></i></i><span>Rút tiền</span></div>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                        <a class="nav-link d-flex align-items-center justify-content-between {{ request()->is('customers/history-withdraw') ? 'active' : '' }}"  href="{{route('us.payment.history_withdraw')}}">
                            <div> <i class="fa-solid fa-clock-rotate-left"></i><span>Lịch sử rút tiền</span></div>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a> --}}
                        {{-- <a class="nav-link d-flex align-items-center justify-content-between {{ request()->is('customers/history') ? 'active' : '' }}"  href="{{route('us.history')}}">
                            <div> <i class="fa-solid fa-clock"></i><span>Lịch sử giao dịch</span></div>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a> --}}
                        {{-- <a class="nav-link d-flex align-items-center justify-content-between {{ request()->is('customers/payment-history') ? 'active' : '' }}"  href="{{route('us.payment.history')}}">
                            <div> <i class="fa-solid fa-clock"></i><span>Lịch sử mua điểm</span></div>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
