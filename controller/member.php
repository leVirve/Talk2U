<?php
require_once 'model/member.php';

if( isset( $_GET['action'] ) ){
	$member = new member($db);
	switch($_GET['action']) {

		case 'get':
			$data = $member->getData();
			echo json_encode($data);
			break;

		case 'login':
			require 'view/member_login.php';
			break;

		case 'login_post':
			if( isset($_POST['account']) && isset($_POST['password']) ){
				if( $member->login($_POST['account'] ,$_POST['password']) ){
					header("Location: ?user=" . $_POST['account']);
				} else {
					header("Location: ?model=member&action=login&error=1");
				}
			} else {
				header("Location: ?model=member&action=login&error=2");
			}
			break;

		case 'logout' :
			$member->logout();
			require 'view/guest.php';
			break;

		case 'register':
			require 'view/member_register.php';
			break;

		case 'register_post':
			if( isset($_POST['account']) and isset($_POST['password']) and isset($_POST['mail']) ) {
				if( $member->register($_POST['account'], $_POST['password'], $_POST['mail']) ) {
					require 'view/member_login.php';
				}
			}
			break;

		case 'edit':
			require 'view/member_edit.php';
			break;

		case 'edit_post':
			if( $_FILES['photo']['name'] != NULL ) {
				$pic_id = md5($_FILES['photo']['name'] . time());
				$file_name = upload_file($pic_id);
				$member->edit_photo($_POST['userid'], $file_name);
			}
			if( isset($_POST['location']) ) {
				if( $member->edit($_POST['userid'], $_POST['mail'], $_POST['password'], $_POST['url'], $_POST['location'] )) {
					header("Location: ?user=" . $_POST['id']);
				}
			}
			break;

		default :
			require 'view/error.php';
			break;
	}
} else {
	require 'view/error.php';
}

function upload_file($id)
{
	$whiteList = array('jpg', 'png', 'gif');
	$newDir = "uploads/";
	if($_FILES["photo"]["name"]!=NULL){
	    $extension = strtolower(end(explode(".", $_FILES["photo"]["name"])));
	    if( in_array($extension, $whiteList) &&
	        $_FILES["photo"]["size"] <= 1024 * 1024) {
	            $resultStr = "Submit file OK.";
	            move_uploaded_file($_FILES["photo"]["tmp_name"], $newDir . $id.".".$extension);
	    } else {
	        $resultStr = "Submit file GG!!";
	    }
	}
	return $newDir . $id.".".$extension;
}