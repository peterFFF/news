<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
/**
 * Created by PhpStorm.
 * User: hzcyPSD
 * Date: 2017/8/10
 * Time: 10:19
 */
class ListnewsController extends Controller {
    public function index(){
        if(empty($_SESSION)){
            $this->success("您还未登陆,请登陆!",__APP__."/Login/index");
        }
        $totalRows=M('newsarticles')->where('isDel=0')->count();
        $page=new Page($totalRows,15);
        $result=M('newsarticles')->join("newstypes on newsarticles.typeId=newstypes.typeId")->where('newsarticles.isDel=0')->order('dateandtime desc')->limit($page->firstRow,$page->listRows)->select();

        $this->assign('pageList',$page->show());
        $this->assign('result',$result);
        $this->display();
    }
    public function del($articleId){
        $res=M()->query("update newsarticles set isDel=1 where articleId=$articleId");
        $this->success("回收成功",__APP__."/Listnews/index");
    }
}