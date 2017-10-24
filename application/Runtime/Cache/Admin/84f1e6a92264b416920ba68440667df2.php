<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="/NewsViewTP/public/css/reset.css" rel="stylesheet" type="text/css" />
<link href="/NewsViewTP/public/css/common.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	.table{
		width: 100%;
		border-top: 1px solid #ccc;
		border-left: 1px solid #ccc;
	}
	.table td,.table th{
		padding: 10px;
		border-right: 1px solid #ccc;
		border-bottom: 1px solid #ccc;
	}
	.table th{
		font-weight: normal;
		width: 100px;
		text-align: left;
	}
</style>
<script src="/NewsViewTP/library/kindeditor/kindeditor.js"></script>
<script >
	var editor;
	KindEditor.ready(function(e){
		editor=e.create("[name=content]",{
			width:"900px",
			height:"350px"
		})
	})
	function checkNews(){
		if(dasda){
			
		}
	}
</script>
</head>
<body>
<div class="wrap">
	<h1 id="subject">发布新闻</h1>	
	<form action="/NewsViewTP/admin.php/Addnews/add" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td>新闻标题</td>
				<td><input type="text" name="title"/></td>
			</tr>
			<tr>
				<td>新闻分类</td>
				<td>
					<select name="typeId">
						<?php if(is_array($fetchall)): foreach($fetchall as $key=>$v): if($v["level"] == 1): ?><option value="<?php echo ($v["typeId"]); ?>"><?php echo ($v["typeName"]); ?></option>
								<?php if(is_array($fetchall)): foreach($fetchall as $key=>$vv): if(($vv["pid"]) == $v["typeId"]): ?><option value="<?php echo ($vv["typeId"]); ?>">&nbsp;&nbsp;<?php echo ($vv["typeName"]); ?></option><?php endif; endforeach; endif; endif; endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>新闻图片:</td>
				<td><input type="file" name="image"/></td>
			</tr>
			<tr>
				<td>新闻正文</td>
				<td><textarea name="content"></textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="确认发布"  onsubmit="checkNews()"/>
				<input type="reset" value="内容重置" /></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>