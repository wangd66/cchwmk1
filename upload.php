<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>文件上传下载</title>
</head>
<body>
<div>
    <ul>
        <li>用户名：<?php session_start(); echo $_SESSION['username'] ?></li>
        <li>邮箱：<?php session_start(); echo $_SESSION['email']?></li>
    </ul>

</div>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
    <label for="file">文件名：</label>
    <input type="file" name="file" id="file"><br>
    <input type="submit" name="submit" value="提交">
</form>
<?php
header ('Content-type:text/html;content-type:application/x-www-form-urlencoded;charset=utf-8');
//数据库相关信息
$dsn = "mysql:host=localhost;dbname=aws;charset=utf8";
$user = 'root';         //数据库名
$pwd = '123456';          //数据库密码，根据自己的密码更改
try{
    $pdo = new PDO($dsn,$user,$pwd);
    $sql="select * from upload_file";
    $smt=$pdo->query($sql);
    $rows=$smt->fetchAll(PDO::FETCH_ASSOC);


}catch(PDOException $e){
    //这段用于出错的时候，方便告诉我们那里错了
    echo $e->getMessage().'<br>';
    echo $e->getLine().'<br>';      //显示错误所在多少行
    echo $e->__toString().'<br>';
}
?>
<div class="container">

    <h1 class="page-header">查看文件：</h1>
    <table class='table table-striped table-hover table-bordered'>
        <tr>
            <th style="width: 50px;">编号</th>
            <th style="width: 150px">文件名称</th>
            <th style="width: 150px">文件字符</th>
            <th style="width: 150px">文件下载</th>
        </tr>
        <?php
        foreach($rows as $row){
            echo '<tr>';
            echo "<td style='text-align: center'>{$row['id']}</td>";
            echo "<td style='text-align: center'>{$row['name']}</td>";
            echo "<td style='text-align: center'>{$row['size']}</td>";
            echo "<td style='text-align: center'><a href='download.php?id={$row['id']}'>下载</a></td>";
            echo '</tr>';

        }


        ?>
    </table>
</div>
</body>
</html>