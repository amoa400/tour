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
		<form method="post" action="<?php echo U('Admin/cOrderDo') ?>" enctype="multipart/form-data">
		<input name="id" value="<?php echo ($order["id"]); ?>" style="display:none;">
		<li><span class="title" style="font-weight:bold;">订单基本信息</span></li>
		<?php if (!empty($order)) { ?>
		<li>
			<span class="title">编号：</span>
			<?php echo ($order["id"]); ?>
		</li>
		<?php } ?>
		<li>
			<span class="title">名称：</span>
			<input name="line_name" type="text" value="<?php echo ($order["line_name"]); ?>">
		</li>
		<li>
			<span class="title">状态：</span>
			<select name="status">
				<option value="1" <?php if ($order['status'] == 1) echo 'selected="selected"'; ?>>待提交</option>
				<option value="2" <?php if ($order['status'] == 2) echo 'selected="selected"'; ?>>待处理（等待客服处理）</option>
				<option value="3" <?php if ($order['status'] == 3) echo 'selected="selected"'; ?>>待付款</option>
				<option value="4" <?php if ($order['status'] == 4) echo 'selected="selected"'; ?>>已付款（预定并付款）</option>
				<option value="5" <?php if ($order['status'] == 5) echo 'selected="selected"'; ?>>订单取消</option>
				<option value="6" <?php if ($order['status'] == 6) echo 'selected="selected"'; ?>>已预定（预定未付款）</option>
				<option value="7" <?php if ($order['status'] == 7) echo 'selected="selected"'; ?>>成功出游</option>
			</select>
		</li>
		<li>
			<span class="title">类型：</span>
			<select name="type">
				<option value="1" <?php if ($order['type'] == 1) echo 'selected="selected"'; ?>>跟团游</option>
				<option value="2" <?php if ($order['type'] == 2) echo 'selected="selected"'; ?>>团队游</option>
				<option value="3" <?php if ($order['type'] == 3) echo 'selected="selected"'; ?>>自助游</option>
				<option value="4" <?php if ($order['type'] == 4) echo 'selected="selected"'; ?>>门票</option>
			</select>
		</li>
		<li>
			<span class="title">总价格：</span>
			<input name="price" type="text" value="<?php echo ($order["price"]); ?>">
			&nbsp;&nbsp;若此处填写0，提交后将自动计算
		</li>
		<li>
			<span class="title">已支付金额：</span>
			<input name="payed_money" type="text" value="<?php echo ($order["payed_money"]); ?>">
			&nbsp;&nbsp;无论线上线下付款，须等支付金额到帐后方可更改
		</li>
		<li>
			<span class="title">用户需求：</span>
			<textarea name="requirement"><?php echo ($order["requirement"]); ?></textarea>
		</li>
		<li>
			<span class="title">备注：</span>
			<textarea name="remark"><?php echo ($order["remark"]); ?></textarea>
		</li>

		<li>&nbsp;</li>
		
		<li>
			<span class="title">用户编号：</span>
			<input name="user_id" type="text" value="<?php echo ($order["user_id"]); ?>">
		</li>
		<li>
			<span class="title">所在学校：</span> 	
			<select name="school_id">
				<?php foreach($schoolList as $item) { ?>
					<option value="<?php echo ($item["id"]); ?>" <?php if ($order['school_id'] == $item['id']) echo 'selected="selected"'; ?>><?php echo ($item["name"]); ?></option>
				<?php } ?>
			</select>
		</li>
		<li>
			<span class="title">游玩日期：</span>
			<input name="departure_date" type="text" value="<?php echo ($order["departure_date"]); ?>">
		</li>
		<li>
			<span class="title">联系人姓名：</span>
			<input name="contact_name" type="text" value="<?php echo ($order["contact_name"]); ?>">
		</li>
		<li>
			<span class="title">联系人电话：</span>
			<input name="contact_phone" type="text" value="<?php echo ($order["contact_phone"]); ?>">
		</li>
		<li>
			<span class="title">联系人电话2：</span>
			<input name="contact_phone2" type="text" value="<?php echo ($order["contact_phone2"]); ?>">
		</li>
		<li>
			<span class="title">联系人邮箱：</span>
			<input name="contact_email" type="text" value="<?php echo ($order["contact_email"]); ?>">
		</li>
		<li>
			<span class="title">景点编号：</span>
			<input name="line_id" type="text" value="<?php echo ($order["line_id"]); ?>">
		</li>
		<li>
			<span class="title">优惠代码：</span>
			<input name="coupon" type="text" value="<?php echo ($order["coupon"]); ?>">
		</li>
		

		<li><span class="title">&nbsp;</span><input type="submit" class="btn btn-inverse" value="下一步"></li>
		</form>
		
	<div class="clear"></div>
	
</div>

<!--
☆为了您的安全，建议游客购买旅游人身意外保险,费用为10元/人；
☆此线路价格为打包特惠价，所有证件无效均不退款；
☆此线路为散客拼团，先来先坐，请游客准时上车否则过时不候，产生的座位费不退，请保持通讯畅通，以便导游出团前通知有关事宜；
☆如遇国家政策性调价，人力不可抗拒因素或游客自身因素，造成的损失和增加的费用由游客自理；
☆请游客在旅途中注意人身及财物安全（请特别注意儿童的安全）；
☆在不变动景点与住宿条件的情况下，我公司可根据实际情况对行程作适当调整
☆车型根据最终报名人数决定，保证每人一正座。
-->

<script charset="utf-8" src="__ROOT__/editor/kindeditor.js"></script>
<script charset="utf-8" src="__ROOT__/editor/lang/zh_CN.js"></script>
<script>
        KindEditor.ready(function(K) {
            window.editor = K.create('#introduction', {
				minWidth : '400px',
			});
        });
</script>

<script>
var province = Array();
<?php for($i = 0; $i < count($provinceList); $i++) { ?>
province[<?php echo ($i); ?>] = Array();
province[<?php echo ($i); ?>]['tot'] = <?php echo count($provinceList[$i]['cityList']) ?>;
province[<?php echo ($i); ?>]['city'] = Array(); 
<?php for($j = 0; $j < count($provinceList[$i]['cityList']); $j++) { ?>
	province[<?php echo ($i); ?>]['city'][<?php echo ($j); ?>] = Array();
	province[<?php echo ($i); ?>]['city'][<?php echo ($j); ?>]['id'] = '<?php echo ($provinceList["$i"]["cityList"]["$j"]["id"]); ?>';
	province[<?php echo ($i); ?>]['city'][<?php echo ($j); ?>]['name'] = '<?php echo ($provinceList["$i"]["cityList"]["$j"]["name"]); ?>';
<?php } ?>
<?php } ?>
changeProvince(1);

function changeProvince() {
	var id = $('#province').find("option:selected").val();
	var city = $('#city');
	city.html('');
	for (var i = 0; i < province[id-1]['tot']; i++)
		city.append('<option value="'+(i+1)+'">'+province[id-1]['city'][i]['name']+'</option>');
}

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