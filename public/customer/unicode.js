function convertUsername(t) {
	var slug = $(t).val();
	slug = slug.toLowerCase();
	slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
	slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
	slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
	slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
	slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
	slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
	slug = slug.replace(/đ/gi, 'd');

	//Xóa các ký tự đặt biệt
	slug = slug.replace(/\`|\~|\-|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');

	//Đổi khoảng trắng thành ký tự gạch ngang
	slug = slug.replace(/ /gi, "");

	//Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
	slug = slug.replace(/\-\-\-\-\-/gi, '');
	slug = slug.replace(/\-\-\-\-/gi, '');
	slug = slug.replace(/\-\-\-/gi, '');
	slug = slug.replace(/\-\-/gi, '');

	//Xóa các ký tự gạch ngang ở đầu và cuối
	slug = '@' + slug + '@';
	slug = slug.replace(/\@\-|\-\@|\@/gi, '');

	$(t).val(slug);
}

function convertUnicode(t) {
	var str = $(t).val();
	str = str.replace(/A|Á|À|Ã|Ạ|Â|Ấ|Ầ|Ẫ|Ậ|Ă|Ắ|Ằ|Ẵ|Ặ/g, "A");
	str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
	str = str.replace(/E|É|È|Ẽ|Ẹ|Ê|Ế|Ề|Ễ|Ệ/, "E");
	str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
	str = str.replace(/I|Í|Ì|Ĩ|Ị/g, "I");
	str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
	str = str.replace(/O|Ó|Ò|Õ|Ọ|Ô|Ố|Ồ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ỡ|Ợ/g, "O");
	str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
	str = str.replace(/U|Ú|Ù|Ũ|Ụ|Ư|Ứ|Ừ|Ữ|Ự/g, "U");
	str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
	str = str.replace(/Y|Ý|Ỳ|Ỹ|Ỵ/g, "Y");
	str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
	str = str.replace(/Đ/g, "D");
	str = str.replace(/đ/g, "d");
	str = str.replace(/ /g, "");
	str = str.replace(/\,/g, "");
	str = str.replace(/,/g, "");
	str = str.replace(/-/g, "");
	str = str.replace(/!/g, "");
	str = str.replace(/#/g, "");
	str = str.replace(/\$/g, "");
	str = str.replace(/\%/g, "");
	str = str.replace(/\^/g, "");
	str = str.replace(/\&/g, "");
	str = str.replace(/\*/g, "");
	str = str.replace(/\(/g, "");
	str = str.replace(/\)/g, "");
	str = str.replace(/\|/g, "");
	str = str.replace(/\"/g, "");
	str = str.replace(/\'/g, "");
	str = str.replace(/\~/g, "");
	str = str.replace(/\+/g, "");
	str = str.replace(/\{/g, "");
	str = str.replace(/\}/g, "");
	str = str.replace(/\</g, "");
	str = str.replace(/\>/g, "");
	str = str.replace(/\\/g, "");
	str = str.replace(/\//g, "");
	str = str.replace(/\?/g, "");
	str = str.replace(/\:/g, "");
	str = str.replace(/\;/g, "");
	str = str.replace(/\[/g, "");
	str = str.replace(/\]/g, "");
	str = str.replace(/\=/g, "");
	str = str.replace(/_/g, "");
	str = str.replace(/\./g, "");
	str = str.replace(/\@/g, "");
	str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, "");
	str = str.replace(/\u02C6|\u0306|\u031B/g, "");
	$(t).val(str);
}