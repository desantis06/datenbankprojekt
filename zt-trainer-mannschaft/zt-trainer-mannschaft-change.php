<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare("
        UPDATE tbl_trainer_mannschaft 
        SET Von = :von, Bis = :bis, FK_Mannschaft = :fk_mannschaft, FK_Trainer = :fk_trainer
        WHERE PK_Trainer_Mannschaft = :pk
    ");
    $stmt->bindParam(':von', $_POST["Von"]);
    $stmt->bindParam(':bis', $_POST["Bis"]);
    $stmt->bindParam(':fk_mannschaft', $_POST["FK_Mannschaft"]);
    $stmt->bindParam(':fk_trainer', $_POST["FK_Trainer"]);
    $stmt->bindParam(':pk', $_POST["PK_Trainer_Mannschaft"]);

    $stmt->execute();  

    header('Location: ../zt-trainer-mannschaft.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>