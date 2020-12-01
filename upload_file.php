<?php
if ($_FILES["file"]["error"] > 0)
{
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else
{
//    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
//    echo "Type: " . $_FILES["file"]["type"] . "<br />";
//    echo "Size: " . ($_FILES["file"]["size"]) . " Kb<br />";
//    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    $srcname = $_FILES['file']['name'];
    $ext = array_pop(explode('.',$srcname));
    $srcfile = $_FILES['file']['tmp_name'];
    $dstname = $_FILES['file']['name'];
    $size=$_FILES["file"]["size"];
    $dstfile = $_SERVER['DOCUMENT_ROOT'].'/upload/'.$dstname;
    $dsn = "mysql:host=localhost;dbname=aws;charset=utf8";
    $user = 'root';         //数据库名
    $pwd = '123456';          //数据库密码，根据自己的密码更改
    try{
        $pdo = new PDO($dsn,$user,$pwd);
        //文件移动
        if(move_uploaded_file($srcfile,$dstfile)){
            //数据入库
            $sql = "insert into upload_file(name,size) values('{$dstname}','{$size}')";
            $smt = $pdo->prepare($sql);
            if($smt->execute()){
                //跳转到首页
                header('location:upload.php');
            }
        }else{
            echo '<script>alert("上传失败！");window.location.href="upload.php";</script>';
            return false;
        }

    }catch(PDOException $e){
        //这段用于出错的时候，方便告诉我们那里错了
        echo $e->getMessage().'<br>';
        echo $e->getLine().'<br>';      //显示错误所在多少行
        echo $e->__toString().'<br>';
    }


}
?>