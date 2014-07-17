<?php
class member {

	function __construct( PDO $db){
		$this->db = $db;
	}

	function getData(){
		$db = $this->db;
		$id = $_SESSION['user']['id'];
		$stmt = $db->prepare("SELECT id, username, img, mail, url, location FROM `member` WHERE `id` = :id");
		$stmt->execute(array(':id' => $id));
		$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return array( 'user' => $user );
	}

	function register( $member ,$password, $mail) {
		$db = $this->db;
		$stmt = $db->prepare("INSERT INTO `member`" . 
							"(`username`,`password`,`mail`,`create_date`)" . 
							"VALUES ( :member , :password , :mail, NOW() )");
		$stmt->execute(array( ':member' => $member, ':password' => sha1($password), ':mail' => $mail ));
		if( $stmt->rowCount() == 1 ) {
			return true;
		} else {
			return false;
		}	
	}

	function edit( $userid, $mail, $password, $url, $location) {
		$db = $this->db;
		$stmt = $db->prepare("UPDATE `member`" . "SET `mail`=:mail, `password`=:password, `url`=:url, `location`=:location WHERE `id`=:userid");
		$stmt->execute(array( ':mail' => $mail, ':password' => sha1($password), 'url' => $url, ':location' => $location, ':userid' => $userid));
		if( $stmt->rowCount() == 1 ) {
			return true;
		} else {
			return false;
		}		
	}

	function edit_photo( $userid, $img) {
		$db = $this->db;
		$stmt = $db->prepare("UPDATE `member`" . "SET `img`=:img WHERE `id`=:userid");
		$stmt->execute(array( ':img' => $img, ':userid' => $userid));
		if( $stmt->rowCount() == 1 ) {
			return true;
		} else {
			return false;
		}		
	}

	function login( $member ,$password, $mail){
		$db = $this->db;
		$stmt = $db->prepare("SELECT * FROM `member` WHERE " . "`username` = :member " . "AND `password` = :password");
		$stmt->execute(array( ':member' => $member, ':password' => sha1($password) ));
		if( $stmt->rowCount() == 1 ) {
			$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$_SESSION['user'] = $user[0];
			return true;//登入成功
		} else {
			return false;//登入失敗
		}
	}
	
	function logout(){
		session_destroy();
    	return true;
	}
}