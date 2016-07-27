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
	  <li role="presentation"><a href="<?php echo site_url('admin/load_admin'); ?>">后台主页</a></li>
	  <li role="presentation"><a href="<?php echo site_url('admin/load_article'); ?>">文章管理</a></li>
	  <li role="presentation"  class="active"><a href="<?php echo site_url('admin/load_comment'); ?>">评论管理</a></li>
	  <li role="presentation"><a href="<?php echo site_url('admin/load_userinfo'); ?>">隐私管理</a></li>
	  <li role="presentation"><a href="<?php echo site_url('index/first'); ?>">前台首页</a></li>
	  <li><a href=" <?php echo site_url('login/log_out'); ?>">登出</a></li>
	</ul>
	<div class="welcom"><?php echo $_SESSION['nickname']; ?>你好</div>

	<table class="table table-hover tb_st">
	  <?php if(count($comment)){ foreach($comment as $v): ?>
	  <tr>
	  	<td><?php echo $v['comment']; ?></td>
	  	<td><em><?php echo $v['title']; ?></em></td>
	  	<td><h5><small><?php echo date('Y-m-d H:i:s',$v['time']); ?></small></h5></td>
	  	<td>[<a href="<?php echo site_url('admin/del_comment').'/'.$v['com_id']; ?>">删除</a>]</td>
	  </tr>
	<?php endforeach;} else echo '<tr><td><h2><small><em>暂无评论</em></small></h2></td></tr>'; ?>
	 
	</table>
	<nav>
  <?php echo $links; ?>
</nav>






<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>