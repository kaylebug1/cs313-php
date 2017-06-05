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

$person = $_SESSION['host_name'];
$facebook = $_SESSION['facebook'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Create an event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="home.css">
     <!-- <script src="home.js" type="text/javascript"></script> -->

</head>
<body>
    <?php include "nav.php" ;?>
    <?php { ?>
    <div id="create">
        <div id = "error"></div>
        <form id="form" method="get" action="addEvent.php">
            <div class=title>Event title </div>
            <input type="text" name="title"> <br><br>


            <!--Host information  -->
            <div id="hostSection">
            <div class="title"> Host of Event</div>

            <input type="text" name="host" value="<?=
            $person?>"><br>
            <div class="title">Optional contact information for host:<br>
            Facebook page <br></div>
            <input type="text" name="facebook" value="<?=
            $facebook?>"><br>
            <div class="title">Email <br></div>
            <input type="email" name="email" value="<?=
            $email?>"><br>
            <div class="title">Phone Number<br></div>
            <input type="tel" name="phone" value="<?=
            $phone?>">
            </div>
            <!-- <input type="button" onclick='' value="Add another host" name=""> -->
            <br>
            <br>
            


            <!--dance information  -->
            <div class="title">Event time <br> </div>
            <input type="time" name="time"><br>
            <div class="title">Event day <br> </div>
            <input type="date" name="date"><br>
            <div class="title">Location <br> </div>
            <input type="text" name="location"><br>


            <br><div class="title">
            Type of dance <br></div>
            <?php
            }
            $statement = $db->prepare("SELECT dance_type,id FROM dance_selection");

            $statement->execute();
            // Go through each result
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                // The variable "row" now holds the complete record for that
                // row, and we can access the different values based on their
                // name
                $id =  $row['id'];
                $name = $row['dance_type'];
                echo "<input type='checkbox' name='types[]'' id='types$id' value='$id'>";
                echo "<label for='types$id'>$name</label><br/>";  
            }
            ?>
            <input type="checkbox" name="new" id='newType'>
            <input type="text" name="typeText">

            <!-- <input type="checkbox" id="type"><br> -->
            <br>
            <input type="submit" >
        </form>
    </div>


</body>
</html>

