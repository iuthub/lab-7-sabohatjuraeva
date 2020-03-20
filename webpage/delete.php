<?php 
	include('header.php');

	// guard on deleting
	if(!$_SESSION['isAuth']) redirect('index.php');

	if(isset($_GET['id'])) {
		$postsRepo->deletePost($_GET['id']);	
	}
	redirect('index.php');

?>