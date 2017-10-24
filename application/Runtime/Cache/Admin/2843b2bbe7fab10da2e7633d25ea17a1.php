<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/NewsViewTP/public/css/resetAdmin.css"/>
	<link rel="stylesheet" type="text/css" href="/NewsViewTP/public/css/commonAdmin.css"/>
	<style type="text/css">
	.top-body{
		background: url(/NewsViewTP/public/images/top_bg.gif);
	}
	.top-body .subject{
		font-size:36px;
		line-height: 80px;
		color: #fff;
	}
	.top-body span{
		float:right;
		font-size:14px;
	}
	.top-body b{
		margin-right:10px;
	}
	.top-body a{
		margin-left:10px;
		color:#fff;
	}
	</style>
<script>
function	logout(){
	if(confirm('是否退出后台管理系统?')){
		parent.location="/NewsViewTP/admin.php/Login/index";
	}
}
</script>
</head>
<body class="top-body">
	<div class="wrap">
		<h1 class="subject">达内教育集团CMS系统V1.0<span><b>欢迎您!&nbsp;&nbsp;<?php echo ($_SESSION['adminName']); ?></b>|<a href="javascript:logout()">退出登录</a></span></h1>
	</div>
</body>
</html>