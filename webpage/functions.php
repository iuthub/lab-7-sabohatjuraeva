<?php
	$isPost = $_SERVER['REQUEST_METHOD'] == 'POST';
	$action = isset($_REQUEST['action'])?$_REQUEST['action']:'';
	
	function redirect($path) {
		header('Location: ' . $path, true, 301);
		exit();
	}
?>