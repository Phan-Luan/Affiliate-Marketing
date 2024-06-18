@extends('user.layouts.master')
@section('page_title', 'Quản lý tư vấn')
@section('page_id', 'page-home')
@section('content')

    <section class="content-wrapper bg-background-main" style="min-height: 682.8px;">
        <!-- Main content -->
        <section class="content" style="padding:0px;">
            <div class="container-fluid" style="padding-top:10px; margin-bottom: 50px; padding: 10px !important;">
                <h4>Quản lý tư vấn</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div style="background: green; color: white; padding: 1rem">
                            <a style="font-size: 1.2rem; color: white" href="javascript:copyToClipboard('https://{{ request()->getHttpHost().'/lien-he-voi-chung-toi'.'?href='.users()->user()->phone }}');">
                                Link tư vấn của bạn, chạm để sao chép : https://{{ request()->getHttpHost().'/lien-he-voi-chung-toi'.'?href='.users()->user()->phone }}
                            </a>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12"> </div>
                                    <input type="hidden" name="ctl27$txtQuantity" id="ctl27_txtQuantity">
                                    <div class="col-md-12"> Các liên hệ tư vấn của bạn </div>
                                    <div style="min-width:100%;overflow-x:auto;">
                                        <table id="thistory" class="table table-bordered table-striped bg-white table-hover" style="font-size:15px; min-width:1000px">
                                            <thead>
                                            <tr>
                                                <th style="min-width:120px;">STT</th>
                                                <th style="min-width:120px;">Ngày đăng ký form tư vấn</th>
                                                <th style="min-width:120px;">Tên khách hàng</th>
                                                <th style="min-width:120px;">Số điện thoại khách hàng</th>
                                                <th style="min-width:140px;">Địa chỉ</th>
                                                <th style="min-width:160px;">Năm sinh</th>
                                                <th style="min-width:160px;">Sản phẩm cần tư vấn</th>
                                                <th>Ghi chú</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($contacts->count() > 0)
                                                @foreach($contacts as $key=>$contact)
                                                    <tr>
                                                        <td align="center"><b>#{{$key+1}}</b>
                                                            {{--                                                            <br> <a style="color: #007bff" onclick="showorderdetail('IV02745587')" href="javascript:void(0)">Xem chi tiết</a> --}}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::createFromDate($contact->created_at)->format('H:i d/m/Y') }}</td>
                                                        <td>{{$contact->name}}</td>
                                                        <td>{{$contact->phone}}</td>
                                                        <td>{{$contact->address}}</td>
                                                        <td>{{$contact->birth}}</td>
                                                        <td>{{$contact->type}}</td>
                                                        <td>{{$contact->note}}</td>

                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="10">Chưa có dữ liệu để hiển thị</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                        {{$contacts->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="mdOrder" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content" style="width:100%;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Thông tin đơn hàng
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 mb-2" style="line-height:40px;" id="orderInfo"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style type="text/css">
                    .dfl {
                        display: flex;
                        justify-content: space-between;
                    }
                </style>
                <script src="/Scripts/pachis.js?vsss=1.3"></script>
            </div>
        </section>
    </section>
@endsection
@push('scripts')
    <script>
        function copyToClipboard(string) {
            let textarea;
            let result;
            try {
                textarea = document.createElement('textarea');
                textarea.setAttribute('readonly', true);
                textarea.setAttribute('contenteditable', true);
                textarea.style.position = 'fixed'; // prevent scroll from jumping to the bottom when focus is set.
                textarea.value = string;

                document.body.appendChild(textarea);

                //textarea.focus();
                textarea.select();

                const range = document.createRange();
                range.selectNodeContents(textarea);

                const sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
                textarea.setSelectionRange(0, textarea.value.length);
                result = document.execCommand('copy');
            } catch (err) {
                console.error(err);
                result = null;
            } finally {
                document.body.removeChild(textarea);
            }

            // manual copy fallback using prompt
            if (!result) {
                const isMac = navigator.platform.toUpperCase().indexOf('MAC') >= 0;
                const copyHotkey = isMac ? '⌘C' : 'CTRL+C';
                result = prompt(`Press ${copyHotkey}`, string); // eslint-disable-line no-alert
                if (!result) {
                    return false;
                }
            }
            Swal.fire(
                'Thông báo',
                'Đã sao chép!',
                'success',
            )
            return true;
        }
    </script>
@endpush
