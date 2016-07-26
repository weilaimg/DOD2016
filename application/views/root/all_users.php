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
	  <li><a href=" <?php echo site_url('root/log_out'); ?>">登出</a></li>
	</ul>
	<div class="welcom"><?php echo $_SESSION['nickname']; ?>你好</div>

	<table class="table table-hover tb_st">
	  <?php foreach($users as $v):?>
	  	<tr>
	  		<td>用户名：<?php echo $v['username'];?></td>
	  		<td>昵称：<?php echo $v['nickname'];?></td>
	  		<td><?php if($v['rank']==1) echo '[<a href="'.site_url("root/to_be_superuser").'/'.$v['uid'].'">设为超级管理员</a>]'; else echo '[<a href="'.site_url("root/not_be_superuser").'/'.$v['uid'].'">取消超级授权</a>]'; ?> &nbsp&nbsp [<a href="<?php echo site_url('root/del_user').'/'.$v['uid']; ?>">删除该用户</a>]</td>
	  	</tr>
	  <?php endforeach; ?>
	</table>
	<nav>
 
</nav>




<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>