<?php 
$serverName = "(localdb)\MSSQLLocalDB";
$database = "Projekt";
<<<<<<< HEAD
//aaa
 try{

     $pdo = new PDO("sqlsrv:Server=$serverName;Database=$database");
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
=======

 try{

     $pdo = new PDO("sqlsrv:Server=$serverName;Database=$database");
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
>>>>>>> 3dcf04ea488f3ccb777ddd8c23b078353684064f


 }#
 
  catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

?>
