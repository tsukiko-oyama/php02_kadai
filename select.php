<?php

// データを一つ出した後、残りを出す
//1.  DB接続します
session_start();

require_once('funcs.php');

loginCheck();

$pdo = db_conn();

//２．SQL文を用意(データ取得：SELECT)
// $stmt = $pdo->prepare("************* *****");
$stmt = $pdo->prepare("SELECT * FROM db_scrapbook");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
 //$resultには配列 
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= '<p>'. $result['indate'].'</p>';
    $view .= '<p>'.'カテゴリー：'.$result['category'].'</p>';
    $view .= '<p>'. $result['age'].' | '.$result['gender'].'</p>';
    $view .= '<p>'. $result['name'].'</p>';
    $view .= '<p>'. $result['need'].'</p>';
    $view .= '<a href="update_index.php?id='.$result['id'].'">';
    $view .='[ 編集 ]';
    $view .= "</a>";    
    $view .= '<a href="delete.php?id='.$result['id'].'">';
    $view .='[ 削除 ]';
    $view .= "</a>";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
