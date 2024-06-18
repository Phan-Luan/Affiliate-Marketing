function toast(type, ms) {
	try {
		Command: toastr[type](ms);
	}
	catch (e) {
		alert(ms);
	}
}

function direct(url) {
	setTimeout(function() {
		location.href = url;
	}, 2000);
}

function convertCapitalizeText(mySentence) {
	const words = mySentence.split(" ");

	for (let i = 0; i < words.length; i++) {
		words[i] = words[i][0].toUpperCase() + words[i].substr(1);
	}
	return words.join(' ');
}

function autoFormatNumber() {
	var $form = $("form");
	var $input = $form.find(".number");
	$input.on("keyup", function(event) {
		var selection = window.getSelection().toString();
		if (selection !== '') {
			return;
		}
		if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
			return;
		}
		var $this = $(this);
		var input = $this.val();
		var input = input.replace(/[\D\s\._\-]+/g, "");
		input = input ? parseInt(input, 10) : 0;
		$this.val(function() {
			return (input === 0) ? "0" : input.toLocaleString("en-US");
		});
	});
}

function formatMoney(n, c, d, t) {
	var
		c = isNaN(c = Math.abs(c)) ? 2 : c,
		d = d == undefined ? "." : d,
		t = t == undefined ? "," : t,
		s = n < 0 ? "-" : "",
		i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
		j = (j = i.length) > 3 ? j % 3 : 0;
	return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

function formatDate(date) {
	var d = new Date(date),
		month = '' + (d.getMonth() + 1),
		day = '' + d.getDate(),
		year = d.getFullYear();
	var hours = '' + d.getHours(),
		min = '' + d.getMinutes();
	if (month.length < 2)
		month = '0' + month;
	if (day.length < 2)
		day = '0' + day;
	if (hours.length < 2)
		hours = '0' + hours;
	if (min.length < 2)
		min = '0' + min;

	return [year, month, day].join('-') + " " + hours + ":" + min;
}

function reload() {
	setTimeout(function() {
		location.reload();
	}, 2000);
}

function goBack() {
	window.history.back();
}

function round(num, decimal) {
	var p = Math.pow(10, decimal);
	var a = Math.round(num * p) / p;
	return a;
}

function formSubmit(form, url, formData, redirectUrl) {
	if (!formData) {
		formData = new FormData(form);
	}
	var button = $(form).find('[type="submit"]');
	var text = button.text();
	$('#btnBack').prop('disabled', true);
	button.prop('disabled', true).text('Đang xử lý...');
	$.ajax({
		url: url,
		data: formData,
		type: 'POST',
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			if (data.check) {
				if (data.toast == true)
					toast('success', data.ms);
				else alert(data.ms);
				if (redirectUrl) {
					direct(redirectUrl);
				} else {
					reload();
				}
			} else {
				alert(data.ms);
				if (data.security) {
					$('.2fa').show();
					$('.2fa').find('input').focus();
				}
				button.prop('disabled', false).text(text);
				if (data.reload) {
					setTimeout(function() {
						window.location.href = '/account/home';
					}, 1e3);
				}
			}
			$('#btnBack').prop('disabled', false);
		},
		error: function(err) {
			toast('error', err.statusText || err.responseText);
			button.prop('disabled', false).text(text);
			$('#btnBack').prop('disabled', false);
		}
	});
}

function logSubmit(event) {
	event.preventDefault();
}

function getBalance(type) {
	$.ajax({
		url: "/transaction/GetBalance",
		data: {
			wallet: $('[name="txtWallet"]').val(),
			type: type
		},
		type: "POST",
		success: function(data) {
			$('#txtAvailable').val(formatMoney(data.balance, 0));
			$('.fee').text(data.fee);
			$('[name="amount"]').attr('placeholder', 'Số tiền tối thiểu ' + data.min + ' ' + data.currency);
			$('[name="amount"]').attr('min', data.min);
		}
	});
}

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
	toast('success', 'Đã sao chép');
	return true;
}

function getLocation(type, id) {
	$.ajax({
		url: '/cart/GetLocation',
		data: {
			type: type,
			id: id
		},
		type: 'POST',
		success: function(data) {
			var html = '<option value="">Vui lòng chọn</option>';
			for (var i = 0; i < data.length; i++) {
				html += '<option value="' + data[i].Id + '">' + data[i].Name + '</option>'
			}
			if (type == 'district') {
				$('[name="txtDistrict"]').html(html);
			} else if (type == 'commune') {
				$('[name="txtCommune"]').html(html);
			}
		}
	});
}

$(window).on("load", function() {
	autoFormatNumber();
	//left menu toggle
	$(".left-menu-item").click(function() {
		if ($(this).hasClass("active")) {
			$(this).removeClass("active");
			$(this).find('ul.left-menu-subs').slideUp();
		} else {
			$(this).addClass("active");
			$(this).find('ul.left-menu-subs').slideDown();
		}
	});
	// toggle menu mobile
	$(".menu-mobile-toggle-on").click(function() {
		$("#left-area").addClass("active");
		$(this).hide();
		$(".menu-mobile-toggle-off").show();
	});
	$(".menu-mobile-toggle-off").click(function() {
		$("#left-area").removeClass("active");
		$(this).hide();
		$(".menu-mobile-toggle-on").show();
	});
	if ($('form').length) {
		const form = document.getElementsByTagName('form');
		for (var i = 0; i < form.length; i++) {
			var f = document.getElementsByTagName('form')[i];
			if ($(f).attr('id') || $(f).attr('class')) {
				f.addEventListener('submit', logSubmit);
			}
		}
	}

	// login
	$('#formLogin').submit(function() {
		formSubmit(this, '/account/login', '', '/account/home');
	});
	// register
	$('#formRegister').submit(function() {
		formSubmit(this, '/account/register', '', '/account/home');
	});
	// formForgotPassword
	$('#formForgotPassword').submit(function() {
		formSubmit(this, '/account/formForgotPassword', '', '/account/login');
	});
	// formResetPassword
	$('#formResetPassword').submit(function() {
		formSubmit(this, '/account/formResetPassword', '', '/account/login');
	});
	$('#formResetPassword2').submit(function() {
		formSubmit(this, '/account/formResetPassword2', '', '/account/login');
	});

	// transaction
	$(document).on('submit', "#formPayout", function() {
		formSubmit(this, '/transaction/formpayout', '', '');
	});
	// $(document).on('submit', '#formTransfer', function() {
	// 	formSubmit(this, '/transaction/formtransfer', '', '');
	// });

	// profile
	$("#EditUserProfile").submit(function() {
		formSubmit(this, '/user/formupdateprofile', '', '');
	});
	$("#formChangePassword").submit(function() {
		formSubmit(this, '/user/ChangePassword', '', '');
	});
	$("#formSupport").submit(function() {
		formSubmit(this, '/user/SendSupport', '', '');
	});
	$("#changeSecurityPin").submit(function() {
		formSubmit(this, '/user/ChangeSecurityPin', '', '');
	});
	$("#formChangePassword2").submit(function() {
		formSubmit(this, '/user/ChangePassword2', '', '');
	});
	// cart
	$(document).on('change', '.selectLocation', function() {
		var type = $(this).attr('type');
		var id = $(this).val();
		getLocation(type, id);
	});
	$(document).on('submit', "#formCheckout", function() {
		formSubmit(this, '/package/FormCheckout', '', '/package/history');
	});

	if ($('#hdKhoHang').val() != '1')
		$('.menuKho').remove();
});
