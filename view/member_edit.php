<?php header('Content-Type: text/html; charset=utf-8');?>
<!DOCTYPE html>
<html>
<head>
	<title>個人資料</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<link rel="icon" href="img/ico.png">
	<link rel="stylesheet" href="style/info.css">
</head>
<body>
	<div id="mid">
		<div id="banner">Self-Profile<br>個人簡介</div>
		<div id="profile">
			<img id="photo" src="img/profile.png">
		</div>
		<div id="content">
		<form action="?model=member&action=edit_post" method="post" enctype="multipart/form-data">
			<input type="text" name="userid" style="display:none" value=" <?php echo $_SESSION['user']['id'] ?> ">
			帳戶名稱: <input type="text" name="name" maxlength="20">
			信箱: <input type="text" name="mail" class="email" value="" id="mail">
			新密碼: <input type="password" name="password" id="password">
			密碼確認: <input type="password" name="password_check" id="paasswordCheck">
			個人網站: <input type="text" name="url" class="url">
			所在地: <input type="text" name="location">
			<label for="file">上傳大頭貼: </label>
			<input type="file" name="photo">
			<input type="submit" value="儲存修改">
		</form>
		</div>
	</div>
	<script>
		$(function () {
			window.onload = function() {
				$.ajax({
					url: 'index.php',
					data: 'model=member&action=get',
					type : 'GET',
					dataType: 'json',
					success:function(data) {
						$('#photo').attr('src', data.user[0].img);
						$('#mail').attr('value', data.user[0].mail);
						$('[name=name]').attr('value', data.user[0].username);
						$('[name=url]').attr('value', data.user[0].url);
						$('[name=location]').attr('value', data.user[0].location);
					},
					error:function(xhr) {
						alert('發生錯誤');
					}
				});
			}
		});
	</script>
</body>
</html>