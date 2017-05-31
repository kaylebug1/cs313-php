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
   function saveTitle(){
      $titleNew = document.getElementById("title").value;
      
   }
    //document.getElementById("myCheck").checked = true;

</script>
<div>
</div>
 <?php

   


    $title = $_GET["title"];
      $query ="SELECT title FROM event WHERE title= :title";
         $statement = $db->prepare($query);
         $statement->bindValue(':title', $title);
         $statement->execute();
         $row= $statement->fetch();


   {?>

   <form id="form" method="get" action="saveTitle.php">
      <div class=title>Event title </div>
      <input type="text" id="titleNew" name="titleNew" value="<?=$title?>" > <br><br>
      <input type="hidden" name="title" value="<?=$title?>">
      <input type="submit"  value="Save">
   </form>
   <?php } ?>
</body>
</html>
