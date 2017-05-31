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





$titleNew = $_GET['titleNew'];
$title = $_GET['title'];
$query ="Update event SET title=:titleNew WHERE event.title= :title";  
         $statement = $db->prepare($query);
         $statement->bindValue(':title', $title);
         $statement->bindValue(':titleNew', $titleNew);
         $statement->execute();

header("Location: events.php");
die();

?>