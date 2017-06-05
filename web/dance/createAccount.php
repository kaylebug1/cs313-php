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

   $name = $_POST['name'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $passwordHash= password_hash($password, PASSWORD_DEFAULT);

   $statment= $db->prepare('INSERT INTO dancer (name, username, password) VALUES (:name, :user, :pass)');

   $statment->bindParam(':name', $name);
   $statment->bindParam(':user', $username);
   $statment->bindParam(':pass', $passwordHash);
   $statment->execute();

   header("Location: signIn.php");
   die();
   ?>