<?php 
	session_start();

	$db_servername = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = "blog";
	$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

	if (isset($_POST['register_user']))
	{
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
	

		$query = "INSERT INTO user (username, fullname, email, password)
					 VALUES ($username, $fullname, $email, $password)";

		mysqli_query($conn, $query);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are logged in to your blog";
		header("Location: index.php?signUp=success");

	}

  	if (isset($_POST['login_user'])) 
  	{
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$final = mysqli_query($conn, $query);

    	if(mysqli_num_rows($result)==1)
		{
			$query = "INSERT INTO user (username, fullname, email, password)
					 VALUES ($username, $fullname, $email, $password)";

			mysqli_query($conn, $query);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are logged into your blog";
			header("Location: login.php");
		}
		else
		{
			echo ("You entered wrong Username or Password!");
		}
	}

/*	$isPost = $_SERVER['REQUEST_METHOD'] == 'POST';
	$action = isset($_REQUEST['action'])?$_REQUEST['action']:'';

	function redirect($path)
	{
		header('Location: ' . $path, true, 301);
		exit();
	}*/

	
?>