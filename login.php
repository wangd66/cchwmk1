<?php
header ('Content-type:text/html;content-type:application/x-www-form-urlencoded;charset=utf-8');
//数据库相关信息
$dsn = "mysql:host=localhost;dbname=aws;charset=utf8";
$user = 'root';         //数据库名
$pwd = '123456';          //数据库密码，根据自己的密码更改

try{
    $pdo = new PDO($dsn,$user,$pwd);
    //如果表单中不为空
    if(!empty($_POST)){

        //从表单中获取数据
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? ($_POST['password']) : '';
        if(!$email || !$password){
            echo '<script>alert("登陆信息不能为空");window.location.href="index.php";</script>';
            return false;
        }
        //执行SQL语句
        $sql = "select `id`,`password`,`username` from `user` where `email`='$email'";
        $res = $pdo->query($sql);
        $row = $res -> fetch(PDO::FETCH_ASSOC);

        if($row['password']!=md5($password)){
            echo '<script>alert("密码错误");window.location.href="upload.php";</script>';
            return false;
        }
        if($row){
            session_start();
            // 存储 session 数据
            $_SESSION['username']=$row['username'];
            $_SESSION['email']=$email;
            //登录成功，自动跳转到会员中心
            echo '<script>alert("登录成功");window.location.href="upload.php";</script>';
        }else{
            //否则提示登录失败
            die('登录失败！');
        }
    }else{
        echo '<script>alert("登录失败");window.location.href="index.php";</script>';
    }
}catch(PDOException $e){
    //这段用于出错的时候，方便告诉我们那里错了
    echo $e->getMessage().'<br>';
    echo $e->getLine().'<br>';      //显示错误所在多少行
    echo $e->__toString().'<br>';
}
define('APP', 'aws');
require './index.php';

?>