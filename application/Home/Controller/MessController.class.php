<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
/**
 * Created by PhpStorm.
 * User: hzcyPSD
 * Date: 2017/8/9
 * Time: 19:43
 */
session_start();
class MessController extends BaseController{
    public function index($articleId){
        $time=time()-3600*24;
        $fetchHints24h=M()->query("select * from newsarticles order by hints desc limit 10");
        $this->assign('fetchHints24h',$fetchHints24h);
        $totalRow=M()->query("select count(*) from reviews as rv inner join userinfo as ui on ui.userId=rv.userId where articleId=$articleId");
        $page=new Page($totalRow['0']['count(*)'],5);
        $reviewsAll=M()->query("select userName,rv.content,rv.dateandtime from reviews as rv inner join userinfo as ui on ui.userId=rv.userId where articleId=$articleId limit $page->firstRow,$page->listRows");
        $userName=$_SESSION['userName'];
        $this->assign('pageList',$page->show());
        $this->assign('reviewsAll',$reviewsAll);
        $this->assign('articleId',$articleId);
        $this->assign('userName',$userName);
        $this->display();
    }
}