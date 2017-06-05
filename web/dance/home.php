<?php
   session_start();
   // if(is_null($_SESSION['user']))
   // {
   // 	header("Location: signIn.php");
   // 	die();
   // }

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

<!doctype html>
<html lang="en">
<head>
	 <meta charset="utf-8">
	 <title>Dance Connect</title>
	 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">
	 
</head>

<body>
<div class="title">
    <?php include "nav.php" ;?>
    Welcome, <?php echo ($_SESSION['name']);  
    $name = $_SESSION['name']; ?>
    
    <br>

    Your Events: <br>
    </div>

    <div id="main" >
	<?php
      $query = "
         SELECT dance_type, day, location, title, name, host_name, time FROM event e
         JOIN dance_selection ds ON e.dance_selection = ds.id
         JOIN dance d ON e.dance = d.id
         JOIN host h ON e.host = h.id
         JOIN dancer dr ON h.dancer = dr.id
         WHERE dr.name = :name;";
      	 $statement = $db->prepare($query);
      	 $statement->bindValue(':name',$name);
      	 $statement->execute();
      	 while ($row = $statement->fetch()) {?>
         <div class="bottomBorder">
         <p><?=$row['title']?> <br>Host: <?=$row['host_name']?><br>Date: <?=$row['day']?><br>Time: <?=$row['time']?><br>Location: <?=$row['location']?><br>Type:  <?=$row['dance_type']?> <br></p><div class="hidden">
         <?= $title = $row['title']; $hostName= $row['host_name']; $location=$row['location']; ?></div>
         <div id="update">
            <a  href="updateTitle.php?title=<?=$title?>">Update Title</a><br>
            <a href="updateHost.php?host=<?=$hostName?>">Update Host</a><br>
            <a href="updateDance.php?location=<?=$location?>">Update time and date</a><br>
            <a href="deleteEvent.php?event=<?=$title?>">Delete</a>
            </div>
         </div>
   <?php } ?>
   </div>
    
    
</body>
</html>