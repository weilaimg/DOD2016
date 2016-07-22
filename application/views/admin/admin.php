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
	  <li role="presentation" class="active"><a href="<?php echo site_url('admin/load_admin'); ?>">后台主页</a></li>
	  <li role="presentation" ><a href="<?php echo site_url('admin/load_cate'); ?>">分类管理</a></li>
	  <li role="presentation"><a href="article.php">文章管理</a></li>
	  <li role="presentation"><a href="comment.php">评论管理</a></li>
	  <li role="presentation"><a href="user.php">用户管理</a></li>
	</ul>
	<div class="welcom">你好</div>
	<table class="table table-hover tb_st">
	  <tr>
			<td>用户名</td>
			<td><?php echo $this -> session -> userdata('username'); ?></td>
		</tr>
		<tr>
			<td>登录IP</td>
			<td><?php echo $this -> input -> ip_address(); ?></td>
		</tr>
		<tr>
			<td>登录时间</td>
			<td><?php echo date('y-m-d',$this -> session -> userdata('logintime')); ?></td>
		</tr>

		<tr>
			<td colspan='2' class="th"><span class="span_server" style="float:left">&nbsp</span>服务器信息</td>
		</tr>

		<tr>
			<td>服务器环境</td>
			<td><?php echo $this -> input -> server('SERVER_SOFTWARE');?></td>
		</tr>
		<tr>
			<td>PHP版本</td>
			<td><?php echo PHP_VERSION; ?></td>
		</tr>
		<tr>
			<td>服务器IP</td>
			<td><?php echo $this -> input -> server('SERVER_ADDR');?></td>
		</tr>
		<tr>
			<td>数据库信息</td>
			<td><?php echo mysql_get_server_info(); ?></td>
		</tr>

	</table>
</body>
</html>