<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare("
        INSERT INTO tbl_trainer ([Vorname], [Nachname], [Lizenzschein])
        VALUES (:vorname, :nachname, :lizenz)
    ");
    $stmt->bindParam(':vorname', $_POST["Vorname"]);
    $stmt->bindParam(':nachname', $_POST["Nachname"]);
    $stmt->bindParam(':lizenz', $_POST["Lizenzschein"]);

    $stmt->execute();  

    header('Location: ../trainer.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>