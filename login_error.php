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
<link rel="stylesheet"  href="login.css">
<title>マイページ登録</title>
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
                        <div class="error_message">メールアドレスまたはパスワードが間違っています。</div>
                       
                        <div class="mail">
                   <label>メールアドレス</label><br>
                   <input type="text" class="formbox" size="40" value=""  name="mail">
                    </div>

                    <div class="password">
                   <label>パスワード</label><br>
                   <input type="password" class="formbox" size="40" value=""  name="password">
                    </div>

                        
                    <div class="login_check">
                   <label><input type="checkbox" class="formbox" size="40" value="login_keep"  name="login_keep">ログイン状態を保持する</label>
                    </div>
                   

                     <div class="login_button">
                        <input type="submit" class="login_button" size="35" value="ログイン">
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
