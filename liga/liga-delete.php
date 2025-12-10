<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

try {
    $stmt = $pdo->prepare("
        DELETE FROM tbl_liga
        WHERE PK_Liga = :pk
    ");
    $stmt->bindParam(':pk', $_POST["PK_Liga"]);

    $stmt->execute();  
    header('Location: ../liga.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>