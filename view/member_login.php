<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
	<title>登入Talk2U</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="js/animate.js"></script>
	<link href="http://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet">
  	<link rel="icon" href="img/talk.png">
	<link rel="stylesheet" href="style/display.css">
	<link rel="stylesheet" href="style/Animate.css">
</head>
<body>
	<div class="cover animated bounceInLeft" style="background:#333332;height:100%;weight:100%;">
		<div class="cover_content">
			<img src="img/bubble.png">
			<span class="logo">TalkTalk</span>
			<span>&nbsp;Is Good</span>
		</div>
	</div>
	<div id="mid">
		<div id="banner">Talk2U</div>
		<div id="content">
			<img src="img/en.png" width="150px"><br>
			<form id="login" action="?model=member&action=login_post" method="post">
				<input type="text" name="account" placeholder="Your name" id="account" class="required">
				<input type="password" name="password" placeholder="Password" class="required">
				<input type="submit" id="login" value="登入">
			</form>
		</div>
	</div>
	<script>
	</script>
</body>
</html>