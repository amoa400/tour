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
		<form method="post" action="<?php echo U('Admin/cTicketDo') ?>" enctype="multipart/form-data">
		<input name="id" type="text" value="<?php echo ($ticket["id"]); ?>" style="display:none;">
		<li><span class="title" style="font-weight:bold;">门票基本信息</span></li>
		<li>
			<span class="title">名称：</span>
			<input name="name" type="text" value="<?php echo ($ticket["name"]); ?>">
			<span style="font-size:12px;">&nbsp;&nbsp;30个字或以内</span>
		</li>
		<li>
			<span class="title">名称缩写：</span>
			<input name="name_abb" type="text" value="<?php echo ($ticket["name_abb"]); ?>">
			<span style="font-size:12px;">&nbsp;&nbsp;10个字或以内</span>
		</li>
		<li>
			<span class="title">预订须知：</span>
			<span class="text"><textarea id="desc" name="desc"><?php echo ($ticket["desc"]); ?></textarea></span>
		</li>
		<li>
			<span class="title">价格：</span>
			<input name="price" type="text" value="<?php echo ($ticket["price"]); ?>">
		</li>
		<li>
			<span class="title">原价：</span>
			<input name="origin_price" type="text" value="<?php echo ($ticket["origin_price"]); ?>">
		</li>
		<li>
			<span class="title">一级代理价：</span>
			<input name="fenxiao_price1" type="text" value="<?php echo ($ticket["fenxiao_price1"]); ?>">
		</li>
		<li>
			<span class="title">二级代理价：</span>
			<input name="fenxiao_price2" type="text" value="<?php echo ($ticket["fenxiao_price2"]); ?>">
		</li>
		<li>
			<span class="title">三级代理价：</span>
			<input name="fenxiao_price3" type="text" value="<?php echo ($ticket["fenxiao_price3"]); ?>">
		</li>
		<li>
			<span class="title">优惠券金额：</span>
			<input name="fenxiao_youhui" type="text" value="<?php echo ($ticket["fenxiao_youhui"]); ?>">
		</li>
		<li>
			<span class="title">点评奖金：</span>
			<input name="comment_price" type="text" value="<?php echo ($ticket["comment_price"]); ?>">
		</li>
		<li>
			<span class="title">支付方式：</span>
			<select name="pay_type_id">
				<option value="1" <?php if ($ticket['pay_type_id'] == 1) { ?>selected="selected"<?php } ?>>网上支付</option>
				<option value="2" <?php if ($ticket['pay_type_id'] == 2) { ?>selected="selected"<?php } ?>>景点支付</option>
			</select>
		</li>
		<li>
			<span class="title">所属景点：</span>
			<select name="point[]" multiple="multiple">
				<?php foreach($pointList as $item) { ?>
				<option value="<?php echo ($item["id"]); ?>" <?php if ($item['selected'] == 1) { ?>selected="selected"<?php } ?>><?php echo ($item["name"]); ?></option>
				<?php } ?>
			</select>
			<span style="font-size:12px;">&nbsp;&nbsp;<a href="<?php echo U('Admin/cPoint') ?>" target="_blank">新增景点</a></span>
		</li>
		<li>
			<span class="title">需要身份信息：</span>
			<input name="identity" type="checkbox" <?php if ($ticket['identity'] == 1) { ?>checked="checked"<?php } ?>>
		</li>
		<li>
			<span class="title">提前预订天数：</span>
			<input name="day_ahead" type="text" value="<?php echo ($ticket["day_ahead"]); ?>">
		</li>
		<li>
			<span class="title">提前预订时间：</span>
			<input name="time_ahead" type="text" value="<?php echo ($ticket["time_ahead"]); ?>">		
		</li>
		<li>
			<span class="title">&nbsp;</span>
			上面填写提前预订天订票的截止时间，比如上上面填的1，上面填写的20:00，则明天的票将截止到今天晚上8点。
		</li>
		<li><span class="title">&nbsp;</span><input type="submit" class="btn btn-inverse" value="下一步"></li>
		</form>
		
		
	<div class="clear"></div>
	
</div>

<script charset="utf-8" src="__ROOT__/editor/kindeditor.js"></script>
<script charset="utf-8" src="__ROOT__/editor/lang/zh_CN.js"></script>
<script>
        KindEditor.ready(function(K) {
            window.editor = K.create('#desc', {
				minWidth : '400px',
			});
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