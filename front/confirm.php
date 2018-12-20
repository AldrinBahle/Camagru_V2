<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <h1>Confirm Registration</h1>
    <div class="form">
    <form method="post" action="../server/confirm.php" style="text-align: center;">

      <div class="input-group">
        <label>Username</label>
        <input type="text" required="" name="username" placeholder="enter username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" >
        <br><p style="color:red"><?php session_start(); if (isset($_SESSION['err']['c_username'])) {echo $_SESSION['err']['username']; $_SESSION['err']['username'] = '';}?></p><br>
      </div>
      <div class="input-group">
        <label>Confirmation code</label>
        <input type="text" required="" name="code" placeholder="Enter the code from your email" >
        <br><p style="color:red"><?php if (isset($_SESSION['err']['code'])) {echo $_SESSION['err']['code']; $_SESSION['err']['code'] = '';}?></p><br>
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
      </div>
    </form>
  </div>
</body>
</html>