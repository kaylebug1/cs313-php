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
	<title>Sign up</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
	<?php include "nav.php" ;?>
	<form method="post" action="createAccount.php">
		Create an account <br>
		Username <input type="text" name="username">
		<br>
		Password <input type="password" name="password">
		<br>
		Name <input type="text" name="name">
		<br>
		<input type="submit" value="Create">
	</form>
</body>
</html>

