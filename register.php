<?php
header ('Content-type:text/html;charset=utf-8');
//数据库服务器主机名，端口号，选择的数据库，字符集
$dsn = "mysql:host=localhost;dbname=aws;charset=utf8";
$user = 'root';         //数据库名
$pwd = '123456';          //数据库密码

try{
    $pdo = new PDO($dsn,$user,$pwd);
    //如果post表单不为空
    if(!empty($_POST)){

        //声明变量$fields，用来保存字段信息
        $fields = array('username','email','password');

        //声明$values，用来保存值信息
        $values = array();

        //遍历$fields，获取输入用户名、密码、邮箱的键和值
        foreach($fields as $k=>$v){

            $data = isset($_POST[$v]) ? $_POST[$v] : '';
            if($data=='' && $v=='username')  {
                echo"<script>alert('用户名不能为空');window.location.href='regist.php';</script>";
                return false;
            }
            if($data=='' && $v=='email')  {
                echo"<script>alert('邮箱不能为空');window.location.href='regist.php';</script>";
                return false;
            }
            if($data=='' && $v=='password') {
                echo"<script>alert('密码不能为空');window.location.href='regist.php';</script>";
                return false;
            }
            if($data!='' && $v=='password') $data=md5($data);
            //赋值给$fields数组
            $fields[$k] = "$v";

            //赋值给$values数组
            $values[] = "'$data'";

        }
        //将$fields数组以逗号连接，赋值给$fields，组成insert语句中的字段部分
        //implode — 将一个一维数组的值转化为字符串
        $fields = implode(',', $fields);

        //将$values数组以逗号连接，赋值给$values，组成insert语句中的值部分
        $values = implode(',', $values);
        //最后把$fields和$values拼接到insert语句中，注意要指定表名
        $sql = "insert into user ($fields) values ($values)";

        if($res = $pdo->query($sql)){
            //注册成功，自动跳转到会员中心
            echo '<script>alert("注册成功！");window.location.href="index.php";</script>';
        }else{
            echo '<script>alert("注册失败！");window.location.href="regist.php";</script>';
            return false;
        }
    }else{
        echo '<script>alert("注册失败！");window.location.href="regist.php";</script>';
        return false;


    }

}catch(PDOException $e){
    echo $e->getMessage().'<br>';
    echo $e->getLine().'<br>';
    echo $e->__toString().'<br>';
}
define('APP', 'aws');
require './regist.php';
?>