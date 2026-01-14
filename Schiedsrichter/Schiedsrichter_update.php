<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare("
        UPDATE tbl_Schiedsrichter
        SET Vorname = :Vorname, Nachname = :Nachname ,Lizenzschein = :Lizenzschein
        WHERE PK_Schiedsrichter = :PK_Schiedsrichter;
    ");
    $stmt->bindParam(':Vorname', $_POST['Vorname']);
    $stmt->bindParam(':Nachname', $_POST['Nachname']);
    $stmt->bindParam(':Lizenzschein', $_POST['Lizenzschein']);
    $stmt->bindParam(':PK_Schiedsrichter', $_POST['PK_Schiedsrichter']);



    $stmt->execute();  

    header('Location: ../Schiedsrichter.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>