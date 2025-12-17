<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        UPDATE tbl_spieler
        SET Vorname = :vname, Nachname = :nname ,Lizensenschein = :schein, 
        WHERE PK_Schiedsrichter = :pk
    ");
    $stmt->bindParam(':vname', $_POST["vname"]);
    $stmt->bindParam(':nname', $_POST["nname"]);
    $stmt->bindParam(':schein', $_POST["schein"]);
    $stmt->bindParam(':pk', $_POST["PK_Schiedsrichter"]);


    
    $stmt->execute();  

    header('Location: ../Schiedsrichter.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>