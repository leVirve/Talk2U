<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php
	require 'config.php';
	$model = array('member');
	$model_m = array('explore', 'post');
	$model_p = array('article');
	if ( isset($_GET['model']) and in_array( $_GET['model'] , $model) ) {
		require 'controller/' . $_GET['model'] . '.php';
	} elseif ( isset($_GET['model']) and in_array( $_GET['model'] , $model_m) ) {
		require 'view/' . $_GET['model'] . '.php';
	} elseif( isset($_GET['model']) and in_array( $_GET['model'], $model_p) ) {
		require 'controller/' . $_GET['model'] . '.php';
	} elseif( isset($_GET['user']) ) {
		require 'view/user.php';
	} elseif( isset($_SESSION['user']) ) {
		require 'view/start.php';
	} else {
		require 'view/guest.php';
	}
?>