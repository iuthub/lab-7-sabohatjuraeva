<?php  
	include('header.php');

	$username = '';
	$pwd = '';
	$confirmPwd = '';
	$name = '';
	$email = '';

	$usernamePattern='/^\w{4,}$/i';
	$pwdPattern='/^\w{4,}$/i';
	$namePattern='/^[a-z]+( [a-z]+)*$/i';
	$emailPattern='/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i';

	$isValid = TRUE;
	$isOk = TRUE;

	if($isPost) {
		$username=$_REQUEST["username"];
		$pwd =$_REQUEST["pwd"];
		$confirmPwd =$_REQUEST["confirmPwd"];
		$name = $_REQUEST["name"];
		$email = $_REQUEST["email"];
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>My Blog - Registration Form</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<?php include('header.php'); ?>

		<h2>User Details Form</h2>
		<h4>Please, fill below fields correctly</h4>
		<form action="register.php" method="post">
  				<ul class="form">
					<li>
						<label for="username">Username</label>
						<input type="text" name="username" id="username" value="<?= $username ?>" required/>
						<?php if ($isPost && !preg_match($usernamePattern, $username)): $isValid=false; ?>
							<span class="error">Required field.</span>	
						<?php endif ?>						
					</li>
					<li>
						<label for="fullname">Full Name</label>
						<input type="text" name="fullname" id="fullname" value="<?= $name ?>" required/>
						<?php if ($isPost && !preg_match($namePattern, $name)): $isValid=false; ?>
							<span class="error">Required field.</span>	
						<?php endif ?>		
					</li>
					<li>
						<label for="email">Email</label>
						<input type="email" name="email" id="email" value="<?= $email ?>"/>
						<?php if ($isPost && !preg_match($emailPattern, $email)): $isValid=false; ?>
							<span class="error">Not a valid email.</span>	
						<?php endif ?>						
					</li>
					<li>
						<label for="pwd">Password</label>
						<input type="password" name="pwd" id="pwd" value="<?= $pwd ?>" required/>
						<?php if ($isPost && (!preg_match($pwdPattern, $pwd) || $pwd!=$confirmPwd)): $isValid=false; ?>
							<span class="error">Required field.</span>	
						<?php endif ?>						
					</li>
					<li>
						<label for="confirm_pwd">Confirm Password</label>
						<input type="password" name="confirm_pwd" id="confirm_pwd" required />
					</li>
			<?php  
				if($isPost && $isValid) {
					$user = new User();
					$user->loadParams($username, $pwd, $name, $email);
					$isOk= $usersRepo->addUser($user);
					if ($isOk) redirect('index.php');
				}
				if (!$isOk): ?>
				<span class="error">This user exists in database!</span>
			<?php endif ?>					
					<li>
						<input type="submit" value="Submit" /> &nbsp; Already registered? <a href="index.php">Login</a>
					</li>
				</ul>
		</form>
	</body>
</html>