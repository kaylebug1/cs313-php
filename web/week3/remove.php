<?php
session_start();
foreach ($_GET as $key => $value)
{
	if(isset($_GET[$key]))
		unset($_SESSION[$key]);
}
header("Location:viewCart.php");


?>