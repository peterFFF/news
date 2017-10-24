<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends BaseController{
    public function index(){
        $this->display();
    }
    public function login(){
        session_start();
        if($_POST){
            $userName=$_POST['userName'];
            $password=$_POST['password'];
            $res=M('userinfo')->where("userName='$userName' and password='$password'")->find();
            if($res){
                $_SESSION['userName']=$userName;
                $this->success("登录成功",__APP__."/Index/index");
            }else{
                $this->success("登录失败",__APP__."/Login/index");
            }
        }        
    }
    public function leave(){
        $_SESSION=array();
        if($_SESSION==NULL){
            $articleId=$_GET['articleId'];
            if($articleId>0){
                $this->success("退出成功",__APP__."/Articles/index/articleId/$articleId");
            }else{
                $this->success("退出成功",__APP__."/Index/index");
            }
        }
    }
    public function loginx(){
        session_start();
        $username=$_POST['username'];
        $password=$_POST['password'];
        $res=M('userinfo')->where("userName='$username' and password='$password'")->find();
        if($res==NULL){
            $this->ajaxReturn(0);
        }else{
            $_SESSION['userName']=$username;
            $this->ajaxReturn(1);
        }
    }
}