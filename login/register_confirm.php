<?php
mb_internal_encoding("utf8");

//保存されたファイル名で画像ファイルを習得
//(サーバー側へアップロードされたディレクトリとフォルダ名)
$temp_pic_name = $_FILES['picture']['tmp_name'];

//元のファイル名で画像ファイルを習得
//事前に画像を格納するファイルが必要
$original_pic_name=$_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

//保存先のファイル名をimageフォルダに元のファイル名で移動
move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);
?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="register_confirm.css">
    </head>

    <body>
        <header>
            <img src="4eachblog_logo.jpg">
        </header>

        <main>
            <div class="confirm">
                <h1>会員登録 確認</h1>
                <div class="form_contents">
                
                    <div class="titl">
                        <p>こちらの内容で登録しても宜しいでしょうか？</p>
                    </div>
                    
                    <div class="name">
                        <p>氏名：<?php echo $_POST['name'];?></p>
                    </div>

                    <div class="mail">   
                        <p>メール：<?php echo $_POST['mail'];?></p>
                    </div>
                    
                    <div class="password"> 
                        <p>パスワード：<?php echo $_POST['password'];?></p>
                    </div>

                    <div class="picture"> 
                        <p>プロフィール写真：<?php echo $path_filename;?></p>
                    </div>

                    <div class="comments"> 
                        <p>コメント：<?php echo $_POST['comments'];?></p>
                    </div>

                    <div class="box">
                        <form action="register.php">
                            <input type="submit" class="cancell_button" value="戻って修正する"/>
                        </form>
                        <form action="register_insert.php" method="post">
                            <input type="submit" class="submit_button" value="登録する"/>
                            <input type="hidden" value="<?php echo $_POST['name'];?>" name="name">
                            <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
                            <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
                            <input type="hidden" value="<?php echo $path_filename;?>" name="path_filename">
                            <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments">
                        </form>
                    </div>
                </div>

            </div>
        </main>

        <footer>
            🄫2018 InterNous.inc All rights reserved
        </footer>
    </body>
</html>