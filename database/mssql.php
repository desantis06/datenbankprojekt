<?php 
$serverName = "(localdb)\MSSQLLocalDB";
$database = "Projekt";

 try{

     $pdo = new PDO("sqlsrv:Server=$serverName;Database=$database");
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 }#
 
  catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$pdo = null;
//aaaaaa
?>
