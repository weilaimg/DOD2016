<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>
  <style>
    .jumb{padding-left: 90px;height: 400px;padding-top: 130px;}
    body{margin-top: 60px;}
    .input_from{padding-left: 150px;padding-top: 40px;width: 600px;}
   .input_from input{width: 600px;}
  </style>
<body>
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">DOD2016</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">首页<span class="sr-only">(current)</span></a></li>
        <li><a href="#">分类1</a></li>
        <li><a href="#">分类2</a></li>
        <li><a href="#">分类3</a></li>
        <li><a href="#">分类4</a></li>
      
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">Link</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">后台 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">登录</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">注册</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="input_from">
<form method="post">

  <div class="form-group">
    <label for="exampleInputEmail1">用户名：</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username">
  </div>
  <div class="alert alert-danger" role="alert">！用户名不符合规则</div>
  <div class="form-group">
    <label for="exampleInputPassword1">密码：</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password1">
  </div>
  <div class="alert alert-danger" role="alert">！密码不符合规则</div>
  <div class="form-group">
    <label for="exampleInputPassword1">重复密码：</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password2">
  </div>
  <div class="alert alert-danger" role="alert">！两次输入不符合</div>
  <div class="form-group">
    <label for="exampleInputEmail1">邮箱：</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
    <div class="alert alert-danger" role="alert">！Email不符合规则</div>
  </div>
  
  <button type="submit" class="btn btn-default">提交</button>
</form>
</div>

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>