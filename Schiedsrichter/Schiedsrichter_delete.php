<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        DELETE FROM tbl_Schiedsrichter
        WHERE PK_Schiedsrichter = :pk
    ");
    $stmt->bindParam(':pk', $_POST["PK_Schiedsrichter"]);


    
    $stmt->execute();  

    header('Location: ../Schiedsrichter.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>