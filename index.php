<?php
require_once './config/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
	
<body>
	<div class="content" style="height: 900px">
		<div class="topnav" id="myTopnav">
			<?php
				if (isset($_SESSION['username']) && isset($_SESSION['passwd']) && isset($_SESSION['email']))
				{	
					echo "<a href=\"./front/welcome.php\">Camagru</a> ";
					echo "<a href=\"./back/signOut.php\">Sign Out</a> ";
				}
				else
				{
					echo "<a href=\"./front/signIn.php\">Sign In</a> ";
					echo "<a href=\"./front/register.php\">Register</a> ";
					echo "<a href=\"./front/gallery.php\">Gallery</a> ";
			
				}
			?>
		</div>
		<h1> Camagru </h1>
	</div>
<?php
	require_once './back/page.php';
?>
<footer class = "footer">
	© Camagru done by agama 2018
</footer>
</body>
</html>
