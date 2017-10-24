<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($fetchone["title"]); ?></title>
<link type="text/css" rel="stylesheet" media="all" href="/NewsViewTP/public/css/reset.css"/>
<link type="text/css" rel="stylesheet" media="all" href="/NewsViewTP/public/css/layout.css"/>
<link type="text/css" rel="stylesheet" media="all" href="/NewsViewTP/public/css/common.css"/>
<script src="/NewsViewTP/library/jquery/jquery-1.10.0.js"></script>
<script src="/NewsViewTP/library/kindeditor/kindeditor.js"></script>
<script>
	function rvalidate(){
		var username=$("#username").val();
		var password=$("#password").val();
		var content=editor.html();
		if(content==""){
			alert("内容不能为空");
			return false;
		}else if(username==""){
			alert("用户名不能为空");
			return false;
		}else if(password==""){
			alert("密码不能为空");
			return false;
		}
	}
	function login(){
		var username=$("#username").val();
		var password=$("#password").val();
		if(username==""){
			alert('用户名不能为空');
			return false;
		}else if(password==""){
			alert('密码不能为空');
			return false;
		}else{
			//ajax验证
			$.ajax({
				type:"post",
				url:"/NewsViewTP/index.php/Login/loginx",
				data:"username="+username+"&password="+password,
				success:function(res){
					//接收服务器返回的结果
					if(res==1){
						$("#userSpan").html(username);
						$('#loginDiv1').hide();
						$('#loginDiv2').hide();
						$('#loginDiv3').hide();
						$('#loginDiv4').show();
						$('.side-right').load("top.html .side-right");
					}else{
						alert('用户名和密码不正确');
					}
				}
			});
		}
	};
	
		var editor;
		KindEditor.ready(function(e){
			editor=e.create("[name=content]",{
				"width":"645px",
				"height":"100px",
				"items":['undo','redo','emoticons'],
				"resizeType":"0",
				"themeType":"common"
			});
		});
</script>
</head>
<body>
<!-- 通用顶部导航开始-->
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
<!--导航结束-->
<div class="section">
	
	<div class="clear">
		<div class="side-left-680" id="article">		
			<h1 class="article-title"><?php echo ($fetchone["title"]); ?></h1>
			<div class="article-info"><?php echo (date("Y-m-d H:i:s",$fetchone["dateandtime"])); ?><a href="/NewsViewTP/index.php/Mess/index/articleId/<?php echo ($fetchone["articleId"]); ?>">评论(<span id="reviews"><?php echo ($getReviews); ?></span>)</a></div>
			<?php if($fetchone["imagepath"] != NULL): ?><div align=center><img src="/NewsViewTP/public/<?php echo ($fetchone["imagepath"]); ?>" alt=""  width="680" height="300"/></div>
			<?php else: ?>
			<div align=center><img src="/NewsViewTP/public/photoview/logo.png" alt=""  width="680" height="300"/></div><?php endif; ?>
			<div class="article-body">
				<?php echo ($fetchone["content"]); ?>
			</div>
			<div id="comment">
				<form name="frm" action="/NewsViewTP/index.php/Articles/add/articleId/<?php echo ($fetchone['articleId']); ?>" method="post">
				<p class="comment-count"><a href="/NewsViewTP/index.php/Mess/index/articleId/<?php echo ($fetchone["articleId"]); ?>">已有<span id="reviews"><?php echo ($getReviews); ?></span>条评论，共<span><?php echo ($num); ?>人</span>参与</a></p>
				<textarea name="content" class="comment-content" id="content"></textarea>
				<div class="comment-user-cont clear">
					<?php if($userName != NULL): ?><div id="loginDiv1" style="display:none" class="comment-user-username"><input type="text" name="username"  id="username"   class="comment-input" value=""/></div>
						<div id="loginDiv2" style="display:none" class="comment-user-password"><input type="password" name="password" id="password" class="comment-input" value=""/></div>
						<div id="loginDiv3" style="display:none" class="comment-user-link"><input type="checkbox" name="remember" checked="checked" value="1"/> 下次自动登录<a href="javascript:login()">登录</a><a href="#">忘记密码？</a></div>
						<div id="loginDiv4" style="display:block" class="comment-user-logined">
							<span><a id="userSpan" href="#"><?php echo ($userName); ?></a></span>
							<span><a href="/NewsViewTP/index.php/Login/leave/articleId/<?php echo ($fetchone['articleId']); ?>">退出</a></span>
							<input type="submit" value="发布" class="comment-publishing-btn" onclick="return rvalidate()"/>
						</div>
					<?php else: ?>
						<div id="loginDiv1" style="display:block" class="comment-user-username"><input type="text" name="username"  id="username"   class="comment-input" value=""/></div>
						<div id="loginDiv2" style="display:block" class="comment-user-password"><input type="password" name="password" id="password" class="comment-input" value=""/></div>
						<div id="loginDiv3" style="display:block" class="comment-user-link"><input type="checkbox" name="remember" checked="checked" value="1"/> 下次自动登录<a href="javascript:login()">登录</a><a href="#">忘记密码？</a></div>
						<div id="loginDiv4" style="display:none" class="comment-user-logined">
							<span><a id="userSpan" href="#"><?php echo ($userName); ?></a></span>
							<span><a href="/NewsViewTP/index.php/Login/leave/articleId/<?php echo ($fetchone['articleId']); ?>">退出</a></span>
							<input type="submit" value="发布" class="comment-publishing-btn" onclick="return rvalidate()" />
						</div><?php endif; ?>
				</div>
				</form>
			</div>
		</div>
		<div class="side-right-300">
			<h3 class="hot-title">24小时排行榜</h3>
			<ol id="ol1" class="section-part-list-with-num">
			<?php if(is_array($fetchHints24h)): foreach($fetchHints24h as $k=>$v): ?><li><span class="top-num num<?php echo ($k+1); ?>"><?php if($k < 9): ?>0<?php endif; echo ($k+1); ?></span><a href="news.php?articleId=<?php echo ($v["articleId"]); ?>" target="_blank"><?php echo (truncate($v["title"],18)); ?></a></li><?php endforeach; endif; ?>				
			</ol>				
		</div>
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