<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="/NewsViewTP/public/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="/NewsViewTP/public/css/main.css" />
    <script type="text/javascript" src="/NewsViewTP/public/jquery/jquery.js"></script>
    <title>达内教育登陆系统</title>
    <style>
        #logo{
            background-color: #0E65C3;
            height:50px;
            width:100%;
        }
    </style>
</head>
<body>
<div class="container" id="page">
    <div id="header">
        <div id="logo"><span style="font-size:30px;color:#fff;line-height: 48px">达内教育集团CMS系统V1.0</span></div>
    </div><!-- header -->

    <div class="container">
        <div id="content">
            <div class="form login">
                <form  action="/NewsViewTP/admin.php/Login/login" method="post">	<p>Please enter your info</p>
                    管理员:<input name="username"   size="15"/><br>
                    密&nbsp;&nbsp;&nbsp;码:<input type="password" name="password"  size="15" ><br>
                    <input type="submit"  value="Enter" />
                </form></div><!-- form -->
        </div><!-- content -->
    </div>
</div><!-- page -->
</body>
</html>