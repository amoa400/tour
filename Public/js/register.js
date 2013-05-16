function check_phone() {
	var phone = $('#s_phone').val();
	var pattern = /^[0-9]{11,11}$/;
	if (phone.length == 0) {
		$('#t_phone').html('');
		return true;
	}
	if (!pattern.exec(phone)) {
		$('#t_phone').html('<i class=\'icon icon_error\'></i>&nbsp;<span>手机号码格式不正确</span>');
		return false;
	}
	else {
		$('#t_phone').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

function check_password() {
	var password = $('#s_password').val();
	if (password.length < 6 || password.length > 20) {
		$('#t_password').html('<i class=\'icon icon_error\'></i>&nbsp;<span>密码应在6-20个字符内，且格式正确</span>');
		return false;
	}
	else {
		$('#t_password').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

function check_re_password() {
	check_password();
	var password = $('#s_re_password').val();
	if (password.length < 6 || password.length > 20) {
		$('#t_re_password').html('<i class=\'icon icon_error\'></i>&nbsp;<span>密码应在6-20个字符内，且格式正确</span>');
		return false;
	}
	else
	if ($('#s_password').val() != password) {
		$('#t_re_password').html('<i class=\'icon icon_error\'></i>&nbsp;<span>两次输入的密码不一致</span>');
		return false;
	}
	else {
		$('#t_re_password').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

function check_school() {
	$('#t_school').html('<i class=\'icon icon_right\'></i>');
	return true;
}

function check_email() {
	var email = $('#s_email').val();
	var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!pattern.exec(email)) {
		$('#t_email').html('<i class=\'icon icon_error\'></i>&nbsp;<span>邮箱格式不正确</span>');
		return false;
	}
	else {
		$('#t_email').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

function check_name() {
	var name = $('#s_name').val();
	if (name.length == 0) {
		$('#t_name').html('');
		return true;
	}
	var pattern = /[^\u4e00-\u9fa5]/;
	if (pattern.exec(name) || name.length > 7) {
		$('#t_name').html('<i class=\'icon icon_error\'></i>&nbsp;<span>姓名应为1-7个汉字</span>');
		return false;
	}
	else {
		$('#t_name').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

function form_submit() {
	var flag = true;
	if (!check_email()) flag = false;
	if (!check_password()) flag = false;
	if (!check_re_password()) flag = false;
	if (!check_phone()) flag = false;
	if (!check_name()) flag = false;
	if (!flag) return;
	
	$('#s_form').submit();
}