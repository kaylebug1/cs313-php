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
   <title>Update</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
<?php include "nav.php" ;?>
<script>
   
    //document.getElementById("myCheck").checked = true;

</script>
<div>
</div>
 <?php

   


    $location = $_GET["location"];
      $query ="SELECT time, day, location FROM dance WHERE dance.location= :location";
         $statement = $db->prepare($query);
         $statement->bindValue(":location", $location);
         $statement->execute();
         $row= $statement->fetch();
      $time = $row['time'];
      $date = $row['day'];




   {?>

   <form id="form" method="get" action="saveDance.php">
       <!--dance information  -->
            <div class="title">Event time <br> </div>
            <input type="time" name="time" value="<?=$time?>"><br>
            <div class="title">Event day <br> </div>
            <input type="date" name="date" value="<?=$date?>"><br>
            <div class="title">Location <br> </div>
            <input type="text" name="newLocation" value="<?=$location?>"><br>
            <input class="hidden" type="text" name="location" value="<?=$location?>">
      <input type="submit"  value="Save">
   </form>
   <?php } ?>
</body>
</html>
