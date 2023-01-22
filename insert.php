<?php
// 1. POSTデータ取得
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$category = $_POST['category'];
$need = $_POST['need'];

// 2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  // "******* ***** ********( ************* )
  // // VALUES( ************ )"
  // "INSERT INTO `gs_an_table`(`id`, `name`, `email`, `naiyou`, `indate`) 
  // VALUES (NULL,$name,$email,$naiyou,sysdate())"
  "INSERT INTO `db_scrapbook`(`id`, `name`, `email`, `gender`, `age`, `category`, `need`, `indate`) 
  VALUES (NULL,:name,:email,:gender,:age,:category,:need,sysdate())"
);

// 4. バインド変数を用意
// $stmt->bindValue('******', *****, ****************);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category', $category, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':need', $need, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header('Location: index.php');
}
?>
