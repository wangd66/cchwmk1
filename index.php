<!DOCTYPE html>
<html lang="zh-CN"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>登陆注册页面</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="content">
    <div class="form sign-in">
        <form action="login.php" method="post" enctype="multipart/form-data">
            <h2>欢迎回来</h2>
            <label>
                <span>邮箱</span>
                <input type="email" name="email">
            </label>
            <label>
                <span>密码</span>
                <input type="password" name="password">
            </label>
            <button type="submit" class="submit">登 录</button>
        </form>

    </div>

    <div class="sub-cont">
        <div class="img">
            <div class="img__text m--up">
                <h2>还未注册？</h2>
                <p>立即注册，发现大量机会！</p>
            </div>

            <div class="img__btn">
                <a href='regist.php'>注册</a>
            </div>
        </div>
    </div>
</div>

<!--<script src="js/script.js"></script>-->


</body></html>