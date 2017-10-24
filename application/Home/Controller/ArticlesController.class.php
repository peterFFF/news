<?php
namespace Home\Controller;
use Think\Controller;
session_start();
class ArticlesController extends BaseController{
    //评论参数人数
    public $num=0;
    public function index($articleId){
        date_default_timezone_set('PRC');
        //增加文章点击量并更新articlesNews点击
        M('newsarticles')->where("articleId=$articleId")->setInc('hints',1);
        //增加点击量
        $time=time();
        M()->query("insert newshints(articleId,dateandtime) value ('$articleId','$time')");
        //相应新闻内容
        $fetchone=M('newsarticles')->where("articleId=$articleId")->find();
        //评论数
        $review=M()->query("select count(*) from reviews where articleId=$articleId ");
        //新闻24小时排行
        $review=$review[0]['count(*)'];
        $time=time()-3600*24;
        $fetchHints24h=M()->query("select * from newsarticles as a order by (select count(*) from newshints as b where a.articleId=b.articleId and dateandtime>$time) desc limit 10");
        //参与用户数量
        $userCount=M()->query("select userId from reviews where articleId=$articleId");
        for ($i=0;$i<=count($userCount);$i++){
            if($userCount[$i]['userId']!=$userCount[$i+1]['userId']){
                 $this->num++;
            }
        }
        $this->assign('num',$this->num);
        $this->assign('fetchone',$fetchone);
        $this->assign('fetchHints24h',$fetchHints24h);
        $this->assign('userName',$_SESSION['userName']);
        $this->assign('getReviews',$review);
        $this->display();
    }
    public function add($articleId)
    {
        if(!empty($_POST['content'])){
            $content=$_POST['content'];
            $userName=$_SESSION['userName'];
            $res=M('userinfo')->field('userId')->where("userName='$userName'")->find();
            $userId=$res['userId'];
            M()->execute("insert reviews(userId,articleId,content) value ('{$userId}','{$articleId}','{$content}')");
            $this->success("评论发表成功",__APP__."/Articles/index/articleId/$articleId");
        }else{
            $this->success("评论发表失败",__APP__."/Articles/index/articleId/$articleId");
        }

    }
}