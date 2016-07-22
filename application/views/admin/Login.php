<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style>
		.login{margin-top: 20px;margin-left: 30px; padding-left:50px; padding-top:10px;width: 450px; height: 370px;}
		.form_wid{width: 250px;}
		.warin{color:#F00;font-size: 15px;}
	</style>
</head>
<body>

	<div class="jumbotron login">
			<h2>Login</h2>
		 <form method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">用户名：</label>
			    <input type="text" class="form-control form_wid" id="exampleInputEmail1" placeholder="用户名" name="username">
			    <div class="warin">*必填</div>
			  </div>

			  <div class="form-group">
			  <label for="exampleInputPassword1">密码：</label>
			  <input type="password" class="form-control form_wid" id="exampleInputPassword1" placeholder="密码" name="password">
			  <div class="warin">*必填</div>
			  </div>

			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="rem" value="1"> 记住我
			    </label>
			  </div>
		  <button type="button" class="btn btn-default" onclick="">注册</button>
		  <button type="submit" class="btn btn-default">提交</button>
		</form>
	</div>



<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>