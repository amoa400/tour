var form = Array();
form['line_type'] = 0;
form['duration'] = 0;
form['province'] = 0;
form['city'] = 0;
form['point_type'] = 0;
form['point'] = 0;
form['sort'] = 0;
form['begin_date'] = 0;
form['end_date'] = 0;
form['begin_price'] = 0;
form['end_price'] = 0;
form['page'] = 1;
form['t'] = 0;
form['subject'] = 0;
form['k'] = '';
form['z'] = 0;

// 线路类型更改
function line_type_change(id, flag) {
	$('.c_line_type').removeClass('selected');
	$('#line_type_'+id).addClass('selected');
	form['line_type'] = id;
	if (flag == null) submit_form();
}

// 行程天数更改
function duration_change(id, flag) {
	$('.c_duration').removeClass('selected');
	$('#duration_'+id).addClass('selected');
	form['duration'] = id;
	if (flag == null) submit_form();
}

// 目的省份更改
function province_change(province, flag) {
	$('.c_province').removeClass('selected');
	$('#province_'+province).addClass('selected');
	form['province'] = province;
	if (flag == null) submit_form();
}

// 目的城市更改
function destination_change(province, city, flag) {
	$('.c_destnation').removeClass('selected');
	$('#destination_'+province+'_'+city).addClass('selected');
	form['province'] = province;
	form['city'] = city;
	if (flag == null) submit_form();
}

// 景点类型更改
function point_type_change(id, flag) {
	$('.c_point_type').removeClass('selected');
	$('#point_type_'+id).addClass('selected');
	form['point_type'] = id;
	if (flag == null) submit_form();
}

// 景点主题更改
function point_subject_change(id, flag) {
	$('.c_point_subject').removeClass('selected');
	$('#point_subject_'+id).addClass('selected');
	form['subject'] = id;
	if (flag == null) submit_form();
}

// 热门景点更改
function point_change(id, flag) {
	$('.c_point').removeClass('selected');
	$('#point_'+id).addClass('selected');
	form['point'] = id;
	if (flag == null) submit_form();
}

// 排序方式改变
function sort_change(id, flag) {
	for (var i = 0; i < 6; i++)
		$('#sort_'+i).removeClass('selected');
	for (var i = 2; i < 5; i++)
		$('#sort_icon_'+i).removeClass('icon_arrow_down_selected');
	$('#sort_icon_5').removeClass('icon_arrow_top_down_selected1');
	$('#sort_icon_5').removeClass('icon_arrow_top_down_selected2');
	$('#sort_'+id).addClass('selected');
	
	if (id < 5)
		form['sort'] = id;
	if (id >= 2 && id <= 4)
		$('#sort_icon_'+id).addClass('icon_arrow_down_selected');
	if (id == 5 || id == 6) {
		id = 5;
		if (form['sort'] != 5) {
			$('#sort_icon_'+id).addClass('icon_arrow_top_down_selected1');
			form['sort'] = 5;
			$('#sort_5').addClass('selected');
		}
		else {
			$('#sort_icon_'+id).addClass('icon_arrow_top_down_selected2');
			form['sort'] = 6;
		}
	}
	if (flag == null) submit_form();
}

// 价格区间改变
function price_between_change() {
	form['sort'] = 7;
	form['begin_price'] = $('#begin_price').val();
	form['end_price'] = $('#end_price').val();
	submit_form();
}

// 翻页
function goto_page(id) {
	form['page'] = id;
	submit_form(false);
}

// 提交表格
function submit_form(initPage) {
	if (initPage == null) {
		form['page'] = 1;
	}
	$('#s_line_type').val(form['line_type']);
	$('#s_duration').val(form['duration']);
	$('#s_province').val(form['province']);
	$('#s_city').val(form['city']);
	$('#s_point_type').val(form['point_type']);
	$('#s_point').val(form['point']);
	$('#s_sort').val(form['sort']);
	$('#s_begin_date').val($('#begin_date').val());
	$('#s_end_date').val($('#end_date').val());
	$('#s_begin_price').val(form['begin_price']);
	$('#s_end_price').val(form['end_price']);
	$('#s_page').val(form['page']);
	$('#s_t').val(form['t']);
	$('#s_subject').val(form['subject']);
	$('#s_keyword').val(form['k']);
	$('#s_z').val(form['z']);
	$('#s_tag').val(form['tag']);
	$('#s_form').submit();
}

// 重新设定搜索条件
function reset() {
	line_type_change(form['line_type'], 1);
	duration_change(form['duration'], 1);
	province_change(form['province'], 1);
	destination_change(form['province'], form['city'], 1);
	point_type_change(form['point_type'], 1);
	point_change(form['point'], 1);
	point_subject_change(form['subject'], 1);
	if (form['sort'] == 6) 
		form['sort'] = 5;
	else
	if (form['sort'] == 5) 
		form['sort'] = 6;
	sort_change(form['sort'], 1);
	if (form['begin_date'] != null && form['begin_date'] != 0)
		$('#begin_date').val(form['begin_date']);
	if (form['end_date'] != null && form['end_date'] != 0)
		$('#end_date').val(form['end_date']);
}

// 显示价格区间提交按钮
function show_price_submit() {
	$('#price_between_submit').removeClass('hidden');
}

// 关闭价格区间提交按钮
function close_price_submit() {
	$('#price_between_submit').addClass('hidden');
}

// 日历
$(document).ready(function(){  
    $("#begin_date").datepicker({
		// 显示之前
		beforeShow : function() {
			$('#begin_date').val('');
		},
		onClose : function() {
			if ($('#begin_date').val() == '') $('#begin_date').val('yyyy-mm-dd');
			if ($('#begin_date').val() != 'yyyy-mm-dd' && $('#end_date').val() != 'yyyy-mm-dd') submit_form();
		},
		// 最小日期
		minDate : new Date(),
		// 显示几个月
		numberOfMonths : 2,
        /* 区域化周名为中文 */  
        dayNamesMin : ["日", "一", "二", "三", "四", "五", "六"],    
        /* 每周从周一开始 */  
        firstDay : 1,  
        /* 区域化月名为中文习惯 */  
        monthNames : ["1月", "2月", "3月", "4月", "5月", "6月",  
                    "7月", "8月", "9月", "10月", "11月", "12月"],  
        /* 月份显示在年后面 */  
        showMonthAfterYear : true,  
        /* 年份后缀字符 */  
        yearSuffix : "年",  
        /* 格式化中文日期  
        （因为月份中已经包含“月”字，所以这里省略） */  
        dateFormat : "yy-mm-dd"     
    }); 
    $("#end_date").datepicker({
		// 显示之前
		beforeShow : function() {
			$('#end_date').val('');
		},
		onClose : function() {
			if ($('#end_date').val() == '') $('#begin_date').val('yyyy-mm-dd');
			if ($('#begin_date').val() != 'yyyy-mm-dd' && $('#end_date').val() != 'yyyy-mm-dd') submit_form();
		},
		// 最小日期
		minDate : new Date(),
		// 显示几个月
		numberOfMonths : 2,
        /* 区域化周名为中文 */  
        dayNamesMin : ["日", "一", "二", "三", "四", "五", "六"],    
        /* 每周从周一开始 */  
        firstDay : 1,  
        /* 区域化月名为中文习惯 */  
        monthNames : ["1月", "2月", "3月", "4月", "5月", "6月",  
                    "7月", "8月", "9月", "10月", "11月", "12月"],  
        /* 月份显示在年后面 */  
        showMonthAfterYear : true,  
        /* 年份后缀字符 */  
        yearSuffix : "年",  
        /* 格式化中文日期  
        （因为月份中已经包含“月”字，所以这里省略） */  
        dateFormat : "yy-mm-dd"     
    });   
});

