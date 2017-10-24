<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
session_start();

/**
 * Created by PhpStorm.
 * User: hzcyPSD
 * Date: 2017/8/10
 * Time: 20:47
 */
class AddnewsController extends Controller{
    public function index(){
        if(empty($_SESSION)){
            $this->success("您还未登陆,请登陆!",__APP__."/Login/index");
        }
        $res=M('newstypes')->where('isDel=0')->select();
        $this->assign('fetchall',$res);
        $this->display();
    }
    public function add(){
        if($_POST){
            $upload=new Upload();
            $upload->exts=array('jpg','gif','png','jpeg');
            $upload->rootPath='./public/';
            $upload->savePath='photoview/';
            $upload->autoSub=false;
            $info=$upload->uploadOne($_FILES['image']);
            if(!$info){
                $this->error($upload->getError());
            }else{
                $imagepath='photoview/'.$info['savename'];
                $_POST['imagepath']=$imagepath;
                $username=$_SESSION['adminName'];
                $rs=M('manager')->field('userId')->where("userName='$username'")->find();
                $userId=$rs['userId'];
                $_POST['userId']=$userId;
                $time=time();
                $_POST['dateandtime']=$time;
                $result=M('newsarticles')->add($_POST);
                if($result>0){
                    $this->success("新闻添加成功成功",__APP__."/Listnews/index");
                }
            }
        }
    }
}