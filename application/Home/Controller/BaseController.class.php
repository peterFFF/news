<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function _initialize(){
        //导航栏
        $newsTypes=M('newstypes')->where('level=1 and isDel=0')->select();
        $this->assign('newsTypes',$newsTypes);
        //顶部三条
        $news3=M('newsarticles')->limit(rand(0,100),3)->select();
        $this->assign('news3',$news3);
    }
}