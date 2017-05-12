<?php 
session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Cart</title>
 	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="home.css" rel="stylesheet">
 </head>
 <body>
<div class="jumbotron cane"><h1><a href='store.php'>Candy Cane Craze</a></h1></div>
<form action="confirm.php" method="get" id="numbers"></form>

 <ul class='list-group'>
 <?php 
 foreach ($_SESSION as $key => $value)
	{
    	echo " <li class='list-group-item'><div class='clearfix'> <img class='pull-left pic' src='pic/candy$key.jpg'>"; 
    	echo "</select> 
      <br>
      <label for='select'>How many you would like:</label><br>
      <select multiple form='numbers' name =$key style='width:100px; position:float; class='form-control' id='select'>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='2'>3</option>
        <optio value='2'>4</option>
        <option value='5'>5</option>
        <option value='10'>10</option>
        <option value='20'>20</option>
        <option value='100'>100</option>
      </select>
      <br>
      <form action='remove.php' method='get'>
      <button name=$key type='submit'>Remove</button>
      </form>
      </div>";

	}
	
 ?>
  </ul>
  <button type="submit" form="numbers">Check Out</button>
 
 </body>
 </html>
