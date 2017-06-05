<?php

   try {
      $db = getenv('DATABASE_URL');
      if(empty($db)){
         $db="postgres://postgres:5825@localhost:5432/dances";
      }

      $dbopts = parse_url($db);


      $host = $dbopts["host"];
      $port = $dbopts["port"];
      $user = $dbopts["user"];
      $pass = $dbopts["pass"];
      $name = ltrim($dbopts["path"],'/');
      
      $db = new PDO("pgsql:host=$host;port=$port;dbname=$name",$user,$pass);
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
         SELECT dance_type, day, location, title, host_name, time FROM event e
         JOIN dance_selection ds ON e.dance_selection = ds.id
         JOIN dance d ON e.dance = d.id
         JOIN host h ON e.host = h.id;");
      	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {?>
         <div class="bottomBorder">
         <p><?=$row['title']?> <br>Host: <?=$row['host_name']?><br>Date: <?=$row['day']?><br>Time: <?=$row['time']?><br>Type:  <?=$row['dance_type']?> <br></p><div class="hidden">
         <?= $title = $row['title']; $name= $row['name']; ?></div>
         
         </div>
   <?php } ?>
   </div>
</body>
</html>