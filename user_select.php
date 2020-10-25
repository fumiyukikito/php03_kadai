<?php
require_once("funcs.php");
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();
//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';
        // <a href="detail.php?id=XXX">
        $view .= '<a href="user_bm_update_view.php?user_id=' . $result["user_id"] . '">';
        $view .=  $result["user_name"];
        $view .= '</a>';

        $view .= '<a href="user_delete.php?user_id=' . $result["user_id"] . '">';
        $view .= ' / [削除]';
        $view .= '</a>';

        $view .= '</p>';
        $view .= '<p>';
        $view .= 'ID:';
        $view .= $result["user_lid"];
        $view .= 'PASS:';
        $view .= $result["user_lpw"];
        $view .= '管理者:';
        $view .= $result["user_kanri_flg"];
        $view .= '</p>';
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
      <a class="navbar-brand" href="index_user.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
    <a href="user_bm_update_view.php"></a>
<?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
