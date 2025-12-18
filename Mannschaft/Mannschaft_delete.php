<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        DELETE FROM tbl_Mannschaft
        WHERE PK_Mannschaft = :pk
    ");
    $stmt->bindParam(':pk', $_POST["PK_Mannschaft"]);


    
    $stmt->execute();  

    header('Location: ../Mannschaft.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>