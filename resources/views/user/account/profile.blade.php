@extends('user.layouts.master')
@section('page_title', 'Trang tài khoản')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title ">
                                    <i class="fa fa-user-circle"></i>
                                    Thông tin cá nhân
                                </h4> </div>
                            <div class="card-body">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success">KẾT NỐI PHỤ NỮ</div>
                                </div>
                                <form class="row" method="post" action="{{route('us.account.profile_update')}}">
                                    @csrf
                                    <div class="col-md-12">
                                        <h5>THÔNG TIN QUẢN LÝ</h5>
                                        <div class="form-group">
                                            <label>Đại lý bảo trợ</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                                                <input type="text" value="{{users()->user()->invite_user ? users()->user()->invite(users()->user()->invite_user)->name : ''}}" readonly="readonly" id="ctl27_txtPID" class="form-control"> </div>
                                        </div>
                                        <h5>THÔNG TIN CÁ NHÂN</h5>
                                        <div class="form-group">
                                            <label>Tên truy cập</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                                                <input type="text" value="{{users()->user()->phone}}" readonly="" id="ctl27_txtUsername" class="form-control"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Họ và tên (*)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                                                <input name="name" type="text" value="{{users()->user()->name}}" id="ctl27_txtName" class="form-control"> </div>
                                        </div>
{{--                                        <div class="form-group">--}}
{{--                                            <label>CMND/Passport (*)</label>--}}
{{--                                            <div class="input-group">--}}
{{--                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-id-card"></i></span> </div>--}}
{{--                                                <input name="CMND" type="text" maxlength="12" id="ctl27_txtNID" class="form-control numbers" placeholder="Nation ID/Passport" autocomplete="off"> </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group" style="display:none;">--}}
{{--                                            <label>Ngày cấp CMND/Passport (*)</label>--}}
{{--                                            <div class="input-group">--}}
{{--                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-calendar"></i></span> </div>--}}
{{--                                                <input name="NgayCap" type="date" maxlength="10" id="ctl27_txtNIDDate" class="form-control dateFormat" autocomplete="off" value=""> </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group" style="display:none;">--}}
{{--                                            <label>Nơi cấp CMND/Passport (*)</label>--}}
{{--                                            <div class="input-group">--}}
{{--                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-map-pin"></i></span> </div>--}}
{{--                                                <input name="NoiCap" type="text" maxlength="50" id="ctl27_txtNIDPlace" class="form-control" placeholder="Tỉnh thành cấp" autocomplete="off"> </div>--}}
{{--                                        </div>--}}
                                        <div class="form-group">
                                            <label>Năm sinh (*)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-calendar"></i></span> </div>
                                                <select class="form-control" style="min-width: 90px; max-width: 110px;" name="year_of_birth">
                                                    <option {{users()->user()->year_of_birth == 2006 ? 'selected' : ''}} value="2006">2006</option>
                                                    <option {{users()->user()->year_of_birth == 2005 ? 'selected' : ''}} value="2005">2005</option>
                                                    <option {{users()->user()->year_of_birth == 2004 ? 'selected' : ''}} value="2004">2004</option>
                                                    <option {{users()->user()->year_of_birth == 2003 ? 'selected' : ''}} value="2003">2003</option>
                                                    <option {{users()->user()->year_of_birth == 2002 ? 'selected' : ''}} value="2002">2002</option>
                                                    <option {{users()->user()->year_of_birth == 2001 ? 'selected' : ''}} value="2001">2001</option>
                                                    <option {{users()->user()->year_of_birth == 2000 ? 'selected' : ''}} value="2000">2000</option>
                                                    <option {{users()->user()->year_of_birth == 1999 ? 'selected' : ''}} value="1999">1999</option>
                                                    <option {{users()->user()->year_of_birth == 1998 ? 'selected' : ''}} value="1998">1998</option>
                                                    <option {{users()->user()->year_of_birth == 1997 ? 'selected' : ''}} value="1997">1997</option>
                                                    <option {{users()->user()->year_of_birth == 1996 ? 'selected' : ''}} value="1996">1996</option>
                                                    <option {{users()->user()->year_of_birth == 1995 ? 'selected' : ''}} value="1995">1995</option>
                                                    <option {{users()->user()->year_of_birth == 1994 ? 'selected' : ''}} value="1994">1994</option>
                                                    <option {{users()->user()->year_of_birth == 1993 ? 'selected' : ''}} value="1993">1993</option>
                                                    <option {{users()->user()->year_of_birth == 1992 ? 'selected' : ''}} value="1992">1992</option>
                                                    <option {{users()->user()->year_of_birth == 1991 ? 'selected' : ''}} value="1991">1991</option>
                                                    <option {{users()->user()->year_of_birth == 1990 ? 'selected' : ''}} value="1990">1990</option>
                                                    <option {{users()->user()->year_of_birth == 1989 ? 'selected' : ''}} value="1989">1989</option>
                                                    <option {{users()->user()->year_of_birth == 1988 ? 'selected' : ''}} value="1988">1988</option>
                                                    <option {{users()->user()->year_of_birth == 1987 ? 'selected' : ''}} value="1987">1987</option>
                                                    <option {{users()->user()->year_of_birth == 1986 ? 'selected' : ''}} value="1986">1986</option>
                                                    <option {{users()->user()->year_of_birth == 1985 ? 'selected' : ''}} value="1985">1985</option>
                                                    <option {{users()->user()->year_of_birth == 1984 ? 'selected' : ''}} value="1984">1984</option>
                                                    <option {{users()->user()->year_of_birth == 1983 ? 'selected' : ''}} value="1983">1983</option>
                                                    <option {{users()->user()->year_of_birth == 1982 ? 'selected' : ''}} value="1982">1982</option>
                                                    <option {{users()->user()->year_of_birth == 1981 ? 'selected' : ''}} value="1981">1981</option>
                                                    <option {{users()->user()->year_of_birth == 1980 ? 'selected' : ''}} value="1980">1980</option>
                                                    <option {{users()->user()->year_of_birth == 1979 ? 'selected' : ''}} value="1979">1979</option>
                                                    <option {{users()->user()->year_of_birth == 1978 ? 'selected' : ''}} value="1978">1978</option>
                                                    <option {{users()->user()->year_of_birth == 1977 ? 'selected' : ''}} value="1977">1977</option>
                                                    <option {{users()->user()->year_of_birth == 1976 ? 'selected' : ''}} value="1976">1976</option>
                                                    <option {{users()->user()->year_of_birth == 1975 ? 'selected' : ''}} value="1975">1975</option>
                                                    <option {{users()->user()->year_of_birth == 1974 ? 'selected' : ''}} value="1974">1974</option>
                                                    <option {{users()->user()->year_of_birth == 1973 ? 'selected' : ''}} value="1973">1973</option>
                                                    <option {{users()->user()->year_of_birth == 1972 ? 'selected' : ''}} value="1972">1972</option>
                                                    <option {{users()->user()->year_of_birth == 1971 ? 'selected' : ''}} value="1971">1971</option>
                                                    <option {{users()->user()->year_of_birth == 1970 ? 'selected' : ''}} value="1970">1970</option>
                                                    <option {{users()->user()->year_of_birth == 1969 ? 'selected' : ''}} value="1969">1969</option>
                                                    <option {{users()->user()->year_of_birth == 1968 ? 'selected' : ''}} value="1968">1968</option>
                                                    <option {{users()->user()->year_of_birth == 1967 ? 'selected' : ''}} value="1967">1967</option>
                                                    <option {{users()->user()->year_of_birth == 1966 ? 'selected' : ''}} value="1966">1966</option>
                                                    <option {{users()->user()->year_of_birth == 1965 ? 'selected' : ''}} value="1965">1965</option>
                                                    <option {{users()->user()->year_of_birth == 1964 ? 'selected' : ''}} value="1964">1964</option>
                                                    <option {{users()->user()->year_of_birth == 1963 ? 'selected' : ''}} value="1963">1963</option>
                                                    <option {{users()->user()->year_of_birth == 1962 ? 'selected' : ''}} value="1962">1962</option>
                                                    <option {{users()->user()->year_of_birth == 1961 ? 'selected' : ''}} value="1961">1961</option>
                                                    <option {{users()->user()->year_of_birth == 1960 ? 'selected' : ''}} value="1960">1960</option>
                                                    <option {{users()->user()->year_of_birth == 1959 ? 'selected' : ''}} value="1959">1959</option>
                                                    <option {{users()->user()->year_of_birth == 1958 ? 'selected' : ''}} value="1958">1958</option>
                                                    <option {{users()->user()->year_of_birth == 1957 ? 'selected' : ''}} value="1957">1957</option>
                                                    <option {{users()->user()->year_of_birth == 1956 ? 'selected' : ''}} value="1956">1956</option>
                                                    <option {{users()->user()->year_of_birth == 1955 ? 'selected' : ''}} value="1955">1955</option>
                                                    <option {{users()->user()->year_of_birth == 1954 ? 'selected' : ''}} value="1954">1954</option>
                                                    <option {{users()->user()->year_of_birth == 1953 ? 'selected' : ''}} value="1953">1953</option>
                                                    <option {{users()->user()->year_of_birth == 1952 ? 'selected' : ''}} value="1952">1952</option>
                                                    <option {{users()->user()->year_of_birth == 1951 ? 'selected' : ''}} value="1951">1951</option>
                                                    <option {{users()->user()->year_of_birth == 1950 ? 'selected' : ''}} value="1950">1950</option>
                                                    <option {{users()->user()->year_of_birth == 1949 ? 'selected' : ''}} value="1949">1949</option>
                                                    <option {{users()->user()->year_of_birth == 1948 ? 'selected' : ''}} value="1948">1948</option>
                                                    <option {{users()->user()->year_of_birth == 1947 ? 'selected' : ''}} value="1947">1947</option>
                                                    <option {{users()->user()->year_of_birth == 1946 ? 'selected' : ''}} value="1946">1946</option>
                                                    <option {{users()->user()->year_of_birth == 1945 ? 'selected' : ''}} value="1945">1945</option>
                                                    <option {{users()->user()->year_of_birth == 1944 ? 'selected' : ''}} value="1944">1944</option>
                                                    <option {{users()->user()->year_of_birth == 1943 ? 'selected' : ''}} value="1943">1943</option>
                                                    <option {{users()->user()->year_of_birth == 1942 ? 'selected' : ''}} value="1942">1942</option>
                                                    <option {{users()->user()->year_of_birth == 1941 ? 'selected' : ''}} value="1941">1941</option>
                                                    <option {{users()->user()->year_of_birth == 1940 ? 'selected' : ''}} value="1940">1940</option>
                                                    <option {{users()->user()->year_of_birth == 1939 ? 'selected' : ''}} value="1939">1939</option>
                                                    <option {{users()->user()->year_of_birth == 1938 ? 'selected' : ''}} value="1938">1938</option>
                                                    <option {{users()->user()->year_of_birth == 1937 ? 'selected' : ''}} value="1937">1937</option>
                                                    <option {{users()->user()->year_of_birth == 1936 ? 'selected' : ''}} value="1936">1936</option>
                                                    <option {{users()->user()->year_of_birth == 1935 ? 'selected' : ''}} value="1935">1935</option>
                                                    <option {{users()->user()->year_of_birth == 1934 ? 'selected' : ''}} value="1934">1934</option>
                                                    <option {{users()->user()->year_of_birth == 1933 ? 'selected' : ''}} value="1933">1933</option>
                                                    <option {{users()->user()->year_of_birth == 1932 ? 'selected' : ''}} value="1932">1932</option>
                                                    <option {{users()->user()->year_of_birth == 1931 ? 'selected' : ''}} value="1931">1931</option>
                                                    <option {{users()->user()->year_of_birth == 1930 ? 'selected' : ''}} value="1930">1930</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Giới tính (*)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-venus-mars"></i></span> </div>
                                                <select name="gender" id="ctl27_ddlSex" class="form-control">
                                                    <option {{users()->user()->gender == 2 ? 'selected' : ''}} value="2">Nam</option>
                                                    <option {{users()->user()->gender == 1 ? 'selected' : ''}} value="1">Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Điện thoại (*)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-phone"></i></span> </div>
                                                <input name="phone" type="text" readonly value="{{users()->user()->phone}}" maxlength="10" id="ctl27_txtPhone" class="form-control numbers10" required="" placeholder="Phone" autocomplete="off"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email (dùng để lấy lại mật khẩu)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-envelope"></i></span> </div>
                                                <input name="email" type="text" value="{{users()->user()->email}}" maxlength="50" id="ctl27_txtEmail" class="form-control" placeholder="Nếu có"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ sinh sống hiện tại(*)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-home"></i></span> </div>
                                                <input name="address" type="text" maxlength="50" value="{{users()->user()->address}}" id="ctl27_txtAddress" class="form-control" placeholder="Số nhà, đường, tổ..." autocomplete="off"> </div>
                                        </div>
{{--                                        <h5>THÔNG TIN NGÂN HÀNG</h5>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Ngân hàng</label>--}}
{{--                                            <div class="input-group">--}}
{{--                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-university"></i></span> </div>--}}
{{--                                                <select name="BankName" id="ctl27_ddlBank" class="form-control">--}}
{{--                                                    <option {{old('bank') == 'Viettin Bank' ? 'selected' : ''}} value="Viettin Bank">Viettin Bank</option>--}}
{{--                                                    <option {{old('bank') == 'Vietcom Bank' ? 'selected' : ''}} value="Vietcom Bank">Vietcom Bank</option>--}}
{{--                                                    <option {{old('bank') == 'Agri Bank' ? 'selected' : ''}} value="Agri Bank">Agri Bank</option>--}}
{{--                                                    <option {{old('bank') == 'ACB' ? 'selected' : ''}} value="ACB">ACB</option>--}}
{{--                                                    <option {{old('bank') == 'Techcom Bank' ? 'selected' : ''}} value="Techcom Bank">Techcom Bank</option>--}}
{{--                                                    <option {{old('bank') == 'BIDV' ? 'selected' : ''}} value="BIDV">BIDV</option>--}}
{{--                                                    <option {{old('bank') == 'MB Bank' ? 'selected' : ''}} value="MB Bank">MB Bank</option>--}}
{{--                                                    <option {{old('bank') == 'DongA Bank' ? 'selected' : ''}} value="DongA Bank">DongA Bank</option>--}}
{{--                                                    <option {{old('bank') == 'AB Bank' ? 'selected' : ''}} value="AB Bank">AB Bank</option>--}}
{{--                                                    <option {{old('bank') == 'EXIM Bank' ? 'selected' : ''}} value="EXIM Bank">EXIM Bank</option>--}}
{{--                                                    <option {{old('bank') == 'TP Bank' ? 'selected' : ''}} value="TP Bank">TP Bank</option>--}}
{{--                                                    <option {{old('bank') == 'VP Bank' ? 'selected' : ''}} value="VP Bank">VP Bank</option>--}}
{{--                                                    <option {{old('bank') == 'VIB' ? 'selected' : ''}} value="VIB">VIB</option>--}}
{{--                                                    <option {{old('bank') == 'MSB' ? 'selected' : ''}} value="MSB">MSB</option>--}}
{{--                                                    <option {{old('bank') == 'SHB' ? 'selected' : ''}} value="SHB">SHB</option>--}}
{{--                                                    <option {{old('bank') == 'HDB' ? 'selected' : ''}} value="HDB">HD Bank</option>--}}
{{--                                                    <option {{old('bank') == 'KLB' ? 'selected' : ''}} value="KLB">Kiên Long Bank</option>--}}
{{--                                                    <option {{old('bank') == 'SEAB' ? 'selected' : ''}} value="SEAB">NH TMCP Đông Nam Á (SEA BANK)</option>--}}
{{--                                                    <option {{old('bank') == 'SCB' ? 'selected' : ''}} value="SCB">Sacombank</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Số tài khoản</label>--}}
{{--                                            <div class="input-group">--}}
{{--                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span> </div>--}}
{{--                                                <input name="BankAccountNumber" value="" type="text" maxlength="20" id="ctl27_txtBankAccount" class="form-control" placeholder="Số tài khoản" autocomplete="off"> </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Chủ tài khoản</label>--}}
{{--                                            <div class="input-group">--}}
{{--                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>--}}
{{--                                                <input name="BankHolder" type="text" maxlength="30" id="ctl27_txtBankHolder" class="form-control" placeholder="Tên chủ tài khoản"> </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Chi nhánh</label>--}}
{{--                                            <div class="input-group">--}}
{{--                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-map-marker"></i></span> </div>--}}
{{--                                                <input name="BankBranch" type="text" maxlength="30" id="ctl27_txtBankBranch" class="form-control" placeholder="Chi nhánh nếu có" autocomplete="off"> </div>--}}
{{--                                        </div>--}}
                                        <center>
                                            <button type="submit" name="ctl27$btnUpdate" id="ctl27_btnUpdate" class="btn btn-block bg-background" style="width:200px;color:white; font-weight:bold;">CẬP NHẬT</button>
                                        </center>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
@push('scripts')
    <script>
    </script>
@endpush
