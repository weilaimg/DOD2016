<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<style>
		.tb_st{margin-top: 40px;width: 600px;}
		.welcom{margin-left: 10px;color: #5E65C1;line-height: 40px;}
		.indev{margin-left: 40px;margin-top: 40px;width: 600px;}
		.uli{text-align: center; }
	</style>
</head>
<body>
	<ul class="nav nav-tabs">
	  <li role="presentation"><a href="<?php echo site_url('admin/load_admin'); ?>">后台主页</a></li>
	  <li role="presentation" class="active"><a href="<?php echo site_url('admin/load_cate'); ?>">分类管理</a></li>
	  <li role="presentation" ><a href="article.php">文章管理</a></li>
	  <li role="presentation"><a href="comment.php">评论管理</a></li>
	  <li role="presentation"><a href="user.php">用户管理</a></li>
	</ul>
  
	<div class="indev">
<div class="input_from">
<form action="<?php echo site_url(); ?>" method="post">

  <div class="form-group">
    <label for="exampleInputEmail1">分类：</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username" />
  </div>
  <div class="alert alert-danger" role="alert">！用户名不符合规则</div>
<button type="submit" class="btn btn-default"> 提交 </button>

</form>
  
</div>

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>