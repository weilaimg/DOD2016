<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<style>
		.tb_st{margin-top: 40px;width: 600px;}
		.welcom{margin-left: 10px;color: #5E65C1;line-height: 40px;}
		.error{color:#F00;}
	</style>
</head>
<body>
	<ul class="nav nav-tabs">
	  <li role="presentation"><a href="<?php echo site_url('root/load_admin'); ?>">后台主页</a></li>
	  <li role="presentation"><a href="<?php echo site_url('root/load_cate'); ?>">分类管理</a></li>
	  <li role="presentation"><a href="<?php echo site_url('root/load_article'); ?>">文章管理</a></li>
	  <li role="presentation" ><a href="<?php echo site_url('root/load_comment'); ?>">评论管理</a></li>
	  <li role="presentation"><a href="<?php echo site_url('root/load_all_users'); ?>">用户管理</a></li>
	  <li role="presentation"><a href="<?php echo site_url('root/load_userinfo'); ?>">隐私管理</a></li>
	  <li role="presentation"><a href="<?php echo site_url('index/first'); ?>">前台首页</a></li>
	  <li><a href=" <?php echo site_url('root/log_out'); ?>">登出</a></li>
	</ul>
	<div class="welcom"><?php echo $_SESSION['nickname']; ?>你好</div>
	<form action=" <?php echo site_url('root/check_passwd');?> " method="post">
	<table class="table table-hover tb_st">
	  <tr>
	  	<td>请输入旧密码：</td>
	  	<td> <input type="password" name="old_passwd" value="<?php echo set_value('old_passwd');?>"> </td><td><span class="error"><?php echo form_error('old_passwd'); ?></span></td>
	  </tr>
	  <tr>
	  	<td>请输入新密码：</td>
	  	<td><input type="password" name="new_passwd1" value="<?php echo set_value('new_passwd1');?>"> </td><td><span class="error"><?php echo form_error('new_passwd1');?></span></td>
	  </tr>
	  <tr>
	  	<td>请再次输入新密码：</td>
	  	<td><input type="password" name="new_passwd2" value="<?php echo set_value('new_passwd2');?>"></td><td><span class="error"><?php echo form_error('new_passwd2');?></span></td>
	  </tr>
	</table>
	<input type="submit" value = '提交'>
	</form>







<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>