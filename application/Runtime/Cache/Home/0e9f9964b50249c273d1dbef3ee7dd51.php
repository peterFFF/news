<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页_新闻视界</title>
<link href="/NewsViewTP/public/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="/NewsViewTP/public/css/layout.css" rel="stylesheet" type="text/css" media="all" />
<link href="/NewsViewTP/public/css/common.css" rel="stylesheet" type="text/css" media="all" />
<script>
	function showPh(id){
		if(id==1){
			document.getElementById("ol1").style.display="";
			document.getElementById("ol2").style.display="none";
			document.getElementById("div1").style.borderBottom="2px solid #900";
			document.getElementById("div2").style.borderBottom="0 solid #900";
		}else{
			document.getElementById("ol1").style.display="none";
			document.getElementById("ol2").style.display="";
			document.getElementById("div1").style.borderBottom="0 solid #900";
			document.getElementById("div2").style.borderBottom="2px solid #900";
		}
	}
</script>
</head>
<body>
<!--网站头  -->
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
<!--头条新闻开始-->
<div class="section clear">
	<div class="side-left" id="focus-wrapper">
	<div id="container-img">
		<ul id="focus-image">
		<?php if(is_array($fetchHd3)): foreach($fetchHd3 as $key=>$v): ?><li><a target="_blank" href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>"><img src="/NewsViewTP/public/<?php echo ($v["imagepath"]); ?>" width="600" height="320"/></a></li><?php endforeach; endif; ?>	
		</ul>
	 </div>	
		<div id="focus-mask"></div>
		<ul id="focus-text">
		<?php if(is_array($fetchHd3)): foreach($fetchHd3 as $key=>$v): ?><li><a target="_blank" href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>"><?php echo (truncate($v["title"],20)); ?></a></li><?php endforeach; endif; ?>
		</ul>
	<div id="container-text">	
		<ol class="clear" id="focus-num">
			<li>1</li>
			<li>2</li>
			<li>3</li>
		</ol>
	</div>			
	</div>
	<script src="/NewsViewTP/library/jquery/jquery-1.10.0.js"></script>
	<script>
		$(function(){
			var num=0;
			var time;
			$('#container-img li:not(:first)').css('display','none');
			$('#focus-text li:not(:first)').css('display','none');
			$('#container-text li').mouseover(function(){
				clearInterval(time);					
				$(this).addClass('current');
				$(this).siblings().removeClass('current');
				num=$(this).index();
				$('#container-img li:visible').css('display','none');
				$('#focus-text li:visible').css('display','none');
				$('#container-img li:eq('+num+')').css('display','block');
				$('#focus-text li:eq('+num+')').css('display','block');		
			})				
			function liList(){	
				if(num==$('#container-text li').size())num=0;
				$('#container-img li:eq('+num+')').css('display','block').siblings().css('display','none');
				$('#focus-text li:eq('+num+')').css('display','block').siblings().css('display','none');
				$('#container-text li:eq('+num+')').addClass('current').siblings().removeClass('current');					
				num++;
			}
			liList();
			time=setInterval(liList,2000);
			$('#container-text li').mouseout(function(){
				liList();
				time=setInterval(liList,2000);
			});	
		})
	</script>
	<div class="side-right" id="recommend">
		<?php if(is_array($newsArticles)): foreach($newsArticles as $key=>$v): ?><h1 class="headline"><a target="_blank" href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>"><?php echo (truncate($v["title"],20)); ?></a></h1><?php endforeach; endif; ?>
	</div>
</div>
<!--头条新闻结束-->
<!--国内新闻 start-->
<div class="section clear">
	<div class="section-title-wrapper">
		<a href="#" class="section-title-name section-title-china">国内新闻</a>
	</div>
	<div class="side-left">
		<div class="part-title">
			<div class="title-name">
				<a href="#">内地新闻</a>
			</div>
		</div>
		<ul class="section-part-list">
		<?php if(is_array($newsArticleType9)): foreach($newsArticleType9 as $key=>$v): ?><li><a href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>" target="_blank"><?php echo (truncate($v['title'],23)); ?></a></li><?php endforeach; endif; ?>
        </ul>
	</div>
	<div class="side-center">
		<div class="part-title">
			<div class="title-name">
				<a href="#">港澳台新闻</a>
			</div>
		</div>
		<ul class="section-part-list">
		<?php if(is_array($newsArticleType10)): foreach($newsArticleType10 as $key=>$v): ?><li><a href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>" target="_blank"><?php echo (truncate($v['title'],23)); ?></a></li><?php endforeach; endif; ?>	
        </ul>	
	</div>
	<div class="side-right">
		<div class="part-title">
			<div id="div1" onmouseover="showPh(1)" class="title-name title-name-hover">
				<a href="#">点击量排行</a>
			</div>
			<div id="div2" onmouseover="showPh(2)"class="title-name title-name-no-border">
				<a href="#">评论数排行</a>
			</div>
		</div>
		<ol id="ol1" class="section-part-list-with-num">
			
       		<?php if(is_array($fetchHints)): foreach($fetchHints as $k=>$v): ?><li><span class="top-num num<?php echo ($k+1); ?>"><?php if($k < 9): ?>0<?php endif; echo ($k+1); ?></span><a href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>" target="_blank"><?php echo (truncate($v["title"],15)); ?></a></li><?php endforeach; endif; ?>
        </ol>	
        <ol id="ol2" class="section-part-list-with-num" style="display:none;">
			
        	
       		<?php if(is_array($fetchReviews)): foreach($fetchReviews as $k=>$v): ?><li><span class="top-num num<?php echo ($k+1); ?>"><?php if($k < 9): ?>0<?php endif; echo ($k+1); ?></span><a href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>" target="_blank"><?php echo (truncate($v["title"],15)); ?></a></li><?php endforeach; endif; ?>
        </ol>
	</div>
</div>
<!--国内新闻 end-->
<!--国际新闻 start-->
<div class="section clear">
	<div class="section-title-wrapper">
		<a href="#" class="section-title-name section-title-world">国内新闻</a>
	</div>
	<div class="side-left">
		<div class="part-title">
			<div class="title-name">
				<a href="#">最新消息</a>
			</div>
		</div>
		<ul class="section-part-list">
			<?php if(is_array($fetchNew)): foreach($fetchNew as $key=>$v): ?><li><a href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>" target="_blank"><?php echo (truncate($v['title'],23)); ?></a></li><?php endforeach; endif; ?>
        </ul>
	</div>
	<div class="side-center">
		<div class="part-title">
			<div class="title-name">
				<a href="#">环球视野</a>
			</div>
		</div>
		<ul class="section-part-list">
		<?php if(is_array($newsArticleType11)): foreach($newsArticleType11 as $key=>$v): ?><li><a href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>	
        </ul>	
	</div>
	<div class="side-right">
		<div class="part-title">
			<div class="title-name">
				<a href="#"><em class="icon1">海</em>外观察</a>
			</div>			
		</div>
		<?php if(is_array($newsArticleType12)): foreach($newsArticleType12 as $key=>$v): ?><div class="pic-info clear">
			<div class="pic"><a href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>" target="_blank"><?php if($v["imagepath"] != NULL): ?><img src="/NewsViewTP/public/<?php echo ($v["imagepath"]); ?>" alt=""/>
																																								<?php else: ?> <img src="/NewsViewTP/public/photoview/logo.png" alt=""/><?php endif; ?></a></div>
			<div class="txt"><a href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>" target="_blank"><?php echo (truncate($v['title'],15)); ?></a></div>
		</div><?php endforeach; endif; ?>
	</div>
</div>

<!--国际新闻 end-->
<!--娱乐新闻 start-->
<div class="section">
	<div class="section-title-wrapper">
		<a href="#" class="section-title-name section-title-world">国际新闻</a>
	</div>
	<div class="clear" id="ent-image-lists">		
	 <?php if(is_array($newsArticlesType2)): foreach($newsArticlesType2 as $key=>$v): ?><div class="ent-image-item">
			<a href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>" target="_blank"><img src="/NewsViewTP/public/<?php echo ($v["imagepath"]); ?>" alt="" width="220" height="144"/></a>
			<p><a href="/NewsViewTP/index.php/Articles/index/articleId/<?php echo ($v["articleId"]); ?>" target="_blank"><?php echo (truncate($v['title'],15)); ?></a></p>
	  </div><?php endforeach; endif; ?>
	</div>
</div>
<!--娱乐新闻 end-->
<!--友情链接 start-->
<div class="section">
	<h4 class="friendlink-hr"><span class="friendlink">友情链接</span></h4>
	<div class="friendlink-cont">
	<?php if(is_array($fetchLink)): foreach($fetchLink as $k=>$v): if($k < 15): ?><a href="<?php echo ($v["linkUrl"]); ?>" target="_blank"><?php echo ($v["linkName"]); if($k < 14): ?>|<?php else: ?><br/><?php endif; ?></a>
		<?php elseif(($k >= 15) and ($k < 30)): ?>
		<a href="<?php echo ($v["linkUrl"]); ?>" target="_blank"><?php echo ($v["linkName"]); if($k < 29): ?>|<?php else: ?><br/><?php endif; ?></a>
		<?php elseif(($k >= 30) and ($k < 45)): ?>
		<a href="<?php echo ($v["linkUrl"]); ?>" target="_blank"><?php echo ($v["linkName"]); if($k < 44): ?>|<?php else: ?><br/><?php endif; ?></a>
		<?php else: ?>
		<a href="<?php echo ($v["linkUrl"]); ?>" target="_blank"><?php echo ($v["linkName"]); if($k < 59): ?>|<?php else: ?><br/><?php endif; ?></a><?php endif; endforeach; endif; ?>
	</div>
</div>
<!--友情链接 end-->
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