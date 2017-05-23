<?php

   try {
      $db = getenv('DATABASE_URL');
      if(empty($db)){
      $user = "postgres";
      $pass = "5825";
      $db = new PDO("pgsql:host=127.0.0.1;dbname=dances",$user,$pass);
      }
   } catch (PDOException $ex) {
      echo "ERROR: ".$ex;
      die();
   }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Local events</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">
	 <!-- <script src="home.js" type="text/javascript"></script> -->

</head>
<body>
	<?php include "nav.php" ;?>
   <div id="main" >
	<?php
      $result = $db->query("
         SELECT dance_type, day, location, title, name FROM event e
         JOIN dance_selection ds ON e.dance_selection = ds.id
         JOIN dance d ON e.dance = d.id
         JOIN host h ON e.host = h.id;");
      	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {?>
         <p><?=$row['title']?> <br>Host: <?=$row['name']?><br>Date: <?=$row['day']?><br>Type:  <?=$row['dance_type']?><br></p>
      <?php } ?>
      </div>
</body>
</html>
