<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
  </head>
  <style>
    .jumb{padding-left: 40px;height: 400px;padding-top: 130px;}
    body{margin-top: 60px;}
    .article{margin-left: 40px; width: 600px;}
    li{list-style-type:none}
    body {margin-top: 90px}
    .commit{margin-left: 0px;width: 650px;margin-top: 60px;}
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
        <li><a href="<?php echo site_url('index/first'); ?>">首页<span class="sr-only">(current)</span></a></li>
        <?php foreach($cate as $v): ?>
        <li <?php if($v['cid']==$article[0]['cid']) echo 'class="active"'; ?>><a href="<?php echo site_url('index/load_article').'/'.$v['cid']; ?>"><?php echo $v['cname'] ?></a></li>
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
            
            <li><a href="<?php echo site_url('index/qq_login'); ?>">QQ登录</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo site_url('login/load_register'); ?>">注册</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="article">
<h3><?php echo $article[0]['title']; ?><br />
<small><?php echo $article[0]['info']; ?></small>
</h3>
<h4><small><?php echo $article[0]['cname'].'&nbsp&nbsp'.'最后修改:'.date('Y-m-d H:i:m',$article[0]['time']); ?></small></h4>
<?php echo $article[0]['text']; ?>
<hr />
</div>

<div class="commit">

  <ul>
  <?php if(isset($nickname)) {
   echo  '<li> <form action="'.site_url('comment/check_comment').'" method="post"> <script type="text/javascript" src="'.base_url().'bootstrap/js/nicEdit.js"></script> <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  
  </script>
  <textarea name="comment" style="width: 100%;height:100px;">';
       if(set_value('comment'))echo set_value('comment');else echo '在此输入评论';
echo '</textarea><br />';
if(form_error('comment')) echo '<div class="alert alert-danger" role="alert">'. form_error('comment').'</div><br />' ;
echo '<input type="hidden" name="aid" value="'.$article[0]['aid'].'">';

echo '<button type="submit" class="btn btn-default">提交评论</button><hr /> </li></form>';

}
else {
  echo '<li><h1>您还未登录，暂时不能评论</h1><br /><hr /></li>';
} ?>

    <?php if(count($comment)){foreach($comment as $v): ?>
    <li><h5><?php echo $v['nickname']; ?></h5><p><?php echo $v['comment']; ?></p><h5><small><?php echo date('Y-m-d H:i:s',$v['time']); ?></small></h5><br /><hr /></li>
    <?php endforeach; } else echo '<li><h4><small><em>暂无评论</em></small></h4></li>'?>
    
  </ul>
<nav>
<?php echo $links; ?>
</nav>
</div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>