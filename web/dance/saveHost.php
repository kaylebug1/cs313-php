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

   



$hostNew = $_GET['hostNew'];
$host = $_GET['host'];
$facebookNew =$_GET['facebookNew'];
$emailNew = $_GET['emailNew'];
$phoneNew =$_GET['phoneNew'];
$query ="Update host SET name=:hostNew, facebook=:fb, email=:email, phone=:phone WHERE host.name=:host";  
         $statement = $db->prepare($query);
         $statement->bindValue(':host', $host);
         $statement->bindValue(':hostNew', $hostNew);
         $statement->bindValue(':fb', $facebookNew);
         $statement->bindValue(':email', $emailNew);
         $statement->bindValue(':phone', $phoneNew);
         $statement->execute();

header("Location: events.php");

die();

?>