<?php
namespace Admin\Controller;
use Think\Controller;
session_start();
/**
 * Created by PhpStorm.
 * User: hzcyPSD
 * Date: 2017/8/10
 * Time: 16:27
 */
class LoginController extends Controller{
    public function index(){
        if(!empty($_SESSION)){
            $_SESSION=array();
        }else{
            $userName=$_SESSION['adminName'];
            $res=M('manager')->where("userName='$userName'")->find();
            if(empty($res)){
                $_SESSION=array();
            }
        };
        $this->display();
    }
    public function login(){
        if($_POST){
            $userName=$_POST['username'];
            $password=$_POST['password'];
            $res=M('manager')->field('count(*)')->where("userName='$userName' and password='$password'")->find();
            if($res['count(*)']>0){
                $_SESSION['adminName']=$userName;
                $this->success("登录成功",__APP__."/Index/index");
            }else{
                $this->success("登录失败",__APP__."/Login/index");
            }
        }
    }
}