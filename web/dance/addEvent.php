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



$person = $_GET['host'];
$facebook = $_GET['facebook'];
$email = $_GET['email'];
$phone = $_GET['phone'];

echo "host: $person\n";
echo "fb: $facebook\n";
echo "email: $email\n";
echo "phone: $phone\n";

try{
   $query = 'INSERT INTO host(name, facebook, email, phone) VALUES (:name, :facebook, :email, :phone)';

   $statement = $db->prepare($query);

   $statement->bindValue(':name',$person);
   $statement->bindValue(':facebook',$facebook);
   $statement->bindValue(':email',$email);
   $statement->bindValue(':phone',$phone);

   echo("$query");
   $statement->execute();
}
catch (Exception $ex)
{
   echo "Error with DB on host. Details: $ex";
   die();
}




$day = $_GET['date'];
$time = $_GET['time'];
$location = $_GET['location'];

echo "day: $day\n";
echo "time: $time\n";
echo "loca: $location\n";

try{
   $query = 'INSERT INTO dance(day, location, time) VALUES (:day, :location, :time)';

   $statement = $db->prepare($query);

   $statement->bindValue(':day',$day);
   $statement->bindValue(':location',$location);
   $statement->bindValue(':time',$time);

   echo("$query");
   $statement->execute();
}
catch (Exception $ex)
{
   echo "Error with DB on host. Details: $ex";
   die();
}

$danceTypes = $_GET['types'];
$title = $_GET['title'];
$hostId = $db->lastInsertId("host_id_seq");
$danceId = $db->lastInsertId("dance_id_seq");

echo "types: $danceTypes ";
echo "title: $title ";
echo "hostId : $hostId";
echo "danceId: $danceId";



foreach ($danceTypes as $type) {
   echo "type: $type ";
   $query= 'INSERT INTO event(host, dance, dance_selection, title) VALUES(:hostId, :danceId, :type, :title)';
   $statement = $db->prepare($query);
   $statement->bindValue(':hostId', $hostId);
   $statement->bindValue(':danceId', $danceId);
   $statement->bindValue(':type', $type);
   $statement->bindValue(':title', $title);
   echo("$query");
   $statement->execute();
}


?>