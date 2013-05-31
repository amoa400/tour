var weburl = 'http://'+window.location.host;

// 单选框选择
function radioClick(id) {
	if(!$('#'+id).attr('checked'))
		$('#'+id).attr('checked', 'checked')
}

// ajax获取头部用户信息
function ajaxGetUserInfo() {
	$.get(
		weburl+'/Ajax/getUserInfo',
		{},
		function(data) {
			if (data.login) {
				$('#header .header_top .left').css('display', 'none');
			}
		}
	);
}

						function weixin_code_open() {
								$('#weixin_code').css('display', 'block');
						}
						function weixin_code_close() {
								$('#weixin_code').css('display', 'none');
						}
						function weixin_code2_open() {
								$('#weixin_code2').css('display', 'block');
						}
						function weixin_code2_close() {
								$('#weixin_code2').css('display', 'none');
						}