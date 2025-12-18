<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        INSERT INTO tbl_Mannschaft ([Name], [FK_Verein])
        VALUES (:name, :verein)
    ");
    $stmt->bindParam(':name', $_POST["name"]);
    $stmt->bindParam(':verein', $_POST["verein"]);
 
   


    
    $stmt->execute();  

    header('Location: ../Mannschaft.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>