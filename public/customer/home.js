var stepPhone = 1;
window.onload = function () {
    //countdown();
    if ($('#cfAddress').val() == '0')
        showAddress();
    else if ($('#cfPhone').val() == '0')
        showMdPhone();
    $('.btnViewByDate').on('click', function () {
        var fd = $('#txtFromDate').val();
        var td = $('#txtToDate').val();
        var _data = {
            fromDate: fd,
            toDate: td
        };
        if (_data.fromDate == '') alert('Nhập ngày bắt đầu');
        else if (_data.toDate == '') alert('Nhập ngày kết thúc');
        else {
            $.ajax({
                url: '/account/getDashboard_bydate',
                type: 'POST',
                data: _data,
                success: function (e) {
                    $('.resetText').text('0');
                    if (e.length > 0) {
                        for (var i = 0; i < e.length; i++) {
                            if (e[i].code == 'TotalMember')
                                $('#lbTotalMember').text(e[i].amount);
                            else if (e[i].code == 'MemberActive')
                                $('#lbMemberActive').text(e[i].amount);
                            else if (e[i].code == 'DSCN_Total')
                                $('#lbDSCN').text(e[i].amount);
                            else if (e[i].code == 'DSTT_Total')
                                $('#lbDSTT').text(e[i].amount);
                            else if (e[i].code == 'DSN_Total')
                                $('#lbDSN').text(e[i].amount);
                            else if (e[i].code == 'TKHH') {
                                $('#lbCommissionType_' + e[i].type).text(e[i].amount);
                            }
                        }
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
    })
}
function resendOTP() {
    $('.divResendOTP').addClass('d-none');
    $('#btnUpdatePhone').prop('disabled', true);
    var _data = {
        phone: $('#txtPhone').val(),
        type: 'ConfirmPhone',
    };
    $.ajax({
        url: '/user/reSendOTPConfirmPhone',
        type: 'POST',
        data: _data,
        success: function (e) {
            if (e.check) {
                $('#txtPhone').prop('readonly', 'readonly');
                $('.divOTP').removeClass('d-none');
                $('.divOTP').val('');
                $('#btnUpdatePhone').prop('disabled', false);
                stepPhone = 2;
                alert(e.ms);
                setTimeout(function () {
                    $('.divResendOTP').removeClass('d-none');
                }, 60e3);
            }
            else {
                $('#btnUpdatePhone').prop('disabled', false);
                alert(e.ms);
            }
        },
        error: function (err) {
            console.log(err);
            $('#btnUpdatePhone').prop('disabled', false);
        }
    });
}
function UpdatePhone() {
    var c = checkPhone();
    if (c) {
        if (stepPhone == 1) {
            $('#btnUpdatePhone').prop('disabled', true).val('Đang gửi OTP');
            var _data = {
                phone: $('#txtPhone').val()
            };
            $.ajax({
                url: '/user/getOTPPhone',
                type: 'POST',
                data: _data,
                success: function (e) {
                    if (e.check) {
                        $('#txtPhone').prop('readonly', 'readonly');
                        $('.divOTP').removeClass('d-none');
                        $('.divOTP').val('');
                        $('#btnUpdatePhone').prop('disabled', false).val('Gửi xác nhận');
                        stepPhone = 2;
                        alert(e.ms);
                        setTimeout(function () {
                            $('.divResendOTP').removeClass('d-none');
                        }, 60e3);
                    }
                    else {
                        $('#btnUpdatePhone').prop('disabled', false).val('Lấy mã xác nhận');
                        alert(e.ms);
                    }
                },
                error: function (err) {
                    console.log(err);
                    $('#btnUpdatePhone').prop('disabled', false).val('Lấy mã xác nhận');
                }
            });
        }
        else if (stepPhone == 2) {
            var otp = $('#txtOTP').val();
            if (otp == '') alert('Nhập mã OTP được gửi về điện thoại');
            else {
                $('#btnUpdatePhone').prop('disabled', true).val('Đang xử lý...');
                var _data = {
                    phone: $('#txtPhone').val(),
                    otp: $('#txtOTP').val()
                };
                $.ajax({
                    url: '/user/updatePhone',
                    type: 'POST',
                    data: _data,
                    success: function (e) {
                        if (e.check) {
                            $('#btnUpdatePhone').prop('disabled', true).val('Thành công');
                            alert(e.ms);
                            window.location.reload(true);
                        }
                        else {
                            $('#btnUpdatePhone').prop('disabled', false).val('Gửi xác nhận');
                            alert(e.ms);
                        }
                    },
                    error: function (err) {
                        console.log(err);
                        $('#btnUpdatePhone').prop('disabled', false).val('Gửi xác nhận');
                    }
                });
            }
        }
    }
}
function checkPhone() {
    var ele = 'txtPhone';
    var ok = false;
    if ($('#' + ele).val() == '' || $('#' + ele).val().length != 10) ok = false;
    if (/(84|0[3|5|7|8|9])+([0-9]{8})\b/.test($('#' + ele).val())) {
        ok = true;
    }
    if (ok == false) alert('Số điện thoại không hợp lệ');

    if (ok == true)
        $('#btnUpdatePhone').prop('disabled', false);
    return ok;
}
function showAddress() {
    $('#mdAddress').modal('show');
}
function showMdPhone() {
    $('#mdPhone').modal('show');
    if ($('#cfPhoneSend').val() == '1') {
        $('#txtPhone').prop('readonly', 'readonly');
        $('.divOTP').removeClass('d-none');
        $('.divResendOTP').removeClass('d-none');
        $('#lbsaiSDT').addClass('d-none');
        $('.divOTP').val('');
        $('#btnUpdatePhone').prop('disabled', false).val('Gửi xác nhận');
        stepPhone = 2;
    }
}
function UpdateAddress() {
    $('#btnUpdateAddress').prop('disabled', true);
    $('#lbWait').removeClass('d-none');
    var _data = {
        city: $('#ddlCity').val(),
        district: $('#ddlDistrict').val(),
        ward: $('#ddlCommune').val()
    };
    if (_data.city == '' || _data.district == '' || _data.ward == '') {
        $('#btnUpdateAddress').prop('disabled', false);
        $('#lbWait').addClass('d-none');
        alert('Chưa nhập đầy đủ thông tin địa chỉ');
    }
    else {
        $.ajax({
            url: '/user/updateAddress',
            type: 'POST',
            data: _data,
            success: function (e) {
                if (e.check) {
                    $('#btnUpdateAddress').prop('disabled', false);
                    $('#lbWait').text('Cập nhật thành công');
                    alert(e.mess);
                    window.location.reload(true);
                }
                else alert(e.mess);
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
}
function countdown() {
    if ('#clearTrian') {
        var countDownDate2 = new Date("Jul 10, 2023 23:59:59").getTime();
        var countDownDate = new Date("Jun 30, 2023 23:59:59").getTime();
        var currentDate = new Date().getTime();
        if (currentDate > countDownDate)
            countDownDate = countDownDate2;
        var x = setInterval(function () {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("cdtime").innerHTML = (days < 10 ? '0' + days : days) + " ngày " + (hours < 10 ? '0' + hours : hours) + " giờ "
                + (minutes < 10 ? '0' + minutes : minutes) + " phút " + (seconds < 10 ? '0' + seconds : seconds) + " giây ";

            if (distance < 0) {
                clearInterval(x);
                $('#clearTrian').html('<h4 style="font-size:1.2em" class="text-blink">Thời gian tham gia tri ân: Đã kết thúc !</h4>');
                setTimeout(function () {
                    $('#clearTrian').remove();
                    window.location.reload();
                }, 10e3);
            }
        }, 1000);
    }
}