<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; ?>


<?php
try {
    $stmt = $pdo->prepare("
        UPDATE tbl_Mannschaft
        SET Name = :name, FK_Verein = :verein 
        WHERE PK_Mannschaft = :pk
    ");
    $stmt->bindParam(':name', $_POST["name"]);
    $stmt->bindParam(':verein', $_POST["verein"]);
    $stmt->bindParam(':pk', $_POST["PK_Mannschaft"]);


    
    $stmt->execute();  

    header('Location: ../Mannschaft.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>