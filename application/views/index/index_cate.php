<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
  </head>
  <style>
    .jumb{padding-left: 90px;height: 400px;padding-top: 130px;}
    .art{width: 800px;}
  </style>
<body style=" margin-top: 90px ">
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
        <li><a href="<?php echo site_url('index/first'); ?>">首页<span class="sr-only">(current)</span></a></li>
        <?php foreach($cate as $v): ?>
        <li <?php $uri = $this -> uri -> segment(3);if($uri == $v['cid']) echo 'class="active"'; ?> ><a href="<?php echo site_url('index/load_article').'/'.$v['cid']; ?>"><?php echo $v['cname'] ?></a></li>
      <?php endforeach; ?>
      
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">Link</a></li> -->
        <?php  if(isset($nickname)){

        echo '<li><a href="' .site_url('admin/load_admin').'">' .$nickname.'你好，点击进入&nbsp[个人中心]</a></li>';
        echo '<li><a href="'.site_url('admin/log_out').'">登出</a><li>';
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


<div class="art">
  <table class="table table-hover tb_st">
    <?php if(count($article)) {foreach($article as $v): ?>
    <tr>
      <td><p><a href="<?php echo site_url('index/load_text').'/'.$v['aid']; ?>"><?php echo $v['title']; ?></a></p><p><em><?php echo $v['info']; ?></em></p></td>
      <td><p><?php echo$v['nickname']; ?></p><p><em><?php echo date('Y-m-d H:i:s',$v['time']); ?></em></p></td>
    </tr>
  <?php endforeach;} else echo '<tr><td><h2 style="margin-left:40px">暂无文章</h2></td></tr>'; ?>
     
</table>
</div>

<nav>
  <?php echo $links; ?>
</nav>

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>