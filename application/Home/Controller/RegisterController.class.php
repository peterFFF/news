<?php
namespace  Home\Controller;
use Think\Controller;
use Think\Verify;
class RegisterController extends Controller{
    public function index(){
        $this->display();
    }
    public function verify(){
        $verify=new Verify();
        $verify->fontSize=17;
        $verify->length=4;
        $verify->entry();
    }
    public function register(){
        $verify=new Verify();
        $checkCode=$_POST['verifyCode'];
        var_dump($checkCode);
        $res=$verify->check($checkCode);
        if($res){
            $userName=$_POST['userName'];
            $password=$_POST['password'];
            $result=M()->execute("insert userinfo(userName,password) value ('$userName','$password')");
            if($result){
                $this->success('用户注册成功',__APP__.'/Login/index');
            }else{
                $this->success('用户注册失败',__APP__.'/Register/index');
            }
        }else{
            echo "注册失败";
        }
    }
    public function checkver(){
        $verify=new Verify();
        $verCode=$_POST['verCode'];
        $ress=$verify->check($verCode);
        if($ress){
            echo 1;
        }else{
            echo 0;
        }
    }
}