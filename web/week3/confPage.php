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

<h2></h2>
 <div class="container-fluid">
	<div class="row">
 <?php 
 foreach ($_SESSION as $key => $value)
	{
    	echo "<div class='col-md-3'><div class='clearfix'><img class='pull-left picSmall' src='pic/candy$key.jpg'>
    		<h3> Amount: $value</h3>
    		</div></div>"; 
    }
?>
	</div>
	<br>
	<form action="thanks.php">
        Your First Name:<br>
        <input type="text" name="firstName"><br/>
        Your Last Name:<br>
        <input type="text" name="lastName"><br/>
        <br/>
         What address should we send your candy to?<br/>
        <input type="text" placeholder="Street Address"><br/>
        <input type="text" placeholder="City"><br/>
        <input type="text" placeholder="State"><br/>
        <input type="text" placeholder="Zipcode"><br/>
        <br/>
        <input type="submit" value="Send Order" />
      </form>
   </div>
</div>
</body>
</html>