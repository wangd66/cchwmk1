<?php
$id = $_GET['id'];   //获取文件参数
header ('Content-type:text/html;content-type:application/x-www-form-urlencoded;charset=utf-8');
//数据库相关信息
$dsn = "mysql:host=localhost;dbname=aws;charset=utf8";
$user = 'root';         //数据库名
$pwd = '123456';          //数据库密码，根据自己的密码更改
try{
    $pdo = new PDO($dsn,$user,$pwd);
    $sql="select * from upload_file where id=".$id;
    $smt=$pdo->query($sql);
    $rows=$smt->fetch(PDO::FETCH_ASSOC);
    var_dump($rows);
    $filename = $rows['name']; //获取文件名称
    $dir ="upload/";  //相对于网站根目录的下载目录路径
    $down = $_SERVER['HTTP_HOST'].'/'.$dir.'/'.$filename; //当前文件


//判断如果文件存在,则跳转到下载路径
    if(file_exists(__DIR__.'/'.$dir.$filename)){
        header('location:http://'.$down);
    }else{
        header('HTTP/1.1 404 Not Found');
    }

}catch(PDOException $e){
    //这段用于出错的时候，方便告诉我们那里错了
    echo $e->getMessage().'<br>';
    echo $e->getLine().'<br>';      //显示错误所在多少行
    echo $e->__toString().'<br>';
}

?>