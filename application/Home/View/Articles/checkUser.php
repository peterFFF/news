<?php
session_start();
$pdo=new PDO('mysql:host=localhost;dbname=news','root','root');
$username=$_POST['username'];
$password=$_POST['password'];
$sql="select * from userInfo where userName='{$username}' and password='{$password}'";
$st=$pdo->query($sql);
$rs=$st->fetch();
if($rs==NULL){
    echo 0;
}else{
    $_SESSION['userName']=$username;
    echo 1;
}
