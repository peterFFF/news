<?php
namespace Home\Controller;
use Think\Controller;
session_start();
class IndexController extends BaseController {
    public function index(){
        //首页三张精选图片
        $fetchHd3=M(newsarticles)->where("isHd=1 and imagepath !=''")->limit(3)->select();
        //内地新闻十条
        $newsArticleType9=M('newsarticles')->where('typeid=9 and isDel=0')->order('dateandtime desc')->limit(10)->select();
        //港澳台新闻十条
        $newsArticleType10=M('newsarticles')->where('typeid=10 and isDel=0')->order('dateandtime desc')->limit(10)->select();
        //国际新闻十条
        $newsArticleType11=M('newsarticles')->where('typeid=11 and isDel=0')->order('dateandtime desc')->limit(10)->select();
        //最新新闻十条
        $fetchNew=M('newsarticles')->where('isDel=0')->order('dateandtime desc')->limit(10)->select();
        //海外观察三条
        $newsArticleType12=M('newsarticles')->where('typeid=12 and isDel=0')->order('dateandtime desc')->limit(3)->select();
        //按点击量排行
        $fetchHints=M()->query("select * from newsarticles where typeId in (select typeId from newstypes where pid=1) order by hints desc limit 10");
        //按评论排行
        $fetchReviews=M()->query("select * from newsarticles where typeId in (select typeId from newstypes where pid=1) 
                    order by (select count(*) from reviews where reviews.articleId=newsarticles.articleId) desc limit 10");
        //国际新闻8张图片
        $newsArticlesType2=M()->query("select * from newsarticles where imagepath <> '' and typeId in(select typeId from newsTypes where  pid=2)  order by dateandtime desc limit 8");
        //首页右侧栏目9条新闻
        $newsArticles=M()->query("select * from newsarticles where isDel=0 order by dateandtime desc limit 9");
        $fetchLink=M('friendlink')->select();
        $this->assign('fetchHd3',$fetchHd3);
        $this->assign('newsArticleType9',$newsArticleType9);
        $this->assign('newsArticleType10',$newsArticleType10);
        $this->assign('newsArticleType11',$newsArticleType11);
        $this->assign('newsArticleType12',$newsArticleType12);
        $this->assign('fetchHints',$fetchHints);
        $this->assign('fetchReviews',$fetchReviews);
        $this->assign('fetchNew',$fetchNew);
        $this->assign('newsArticlesType2',$newsArticlesType2);
        $this->assign('fetchLink',$fetchLink);
        $this->assign('newsArticles',$newsArticles);
        //登录用户SESSION传值
        $this->assign('userName',@$_SESSION['userName']);
        $this->display();
    }
}