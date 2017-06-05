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

   



$time = $_GET['time'];
$date = $_GET['date'];
$location =$_GET['location'];
$newLocation=$_GET['newLocation'];
$query ="Update dance SET time=:time, day=:date, location=:newLocation WHERE dance.location=:location";  
         $statement = $db->prepare($query);
         $statement->bindValue(':time', $time);
         $statement->bindValue(':date', $date);
         $statement->bindValue(':location', $location);
         $statement->bindValue(':newLocation', $newLocation);
         $statement->execute();

header("Location: home.php");

die();

?>