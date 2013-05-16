<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
	<title>后台管理</title>

	<link href="__ROOT__/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="__ROOT__/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
	<link href="__ROOT__/css/global.css" rel="stylesheet" type="text/css">
	<script src="__ROOT__/js/jquery.min.js" type="text/javascript" ></script>
	<script src="__ROOT__/js/bootstrap.min.js" type="text/javascript" ></script>
	<script src="__ROOT__/js/global.js" type="text/javascript" ></script>
	<link href="__ROOT__/css/admin/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>

<body>

	<div class="top_img" align="right">
		<!--
	  <table width="38%" border="0" cellpadding="0" cellspacing="0" style="margin-top:26px; color:#FF6E00;">
		<tr>
		  <td width="41%" align="left">专家团队：李黄河</td>
		  <td width="41%" align="left">用户：13888888888</td>
		  <td width="18%" align="left"><a href="#">退出</a></td>
		</tr>
		<tr>
		  <td align="left">指导老师：何长江</td>
		  <td colspan="2" align="left">身份：王牌客户</td>
		</tr>
	  </table>
	  -->
	</div>

	<div class="mid">
	  <div class="left">
		<!--
		<div class="left1">
		   <div class="left_te1"><img src="__ROOT__/images/admin/left1_03.jpg" /></div>
		   <div class="left_te2" align="center">
			 
		   </div>
		   <div class="left_te3"><img src="__ROOT__/images/admin/left1_07.jpg" /></div>
		</div>
		-->
		
		<div class="left2" style="margin:0;">
		  <div class="left2_1"><img src="__ROOT__/images/admin/left2_01.jpg" /></div>
		  <div class="left2_2">
			<ul>
				<li><span>全局信息管理</span></li>
				<li><a href="<?php echo U('Admin/home') ?>">管理首页</a></li>
				<li><a href="<?php echo U('Index/index') ?>">网站首页</a></li>
			</ul>
			<ul>
				<li><span>线路信息管理</span></li>
				<li><a href="<?php echo U('Admin/cLine') ?>">新增线路</a></li>
				<li><a href="<?php echo U('Admin/editLine') ?>">修改线路</a></li>
				<li><a href="<?php echo U('Admin/showLine') ?>">线路列表</a></li>
			</ul>
			<ul>
				<li><span>景点信息管理</span></li>
				<li><a href="<?php echo U('Admin/cPoint') ?>">新增景点</a></li>
				<li><a href="<?php echo U('Admin/editPoint') ?>">修改景点</a></li>
				<li><a href="<?php echo U('Admin/showPoint') ?>">景点列表</a></li>
			</ul>
			<ul>
				<li><span>订单信息管理</span></li>
				<li><a href="<?php echo U('Admin/editOrder') ?>">修改订单</a></li>
				<li><a href="<?php echo U('Admin/showOrder') ?>">订单列表</a></li>
			</ul>
			<ul>
				<li><span>代理信息管理</span></li>
				<li><a href="<?php echo U('Admin/cAgent') ?>">新增代理</a></li>
				<li><a href="<?php echo U('Admin/editAgent') ?>">修改代理</a></li>
				<li><a href="<?php echo U('Admin/showAgent') ?>">代理列表</a></li>
			</ul>
			<ul>
				<li><span>门票信息管理</span></li>
				<li><a href="<?php echo U('Admin/cTicket') ?>">新增门票</a></li>
				<li><a href="<?php echo U('Admin/editTicket') ?>">修改门票</a></li>
				<li><a href="<?php echo U('Admin/showTicket') ?>">门票列表</a></li>
			</ul>
		  </div>
		  <div class="left2_1"><img src="__ROOT__/images/admin/left2_02.jpg" /></div>
		</div>
	  </div>
	  
	  <div class="right">
		 <div class="right1"><?php echo ($pageTitle); ?></div>
			<div class="right2" align="center">
				<div class="right2_tt" align="left">



<link href="__ROOT__/css/admin/line.css" rel="stylesheet" media="screen">

<div id="line">
	<ul>
		<form method="post" action="<?php echo U('Admin/cTicket2Do') ?>" enctype="multipart/form-data">
		
		<li><span class="title" style="font-weight:bold;">订单基本信息</span></li>
		<li><span class="title">编号：</span><?php echo ($ticket["id"]); ?></li>
		<li><span class="title">名称：</span><?php echo ($ticket["name"]); ?></li>
		<input name="ticket_id" value="<?php echo ($ticket["id"]); ?>" style="display:none;">
		<li>&nbsp;</li>
		<li>
			<span class="title" style="font-weight:bold;">行程详细信息</span>
		</li>
		<li>
			<span class="title">价格：</span>
			<input id="price" type="text" value="<?php echo ($ticket["price"]); ?>"/>
		</li>
		<li>
			<span class="title">提前天数：</span>
			<input id="day_ahead" type="text" value="<?php echo ($ticket["day_ahead"]); ?>"/>
		</li>
		<li>
			<span class="title">提前时间：</span>
			<input id="time_ahead" type="text" value="<?php echo ($ticket["time_ahead"]); ?>"/>
		</li>
		<li class="basic">
			<span class="title">起始日期：</span> 
			<input id="cntDate" class="date" type="text" value="<?php echo Date('Y-m-d', getTime()) ?>">
		</li>
		<li class="basic">
			<span class="title">自动生成天数：</span> 
			<input id="autoDay" type="text" value="60">
		</li>
		<li class="advance" style="display:none">
			<span class="title">起始日期：</span> 
			<input id="stDate" class="date" type="text" value="<?php echo Date('Y-m-d', getTime()) ?>">
		</li>
		<li class="advance" style="display:none">
			<span class="title">结束日期：</span> 
			<input id="edDate" class="date" type="text" value="<?php echo Date('Y-m-d', getTime()) ?>">
		</li>
		<li class="advance" style="display:none">
			<span class="title">星期几：</span> 
			<input id="week1" type="checkbox" checked="checkbox">&nbsp;星期一&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="week2" type="checkbox" checked="checkbox">&nbsp;星期二&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="week3" type="checkbox" checked="checkbox">&nbsp;星期三&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="week4" type="checkbox" checked="checkbox">&nbsp;星期四&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="week5" type="checkbox" checked="checkbox">&nbsp;星期五&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="week6" type="checkbox" checked="checkbox">&nbsp;星期六&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="week0" type="checkbox" checked="checkbox">&nbsp;星期日&nbsp;&nbsp;&nbsp;&nbsp;
		</li>
		<li>
			<span class="title">自动生成：</span> 
			<a class="btn" onclick="autoGenerate();">自动生成日程价格表</a>
			<a class="btn" onclick="autoGenerate(1);">自动追加日程价格表</a>
		</li>
		<li>
			<span class="title">高级自动生成：</span> 
			<a class="btn btn-primary" onclick="version_change('basic');">简单版</a>	
			<a class="btn btn-primary" onclick="version_change('advance');">高级版</a>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="btn btn-danger" onclick="removeItem();">清空所有日程</a>
		</li>
		
		<li>
			<span class="title"><a href="<?php echo U('Admin/cTicket?id='.$ticket['id']) ?>">上一步</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="submit" class="btn btn-inverse" value="下一步">
		</li>
		

		<li>&nbsp;</li>
		
		<div id="scheduleList">
			<?php foreach($ticket['schedule'] as $item) { ?>
			<li>
				<span class="title">日期：</span>
				<input class="date" name="date[]" type="text" value="<?php echo ($item["date"]); ?>" style="width:75px">&nbsp;&nbsp;
				价格：<input name="datePrice[]" type="text" value="<?php echo ($item["price"]); ?>" style="width:75px">&nbsp;&nbsp;
				预订截止时间：<input name="deadline[]" type="text" value="<?php echo ($item["deadline"]); ?>" style="width:115px">&nbsp;&nbsp;
			</li>
			<?php } ?>
		</div>
		
		<li>
			<span class="title"></span>
			<a class="btn btn-primary" onclick="newItem();">新增5项</a>
		</li>
		
		<li>
			<span class="title"><a href="<?php echo U('Admin/cTicket?id='.$ticket['id']) ?>">上一步</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="submit" class="btn btn-inverse" value="下一步">
		</li>
		</form>

	<div class="clear"></div>
	
</div>

<link href="__ROOT__/css/jquery-ui-1.10.2.datepicker.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="__ROOT__/js/jquery-ui-1.10.2.datepicker.min.js" charset="utf-8"></script>

<script>

	var cntVersion = 'basic';

	function js_strto_time(str_time){
		var new_str = str_time.replace(/:/g,'-');
		new_str = new_str.replace(/ /g,'-');
		var arr = new_str.split("-");
		var datum = new Date(Date.UTC(arr[0],arr[1]-1,arr[2],arr[3]-8,arr[4],arr[5]));
		return strtotime = datum.getTime()/1000;
	}
	
	function version_change(name) {
		$('.'+name).css('display', 'block');
		cntVersion = name;
		if (name == 'advance') $('.basic').css('display', 'none');
		else  $('.advance').css('display', 'none');
	}
	
	function autoGenerate(ap) {
		var tot = $('#autoDay').val();
		var price = parseInt($('#price').val());
		var priceInc = parseInt($('#priceInc').val());
		var day_ahead = $('#day_ahead').val();
		var time_ahead = $('#time_ahead').val();
		
		if (cntVersion == 'basic') {
			var s = '';
			var cntDate = $('#cntDate').val() + " 00:00:00";
			cntDate = js_strto_time(cntDate);
			for(var i = 0; i < tot; i++) {
				var date = new Date(cntDate*1000 + 86400 * 1000 * i); 
				var year = 1900+date.getYear();
				var month = date.getMonth()+1;
				if (month < 10) month = '0' + month;
				var day = date.getDate();
				if (day < 10) day = '0' + day;
				var cntPrice = price;
				
				var date2 = new Date(cntDate*1000 + 86400 * 1000 * (i-day_ahead)); 
				var year2 = 1900+date2.getYear();
				var month2 = date2.getMonth()+1;
				if (month2 < 10) month2 = '0' + month2;
				var day2 = date2.getDate();
				if (day2 < 10) day2 = '0' + day2;
				
				s += "<li>";
				s += "<span class='title'>日期：</span>";
				s += "<input class='date' name='date[]' type='text' value='"+year+"-"+month+"-"+day+"' style='width:75px'>";
				s += "&nbsp;&nbsp;&nbsp;&nbsp;价格：<input name='datePrice[]' type='text' value='"+cntPrice+"' style='width:75px'>&nbsp;&nbsp;";
				s += "预订截止时间：<input name='deadline[]' type='text' value='"+year2+"-"+month2+"-"+day2+" "+time_ahead+"' style='width:115px'>&nbsp;&nbsp;";
				s += "</li>";
			}
			if (ap == 1) $('#scheduleList').append(s);
			else $('#scheduleList').html(s);
		} else {
			var stDate = $('#stDate').val() + " 00:00:00";
			stDate = js_strto_time(stDate);
			var edDate = $('#edDate').val() + " 00:00:00";
			edDate = js_strto_time(edDate);
			var totDay = (edDate-stDate)/86400+1;
			
			var s = '';
			for (var i = 0; i < totDay; i++) {
				var date = new Date(stDate*1000 + 86400 * 1000 * i);
				var year = 1900+date.getYear();
				var month = date.getMonth()+1;
				if (month < 10) month = '0' + month;
				var day = date.getDate();
				if (day < 10) day = '0' + day;
				var week = date.getDay();
				var cntPrice = price;
				if ($('#week'+week).attr('checked') != 'checked') continue;
				
				var date2 = new Date(stDate*1000 + 86400 * 1000 * (i-day_ahead)); 
				var year2 = 1900+date2.getYear();
				var month2 = date2.getMonth()+1;
				if (month2 < 10) month2 = '0' + month2;
				var day2 = date2.getDate();
				if (day2 < 10) day2 = '0' + day2;
				
				s += "<li>";
				s += "<span class='title'>日期：</span>";
				s += "<input class='date' name='date[]' type='text' value='"+year+"-"+month+"-"+day+"' style='width:75px'>";
				s += "&nbsp;&nbsp;&nbsp;&nbsp;价格：<input name='datePrice[]' type='text' value='"+cntPrice+"' style='width:75px'>&nbsp;&nbsp;";
				s += "预订截止时间：<input name='deadline[]' type='text' value='"+year2+"-"+month2+"-"+day2+" "+time_ahead+"' style='width:115px'>&nbsp;&nbsp;";
				s += "</li>";
			}
			if (ap == 1) $('#scheduleList').append(s);
			else $('#scheduleList').html(s);
		}
		resetDate();
	}
	
	function newItem() {
		var s = '';
		var day_ahead = $('#day_ahead').val();
		var time_ahead = $('#time_ahead').val();
		var cntPrice = parseInt($('#price').val());
		for (var i = 0; i < 5; i++) {
			s += "<li>";
			s += "<span class='title'>日期：</span>";
			s += "<input class='date' name='date[]' type='text' value='' style='width:75px'>";
			s += "&nbsp;&nbsp;&nbsp;&nbsp;价格：<input name='datePrice[]' type='text' value='"+cntPrice+"' style='width:75px'>&nbsp;&nbsp;";
			s += "预订截止时间：<input name='deadline[]' type='text' value='' style='width:115px'>&nbsp;&nbsp;";
			s += "</li>";
		}
		$('#scheduleList').append(s);
		resetDate();
	}
	
	function removeItem() {
		$('#scheduleList').html('');
	}
	
	function resetDate() {
		$(".date").datepicker({
			// 显示之前
			beforeShow : function() {
				//$('.date').val('');
			},
			onClose : function() {
				//if ($('.date').val() == '') $('.date').val('yyyy-mm-dd');
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
	}
</script>

<script>

// 日历
$(document).ready(function(){  
	resetDate();
});

</script>

			</div>
		</div>
	<div class="right3"><img src="__ROOT__/images/admin/right_b_03.jpg" /></div>
  </div>
</div>

<div style=" clear:both;"></div>
<div class="btt" align="center">
  <table width="98%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="18%" align="center"></td>
      <td width="82%" align="right"></td>
    </tr>
  </table>
</div>
</body>
</html>