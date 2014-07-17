<?php
  header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Talk2U</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <link rel="icon" href="img/talk.png">
  <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
  <link rel="stylesheet" href="style/layouts/side-menu.css">
  <link href="http://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet">
  <link rel="stylesheet" href="style/tsest.css">
  <link rel="stylesheet" href="style/explore.css">
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
            <?php
            if( isset($_SESSION['user']) ) {
              echo '<li class="user_main">'.'<img src="'.$_SESSION['user']['img'].'" alt=""></li>';
              echo '<li><a href=" ">' . $_SESSION['user']['username'] . '</a></li>';
              echo '<li><a href="index.php?model=member&action=edit">個人資料</a></li>'.
                '<li><a href="#">追蹤議題</a></li>'.
                '<li><a href="index.php?model=member&action=logout">登出</a></li>';
      } else {
              echo '<li class="user_main"><img src="img/profile.png" alt=""></li>'.
                '<li><a href="index.php?model=member&action=login">登入</a></li>'.
                '<li><a href="index.php?model=member&action=register">註冊</a></li>';
            }
            ?>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
  <div>
    <div class="page">
      <div class="mask"></div>
      <div class="header">
          <h1>Talk2U</h1>
          <h2>A good place for you to talk talk.</h2>
      </div>
    </div>

    <div id="layout">
      <!-- Menu toggle -->
      <a href="#menu" id="menuLink" class="menu-link">
          <!-- Hamburger icon -->
          <span></span>
      </a>
      <div id="main">
        <div id="message">

        </div>
      </div>
    </div>

  </div>


<script>
</script>
<script src="js/user_followlist.js"></script>
<script src="js/ui.js"></script>
</body>
</html>