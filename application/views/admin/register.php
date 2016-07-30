<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
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
      <a class="navbar-brand" href="<?php echo site_url('index/first'); ?>">DOD2016</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url('index/first'); ?>">首页<span class="sr-only">(current)</span></a></li>
        <?php foreach($cate as $v): ?>
        <li><a href="<?php echo site_url('index/load_article').'/'.$v['cid']; ?>"><?php echo $v['cname'] ?></a></li>
      <?php endforeach; ?>
      
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">Link</a></li> -->
        <?php  if(isset($nickname)){

        echo '<li><a href="' .site_url('admin/load_admin').'">' .$nickname.'你好，点击进入&nbsp[个人中心]</a></li>';
         }
         else {
          echo '<li><a href="' .site_url('login/load_login').'">对不起，您还未登录</a></li>';
         }
         ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">后台 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('login/load_login'); ?>">登录</a></li>
            <li><a href="<?php echo site_url('index/qq_login'); ?>">QQ登录</a></li>
            
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo site_url('login/load_register'); ?>">注册</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="input_from">
<form method="post" action=" <?php echo site_url('login/check_register'); ?> ">

  <div class="form-group">
    <label for="exampleInputEmail1">登录名：</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="用户名只能包含英文字母、数字、下划线、或破折号" name="username" value="<?php echo set_value('username'); ?>">
  </div>
  <?php if(form_error('username')) echo '<div class="alert alert-danger" role="alert">'. form_error('username').'</div>'  ?>
  <div class="form-group">
    <label for="exampleInputEmail1">昵称：</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请填写您的昵称" name="nickname" value="<?php echo set_value('nickname'); ?>">
  </div>
  <?php if(form_error('nickname')) echo '<div class="alert alert-danger" role="alert">'. form_error('nickname').'</div>'  ?>
  <div class="form-group">
    <label for="exampleInputPassword1">密码：</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="密码只能包含英文字母、数字、下划线、或破折号" name="password1">
  </div>
  <?php if(form_error('password1')) echo '<div class="alert alert-danger" role="alert">'. form_error('password1').'</div>'  ?>
  <div class="form-group">
    <label for="exampleInputPassword1">重复密码：</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="重复输入密码" name="password2">
  </div>
  <?php if(form_error('password2')) echo '<div class="alert alert-danger" role="alert">'. form_error('password2').'</div>'  ?>
  <div class="form-group">
    <label for="exampleInputEmail1">邮箱：</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="请填写您的Email地址" name="email" value="<?php echo set_value('email'); ?>">
    <?php if(form_error('email')) echo '<div class="alert alert-danger" role="alert">'. form_error('email').'</div>';  ?>
  </div>

   
        <label for="exampleInputEmail1" style="float:left">验证码：</label>
        <label>
          <input type="text" class="form-control form_wid" id="exampleInputEmail1" placeholder="验证码" name="captcha"  style="float:left" >

          <img id="captcha_img" src="<?php echo base_url('bootstrap/captcha.php'); ?>?r=<?php echo rand(); ?>" alt="" style="float:right;margin-right:20px" ><a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='<?php echo base_url('bootstrap/captcha.php'); ?>?r='+Math.random()" style="float:right">看不清？</a>
          <br /></label>
          <div class="warin" style=" font-size:15px;margin-left: 15px;  " ><?php echo form_error('captcha','<span>','</span>'); ?></div>
  
  <button type="submit" class="btn btn-default">提交</button>
</form>
</div>

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>