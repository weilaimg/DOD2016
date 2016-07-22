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
	  <li role="presentation" ><a href="<?php echo site_url('admin/load_cate'); ?>">分类管理</a></li>
	  <li role="presentation" class="active"><a href="<?php echo site_url('admin/load_article'); ?>">文章管理</a></li>
	  <li role="presentation"><a href="comment.php">评论管理</a></li>
	  <li role="presentation"><a href="user.php">用户管理</a></li>
	</ul>
	<div class="welcom">你好</div>
<a href="<?php echo site_url('admin/edit_article'); ?>" class="btn btn-info">添加文章</a>
	<table class="table table-hover tb_st">
	  <tr>
	  	<td><p>这是文章标题</p><p><em>这是文章摘要</em></p></td>
	  	<td>[<a href="#">修改</a>][<a href="#">删除</a>]</td>
	  </tr>
	  <tr>
	  	<td><p>这是文章标题</p><p><em>这是文章摘要</em></p></td>
	  	<td>[<a href="#">详情</a>][<a href="#">修改</a>][<a href="#">删除</a>]</td>
	  </tr>
	  <tr>
	  	<td><p>这是文章标题</p><p><em>这是文章摘要</em></p></td>
	  	<td>[<a href="#">详情</a>][<a href="#">修改</a>][<a href="#">删除</a>]</td>
	  </tr>
	  <tr>
	  	<td><p>这是文章标题</p><p><em>这是文章摘要</em></p></td>
	  	<td>[<a href="#">详情</a>][<a href="#">修改</a>][<a href="#">删除</a>]</td>
	  </tr>
	  <tr>
	  	<td><p>这是文章标题</p><p><em>这是文章摘要</em></p></td>
	  	<td>[<a href="#">详情</a>][<a href="#">修改</a>][<a href="#">删除</a>]</td>
	  </tr>
	</table>
<nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>