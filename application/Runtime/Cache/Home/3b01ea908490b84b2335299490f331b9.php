<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻视界_国内新闻</title>
<link type="text/css" rel="stylesheet" media="all" href="/NewsViewTP/public/css/reset.css"/>
<link type="text/css" rel="stylesheet" media="all" href="/NewsViewTP/public/css/layout.css"/>
<link type="text/css" rel="stylesheet" media="all" href="/NewsViewTP/public/css/common.css"/>
</head>
<body>
<!-- 通用顶部导航开始-->
<!-- 通用顶部导航开始-->
<div id="top-navi-wrap">
	<div class="clearfix" id="top-navi">
		<div class="side-left">
		<?php if(is_array($news3)): foreach($news3 as $key=>$v): ?><a href="" target="_blank"><?php echo (truncate($v["title"],15)); ?></a><?php endforeach; endif; ?>	
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
			<form name="search-form" action="" method="get">
				<input type="text" name="keywords" id="keywords" value="党报连发治军铁腕新政"/>
				<input type="submit" value="" id="search-submit-button"/>
			</form>
		</div>
</div>
<!--header end-->
<!--导航开始-->
<div id="navigation">
	<ul class="clear">
		<li><a href="index.php" >首页</a></li>		
		<?php if(is_array($newsTypes)): foreach($newsTypes as $key=>$v): ?><li><a href="/NewsViewTP/index.php/NewsType/index/typeId/<?php echo ($v["typeId"]); ?>"><?php echo ($v["typeName"]); ?></a></li><?php endforeach; endif; ?>
	</ul>
</div>
<!--导航结束-->
<!--导航结束-->
<div class="section clear">
	<div class="side-left-680">
		<div id="focus-wrapper2">
			<ul id="focus-image">
			<?php if(is_array($fetchImg3)): foreach($fetchImg3 as $key=>$v): ?><li><a href="news.php?articleId=<?php echo ($v["articleId"]); ?>" target="_blank" ><img src="/NewsViewTP/public/<?php echo ($v["imagepath"]); ?>"  style="width:680px;height:320px;"/></a></li><?php endforeach; endif; ?>	
			</ul>
			<div id="focus-mask"></div>
			<ul id="focus-text">
			<?php if(is_array($fetchImg3)): foreach($fetchImg3 as $key=>$v): ?><li><a href="news.php?articleId=<?php echo ($v["articleId"]); ?>" target="_blank" ><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>	
			</ul>
			<ol class="clear" id="focus-num">
				<li>1</li>
				<li >2</li>
				<li>3</li>
			</ol>		
		</div>	
		<script src="/NewsViewTP/library/jquery/jquery-1.10.0.js"></script>
	<script>
		$(function(){
			var num=0;
			var time;
			$('#focus-image li:not(:first)').css('display','none');
			$('#focus-text li:not(:first)').css('display','none');
			$('#focus-num li').mouseover(function(){
				clearInterval(time);					
				$(this).addClass('current');
				$(this).siblings().removeClass('current');
				num=$(this).index();
				$('#focus-image li:visible').css('display','none');
				$('#focus-text li:visible').css('display','none');
				$('#focus-image li:eq('+num+')').css('display','block');
				$('#focus-text li:eq('+num+')').css('display','block');		
			})				
			function liList(){	
				if(num==$('#focus-num li').size())num=0;
				$('#focus-image li:eq('+num+')').css('display','block').siblings().css('display','none');
				$('#focus-text li:eq('+num+')').css('display','block').siblings().css('display','none');
				$('#focus-num li:eq('+num+')').addClass('current').siblings().removeClass('current');					
				num++;
			}
			liList();
			time=setInterval(liList,2000);
			$('#focus-num li').mouseout(function(){
				liList();
				time=setInterval(liList,2000);
			});			
		})
		//失去焦点,按文本框页码自动翻页
		function changePage(currentValue){				
				window.location="/NewsViewTP/index.php/NewsType/index/typeId/<?php echo ($typeId); ?>/currentPage/"+currentValue;
			}
	</script>
		<div>
			<?php if(is_array($fetchtype)): foreach($fetchtype as $key=>$v): ?><div class="news-list-item clear">
				<?php if($v['imagepath'] != ''): ?><div class="news-list-item-pic"><a href="#"><img src="/NewsViewTP/public/<?php echo ($v['imagepath']); ?>" width="200" alt=""/></a></div>
				<?php else: ?>
				<div class="news-list-item-pic"><a href="#"><img src="/NewsViewTP/public/photoview/logo.png" width="200" alt=""/></a></div><?php endif; ?>
				<div class="news-list-item-txt">
					<h1><a href="news.php?articleId=<?php echo ($v["articleId"]); ?>"><?php echo ($v["title"]); ?></a></h1>
					<p><?php echo (truncate($v['content'],100)); ?></p>
				</div>
			</div><?php endforeach; endif; ?>
			<?php echo ($pageList); ?>
			<div class="page-list clear">

			</div>
	  </div>
	</div>
	<div class="side-right-300">
		<h3 class="hot-title">24小时排行榜</h3>
		<ol id="ol1" class="section-part-list-with-num">
			<?php if(is_array($fetchHints)): foreach($fetchHints as $k=>$v): ?><li><span class="top-num num<?php echo ($k+1); ?>"><?php if($k < 9): ?>0<?php endif; echo ($k+1); ?></span><a href="news.php?articleId=<?php echo ($v["articleId"]); ?>" target="_blank"><?php echo (truncate($v['title'],20)); ?></a></li><?php endforeach; endif; ?>
        </ol>		
	</div>
</div>
<!--版权区 start-->
<!--版权区 start-->
<div class="section footer">
  <p>24小时客户服务热线：4006900000 010-82623378 <a href="#">常见问题解答</a> <a target="_blank" href="http://www.12377.cn/">互联网违法和不良信息举报</a></p>
  <p><a target="_blank" href="#">新闻中心意见反馈留言板</a></p>
  <p><a href="http://www.tarena.com.cn/">达内简介</a> | <a href="#">关于达内</a> | <a href="#">广告服务</a> | <a href="#">联系我们</a> | <a href="#">招聘信息</a> | <a href="#">网站律师</a> |  <a href="#">通行证注册</a> | <a href="#">产品答疑</a></p>
  <p>Copyright &copy; 1996-2015 TARENA Corporation, All Rights Reserved</p>
</div>
<!--版权区 end-->
<!--版权区 end-->
</body>
</html>