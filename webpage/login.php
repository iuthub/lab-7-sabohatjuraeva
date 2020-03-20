<?php
	$isFailedLogin = false; 
	if($isPost && $action=='login') {
		$username = $_REQUEST['username'];
		$pwd = $_REQUEST['pwd'];

		if ($usersRepo->checkUser($username, $pwd)) {
			$_SESSION['user'] = $usersRepo->getUser($username);
			$_SESSION['isAuth'] = TRUE;
			redirect('index.php');			
		} else {
			$isFailedLogin = true;
		}
	}
?>
		<!-- Show this part if user is not signed in yet -->
		<div class="twocols">
			<form action="index.php" method="post" class="twocols_col">
				<ul class="form">
			<?php if ($isFailedLogin): ?>
				<span class="error">Incorrect login or password.</span>
			<?php endif ?>					
					<li>
						<label for="username">Username</label>
						<input type="text" name="username" id="username" />
					</li>
					<li>
						<label for="pwd">Password</label>
						<input type="password" name="pwd" id="pwd" />
					</li>
					<li>
						<label for="remember">Remember Me</label>
						<input type="checkbox" name="remember" id="remember" checked />
					</li>
					<li>
						<input type="submit" value="Submit" /> &nbsp; Not registered? <a href="register.php">Register</a>
					</li>
				</ul>
			</form>