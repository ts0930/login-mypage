<?php
mb_internal_encoding("utf8");

//セッションスタート
session_start();


if (empty($_SESSION['id'])) {
    header("Location:login_error.php");
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />

<title>マイページ登録</title>
<link rel="stylesheet" type="text/css" href="mypage.css">

</head>
<body>
        <header>
        <a href="register.php"><img src="4eachblog_logo.jpg"></a>
            <div class="login"><a href="log_out.php">ログアウト</a></div>
        </header>
<main>
<div class="information">
<div class="form_contents">
<h2>会員情報</h2>
                        <div class="hello">
                            <?php echo "こんにちは！".$_SESSION['name']."さん"; ?>
                        </div>

    <form action="mypage_update.php" method="post">

    <div class="picture">
            <img src="<?php echo $_SESSION['picture']; ?> "> 
    </div>
    <div class="details">
    <p>氏名：<input type="text" size="30" value="<?php echo $_SESSION['name']; ?>" name="name">
    </p>
    <p>メール：<input type="text" size="30" value="<?php echo $_SESSION['mail']; ?>" name="mail">
    </p>
    <p>パスワード：<input type="text" size="30" value="<?php echo $_SESSION['password']; ?>" name="password">
    </p>

        </div>

    <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage_hensyu"> 
    
    
    <textarea class= "comments" name="comments" id="" cols="75" rows="2"><?php echo $_SESSION['comments']; ?></textarea>



    <div class="hensyu_button">
                <input type="submit" class="hensyu_button" size="35" value="この内容に変更する">
    </div>
    

    </form>
</div>
</div>

</main>

<footer>
©️ 2018 InterNous.Inc. All Rights reserved
</footer>

</body>
</html>