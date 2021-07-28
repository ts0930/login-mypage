<?php
mb_internal_encoding("utf8");


//セッションスタート
session_start();

//DB接続・try catch文

try {
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
} catch (PDOException $e) {
die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインをしてください。</p>
<a href='http://localhost/up/login.php'>ログイン画面へ</a>"
);
}


//preparedステートメント(update)でSQLをセット$//bindValueメソッドでパラメータをセット ok
$stmt = $pdo -> prepare("update login_mypage set name = ?,
 mail = ?, password = ?, comments = ?  where id = ?");

$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_SESSION['id']);



//executeでクエリを実行　ok
$stmt->execute();

//preparedステートメント(更新された情報をDBからSELECT文で取得)でSQLセット$ //bindValueメソッドでパラメータをセット ok
$stmt = $pdo->prepare("select * from login_mypage where mail = ? && password = ?");
$stmt -> bindValue(1,$_POST["mail"]);
$stmt -> bindValue(2,$_POST["password"]);




//executeでクエリを実行 ok
$stmt->execute();



//データベースを切断 ok
$pdo = NULL;



//fetch・while文でデータ取得し、sessionに代入 ok
while ($row=$stmt -> fetch()) {
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}


//mypage.phpへリダイレクト
header("Location:http://localhost/up/mypage.php");

?>
