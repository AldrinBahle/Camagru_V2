<!DOCTYPE html>
<html>
<head>
	<title>login Form</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<h1>Update Profile</h1>
		<form method="post" action="../back/profile.php" style="text-align: center;">
    <div class="input-group">
      <label>Email</label>
      <input class="reg-form" type="email" required="" name="email" placeholder="Type your email here... (eg; example@email.com)" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
      <br><p style="color:red"><?php if (isset($_SESSION['err']['email'])) {echo $_SESSION['err']['email']; echo $_SESSION['err']['email'] ='';}?></p><br>
      <br><p style="color:red"><?php if (isset($_SESSION['err']['exists'])) {echo $_SESSION['err']['exists']; echo $_SESSION['err']['exists'] = '';}?></p><br>
    </div>
    <div class="input-group">
      <label>Password</label>
      <input class="reg-form" type="password" required="" name="pswd" placeholder="Enter password">
      <br><p style="color:red"><?php if (isset($_SESSION['err']['pswd'])) {echo $_SESSION['err']['pswd']; $_SESSION['err']['pswd'] = '';}?></p><br>
    </div>
    <div class="input-group">
      <label>Re-enter Password</label>
      <input class="reg-form" type="password" required="" name="re-pswd" placeholder="Enter password" >
      <br><p style="color:red"><?php if (isset($_SESSION['err']['re-pswd'])) {echo $_SESSION['err']['re-pswd'];  $_SESSION['err']['re-pswd'] = '';}?></p><br>
    </div>
			<p style="color:red"><?php session_start(); if(isset($_SESSION['err']['sign_in'])) {echo $_SESSION['err']['sign_in']; $_SESSION['err']['sign_in'] = '';}?></p>
		<div class="input-group">
			<br><button type="submit" class="btn" name="update_user" value="ok">Update</button><br>
		</div>
		<div>
      <br><a href="welcome.php" class="btn">back</a><br>
  	</div>
		</form>
</body>
</html>