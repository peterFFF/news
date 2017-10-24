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
                height:"250px"
            })
        })
    </script>
</head>
<body>
<div class="wrap">
    <h1 id="subject">修改新闻</h1>
    <form name="frm" action="/NewsViewTP/admin.php/Update/add/articleId/<?php echo ($updNews["articleId"]); ?>" method="post" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>新闻标题</td>
                <td><input type="text" name="title" value="<?php echo ($updNews["title"]); ?>" size="40"/></td>
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
            <?php if($updNews["imagepath"] != NULL): ?><tr>
                <td>原始图片:</td>
                <td><img src="/NewsViewTP/public/<?php echo ($updNews["imagepath"]); ?>" width="150" height="120"></td>
            </tr><?php endif; ?>
            <tr>
                <td>新闻图片:</td>
                <td ><input type="file" name="image"/></td>
            </tr>
            <tr>
                <td>新闻正文</td>
                <td><textarea name="content"><?php echo ($updNews["content"]); ?></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="确认发布"  />
                    <input type="reset" value="内容重置" /></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
<script>
    document.frm.typeId.value=<?php echo ($updNews['typeId']); ?>;
</script>