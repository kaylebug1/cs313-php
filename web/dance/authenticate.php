<?php
   session_start();

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


   $username = $_POST['username'];
   $password = $_POST['password'];




   $statment= $db->prepare("SELECT id, name, username, password FROM dancer WHERE username = :username");
   $statment->bindParam(":username", $username);
   $statment->execute();
   $row = $statment->fetch(PDO::FETCH_ASSOC);

   

   if(password_verify($password, $row['password']))
   {
      $_SESSION['user']= $row['username'];
      $_SESSION['name']= $row['name'];
      $_SESSION['id'] = $row['id'];
      header("Location: home.php");
      die();

   }
   else{
      header("Location: signIn.php");
      die();
   }


      ?>