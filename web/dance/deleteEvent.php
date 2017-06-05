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

    $host = $_GET["event"];
      $query ="DELETE FROM event WHERE event.title = :title";
         $statement = $db->prepare($query);
         $statement->bindValue(':title', $host);
         $statement->execute(); 
   header("Location:home.php")

?>

