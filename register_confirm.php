<?php
mb_internal_encoding("utf8");
//文字化け防止

//仮保存されたファイル名で画像ファイルを取得(サーバーへ仮アップロードされたディレクトリとファイル名)
$temp_pic_name = $_FILES['picture']['tmp_name'];

//元のファイル名で画像ファイルを取得、事前に画像を格納する「image」というファイルを作成しておく必要あり
$original_pic_name=$_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;


//仮保存のファイル名を、imageフォルダに、元のファイル名で移動させる
move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="register_confirm.css">
<title>マイページ登録</title>
</head>
<body>
    <header>
    <a href="register.php"><img src="4eachblog_logo.jpg"></a>
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>
<main>
<div class="confirm">
     <div class="form_contents">
       <h2>会員登録　確認</h2>
        <p>こちらの内容でよろしいでしょうか？</p>
        <p>氏名: <br>
        <?php echo $_POST['name'];?>
        </p>

        <p>メール: <br>
        <?php echo $_POST['mail'];?>
        </p>

        <p>パスワード: <br>
        <?php echo $_POST['password'];?>
        </p>

        <p>プロフィール写真: <br>
        <?php echo $_FILES['picture']['name'];?>
        </p>

        <p>コメント: <br>
        <?php echo $_POST['comments'];?>
        </p>
          <div class="buttons"> 
        <div class="back_button">
            
                 <a href="register.php">戻って修正する</a>
         </div>
         
          <div class="submit">
            <form action="register_insert.php" method="post" enctype="multipart/form-data">
                <input type="submit" class="submit_button" size="35" value="登録する">
                <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
                <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                <input type="hidden" value="<?php echo $path_filename; ?>" name="path_filename">
                <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
            </form>
          </div> 
       </div> 
    </div>
</div>

</main>
    
<footer>
©️ 2018 InterNous.Inc. All Rights reserved
</footer>

</body>
</html>