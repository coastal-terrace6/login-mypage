<?php

mb_internal_encoding("utf8");
session_start();

//mypege以外からログインされたらリダイレクト
if(!isset($_POST['from_mypage'])){
    header('Location:login_error.php');
}

?>

<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="UTF-8">
        <title>マイページ登録</title>
        <link rel ="stylesheet" type="text/css" href="mypage.css">
    </head>

    

    <body>

        <header>
            <img src="4eachblog_logo.jpg">
            <div class="logout">
                <a href="log_out.php">ログアウト</a>
            </div>
        </header>

        <main>
            <div class="box">
                <!--htmlとセッション記述
                編集ができるようにsessionはvalueに入れる--->
                <form action="mypage_update.php" method="post">
                    <h2>会員情報</h2>
                    <div class="profile_pic">
                        <img src="<?php echo $_SESSION['picture'];?>">
                    </div>

                    <div class="basic_info">
                        
                        <p>氏名:<input type="text" class="text" size="35" name="name" value="<?php echo $_SESSION['name'];?>" size=35>
                        </p>
                        <p>メール:<input type="text" class="text" size="35" name="mail" size=35 value="<?php echo $_SESSION['mail'];?>">
                        </p>
                        <p>パスワード:<input type="text" class="text" size="35" name="password" size=35 value="<?php echo $_SESSION['password'];?>">
                        </p>
                    </div>

                    <div class="hensyu_comments">
                        <textarea cols="100%" rows="7" name="comments"><?php echo $_SESSION['comments'];?></textarea>
                    </div>

                    <input type="submit" class="submit_button" size="40" value="この内容に変更する">

                </form>
            </div>
        </main>

        <footer>
            🄫2018 InterNous.inc All rights reserved
            <br>
            　　　　　　　　　　　　　　　　　　　　　　        
        </footer>

    </body>
</html>