<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />

<title>マイページ登録</title>
<link rel="stylesheet" type="text/css" href="login.css">

</head>
<body>
        <header>
            <a href="register.php"><img src="4eachblog_logo.jpg"></a>
            <div class="login"><a href="login.php">ログイン</a></div>
        </header>
<main>
<div class="information">
    <form action="mypage.php" method="post">
        <div class="form_contents">
        <div class="mail">
            <label for="">メールアドレス</label><br>
            <input type="text" size="40" value="<?php echo $_COOKIE['mail']; ?>" class="formbox" name="mail">
        </div>
        <div class="password">
            <label for="">パスワード</label><br>
            <input type="password" size="40" value="<?php echo $_COOKIE['password']; ?>" class="formbox" name="password">

        </div>
        <div class="login_check">
            <label><input type="checkbox" class="formbox" size="10" name="login_keep" value="login_keep"
    
        <?php
        if(isset($_COOKIE['login_keep'])){
            echo "checked='checked'";
        }
        ?>>ログイン状態を保持する</label>

         </div>
    
    
    

        <div class="login_button" >
                <input type="submit" class="login_button" size="40" value="ログイン">
        </div>

        </div>
    

    </form>
    </div>
</main>

<footer>
©️ 2018 InterNous.Inc. All Rights reserved
</footer>

</body>
</html>