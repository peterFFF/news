<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
session_start();
class NewstypeController extends BaseController{
    public function index($typeId){
        //判断新闻类型有没有子菜单
        $result=M()->query("select count(*) from newstypes where pid={$typeId}");
        if($result['0']['count(*)']>1){
            $fetchImg3=M()->query("select * from newsarticles where typeid in (select typeid from newstypes where pid=$typeId) and imagepath!='' order by hints desc limit 3");
        }else{
            $fetchImg3=M()->query("select * from newsarticles where typeid={$typeId} and imagepath!='' order by hints desc limit 3");
        }
        if($result['0']['count(*)']>0){
            $totalRow=M()->query("select count(*) from newsarticles where isDel=0 and typeId in (select typeId from newstypes where pid=$typeId)");
            $page=new Page($totalRow['0']['count(*)'],10);
            $fetchtype=M()->query("select * from newsarticles where isDel=0 and typeId in (select typeId from newstypes where pid=$typeId)  order by dateandtime desc limit $page->firstRow,$page->listRows");
        }else{
            $totalRow=M()->query("select count(*) from newsarticles where isDel=0 and typeId={$typeId}");
            $page=new Page($totalRow['0']['count(*)'],10);
            $fetchtype=M()->query("select * from newsarticles where isDel=0 and typeId={$typeId}  order by dateandtime desc limit $page->firstRow,$page->listRows");
        }
        //新闻24小时排行
        $time=time()-3600*24;
        $fetchHints=M()->query("select * from newsarticles as a  order by (select count(*) from newshints as b where a.articleId=b.articleId and dateandtime>$time) desc limit 10");
        $this->assign('pageList',$page->show());
        $this->assign('fetchtype',$fetchtype);
        $this->assign('fetchImg3',$fetchImg3);
        $this->assign('fetchHints',$fetchHints);
        $userName=$_SESSION['userName'];
        $this->assign('userName',$userName);
        $this->display();
    }
    public function search(){
        $time=time()-3600*24;
        $fetchHints=M()->query("select * from newsarticles as a  order by (select count(*) from newshints as b where a.articleId=b.articleId and dateandtime>$time) desc limit 10");
        $keyword=$_GET['keywords'];
        $count=M("newsarticles")->where("title like '%$keyword%' and isDel=0")->count();
        $this->assign('count',$count);
        $page=new Page($count,5);
        $res=M('newsarticles')->where("title like '%$keyword%' and isDel=0")->limit($page->firstRow,$page->listRows)->select();
        $this->assign('pageList',$page->show());
        $this->assign('fetchtype',$res);
        $this->assign('fetchHints',$fetchHints);
        //把搜索内容提交在展示页标红
        $this->assign('keyword',$keyword);
        $this->display('index');
    }
}