<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style>
		.tb_st{margin-top: 40px;width: 600px;}
		.welcom{margin-left: 10px;color: #5E65C1;line-height: 40px;}
		.indev{margin-left: 40px;margin-top: 40px;width: 600px;}
		.uli{text-align: center; }
	</style>
</head>
<body>
	<ul class="nav nav-tabs">
	  <li role="presentation"><a href="admin.php">后台主页</a></li>
	  <li role="presentation" ><a href="cate.php">分类管理</a></li>
	  <li role="presentation" class="active"><a href="article.php">文章管理</a></li>
	  <li role="presentation"><a href="comment.php">评论管理</a></li>
	  <li role="presentation"><a href="user.php">用户管理</a></li>
	</ul>


	<div class="indev">
<div class="input_from">
<form method="post">

  <div class="form-group">
    <label for="exampleInputEmail1">标题：</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username">
  </div>
  <div class="alert alert-danger" role="alert">！用户名不符合规则</div>

<div class="form-group">
    <label for="exampleInputPassword1">摘要：</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password2">
  </div>
  <div class="alert alert-danger" role="alert">！摘要不符合规则</div>


  <div class="btn-group">
  <button type="button" class="btn btn-default">选择分类</button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <!-- <span class="sr-only">Toggle Dropdown</span> -->
  </button>
  <ul class="dropdown-menu uli">
    <li>1</li>
	<li>2</li>
	<li>3</li>
	<li>4</li>
  </ul>
</div>

  
  <div class="form-group">
    <label for="exampleInputEmail1">正文：</label>
  </div>
  <div id="sample">
  <script type="text/javascript" src="nicEdit.js"></script> <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>
  <textarea name="area2" style="width: 100%;height:300px;">
       在此输入正文
</textarea><br />
  <button type="submit" class="btn btn-default">提交</button>
</form>
</div>
</div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>