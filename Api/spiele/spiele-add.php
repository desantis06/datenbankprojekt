<?php 
include '../../database/mssql.php'; 
$sql ="INSERT INTO [dbo].[tbl_spiel]
           ([Ergebnis]
           ,[Anpfiff]
           ,[FK_Schiedsrichter]
           ,[FK_Stadion]
           ,[FK_Mannschaft_Heim]
           ,[FK_Mannschaft_Auswaerts])
           VALUES(:Ergebnis,:Anpfiff,:FK_Schiedsrichter,:FK_Stadion,:FK_Mannschaft_Heim,:FK_Mannschaft_Auswaerts)
           
           
           ";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':Ergebnis', $_POST['Ergebnis']);
$stmt->bindParam(':Anpfiff', $_POST['Anpfiff']);
$stmt->bindParam(':FK_Schiedsrichter', $_POST['FK_Schiedsrichter']);
$stmt->bindParam(':FK_Stadion', $_POST['FK_Stadion']);
$stmt->bindParam(':FK_Mannschaft_Heim', $_POST['FK_Mannschaft_Heim']);
$stmt->bindParam(':FK_Mannschaft_Auswaerts', $_POST['FK_Mannschaft_Auswaerts']);
$stmt->execute();
    header('Location: ../../spiele.php');
?>