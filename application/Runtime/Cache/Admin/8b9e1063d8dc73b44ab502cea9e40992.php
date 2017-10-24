<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>回收站</title>
	<link href="/NewsViewTP/public/css/resetAdmin.css" rel="stylesheet" type="text/css" />
	<link href="/NewsViewTP/public/css/commonAdmin.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.newslist{
			width:100%;
			border-top: 1px solid #ccc;
			border-left:1px solid #ccc;
		}
		.newslist td{
			padding:5px 10px;
			border-right:1px solid #ccc;
			border-bottom:1px solid #ccc;
		}
		.pages{
			text-align:left;
		}
		.pages a,.pages span{
			display: inline-block;
			width:18px;
			text-align: center;
			margin-right: 3px;
			border: 1px solid #900;
			font-size: 12px;
		}
		.pages span{
			color:#fff;
			background: #900;
			border: 1px solid #900;
		}
	</style>
	<script>
		function recycleNews(articleId){
			if(confirm('确定要还原吗?')){
				location="/NewsViewTP/admin.php/Recycle/recycle/articleId/"+articleId;
			}
		}

	</script>
</head>
<body>
<div class="wrap">
	<h1 id="subject">回收站</h1>
	<form id="form1" name="form1" method="post" action="">
		<table class="newslist">
			<tr>
				<td>新闻ID</td>
				<td>新闻标题</td>
				<td>新闻分类</td>
				<td>发布日期</td>
				<td>操作</td>
			</tr>
			<?php if(is_array($result)): foreach($result as $key=>$v): ?><tr>
					<td><?php echo ($v["articleId"]); ?></td>
					<td><?php echo ($v["title"]); ?></td>
					<td><?php echo ($v["typeName"]); ?></td>
					<td><?php echo (date("Y-m-d H:i:s",$v["dateandtime"])); ?></td>
					<td><input type="button" value="还原新闻" onclick="recycleNews(<?php echo ($v["articleId"]); ?>)"/></td>
				</tr><?php endforeach; endif; ?>
			<tr><td colspan="5" align=center><?php echo ($pageList); ?></td></tr>
		</table>
	</form>
</div>
</body>
</html>