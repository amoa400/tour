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
		<form method="post" action="<?php echo U('Admin/cAgentDo') ?>" enctype="multipart/form-data">
		<input name="id" type="text" value="<?php echo ($user["id"]); ?>" style="display:none;">
		<li><span class="title" style="font-weight:bold;">代理基本信息</span></li>
		<li>
			<span class="title">用户邮箱：</span>
			<input name="email" type="text" value="<?php echo ($user["email"]); ?>">
			<span style="font-size:12px;">&nbsp;&nbsp;若该用户尚未在本网站注册，请先通知其注册</span>
		</li>
		<li>
			<span class="title">代理等级：</span>
			<select name="type_id">
				<option value="1" <?php if ($agent['type_id'] == 1) { ?>selected="selected"<?php } ?>>一级代理</option>
				<option value="2" <?php if ($agent['type_id'] == 2) { ?>selected="selected"<?php } ?>>二级代理</option>
				<option value="3" <?php if ($agent['type_id'] == 3) { ?>selected="selected"<?php } ?>>三级代理</option>
			</select>
		</li>
		<li>
			<span class="title">上级邮箱：</span>
			<input name="father_email" type="text" value="<?php echo ($father["email"]); ?>">
			<span style="font-size:12px;">&nbsp;&nbsp;若该用户不为一级代理，请填写上级代理邮箱</span>
		</li>
		<li>
			<span class="title">真实姓名：</span>
			<input name="name" type="text" value="<?php echo ($agent["name"]); ?>">
		</li>
		<li>
			<span class="title">联系方式：</span>
			<input name="phone" type="text" value="<?php echo ($agent["phone"]); ?>">
		</li>
		<li>
			<span class="title">所在学校：</span>
			<select name="school_id">
				<option value="0">请选择所在学校</option>
				<?php foreach($schoolList as $school) { ?>
				<option value="<?php echo ($school["id"]); ?>" <?php if ($agent['school_id'] == $school['id']) { ?>selected="selected"<?php } ?>><?php echo ($school["name"]); ?></option>
				<?php } ?>
			</select>
		</li>
		<li>
			<span class="title">入学年份：</span>
			<select name="grade">
				<option value="0">请选择入学年份</option>
				<?php for ($i = 2014; $i > 2008; $i--) { ?>
				<option value="<?php echo ($i); ?>" <?php if ($agent['grade'] == $i) { ?>selected="selected"<?php } ?>><?php echo ($i); ?>年</option>
				<?php } ?>
			</select>
		</li>
		<li>
			<span class="title">证件上传：</span>
			<input name="card" type="file">
			<span style="font-size:12px;">&nbsp;&nbsp;学生证、身份证均可（小于2M，jpg格式）</span>
		</li>
		<?php if (!empty($user['id'])) { ?>
		<li>
			<span class="title"></span>
			<a href="__ROOT__/images/agent/photo/<?php echo ($user["id"]); ?>.jpg" target="_blank"><img src="__ROOT__/images/agent/photo/<?php echo ($user["id"]); ?>.jpg" style="width:400px;"></a>
		</li>
		<?php } ?>
		<li><span class="title">&nbsp;</span><input type="submit" class="btn btn-inverse" value="创建代理"></li>
		</form>
		
		
	<div class="clear"></div>
	
</div>

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