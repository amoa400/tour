<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="__NAME__" />
	<title><?php if (!empty($headTitle)) echo $headTitle.'__'; ?>__NAME____同学，去玩吧！专注大学生旅行</title>

	<link href="__ROOT__/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="__ROOT__/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
	<link href="__ROOT__/css/global.css" rel="stylesheet" type="text/css">
	<script src="__ROOT__/js/jquery.min.js" type="text/javascript" ></script>
	<script src="__ROOT__/js/jquery.lazyload.min.js" type="text/javascript" ></script>
	<script src="__ROOT__/js/bootstrap.min.js" type="text/javascript" ></script>
	<script src="__ROOT__/js/global.js" type="text/javascript" ></script>
	<script>
		var _hmt = _hmt || [];
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "//hm.baidu.com/hm.js?fe46971a02721794ec231cdfa11caedb";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	</script>
	
</head>

<body>

	<div id="header">

		<div class="header_top">
			<div class="content main_container">
				<?php if (empty($_SESSION['login'])) { ?>
				<ul class="left">
					<li class="first_li">您好，欢迎来到__NAME__</li>
					<li>|</li>
					<li><a href="<?php echo U('User/login') ?>">登录</a></li>
					<li>|</li>
					<li><a href="<?php echo U('User/register') ?>">免费注册</a></li>
				</ul>
				<?php } ?>
				
				<ul class="right">
					<?php if (!empty($_SESSION['login'])) { ?>
					<li class="first_li"><?php echo ($_SESSION["name"]); ?><i class="icon icon_user"></i>&nbsp;&nbsp;[<a href="<?php echo U('User/logout') ?>">登出</a>]</li>
					<li>|</li>
					<?php } ?>
					<?php if ($_SESSION['group_id'] == 3 || $_SESSION['group_id'] == 4 || $_SESSION['group_id'] == 5) { ?>
					<li><a href="<?php echo U('Fenxiao/home') ?>">我的分销平台</a></li>
					<li>|</li>
					<?php } ?>
					<li><a href="<?php echo U('User/home') ?>">我的__NAME2__<!--<i class="icon-drop-down"></i>--></a></li>
					<!--<li>|</li>
					<li><a href="#">联系客服</a></li>
					<li>|</li>
					<li><a href="#"><i class="icon-suitcase"></i>&nbsp;旅行箱&nbsp;<span class="cart">0</span>&nbsp;件</a></li>-->
					<li>|</li>
					<li><a href="http://page.renren.com/601509075" target="_blank"><i class="icon-renren"></i>&nbsp;+__NAME2__人人</a></li>
					<!--<li>|</li>
					<li><a href="#"><i class="icon-weibo"></i>&nbsp;+__NAME2__微博</a></li>-->
				</ul>
			</div>
		</div>
		<div class="clear"></div>

</div>

<link href="__ROOT__/css/order.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="__ROOT__/js/order.js" charset="utf-8"></script>

<div id="order" class="main_container">
	
	<div class="order_header">
		<div class="logo"><a href="<?php echo U('Index/index'); ?>"><img src="__ROOT__/images/logo.png"></a></div>
		<div class="contact">021-5160-2963</div>
		<div class="clear"></div>
	</div>
	
	<div class="navi">
		<ul>
			<li>填写订单</li>
			<li>填写出游人</li>
			<li>核对订单</li>
			<li>签约付款</li>
			<li>预定成功</li>
		</ul>
	</div>
	


<script type="text/javascript" src="__ROOT__/js/jquery-ui-1.10.2.datepicker.min.js" charset="utf-8"></script>
<link href="__ROOT__/css/jquery-ui-1.10.2.datepicker.min.css" rel="stylesheet" media="screen">
<style>
	#order .navi {display:none;}
</style>
	
<div class="detail team">

	<div class="item">
		<div class="title"><i class="icon-edit"></i>&nbsp;温馨提醒</div>
		<div class="content">
			<ul>
				<li>团队出游一般选择独立成团，有专门的导游和旅游车提供服务，行程中不再有其他客人加入，并可根据您的需要提升各项服务标准、不安排购物等，具体报价需根据实际出游情况核算。</li>
				<li>多数团队价格比散客价格高，是由于团队提供服务成本比散客高，包括服务费、人均承担车费、导服费等。</li>
			</ul>
		</div>
	</div>
	
	<form id="form" action="<?php echo U('Order/teamStep1Do') ?>" method="post">
	<div class="item">
		<div class="title"><i class="icon-edit"></i>&nbsp;出游信息</div>
		<div class="content">
			<ul>
				<li><span><font class="require">*</font>出游景点：</span><textarea id="destination" name="destination" style="height:80px;width:250px;padding:5px;" onblur="team_check_destination()"><?php echo ($order["team"]["destination"]); ?></textarea><strong id="t_destination"></strong></li>
				<li><span><font class="require">*</font>出发城市：</span><select onblur="s_check_departure_city()"><option value="<?php echo ($order["from_city_id"]); ?>"><?php echo ($order["from_city"]); ?></option></select><strong id="t_departure_city"></strong></li>
				<li><span><font class="require">*</font>行程天数：</span><input id="duration" name="duration" onblur="team_check_duration()" type="text" value="<?php echo ($order["line"]["duration"]); ?>" style="width:40px;text-align:center;"><strong id="t_duration"></strong></li>
				<li><span><font class="require">*</font>出游日期：</span><input id="departure_date" name="departure_date" type="text" value="yyyy-mm-dd" style="width:78px;"/><div class="date_icon" onclick="$('#departure_date').focus()"><i class="icon icon_date"></i></div><strong id="t_departure_date" style="margin-left:40px;"></strong></li>
				<li><span><font class="require">*</font>出游人数：</span><input id="people_count" name="people_count" type="text" style="width:40px;text-align:center;" onblur="team_check_people_count()"><strong id="t_people_count"></strong></li>
				<li><span><font class="require">*</font>人均预算：</span><input id="price" name="price" type="text" style="width:40px;text-align:center;" onblur="team_check_price()"><strong id="t_price"></strong></li>
				<li><span>其他需求：</span><textarea id="requirement" name="requirement" style="height:80px;width:250px;padding:5px;" onblur="team_check_requirement()"></textarea><strong id="t_requirement"></strong></li>
			</ul>
		</div>
	</div>
	
	<div class="item">
		<div class="title"><i class="icon-edit"></i>&nbsp;联系人信息</div>
		<div class="content">
			<ul>
				<li><span><font class="require">*</font>联系人：</span><input id="contact_name" name="contact_name" type="text" onblur="s2_check_contact_name()" value="<?php echo ($order["contact_name"]); ?>"/><strong id="t_contact_name"></strong></li>
				<li><span><font class="require">*</font>手机/电话：</span><input id="contact_phone" name="contact_phone" type="text" onblur="s2_check_contact_phone()" value="<?php echo ($order["contact_phone"]); ?>"/><strong id="t_contact_phone"></strong></li>
				<li><span>备用电话：</span><input id="contact_phone2" name="contact_phone2" type="text" onblur="s2_check_contact_phone2()" value="<?php echo ($order["contact_phone2"]); ?>"/><strong id="t_contact_phone2"></strong></li>
				<li><span><font class="require">*</font>电子邮箱：</span><input id="contact_email" name="contact_email" type="text" onblur="s2_check_contact_email()" value="<?php echo ($order["contact_email"]); ?>"/><strong id="t_contact_email"></strong></li>
			</ul>
		</div>
	</div>
	
	<div class="item">
		<div class="title"><i class="icon-edit"></i>&nbsp;优惠信息</div>
		<div class="content">
			<ul>
				<?php if (!empty($order['line_id'])) { ?>
				<li><span>抵用券：</span>立减<?php echo ($order["line"]["di_price"]); ?>元/人&nbsp;&nbsp;&nbsp;&nbsp;<input name="privilege_di" type="checkbox">&nbsp;使用抵用券</li>
				<?php } ?>
				<li><span>优惠券：</span><input type="text" id="code" name="coupon" style="width:125px;" placeholder="请输入优惠代码" onchange="team_check_coupon(<?php echo ($order["line_id"]); ?>,'<?php echo U('Coupon/getInfo') ?>')"><strong id="coupon_tip"></strong></li>
			</ul>
		</div>
	</div>
	
	<input name="id" value="<?php echo ($order["id"]); ?>" style="display:none">
	</form>
	
	<div class="next" style="text-align:center;">
		<span><a href="<?php echo U('Line/show?id='.$order['line_id']) ?>">返回上一步</a></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="javascript:void(0)" onclick="team_submit_form()"><img src="__ROOT__/images/order/next_bg2.png"/></a></span>
	</div>
</div>

<script>
	peopleCount = <?php echo ($order["people_count"]); ?>;
</script>
	
	
	<div class="clear"></div>
</div>

</div>

<div class="clear"></div>

<div style="text-align:center;margin-top:10px;">
	Copyright © 2012-2013 __NAME__<br><br><br>
</div>

</body>

</html>