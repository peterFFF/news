<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: hzcyPSD
 * Date: 2017/8/11
 * Time: 14:43
 */
class RecycleController extends Controller {
    public function index(){
        $result=M()->query("select * from newsarticles as na inner join newsTypes as nt on na.typeId=nt.typeId where na.isDel=1");
        $this->assign('result',$result);
        $this->display();
    }
    public function recycle($articleId){
        $result=M()->execute("update newsarticles set isDel=0 where articleId=$articleId");
        if($result){
            $this->success("新闻还原成功!",__APP__."/Recycle/index");
        }
    }
}