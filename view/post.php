<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php
if( !isset($_SESSION['user']) ) {
    echo "<meta http-equiv=REFRESH CONTENT=0;url=\"index.php\">";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Talk2U</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <link rel="icon" href="img/talk.png">
  <link href="http://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet">
  <link rel="stylesheet" href="style/tsest.css">
  <link rel="stylesheet" href="style/postpage.css">
  <link rel="stylesheet" href="style/Animate.css">
</head>
<body>
  <div id="wrapper">
    <nav>
      <ul class="menu">
        <li class="home current"><a href="index.php"><span>首頁</span></a></li>
        <li><a href="index.php?model=post"><span>提案</span></a></li>
        <li><a href="index.php?model=explore"><span>瀏覽</span></a></li>
        <li class="details"><a href="#"><span>使用者</span></a>
          <ul class="sub-menu user_menu">
            <li class="user_main"><?php 
            	echo '<img src="';
            	if($_SESSION['user']['img']) echo $_SESSION['user']['img']; else echo "img/profile.png";
            	echo '" alt="">' ?></li>
            <li><?php echo '<a href="">' . $_SESSION['user']['username'] . '</a>' ?></li>
            <li><a href="index.php?model=member&action=edit">個人資料</a></li>
            <li><a href="index.php?user=<?php echo $_SESSION['user']['username'] ?>">追蹤議題</a></li>
            <li><a href="index.php?model=member&action=logout">登出</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
  <div>
    <span>
      <h2 style="width:880px; margin: 0 auto; margin-top: 20px; padding: 10px; color:">{ ISSUE }</h2>
      <form id="post" action="index.php?model=article&action=add" method="post">
        發佈議題：<br><textarea name="content"></textarea><br>
        <input type="submit" value="發布">
      </form>
    </span>
    <div id="message">

    </div>
  </div>

<script>

</script>
</body>
</html>