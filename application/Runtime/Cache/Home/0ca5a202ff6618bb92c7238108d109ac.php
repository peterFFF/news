<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link href="/NewsViewTP/public/css/reset.css" rel="stylesheet" type="text/css"
	media="all" />
<link href="/NewsViewTP/public/css/layout.css" rel="stylesheet" type="text/css"
	media="all" />
<link href="/NewsViewTP/public/css/common.css" rel="stylesheet" type="text/css"
	media="all" />
</head>
<body>
	<!-- 通用顶部导航开始-->
<div id="top-navi-wrap">
	<div class="clearfix" id="top-navi">
		<div class="side-left">
		<?php if(is_array($news3)): foreach($news3 as $key=>$v): ?><a href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>" target="_blank"><?php echo (truncate($v["title"],15)); ?></a><?php endforeach; endif; ?>	
		</div>
		<div class="side-right">
			<?php if($userName==''): ?><a href="/NewsViewTP/index.php/Login/index" target="_blank" class="top-nav-login-title">登录</a>			
			<div class="top-nav-select-title">
				<a href="/NewsViewTP/index.php/Register/index" target="_blank">免费注册</a>
			<?php else: ?>	
			<div class="top-nav-select-title">
			<a href="/NewsViewTP/index.php/Register/index" target="_blank">免费注册</a>
				<span>您好，<a href="#" class="current-user"><?php echo ($userName); ?></a></span>
				<a href="/NewsViewTP/index.php/Login/leave">退出</a><?php endif; ?>	
			</div>
		</div>
	</div>
</div>
<!-- 通用顶部导航结束 -->
<!--header start-->
<div class="clear" id="header">
		<div id="logo"><a href="#" title="换一个角度看新闻"></a></div>
		<div id="search-bar">
			<form name="search-form" action="/NewsViewTP/index.php/Newstype/search" method="get">
				<input type="text" name="keywords" id="keywords" value="党报连发治军铁腕新政"/>
				<input type="submit" value="" id="search-submit-button"/>
			</form>
		</div>
</div>
<!--header end-->
<!--导航开始-->
<div id="navigation">
	<ul class="clear">
		<li><a href="/NewsViewTP/index.php" >首页</a></li>
		<?php if(is_array($newsTypes)): foreach($newsTypes as $key=>$v): ?><li><a href="/NewsViewTP/index.php/Newstype/index/typeId/<?php echo ($v["typeId"]); ?>"><?php echo ($v["typeName"]); ?></a></li><?php endforeach; endif; ?>
	</ul>
</div>
<!--导航结束-->
	<br />
	<br />
	<div class="section">
		<div class="section clear">
			<div style="width: 520px; float: left">
				<h1 style="font-size: 25px; color: #3d97c0; align: center">用户评论</h1>
				<hr color="#990000"/>
				<br />
				<table cellsapcing="0" border="2" width="500"
					style="font-size: 15px; border: 2px solid #990000">
					<?php if(is_array($reviewsAll)): foreach($reviewsAll as $key=>$v): ?>&nbsp;&nbsp;用户:<span style="font-size:16px;color:#990000"><?php echo ($v["userName"]); ?></span>&nbsp;于<?php echo ($v["dateandtime"]); ?>&nbsp;发表评论
					<hr color="#ccc" />
					&nbsp;&nbsp;&nbsp;<?php echo ($v["content"]); ?><hr color="#990000"/><br/><?php endforeach; endif; ?>
					<?php echo ($pageList); ?>
				</table>
				<br /> <a href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($articleId); ?>"
					style="font-size: 15px; color: #3d97c0">返回</a>

			</div>
			<div class="side-right-300">
				<h3 class="hot-title">24小时排行榜</h3>
				<ol id="ol1" class="section-part-list-with-num">
					<?php if(is_array($fetchHints24h)): foreach($fetchHints24h as $k=>$v): ?><li><span class="top-num num<?php echo ($k+1); ?>"><?php if($k < 9): ?>0<?php endif; echo ($k+1); ?></span><a href="news.php?articleId=<?php echo ($v["articleId"]); ?>" target="_blank"><?php echo (truncate($v["title"],18)); ?></a></li><?php endforeach; endif; ?>
				</ol>
			</div>
		</div>
	</div>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<!--版权区 start-->
<div class="section footer">
  <p>24小时客户服务热线：4006900000 010-82623378 <a href="#">常见问题解答</a> <a target="_blank" href="http://www.12377.cn/">互联网违法和不良信息举报</a></p>
  <p><a target="_blank" href="#">新闻中心意见反馈留言板</a></p>
  <p><a href="http://www.tarena.com.cn/">达内简介</a> | <a href="#">关于达内</a> | <a href="#">广告服务</a> | <a href="#">联系我们</a> | <a href="#">招聘信息</a> | <a href="#">网站律师</a> |  <a href="#">通行证注册</a> | <a href="#">产品答疑</a></p>
  <p>Copyright &copy; 1996-2015 TARENA Corporation, All Rights Reserved</p>
</div>
<!--版权区 end-->
</body>
</html>