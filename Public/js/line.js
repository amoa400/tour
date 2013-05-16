function line_navi(id) {
	$('#line_navi_detail').removeClass('on');
	$('#line_navi_price').removeClass('on');
	$('#line_navi_precaution').removeClass('on');
	$('#line_navi_order_flow').removeClass('on');
	$('#line_navi_comment').removeClass('on');
	$('#line_navi_qa').removeClass('on');
	$('#line_navi_note').removeClass('on');
	$('#line_navi_relate_product').removeClass('on');
	$('#line_detail').addClass('hidden');
	$('#line_price').addClass('hidden');
	$('#line_precaution').addClass('hidden');
	$('#line_order_flow').addClass('hidden');
	$('#line_comment').addClass('hidden');
	$('#line_qa').addClass('hidden');
	$('#line_note').addClass('hidden');
	$('#line_relate_product').addClass('hidden');
	
	$('#line_navi_'+id).addClass('on');
	$('#line_'+id).removeClass('hidden');
}

function show_calendar() {
	$('#calendarDiv').css('display', 'block');
	$("#grey").css('display', 'block');
	$('#grey').css('height', document.body.clientHeight+'px');
	var top = parseInt(($(window).height() - $('#calendarDiv').outerHeight())/2);
	var left = parseInt(($(window).width() - $('#calendarDiv').outerWidth())/2);
	$('#calendarDiv').css('top', top+'px');
	$('#calendarDiv').css('left', left+'px');
	//alert((window.screen.availHeight-459)/2);
	//alert();
	$('#calendar').fullCalendar('prev');
	$('#calendar').fullCalendar('next');
}

function hide_calendar() {
	$('#calendarDiv').css('display', 'none');
	$("#grey").css('display', 'none');
}

function order_submit() {
	if ($('#departure_date2').val() == '') {
		alert('请选择出游日期');
		return;
	}
	$('#form').submit();
}