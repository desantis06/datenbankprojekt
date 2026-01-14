<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare("
        DELETE FROM tbl_verein
        WHERE PK_Verein = :pk
    ");
    $stmt->bindParam(':pk', $_POST["PK_Verein"]);

    $stmt->execute();  

    header('Location: ../vereine.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>