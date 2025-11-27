<?php 
$serverName = "(localdb)\MSSQLLocalDB";
$database = "Projekt";
$username = "admin";
$password = "admin";
 try{

     $pdo = new PDO("sqlsrv:Server=$serverName;Database=$database", $username, $password);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "test";

 }
  catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$pdo = null;
//aaaaaa
?>
