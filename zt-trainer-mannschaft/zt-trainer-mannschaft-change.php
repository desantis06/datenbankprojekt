<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        UPDATE tbl_trainer 
        SET Vorname = :vorname, Nachname = :nachname, Lizenzschein = :lizenz
        WHERE PK_Trainer = :pk
    ");
    $stmt->bindParam(':vorname', $_POST["trainerName"]);
    $stmt->bindParam(':nachname', $_POST["trainerNachname"]);
    $stmt->bindParam(':lizenz', $_POST["trainerLizenzschein"]);
    $stmt->bindParam(':pk', $_POST["PK_Trainer"]);

    $stmt->execute();  

    header('Location: ../zt-trainer-mannschaft.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>