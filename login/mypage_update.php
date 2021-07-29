<?php
mb_internal_encoding("utf8");
session_start();

//DB接続
try{
    $pdo =new PDO("mysql:dbname=lesson01;host=localhost;","root","");
}catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが込み合っており一時的にアクセスが出来ません。<br>
    しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>
    ログイン画面へ</a>");
}

//prepareステートメントで(update文)SQLセット
$stmt = $pdo->prepare("update login_mypage set name = ?,mail = ?,password = ?,comments = ? where id = ?");

//bindValueメソッドでパラメーターセット
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_SESSION['id']);

//クエリ実行
$stmt->execute();

//prerareステートメントで(selecct文)
$stmt = $pdo->prepare("select * from login_mypage where id = ?");

//bindValueメソッドでパラメーターセット
$stmt->bindValue(1,$_SESSION['id']);

//クエリ実行
$stmt->execute();

//DB切断
$pdo = NULL;

//fetch,whileでデータ習得 sessionに代入
while($row = $stmt->fetch()){
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['comments'] = $row['comments'];
}

//mypage.phpへリダイレクト
header('Location:mypage.php');
?>