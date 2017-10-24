<?php if (!defined('THINK_PATH')) exit();?><HTML><HEAD><TITLE>信息提示页面</TITLE>
    <link href="/favicon.ico" rel="shortcut icon">
    <META content="text/html; charset=utf-8" http-equiv=Content-Type>
    <STYLE type=text/css>TD {
        FONT-FAMILY: 宋体; FONT-SIZE: 12px; LETTER-SPACING: 2px; LINE-HEIGHT: 150%; font-color: #000000
    }
    FORM {
        FONT-FAMILY: 宋体; FONT-SIZE: 12px; LETTER-SPACING: 2px; LINE-HEIGHT: 150%; font-color: #000000
    }
    SELECT {
        FONT-FAMILY: 宋体; FONT-SIZE: 12px; LETTER-SPACING: 2px; LINE-HEIGHT: 150%; font-color: #000000
    }
    INPUT {
        FONT-FAMILY: 宋体; FONT-SIZE: 12px; LETTER-SPACING: 2px; LINE-HEIGHT: 150%; font-color: #000000
    }
    TEXTAREA {
        FONT-FAMILY: 宋体; FONT-SIZE: 12px; LETTER-SPACING: 2px; LINE-HEIGHT: 150%; font-color: #000000
    }
    BODY {
        FONT-FAMILY: 宋体; FONT-SIZE: 12px; LETTER-SPACING: 2px; LINE-HEIGHT: 150%; font-color: #000000
    }
    A:link {
        COLOR: #666666; FONT-SIZE: 10.5pt; TEXT-DECORATION: none
    }
    A:visited {
        COLOR: #666666; FONT-SIZE: 10.5pt; TEXT-DECORATION: none
    }
    A:hover {
        COLOR: #666666; FONT-SIZE: 10.5pt; TEXT-DECORATION: none
    }
    A:active {
        COLOR: #666666; FONT-SIZE: 10.5pt; TEXT-DECORATION: none
    }
    </STYLE>
    <SCRIPT>
        var index = 5;
        function changeNum() {
            document.getElementById('changeNum').innerHTML=index;
            index--;
            if(index<1){
                location="<?php echo ($jumpUrl); ?>";
            }else{
                setTimeout('changeNum()',1000);
            }
        }
    </SCRIPT>
    <META content="Microsoft FrontPage 4.0" name=GENERATOR>
    <STYLE>.proccess {
        BACKGROUND: #ffffff; BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-RIGHT: 1px solid; BORDER-TOP: 1px solid; HEIGHT: 8px; MARGIN: 3px; WIDTH: 8px
    }
    </STYLE>
</HEAD>
<BODY onload="changeNum()"
      style="OVERFLOW: hidden; OVERFLOW-Y: hidden">
<DIV align=center>
    <TABLE align=center height="70%" valign="middle">
        <TBODY>
        <TR>
            <TD align=middle><p></p>
                <!-- Displaytext-->
                <FONT class=fontbig> <img src="/NewsViewTP/public/photoview/logo.png" /><span style="font-size: 20px"><?php echo ($message); ?></span>
                    <!--End Displaytext-->
                    <P style="font-size: 16px">等待<span id="changeNum"></span>秒自动跳转,若没跳转,请点击<a href="<?php echo ($jumpUrl); ?>" style="color:red">跳转</a></P>
                    <DIV align=center>
                        <FORM method=post name=proccess>
                            <SCRIPT language=javascript>
                                for(i=0;i<30;i++)document.write("<input class=proccess>")
                            </SCRIPT>
                        </FORM>
                    </DIV>
                </font></TD>
        </TR></TBODY></TABLE>
    <DIV align=center>
        <SCRIPT language=JavaScript>
        var p=0,j=0;
        var c=new Array("lightskyblue","white")
        setInterval('proccess()',140)
        function proccess(){
            document.forms.proccess.elements[p].style.background=c[j];
            p++;
            if(p==30){p=0;j=1-j;}}
        </SCRIPT>
    </DIV></DIV>
<DIV align=center>

</DIV>
</BODY>
</HTML>