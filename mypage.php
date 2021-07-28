<?php
mb_internal_encoding("utf8");
session_start();

if (empty($_SESSION['id'])) {
  
try{
    //try catch文、DBに接続できなければエラーメッセージを表示
    $pdo =  new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
}catch(PDOException $e){
die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。<p>
<a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
    );
}


//prepared statement(プリペアードステートメント)でSQL文を作る(DBとpostデータを統合させる。select文とwhere句を使用。)
$stmt =  $pdo->prepare("select * from login_mypage where mail = ? && password = ?");
//bindValueメソッドでパラメータをセット
$stmt->bindValue(1,$_POST["mail"]);
$stmt->bindValue(2,$_POST["password"]);

//executeでクエリを実行
$stmt->execute();
//データベースを切断
$pdo = NULL;
//fetch・while文でデータ取得し、sessionに代入
while ($row=$stmt -> fetch()) {
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}
//データ取得が出来ずに(emptyを使用して判定)sessionがなければ、リダイレクト(エラー画面へ)
if (empty($_SESSION['id'])) {
    header("Location:login_error.php");
}

if (!empty($_POST['login_keep'])) {
    $_SESSION['login_keep']=$_POST['login_keep'];
    }
}


if(!empty($_SESSION['id'])&&!empty($_SESSION['login_keep'])){
    setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*60*24*7);
    setcookie('login_keep',$_SESSION['login_keep'],time()+60*60*24*7);     
}else if (empty($_SESSION['login_keep'])){
    setcookie('mail','',time() - 1);
    setcookie('password','',time() - 1);
    setcookie('login_keep','',time() - 1);
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link rel="stylesheet"  href="mypage.css">
<title>マイページ登録</title>
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

                        <div class="picture">
                       <img src="<?php echo $_SESSION['picture']; ?> "> 
                       </div>
                    <div class="details">
                    <div class="name">
                    <p>氏名:
                        <?php echo $_SESSION['name']; ?></p>
                    </div>
                    <div class="mail">
                   <p>メール:
                   <?php echo $_SESSION['mail']; ?></p>
                    </div>
                    <div class="password">
                    <p>パスワード:
                    <?php echo $_SESSION['password']; ?></p>
                    </div>
                    </div>
                    <div class="comments">
                    <?php echo $_SESSION['comments']; ?>
                    </div>
                    <form action="mypage_hensyu.php" method="post" class="form_center">
                    <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage"> 
                    

                     <div class="hensyu_button">
                        <input type="submit" class="hensyu_button" size="35" value="編集する">
                    </div>
                    
                    </form>
                    </div>
</main>

<footer>
©️ 2018 InterNous.Inc. All Rights reserved
</footer>

        </body>
</html>