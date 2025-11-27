<?php 
$serverName = "(localdb)\MSSQLLocalDB";
$database = "Projekt";
$username = "admin";
$password = "admin";
 try{

     $pdo = new PDO("sqlsrv:Server=$serverName;Database=$database", $username, $password);^
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 }
//aaaaaa
?>
