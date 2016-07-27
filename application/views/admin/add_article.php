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

    <li role="presentation" class="active"><a href="<?php echo site_url('admin/load_article'); ?>">文章管理</a></li>
    <li role="presentation"><a href="<?php echo site_url('admin/load_comment'); ?>">评论管理</a></li>
    <li role="presentation"><a href="<?php echo site_url('admin/load_userinfo'); ?>">隐私管理</a></li>
    <li role="presentation"><a href="<?php echo site_url('index/first'); ?>">前台首页</a></li>
    <li><a href=" <?php echo site_url('login/log_out'); ?>">登出</a></li>
  </ul>



	<div class="indev">
<div class="input_from">


<form method="post" action="<?php echo site_url('admin/check_article'); ?>">

  <div class="form-group">
    <label for="exampleInputEmail1">标题：</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请添写文章标题" name="title" value=" <?php if(isset($article)) echo $article[0]['title']; ?> <?php echo set_value('title'); ?>">
  </div>
  <?php  if(form_error('title')) echo '<div class="alert alert-danger" role="alert"> '.form_error('title').' </div> '; ?>

<div class="form-group">
    <label for="exampleInputPassword1">摘要：</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="请填写摘要" name="info" value="<?php if(isset($article)) echo $article[0]['info']; ?><?php echo set_value('info'); ?>">
  </div>
  <?php  if(form_error('info')) echo '<div class="alert alert-danger" role="alert"> '.form_error('info').' </div> '; ?>

<label for="exampleInputPassword1">分类：</label>
<br />



<?php foreach ($category as $v): ?>
<label class="radio-inline">
  <input type="radio" name="cid" id="inlineRadio1" value="<?php echo $v['cid'] ?>" <?php echo set_radio('cid',$v['cid']); ?> > <?php echo $v['cname'] ?>
</label>
<?php endforeach; ?>




<?php  if(form_error('cid')) echo '<div class="alert alert-danger" role="alert"> '.form_error('cid').' </div> '; ?>
<br /><br />


  
  <div class="form-group">
    <label for="exampleInputEmail1">正文：</label>
  </div>
  <div id="sample">
  <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/nicEdit.js"></script> <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>
  <textarea name="text" style="width: 100%;height:300px;">
       <?php if(isset($article)) echo $article[0]['text']; ?><?php echo set_value('text'); ?>
</textarea>
<?php  if(form_error('text')) echo '<div class="alert alert-danger" role="alert"> '.form_error('text').' </div> '; ?>
<br />


<input type="text"  name="aid" value="<?php if(isset($article)) echo $article[0]['aid']; ?><?php echo set_value('aid'); ?>" />


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