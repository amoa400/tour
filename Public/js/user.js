// 确认删除
function confirmDel(url, id, name) {
	if (confirm('您将取消订单：编号'+id+'，'+name+'，是否确定？')) {
		window.location.href = url;
	}	
}