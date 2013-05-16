// 单选框选择
function radioClick(id) {
	if(!$('#'+id).attr('checked'))
		$('#'+id).attr('checked', 'checked')
}