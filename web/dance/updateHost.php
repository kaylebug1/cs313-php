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

   


    $host = $_GET["host"];
      $query ="SELECT name, email, phone, facebook FROM host WHERE host.name= :name";
         $statement = $db->prepare($query);
         $statement->bindValue(':name', $host);
         $statement->execute();
         $row= $statement->fetch();

      $facebook = $row['facebook'];
      $email = $row['email'];
      $phone =$row['phone'];




   {?>
   <p>fb: <?=$facebook?> </p>

   <form id="form" method="get" action="saveHost.php">
      <h1 style="color: red">Under construction!!!</h1>
       <!--Host information  -->
            <div id="hostSection">
            <div class="title"> Host of Event</div>
            <input type="text" name="hostNew" value="<?=$host?>" ><br>
            <input type="hidden" name="host" value="<?=$host?>">
            <div class="title">Optional contact information for host:<br>
            Facebook page <br></div>
            <input type="text" name="facebookNew" value="<?=$facebook?>"><br>
            <input type="hidden" name="facebook" value="<?=$facebook?>">
            <div class="title" >Email <br></div>
            <input type="email" name="emailNew" value="<?=$email?>"><br>
            <input type="hidden" name="email" value="<?=$email?>">

            <div class="title">Phone Number<br></div>
            <input type="tel" name="phoneNew" value="<?=$phone?>" >
            <input type="hidden" name="phone" value="<?=$phone?>">

            </div>
            <!-- <input type="button" onclick='' value="Add another host" name=""> -->
            <br>
      <input type="submit"  value="Save">
   </form>
   <?php } ?>
</body>
</html>
