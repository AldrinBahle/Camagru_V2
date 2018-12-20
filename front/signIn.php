<!DOCTYPE html>
<html>
<head>
	<title>login Form</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<h1>Sign In</h1>
		<form method="post" action="../back/signIn.php" style="text-align: center;">
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" placeholder="Enter username" required>
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="pswd" placeholder="Enter your password" required>
			</div>
			<p style="color:red"><?php session_start(); if(isset($_SESSION['err']['sign_in'])) {echo $_SESSION['err']['sign_in']; $_SESSION['err']['sign_in'] = '';}?></p>
			<div class="input-group">
				<button type="submit" class="btn" name="login_user" value="ok">Login</button>
			</div>
			<p>
				<a href="forgot.php" id="forgot">Forgot Password?</a>
			</p>
			<p>
				<button class="btn" id="button_new" onclick="location.href= 'register.php'">create your account</button>
			</p>
			<div>
      			<a href="../index.php" class="btn">back</a>
    		</div>
		</form>
</body>
</html>