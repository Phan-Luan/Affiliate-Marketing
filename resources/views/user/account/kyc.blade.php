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
                                    Xác Minh Tài Khoản
                                </h4> </div>
                            <div class="card-body">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success">RUBY.COM.VN</div>
                                </div>
                                @if(!users()->user()->cccd_before)
                                <form class="row" method="post" action="{{route('us.account.post_kyc')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-4 col-12 mb-3">
                                        <h4>Ảnh Căn Cước Công Dân Mặt Trước</h4>
                                        <div class="input-group">
                                            <div>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px;">
                                                        <img class="img-responsive" src="{{ asset('images/no_image.png') }}" alt="" />
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="height: 200px"></div>
                                                    <div>
                                                        <span class="btn default btn-file" style="background: green; color: white; font-weight: bold">
                                                            <span class="fileinput-new" >Chọn ảnh</span>
                                                            <span class="fileinput-exists" >Đổi ảnh</span>
                                                            <input type="file" required accept="image/*" name="cccd_before">
                                                        </span>
                                                        <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Xóa</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-4 col-12 mb-3">
                                        <h4>Ảnh Căn Cước Công Dân Mặt Sau</h4>
                                        <div class="input-group">
                                            <div>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px;">
                                                        <img class="img-responsive" src="{{ asset('images/no_image.png') }}" alt="" />
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="height: 200px"></div>
                                                    <div>
                                                        <span class="btn default btn-file" style="background: green; color: white; font-weight: bold">
                                                            <span class="fileinput-new" >Chọn ảnh</span>
                                                            <span class="fileinput-exists" >Đổi ảnh</span>
                                                            <input type="file" required accept="image/*" name="cccd_after">
                                                        </span>
                                                        <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Xóa</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-4 col-12 mb-3">
                                        <h4>Ảnh Chụp Bạn Cùng Căn Cước Công Dân</h4>
                                        <div class="input-group">
                                            <div>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px;">
                                                        <img class="img-responsive" src="{{ asset('images/no_image.png') }}" alt="" />
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="height: 200px"></div>
                                                    <div>
                                                        <span class="btn default btn-file" style="background: green; color: white; font-weight: bold">
                                                            <span class="fileinput-new" >Chọn ảnh</span>
                                                            <span class="fileinput-exists" >Đổi ảnh</span>
                                                            <input type="file" required accept="image/*" name="cccd_me">
                                                        </span>
                                                        <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Xóa</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <center>
                                            <button type="submit" name="ctl27$btnUpdate" id="ctl27_btnUpdate" class="btn btn-block bg-background" style="width:200px;color:white; font-weight:bold;">Xác Minh</button>
                                        </center>
                                    </div>
                                </form>
                                @else
                                    <div class="row">
                                        <div class="col-12 col-md-4 mb-3">
                                            <h4>Ảnh Căn Cước Công Dân Mặt Trước</h4>
                                            <img style="height: 200px; max-width: 100%" src="{{users()->user()->cccd_before}}"  alt="">
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <h4>Ảnh Căn Cước Công Dân Mặt Sau</h4>
                                            <img style="height: 200px; max-width: 100%" src="{{users()->user()->cccd_after}}"  alt="">
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <h4>Ảnh Chụp Bạn Cùng Căn Cước Công Dân</h4>
                                            <img style="height: 200px; max-width: 100%" src="{{users()->user()->cccd_me}}"  alt="">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
@push('css')
    <link href="{{ asset('global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="{{ asset('global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endpush
