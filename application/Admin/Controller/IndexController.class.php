<?php
namespace Admin\Controller;
use Think\Controller;
session_start();
class IndexController extends Controller {
    public function index(){
        if(empty($_SESSION)){
            $this->success("您还未登陆,请登陆!",__APP__."/Login/index");
        }
        $this->display();
    }
}