<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare("
        DELETE FROM tbl_trainer
        WHERE PK_Trainer = :pk
    ");
    $stmt->bindParam(':pk', $_POST["PK_Trainer"]);

    $stmt->execute();  

    header('Location: ../trainer.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>