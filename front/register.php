<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <h1>Register</h1>
    <div class="form">
    <form method="post" action="../back/register.php" style="text-align: center;">
    <div class="input-group">
      <label>Username</label>
      <input class="reg-form" type="text" required="" name="username" placeholder="Enter username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" >
      <br><p style="color:red"><?php session_start(); if (isset($_SESSION['err']['username'])) {echo $_SESSION['err']['username']; echo $_SESSION['err']['username'] = '';}?></p><br>
    </div>
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
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
      <p>By creating an account you agree to our <a href="#" style="color:blue">Terms & Conditions</a>.</p>
    <div>
      <a href="../index.php" class="btn">back</a>
    </div>
    </form>
    </div>
</body>
</html>