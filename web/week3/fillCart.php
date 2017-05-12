<?php
session_start();
// $candy1 = $_GET[0];
// echo "The session is $candy1";
foreach ($_GET as $key => $value)
{
    echo $key . ":". $value . "\n"; 
    $_SESSION[$key] += $value;
}
echo $_SESSION["stick"];
header("Location:store.php");

?>
