<?php
session_start();
if(isset($_SESSION['user']))
   {
   	header("Location: home.php");
   	die();
   }


?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
	<?php include "nav.php" ;?>
	<form method="post" action="authenticate.php">
		Sign In <br>
		User Name<input type="text" name="username">
		<br>
		Password<input type="password" name="password">
		<br>
		<input type="submit" value="Sign In">
	</form>
</body>
</html>