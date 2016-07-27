<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<style>
		.tb_st{margin-top: 40px;width: 600px;}
		.welcom{margin-left: 10px;color: #5E65C1;line-height: 40px;}
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
	  <li><a href=" <?php echo site_url('login/log_out'); ?>">登出</a></li>
	</ul>
	<div class="welcom"><?php echo $_SESSION['nickname']; ?>你好</div>

	<table class="table table-hover tb_st">
	  <tr>
	  	<td>您的用户名为：</td>
	  	<td><?php echo $userinfo[0]['username']; ?></td>
	  </tr>
	  <tr>
	  	<td>您的昵称为：</td>
	  	<td><?php echo $userinfo[0]['nickname']; ?></td>
	  </tr>
	  <tr>
	  	<td>您的Email地址为：</td>
	  	<td><?php echo $userinfo[0]['email']; ?></td>
	  </tr>
	</table>
	<nav>
 
</nav>
<button><a href="<?php echo site_url('root/load_change_user'); ?>">修改个人信息</a></button>
<button><a href="<?php echo site_url('root/load_change_passwd'); ?>">修改密码</a></button>





<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>