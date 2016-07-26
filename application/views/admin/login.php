<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css">
  </head>
  <style> 
    .jumb{padding-left: 90px;height: 400px;padding-top: 130px;}
		.login{margin-top: 20px;margin-left: 30px; padding-left:50px; padding-top:10px;width: 450px; height: 370px;}
		.form_wid{width: 250px;}
		.warin{color:#F00;font-size: 15px;}
		body{margin-top: 90px;}
  </style>
<body >
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
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo site_url('login/load_register'); ?>">注册</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



	<div class="jumbotron login">
			<h2>Login</h2>
		 <form method="post" action=" <?php echo site_url('login/check_login'); ?> ">
			  <div class="form-group">
			    <label for="exampleInputEmail1">用户名：</label>
			    <input type="text" class="form-control form_wid" id="exampleInputEmail1" placeholder="用户名" name="username" value="<?php echo set_value('username'); ?>">
			    <div class="warin" style=" font-size:15px;margin-left: 15px;  " ><?php echo form_error('username','<span>','</span>'); ?></div>
			  </div>

			  <div class="form-group">
			  <label for="exampleInputPassword1">密码：</label>
			  <input type="password" class="form-control form_wid" id="exampleInputPassword1" placeholder="密码" name="password">
			  <div class="warin" style=" font-size:15px;margin-left: 15px;  " ><?php echo form_error('password','<span>','</span>'); ?></div>
			  </div>

		  <button type="button" class="btn btn-default"><a href="<?php echo site_url('login/load_register'); ?>" style=" text-decoration: none ;color :#000 ">注册</a></button>
		  <button type="submit" class="btn btn-default">提交</button>
		</form>
	</div>



<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
