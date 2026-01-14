<?php 
include '../../database/mssql.php'; 

$sql = "DELETE FROM  [dbo].[tbl_spiel]
        WHERE PK_Spiel = :PK_Spiel";
        
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':PK_Spiel', $_POST['delete']);
$stmt->execute();
    header('Location: ../../spiele.php');
?>