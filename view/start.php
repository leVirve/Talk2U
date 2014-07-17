<!DOCTYPE html>
<html>
<head>
  <title>Talk2U</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <link rel="icon" href="img/talk.png">
  <link href="http://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet">
  <link rel="stylesheet" href="style/tsest.css">
  <link rel="stylesheet" href="style/userpage.css">
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
            <li><?php echo '<a href=" ">' . $_SESSION['user']['username'] . '</a>' ?></li>
            <li><a href="index.php?model=member&action=edit">個人資料</a></li>
            <li><a href="index.php?user=<?php echo $_SESSION['user']['username']?>">追蹤議題</a></li>
            <li><a href="index.php?model=member&action=logout">登出</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
  <div>
    <div class="page">
      <div class="pagecontent">
        <span class="ps">TALK</span>
        <span class="p">Public Issue</span>
        <span class="p1">公共議題/生活問題</span>
        <span class="p2">討論平台</span>
      </div>
    </div>
  </div>
<script>

</script>
</body>
</html>