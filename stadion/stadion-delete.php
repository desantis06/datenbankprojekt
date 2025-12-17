<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

try {
    $stmt = $pdo->prepare("
        DELETE FROM tbl_stadion
        WHERE PK_Stadion = :pk
    ");
    $stmt->bindParam(':pk', $_POST["PK_Stadion"]);

    $stmt->execute();  

    header('Location: ../stadion.php');
             
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>