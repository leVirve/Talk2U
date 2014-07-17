<?php
class message {

	function __construct( PDO $db){
		$this->db = $db;
	}
	
	function getData() {
		$db = $this->db;
	 	$article = $db->query("SELECT * FROM article ORDER BY `time` DESC");
	 	$reply = $db->query("SELECT * FROM reply ORDER BY `reply_id` DESC");
	  	return array(
			  'article' => $article->fetchAll(PDO::FETCH_ASSOC),
			  'articleCount' => $article->rowCount(),
			  'reply' => $reply->fetchAll(PDO::FETCH_ASSOC),
			  'replyCount' => $reply->rowCount()
			  );
	}
	
	function getFollowData() {
		$db = $this->db;
		$id = $_SESSION['user']['id'];
	 	$stmt = $db->query("SELECT * FROM followlink WHERE `userid`=$id");
	 	$articles = $db->query("SELECT * FROM article");
	  	return array(
			  'rows' => $stmt->fetchAll(PDO::FETCH_ASSOC),
			  'rowsCount' => $stmt->rowCount(),
			  'articles' => $articles->fetchAll(PDO::FETCH_ASSOC),
			  'articlesCount' => $articles->rowCount()
			  );
	}
	
	function new_message( $postername ,$content){
		$db = $this->db;
		$time=date("Y-m-d H:i:s");//取得發文時間
		$sql="insert into article (time,account,content,agree,oppose) values ('$time','$postername','$content',0,0)";
		$db->exec($sql);
		return 0;
	}
	
	function setValue( $id, $opinion ) {
		$db = $this->db;
		// Model followlink
		$userid = $_SESSION["user"]["id"];
		$stmt = $db->query("SELECT * FROM `followlink` WHERE `userid`=$userid && `postid`=$id");
		if($stmt->rowCount() >= 1) {
			return false; // existed
		}
	  	$stmt = $db->prepare("INSERT INTO `followlink`" .
				  "(`userid`, `postid`)" . 
				  "VALUES(:userid, :postid)");
	  	$stmt->execute(array(
				   ':userid' => $_SESSION['user']['id'],
				   ':postid' => $id));
	  	if( $stmt->rowCount() != 1 ) {
	  		return false; // link has been existed
	  	}
		// Model article
		$stmt = $db->query("SELECT `agree`, `oppose` FROM article WHERE `id`=$id");
		foreach ($stmt as $row) {
			$agree = $row['agree'];
			$oppose = $row['oppose'];
		}
		if($opinion) {
			$agree += 1; 
		} else {
			$oppose += 1; 
		}
		$stmt = $db->prepare("UPDATE `article`" . "SET `agree`=:agree, `oppose`=:oppose WHERE `id`=:mid");
		$stmt->execute(array( ':agree' => $agree, ':oppose' => $oppose, ':mid' => $id ));
		if( $stmt->rowCount() == 1 ){
			return true;
		} else {
			return false;
		}
	}

	function reply_message($id, $postername, $content) {
		$db = $this->db;
	  	$stmt = $db->prepare("INSERT INTO `reply`" .
				  "(`reply_id`,`time`, `account`, `content`, `ip`)" . 
				  "VALUES(:id, NOW(), :postername, :content, :ip)");
	  	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip=$_SERVER['HTTP_CLIENT_IP'];
	  	} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	  	} else {
		    $ip=$_SERVER['REMOTE_ADDR'];
	  	}
	  	$stmt->execute(array(
	  			   ':postername' => $postername,
				   ':content' => $content,
				   ':id' => $id,
				   ':ip' => $ip));
	}

	function delete_user_message($messager ,$message ){
		$db = $this->db;
	 	$stmt = $db->prepare("UPDATE `message` SET " . 
							"`message` = :message " . 
							"WHERE `messager` = :messager");
	  	$stmt->execute(array(
				   ':messager' => $messager,
				   ':message' => $message
				   ));
	  return $stmt->rowCount();
	}
	
	function delete_message( $message_id ,$message ){
		$db = $this->db;
		try{
			$stmt = $db->prepare("UPDATE `message` SET " . 
							"`message` = :message " . 
							"WHERE `message_id` = :message_id");
			foreach($message_id as $id){
			  $stmt->execute(array(	
						   ':message_id' => $id,
						   ':message' => $message
						   ));
			}
			return 1;	
		} catch(PDOException $ex) {
		   return 0;
		}
	}

}

function upload_file()
{
	if( $_FILES['share']['name'] != NULL ) {
		$file_id = md5($_FILES['share']['name'] . time());
		$file_name = upload_file($file_id);
	}
	$whiteList = array('jpg', 'png');
	$newDir = "../uploads/";
	if($_FILES["share"]["name"]!=NULL){
	    $extension = strtolower(end(explode(".", $_FILES["share"]["name"])));
	    if( in_array($extension, $whiteList) &&
	        $_FILES["share"]["size"] <= 1024 * 1024) {
	            $resultStr = "Submit file OK.";
	            move_uploaded_file($_FILES["share"]["tmp_name"], $newDir . $file_id.".".$extension);
	    } else {
	        $resultStr = "Submit file GG!!";
	    }
	}
	echo $resultStr;
	return $newDir . $file_id.".".$extension;
}