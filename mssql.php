<?php 
$serverName = "(localdb)\MSSQLLocalDB";
$database = "Projekt";
$username = "admin";
$password = "admin";
 
$pdo = new PDO("sqlsrv:Server=$serverName;Database=$database", $username, $password);
//aaaaaa
?>
