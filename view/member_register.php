<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>註冊Talk2U</title>
	<link rel="icon" href="img/ico.png">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="js/validate.js"></script>
	<script src="js/animate.js"></script>
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
			<form id="regist" action="index.php?model=member&action=register_post" method="post">
				<input type="text" name="account" placeholder="Pick a name" id="account" class="name_required" minlength="3">
					<span id="msg"></span>
				<input type="text" name="mail" placeholder="Your e-mail" class="required email" >
				<input type="password" name="password" placeholder="password" class="required" >
				<br>
				<input type="submit" value="註冊">
			</form>

		</div>
	</div>
	
</body>
</html>