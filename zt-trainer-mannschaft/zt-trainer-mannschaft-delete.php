<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php';?>

<?php
try {
    $stmt = $pdo->prepare("
        DELETE FROM tbl_trainer_mannschaft
        WHERE PK_Trainer_Mannschaft = :pk
    ");
    $stmt->bindParam(':pk', $_POST["PK_Trainer_Mannschaft"]);

    $stmt->execute();  

    header('Location: ../zt-trainer-mannschaft.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>