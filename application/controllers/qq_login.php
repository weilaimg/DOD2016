<?php 
require_once('~/Sites/DOD2016/Connect2.1/API/qqConnectAPI.php');

// 访问QQ登录页面
$oauth = new Oauth();
$oauth -> qq_login();
