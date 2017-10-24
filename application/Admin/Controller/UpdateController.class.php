<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
/**
 * Created by PhpStorm.
 * User: hzcyPSD
 * Date: 2017/8/10
 * Time: 19:13
 */
class UpdateController extends Controller {
    public function index($articleId){
        if(empty($_SESSION)){
            $this->success("您还未登陆,请登陆!",__APP__."/Login/index");
        }else{
            $res=M('newstypes')->where('isDel=0')->select();
            $result=M('newsarticles')->where("articleId='$articleId'")->find();
            $this->assign('fetchall',$res);
            $this->assign('updNews',$result);
            $this->display();
        }
    }
    public function add($articleId){
        if($_POST){
            $upload=new Upload();
            $upload->exts=array('jpg','gif','png','jpeg');
            $imagepath=$upload->saveName=md5(mt_rand(1000,9999));
            $upload->rootPath='./public/';
            $upload->savePath='photoview/';
            $upload->autoSub=false;
            $info=$upload->uploadOne($_FILES['image']);
            if(!$info){
                $this->error($upload->getError());
            }else{
                $imagepath='photoview/'.$imagepath.'.jpg';
                $_POST['imagepath']=$imagepath;
                $username=$_SESSION['adminName'];
                $rs=M('manager')->field('userId')->where("userName='$username'")->find();
                $userId=$rs['userId'];
                $_POST['userId']=$userId;
                $time=time();
                $_POST['dateandtime']=$time;
                $result=M('newsarticles')->where("articleId=$articleId")->save($_POST);
                if($result>0){
                    $this->success("新闻修改成功",__APP__."/Listnews/index");
                }
            }
        }
    }
}