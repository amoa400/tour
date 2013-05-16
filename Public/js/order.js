var lineUnitPrice = 9999;
var insuranceId = Array();
var insuranceTot = 0;
var couponPrice = 0;

// 计算清单总价格
function calculate() {
	check_people_count();

	var totPrice = 0;

	// 旅游团费
	var linePrice = 0;
	linePrice = parseInt($('#s_people_count').html())*lineUnitPrice;
	totPrice += linePrice;
	$('#bill_line_price').html(parseInt($('#s_people_count').html())+'成人&nbsp;&nbsp;×&nbsp;&nbsp;¥'+lineUnitPrice);
	$('#bill_line_price2').html('¥'+linePrice);
	
	// 保险费用
	var insurancePrice = 0;
	var flag = false;
	for (var i = 0; i < insuranceTot; i++) {
		var count = parseInt($("#insurance_count_"+insuranceId[i]).find("option:selected").text());
		if (count != 0) {
			flag = true;
			break;
		}
	}
	if (flag) {
		$('#bill_insurance_content').html('<div class="tt1">保险费用</div>');
		for (var i = 0; i < insuranceTot; i++) {
			var count = parseInt($("#insurance_count_"+insuranceId[i]).find("option:selected").text());
			if (count == 0) continue;
			var price = parseInt($("#insurance_unit_price_"+insuranceId[i]).html());
			var tot = count * price;
			insurancePrice += tot;
			$('#bill_insurance_content').append('<div class="tt2">'+$('#insurance_name_'+insuranceId[i]).html()+'</div>');
			$('#bill_insurance_content').append('<div class="content"><span class="ct">'+count+'份&nbsp;&nbsp;×&nbsp;&nbsp;¥'+price+'</span><span class="price">¥'+tot+'</span></div>');
		}
		$('#bill_insurance_content').removeClass('hidden');
	}
	else {
		$('#bill_insurance_content').html('');
		$('#bill_insurance_content').addClass('hidden');
	}
	totPrice += insurancePrice;
	
	// 优惠方案
	var privilegePrice = 0;
	if ($('#s_privilege').attr('checked') || couponPrice != 0) {
		$('#bill_privilege_content').html('<div class="tt1">优惠费用</div>');
		$('#bill_privilege_content').removeClass('hidden');
	}
	else {
		$('#bill_privilege_content').html('');
		$('#bill_privilege_content').addClass('hidden');
	}
	// 抵用券
	if ($('#s_privilege').attr('checked')) {
		var price = parseInt($('#privilege_price').html());
		var tPrice = parseInt($('#s_people_count').html()) * price;
		privilegePrice -= tPrice;
		$('#bill_privilege_content').append('<div class="tt2">抵用券</div>');
		$('#bill_privilege_content').append('<div class="content"><span class="ct">'+$('#s_people_count').html()+'份&nbsp;&nbsp;×&nbsp;&nbsp;¥'+price+'</span><span class="price">-&nbsp;¥'+tPrice+'</span></div>');
	}
	// 优惠券
	if (couponPrice != 0) {
		var tPrice = parseInt($('#s_people_count').html()) * couponPrice;
		privilegePrice -= tPrice;
		$('#bill_privilege_content').append('<div class="tt2">优惠券</div>');
		$('#bill_privilege_content').append('<div class="content"><span class="ct">'+$('#s_people_count').html()+'份&nbsp;&nbsp;×&nbsp;&nbsp;¥'+couponPrice+'</span><span class="price">-&nbsp;¥'+tPrice+'</span></div>');
	}
	totPrice += privilegePrice;
	
	// 总价
	$('#tot_price').html(totPrice);
	$('#input_tot_price').val(totPrice);
}

// 计算清单总价格门票
function calculateTicket() {
	var totPrice = 0;

	// 门票费用
	$('#bill_ticket_content').html('<div class="tt1">门票费用</div>');
	for(var i = 0; i < ticketTot; i++) {
		var cntPrice = ticketList[i]['count']*ticketList[i]['price'];
		$('#bill_ticket_content').append('<div class="tt2">'+ticketList[i]['name_abb']+'</div>');
		$('#bill_ticket_content').append('<div class="content"><span class="ct">'+ticketList[i]['count']+'份&nbsp;&nbsp;×&nbsp;&nbsp;¥'+ticketList[i]['price']+'</span><span class="price">¥'+cntPrice+'</span></div>');
		totPrice += cntPrice;
	}
	
	// 保险费用
	var insurancePrice = 0;
	var flag = false;
	for (var i = 0; i < insuranceTot; i++) {
		var count = parseInt($("#insurance_count_"+insuranceId[i]).val());
		if (count != 0) {
			flag = true;
			break;
		}
	}
	if (flag) {
		$('#bill_insurance_content').html('<div class="tt1">保险费用</div>');
		for (var i = 0; i < insuranceTot; i++) {
			var count = parseInt($("#insurance_count_"+insuranceId[i]).val());
			if (count == 0) continue;
			var price = parseInt($("#insurance_unit_price_"+insuranceId[i]).html());
			var tot = count * price;
			insurancePrice += tot;
			$('#bill_insurance_content').append('<div class="tt2">'+$('#insurance_name_'+insuranceId[i]).html()+'</div>');
			$('#bill_insurance_content').append('<div class="content"><span class="ct">'+count+'份&nbsp;&nbsp;×&nbsp;&nbsp;¥'+price+'</span><span class="price">¥'+tot+'</span></div>');
		}
		$('#bill_insurance_content').removeClass('hidden');
	}
	else {
		$('#bill_insurance_content').html('');
		$('#bill_insurance_content').addClass('hidden');
	}
	totPrice += insurancePrice;
	
	// 优惠方案
	var privilegePrice = 0;
	if ($('#s_privilege').attr('checked') || couponPrice != 0) {
		$('#bill_privilege_content').html('<div class="tt1">优惠费用</div>');
		$('#bill_privilege_content').removeClass('hidden');
	}
	else {
		$('#bill_privilege_content').html('');
		$('#bill_privilege_content').addClass('hidden');
	}
	// 优惠券
	if (couponPrice != 0) {
		var tPrice = parseInt($('#s_people_count').html()) * couponPrice;
		privilegePrice -= tPrice;
		$('#bill_privilege_content').append('<div class="tt2">优惠券</div>');
		$('#bill_privilege_content').append('<div class="content"><span class="ct">'+$('#s_people_count').html()+'份&nbsp;&nbsp;×&nbsp;&nbsp;¥'+couponPrice+'</span><span class="price">-&nbsp;¥'+tPrice+'</span></div>');
	}
	totPrice += privilegePrice;
	
	// 总价
	$('#tot_price').html(totPrice);
	$('#input_tot_price').val(totPrice);
}

// 检查人数
function check_people_count() {
	var pattern = /^[0-9]+$/;
	if (!pattern.exec($('#s_people_count').val())) {
		$('#s_people_count').val(0);
	}
}

// 检查优惠券
function check_coupon(line_id, url) {
	couponPrice = 0;
	var code = $('#code').val();
	if (code == "") {
		$("#coupon_tip").html("");
		return;
	}
	$.post(
		url,
		{line_id:line_id, code:code, ajax:1},
		function (obj) {
			if (obj.error == 1) {
				$("#coupon_tip").html("<i class='icon icon_error'></i>&nbsp;优惠券代码不正确");
			}
			else
			if (obj.used == 1) {
				$("#coupon_tip").html("<i class='icon icon_error'></i>&nbsp;此优惠券已被使用");
			}
			else {
				$("#coupon_tip").html("<i class='icon icon_right'></i>&nbsp;&nbsp;<span class='price'>-&nbsp;¥"+obj.price+"/人</span>");
				couponPrice = obj.price;
			}
			calculate();
		}
	);
}

// 提交表单
function submit_form() {
	calculate();	
	var bus_id = $('input[name="bus_id"]:checked').val();
	if (bus_id == null)
		alert('请选择上车地点');
	else
		$('#form').submit();
}

// 提交表单（门票）
function submit_form_ticket() {
	calculateTicket();	
	$('#form').submit();
}

// step2

// 检查联系人
function s2_check_contact_name() {
	var name = $('#contact_name').val();
	var pattern = /[^\u4e00-\u9fa5a-zA-Z. ]/;
	if (name.length == 0) {
		$('#t_contact_name').html('<i class=\'icon icon_error\'></i>&nbsp;请填写联系人');
		return false;
	}
	else
	if (pattern.exec(name)) {
		$('#t_contact_name').html('<i class=\'icon icon_error\'></i>&nbsp;姓名格式不正确');
		return false;
	}
	else
	if (name.length > 7) {
		$('#t_contact_name').html('<i class=\'icon icon_error\'></i>&nbsp;姓名长度大于7');
		return false;
	}
	else {
		$('#t_contact_name').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

// 检查手机
function s2_check_contact_phone() {
	var phone = $('#contact_phone').val();
	var pattern = /[^0-9-.+转]/;
	if (phone.length == 0) {
		$('#t_contact_phone').html('<i class=\'icon icon_error\'></i>&nbsp;请填写电话');
		return false;
	}
	if (pattern.exec(phone)) {
		$('#t_contact_phone').html('<i class=\'icon icon_error\'></i>&nbsp;电话格式不正确');
		return false;
	}
	else
	if (phone.length > 20) {
		$('#t_contact_phone').html('<i class=\'icon icon_error\'></i>&nbsp;电话长度大于20');
		return false;
	}
	else {
		$('#t_contact_phone').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

// 检查备用手机
function s2_check_contact_phone2() {
	var phone = $('#contact_phone2').val();
	var pattern = /[^0-9-.+转]/;
	if (phone.length == 0) {
		$('#t_contact_phone2').html('');
		return true;
	}
	else
	if (pattern.exec(phone)) {
		$('#t_contact_phone2').html('<i class=\'icon icon_error\'></i>&nbsp;电话格式不正确');
		return false;
	}
	else
	if (phone.length > 20) {
		$('#t_contact_phone2').html('<i class=\'icon icon_error\'></i>&nbsp;电话长度大于20');
		return false;
	}
	else {
		$('#t_contact_phone2').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

// 检查邮箱
function s2_check_contact_email() {
	var email = $('#contact_email').val();
	var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (email.length == 0) {
		$('#t_contact_email').html('<i class=\'icon icon_error\'></i>&nbsp;请填写邮箱');
		return false;
	}
	else
	if (!pattern.exec(email)) {
		$('#t_contact_email').html('<i class=\'icon icon_error\'></i>&nbsp;邮箱格式不正确');
		return false;
	}
	else
	if (email.length > 30) {
		$('#t_contact_email').html('<i class=\'icon icon_error\'></i>&nbsp;邮箱长度大于30');
		return false;
	}
	else {
		$('#t_contact_email').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

// 检查游客姓名
function s2_check_tourist_name(id) {
	var name = $('#tourist_name_'+id).val();
	var pattern = /[^\u4e00-\u9fa5]/;
	if (name.length == 0) {
		$('#t_tourist_name_'+id).html('<i class=\'icon icon_error\'></i>&nbsp;请填写联系人');
		return false;
	}
	else
	if (pattern.exec(name)) {
		$('#t_tourist_name_'+id).html('<i class=\'icon icon_error\'></i>&nbsp;姓名格式不正确');
		return false;
	}
	else
	if (name.length > 7) {
		$('#t_tourist_name_'+id).html('<i class=\'icon icon_error\'></i>&nbsp;姓名长度大于7');
		return false;
	}
	else {
		$('#t_tourist_name_'+id).html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

// 检查游客身份证
function s2_check_tourist_card(id, force) {
	var card = $('#tourist_card_'+id).val();
	if (card.length == 0) {
		if (force == null){
			$('#t_tourist_card_'+id).html('');
			return true;
		}
		else {
			$('#t_tourist_card_'+id).html('<i class=\'icon icon_error\'></i>&nbsp;请填写身份证号码');
			return false;
		}
	}
	else
	if (card.length == 18) {
		if (isTrueValidateCodeBy18IdCard(card)) {
			$('#t_tourist_card_'+id).html('<i class=\'icon icon_right\'></i>');
			return true;
		}
		else {
			$('#t_tourist_card_'+id).html('<i class=\'icon icon_error\'></i>&nbsp;身份证格式不正确');
			return false;
		}
	}
	else {
		$('#t_tourist_card_'+id).html('<i class=\'icon icon_error\'></i>&nbsp;身份证格式不正确');
		return false;
	}
}

// 检查游客手机
function s2_check_tourist_phone(id) {
	var phone = $('#tourist_phone_'+id).val();
	var pattern = /^[0-9]{11,11}$/;
	if (phone.length == 0) {
		$('#t_tourist_phone_'+id).html('');
		return true;
	}
	else
	if (!pattern.exec(phone)) {
		$('#t_tourist_phone_'+id).html('<i class=\'icon icon_error\'></i>&nbsp;手机格式不正确');
		return false;
	}
	else {
		$('#t_tourist_phone_'+id).html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

var peopleCount = 0;
// step2提交表单
function s2_submit_form() {
	var flag = true;
	if (!s2_check_contact_name()) flag = false;
	if (!s2_check_contact_phone()) flag = false;
	if (!s2_check_contact_phone2()) flag = false;
	if (!s2_check_contact_email()) flag = false;
	for (var i = 1; i <= peopleCount; i++) {
		if (!s2_check_tourist_name(i)) flag = false;
		if (!s2_check_tourist_card(i)) flag = false;
		if (!s2_check_tourist_phone(i)) flag = false;	
	}
	if (flag) $('#form').submit();
	else 
		alert('表单有错误，请修改后提交');
}

// step2提交表单（门票）
function s2_submit_form_ticket() {
	var flag = true;
	if (!s2_check_contact_name()) flag = false;
	if (!s2_check_contact_phone()) flag = false;
	if (!s2_check_contact_phone2()) flag = false;
	if (!s2_check_contact_email()) flag = false;
	for (var i = 0; i < touristTot; i++) {
		if (!s2_check_tourist_name(touristIdList[i])) flag = false;
		if (!s2_check_tourist_card(touristIdList[i], 1)) flag = false;
		if (!s2_check_tourist_phone(touristIdList[i])) flag = false;	
	}
	if (flag) $('#form').submit();
	else 
		alert('表单有错误，请修改后提交');
}

// 检查出游景点
function team_check_destination() {
	var destination = $('#destination').val();
	if (destination.length == 0) {
		$('#t_destination').html('<i class=\'icon icon_error\'></i>&nbsp;请输入出游景点');
		return false;
	}
	else {
		$('#t_destination').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

// 检查出发城市
function s_check_departure_city() {
	$('#t_departure_city').html('<i class=\'icon icon_right\'></i>');
	return true;
}

// 检查行程天数
function team_check_duration() {
	var duration = $('#duration').val();
	var pattern = /[^0-9]/;
	if (duration.length == 0) {
		$('#t_duration').html('<i class=\'icon icon_error\'></i>&nbsp;请输入行程天数');
		return false;
	}
	else
	if (pattern.exec(duration)) {
		$('#t_duration').html('<i class=\'icon icon_error\'></i>&nbsp;格式不正确');
		return false;
	}
	else {
		$('#t_duration').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

// 检查出游日期
function team_check_departure_date() {
	var date = $('#departure_date').val();
	var pattern = /^[0-9]{4,4}-[0-9]{2,2}-[0-9]{2,2}$/;
	if (!pattern.exec(date)) {
		$('#t_departure_date').html('<i class=\'icon icon_error\'></i>&nbsp;请选择日期');
		return false;
	}
	else {
		$('#t_departure_date').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

// 检查出游人数
function team_check_people_count() {
	var count = $('#people_count').val();
	var pattern = /[^0-9]/;
	if (count.length == 0) {
		$('#t_people_count').html('<i class=\'icon icon_error\'></i>&nbsp;请输入出游人数');
		return false;
	}
	else
	if (pattern.exec(count)) {
		$('#t_people_count').html('<i class=\'icon icon_error\'></i>&nbsp;格式不正确');
		return false;
	}
	else {
		$('#t_people_count').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

// 检查人均预算
function team_check_price() {
	var price = $('#price').val();
	var pattern = /[^0-9]/;
	if (price.length == 0) {
		$('#t_price').html('<i class=\'icon icon_error\'></i>&nbsp;请输入人均预算');
		return false;
	}
	else
	if (pattern.exec(price)) {
		$('#t_price').html('<i class=\'icon icon_error\'></i>&nbsp;格式不正确');
		return false;
	}
	else {
		$('#t_price').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

// 检查其他需求
function team_check_requirement() {
	var requirement = $('#requirement').val();
	if (requirement.length == 0) {
		$('#t_requirement').html('');
		return true;
	}
	else {
		$('#t_requirement').html('<i class=\'icon icon_right\'></i>');
		return true;
	}
}

// 检查优惠券
function team_check_coupon(line_id, url) {
	couponPrice = 0;
	var code = $('#code').val();
	if (code == "") {
		$("#coupon_tip").html("");
		return;
	}
	$.post(
		url,
		{line_id:line_id, code:code, ajax:1},
		function (obj) {
			if (obj.error == 1) {
				$("#coupon_tip").html("<i class='icon icon_error'></i>&nbsp;优惠券代码不正确");
			}
			else
			if (obj.used == 1) {
				$("#coupon_tip").html("<i class='icon icon_error'></i>&nbsp;此优惠券已被使用");
			}
			else {
				$("#coupon_tip").html("<i class='icon icon_right'></i>&nbsp;&nbsp;立减"+obj.price+"元/人");
				couponPrice = obj.price;
			}
			calculate();
		}
	);
}

// 团队出游提交表单
function team_submit_form() {
	var flag = true;
	if (!team_check_destination()) flag = false;
	if (!s_check_departure_city()) flag = false;
	if (!team_check_duration()) flag = false;
	if (!team_check_departure_date()) flag = false;
	if (!team_check_people_count()) flag = false;
	if (!team_check_requirement()) flag = false;
	if (!team_check_price()) flag = false;
	if (!s2_check_contact_name()) flag = false;
	if (!s2_check_contact_phone()) flag = false;
	if (!s2_check_contact_phone2()) flag = false;
	if (!s2_check_contact_email()) flag = false;
	if (flag) $('#form').submit();
	else 
		alert('表单有错误，请修改后提交');
}

/*
	检查身份证算法
*/
var Wi = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2, 1 ];// 加权因子   
var ValideCode = [ 1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2 ];// 身份证验证位值.10代表X 
// 18位
function isTrueValidateCodeBy18IdCard(a_idCard) {
	var a_idCard = a_idCard.split("");
    var sum = 0; // 声明加权求和变量   
    if (a_idCard[17].toLowerCase() == 'x') {   
        a_idCard[17] = 10;// 将最后位为x的验证码替换为10方便后续操作   
    }   
    for ( var i = 0; i < 17; i++) {   
        sum += Wi[i] * a_idCard[i];// 加权求和   
    }   
    valCodePosition = sum % 11;// 得到验证码所位置   
    if (a_idCard[17] == ValideCode[valCodePosition]) {   
        return true;   
    } else {   
        return false;   
    }   
}

// 日历
$(document).ready(function(){  
    $("#departure_date").datepicker({
		// 显示之前
		beforeShow : function() {
			$('#begin_date').val('');
		},
		onClose : function() {
			if ($('#begin_date').val() == '') $('#begin_date').val('yyyy-mm-dd');
			team_check_departure_date();
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
