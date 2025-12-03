<?php 
$serverName = "10.20.20.9";
$database = "g2_6it23";
$password ="6251,PUzRt";
$username="g2_6it23";
 try{

$pdo = new PDO("sqlsrv:Server=$serverName;Database=$database",$username,$password);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 
  catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

?>
