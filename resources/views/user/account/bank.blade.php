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
                                    Tài khoản ngân hàng
                                </h4> </div>
                            <div class="card-body">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success">Kết Nối Toàn Cầu</div>
                                </div>
                                <form class="row" method="post" action="{{route('us.account.bank_update')}}">
                                    @csrf
                                    <div class="col-md-12">
                                        <h5>THÔNG TIN NGÂN HÀNG</h5>
                                        <div class="form-group">
                                            <label>Ngân hàng</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-university"></i></span> </div>
                                                @if(users()->user()->bank)
                                                    <select name="bank" id="ctl27_ddlBank" class="form-control">
                                                        <option {{users()->user()->bank->bank == 'Viettin Bank' ? 'selected' : ''}} value="Viettin Bank">Viettin Bank</option>
                                                        <option {{users()->user()->bank->bank == 'Vietcom Bank' ? 'selected' : ''}} value="Vietcom Bank">Vietcom Bank</option>
                                                        <option {{users()->user()->bank->bank == 'Agri Bank' ? 'selected' : ''}} value="Agri Bank">Agri Bank</option>
                                                        <option {{users()->user()->bank->bank == 'ACB' ? 'selected' : ''}} value="ACB">ACB</option>
                                                        <option {{users()->user()->bank->bank == 'Techcom Bank' ? 'selected' : ''}} value="Techcom Bank">Techcom Bank</option>
                                                        <option {{users()->user()->bank->bank == 'BIDV' ? 'selected' : ''}} value="BIDV">BIDV</option>
                                                        <option {{users()->user()->bank->bank == 'MB Bank' ? 'selected' : ''}} value="MB Bank">MB Bank</option>
                                                        <option {{users()->user()->bank->bank == 'DongA Bank' ? 'selected' : ''}} value="DongA Bank">DongA Bank</option>
                                                        <option {{users()->user()->bank->bank == 'AB Bank' ? 'selected' : ''}} value="AB Bank">AB Bank</option>
                                                        <option {{users()->user()->bank->bank == 'EXIM Bank' ? 'selected' : ''}} value="EXIM Bank">EXIM Bank</option>
                                                        <option {{users()->user()->bank->bank == 'TP Bank' ? 'selected' : ''}} value="TP Bank">TP Bank</option>
                                                        <option {{users()->user()->bank->bank == 'VP Bank' ? 'selected' : ''}} value="VP Bank">VP Bank</option>
                                                        <option {{users()->user()->bank->bank == 'VIB' ? 'selected' : ''}} value="VIB">VIB</option>
                                                        <option {{users()->user()->bank->bank == 'MSB' ? 'selected' : ''}} value="MSB">MSB</option>
                                                        <option {{users()->user()->bank->bank == 'SHB' ? 'selected' : ''}} value="SHB">SHB</option>
                                                        <option {{users()->user()->bank->bank == 'HDB' ? 'selected' : ''}} value="HDB">HD Bank</option>
                                                        <option {{users()->user()->bank->bank == 'KLB' ? 'selected' : ''}} value="KLB">Kiên Long Bank</option>
                                                        <option {{users()->user()->bank->bank == 'SEAB' ? 'selected' : ''}} value="SEAB">NH TMCP Đông Nam Á (SEA BANK)</option>
                                                        <option {{users()->user()->bank->bank == 'SCB' ? 'selected' : ''}} value="SCB">Sacombank</option>
                                                    </select>
                                                @else
                                                <select name="bank" id="ctl27_ddlBank" class="form-control">
                                                    <option {{old('bank') == 'Viettin Bank' ? 'selected' : ''}} value="Viettin Bank">Viettin Bank</option>
                                                    <option {{old('bank') == 'Vietcom Bank' ? 'selected' : ''}} value="Vietcom Bank">Vietcom Bank</option>
                                                    <option {{old('bank') == 'Agri Bank' ? 'selected' : ''}} value="Agri Bank">Agri Bank</option>
                                                    <option {{old('bank') == 'ACB' ? 'selected' : ''}} value="ACB">ACB</option>
                                                    <option {{old('bank') == 'Techcom Bank' ? 'selected' : ''}} value="Techcom Bank">Techcom Bank</option>
                                                    <option {{old('bank') == 'BIDV' ? 'selected' : ''}} value="BIDV">BIDV</option>
                                                    <option {{old('bank') == 'MB Bank' ? 'selected' : ''}} value="MB Bank">MB Bank</option>
                                                    <option {{old('bank') == 'DongA Bank' ? 'selected' : ''}} value="DongA Bank">DongA Bank</option>
                                                    <option {{old('bank') == 'AB Bank' ? 'selected' : ''}} value="AB Bank">AB Bank</option>
                                                    <option {{old('bank') == 'EXIM Bank' ? 'selected' : ''}} value="EXIM Bank">EXIM Bank</option>
                                                    <option {{old('bank') == 'TP Bank' ? 'selected' : ''}} value="TP Bank">TP Bank</option>
                                                    <option {{old('bank') == 'VP Bank' ? 'selected' : ''}} value="VP Bank">VP Bank</option>
                                                    <option {{old('bank') == 'VIB' ? 'selected' : ''}} value="VIB">VIB</option>
                                                    <option {{old('bank') == 'MSB' ? 'selected' : ''}} value="MSB">MSB</option>
                                                    <option {{old('bank') == 'SHB' ? 'selected' : ''}} value="SHB">SHB</option>
                                                    <option {{old('bank') == 'HDB' ? 'selected' : ''}} value="HDB">HD Bank</option>
                                                    <option {{old('bank') == 'KLB' ? 'selected' : ''}} value="KLB">Kiên Long Bank</option>
                                                    <option {{old('bank') == 'SEAB' ? 'selected' : ''}} value="SEAB">NH TMCP Đông Nam Á (SEA BANK)</option>
                                                    <option {{old('bank') == 'SCB' ? 'selected' : ''}} value="SCB">Sacombank</option>
                                                </select>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Số tài khoản</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span> </div>
                                                <input name="number" value="{{users()->user()->bank ? users()->user()->bank->number : ''}}" required type="number" maxlength="20" id="ctl27_txtBankAccount" class="form-control" placeholder="Số tài khoản" autocomplete="off"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Chủ tài khoản</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                                                <input name="name" type="text" value="{{users()->user()->bank ? users()->user()->bank->name : ''}}" required maxlength="30" id="ctl27_txtBankHolder" class="form-control" placeholder="Tên chủ tài khoản"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Chi nhánh</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-map-marker"></i></span> </div>
                                                <input name="branch" value="{{users()->user()->bank ? users()->user()->bank->branch : ''}}" type="text" required maxlength="30" id="ctl27_txtBankBranch" class="form-control" placeholder="Chi nhánh nếu có" autocomplete="off"> </div>
                                        </div>
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
