<!DOCTYPE html>
<html lang="zh-CN"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>登陆注册页面</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="content">
        <div class="img">
            <div class="img__text m--in">
                <h2>已有帐号？</h2>
                <p>有帐号就登录吧，好久不见了！</p>
            </div>
            <div class="img__btn">
                <a href='index.php'>登陆</a>
            </div>
        </div>
        <div class="form sign-up" >
            <form action="register.php" method="post" enctype="multipart/form-data">
                <h2>立即注册</h2>
                <label>
                    <span>用户名</span>
                    <input type="text" name="username">
                </label>
                <label>
                    <span>邮箱</span>
                    <input type="email" name="email">
                </label>
                <label>
                    <span>密码</span>
                    <input type="password" name="password">
                </label>
                <button type="submit" class="submit">注 册</button>
            </form>
        </div>

</div>

<script src="js/script.js"></script>


</body></html>