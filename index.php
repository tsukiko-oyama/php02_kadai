<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
    <!-- db名と合わせる -->
   <fieldset> 
    <legend>今すぐ書き留めよう</legend>
     <label>ユーザー名: <input type="text" name="name"></label><br>
     <label>Email：<input type="text" name="email"></label><br>
     <label>性別：<select name="gender">
                <option value="" selected hidden>選択してください</option>
                <option value="男性">男性</option>
                <option value="女性">女性</option>
                <option value="未回答">未回答</option>
              </select></label><br>
      <label>年齢：<select name="age">
                <option value="" selected hidden>選択してください</option>          
                <option value="10代">10代</option>
                <option value="20代">20代</option>
                <option value="30代">30代</option>
                <option value="40代">40代</option>
                <option value="50代">50代</option>
                <option value="60代">60代</option>
                <option value="70代">70代</option>
                <option value="80代">80代</option>
                <option value="90代">90代~</option>
                <option value="未回答">未回答</option>
                </select></label><br>
      <label>
            カテゴリー：<select name="category" id="category">
                <option value="" selected hidden>選択してください</option>   
                <option value="エンタメ">エンタメ</option>
                <option value="家電">家電</option>
                <option value="ホーム・キッチン・日用雑貨">ホーム・キッチン・日用雑貨</option>
                <option value="食品・飲料・お酒">食品・飲料・お酒</option>
                <option value="ビューティー">ビューティー</option>
                <option value="ベビー・玩具">ベビー・玩具</option>
                <option value="ホビー">ホビー</option>
                <option value="服・シューズ・バッグ">服・シューズ・バッグ</option>
                <option value="スポーツ・アウトドア">スポーツ・アウトドア</option>
                <option value="ウェルネス">ウェルネス</option>
            </select></label></br>
            <textarea name="need" placeholder="困ったことは？"></textarea>
      <input type="submit" value="投稿">
            </div>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
