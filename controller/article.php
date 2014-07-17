<?php
require_once 'model/article.php';
if( isset( $_GET['action'] ) ){
	$message = new message($db);
	switch($_GET['action']){
		case 'list':
			$data = $message->getData();
			echo json_encode($data);
			break;

		case 'follow':
			$data = $message->getFollowData();
			echo json_encode($data);
			break;

		case 'add':
			$new_message_id = $message->new_message( $_SESSION['user']['username'] ,$_POST['content']);
			echo "<meta http-equiv=REFRESH CONTENT=0;url=\"index.php\">";
			break;

		case 'value':
			$message->setValue( $_GET['mid'], $_GET['opinion'] );
			break;
			
		case 'reply':
			$message->reply_message( $_GET['mid'], $_SESSION['user']['username'], $_GET['content']);
			break;

		default :
			require 'view/error.php';
	}
} else {
	require 'view/error.php';
}
