<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare("
        DELETE FROM tbl_liga_mannschaft
        WHERE PK_Liga_Mannschaft = :pk
    ");
    $stmt->bindParam(':pk', $_POST['PK_Liga_Mannschaft']);

    $stmt->execute();

    header('Location: ../zt-liga-mannschaft.php');

    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
