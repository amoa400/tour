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