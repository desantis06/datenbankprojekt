<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        UPDATE tbl_liga 
        SET Name =:liganame, Gruendungsjahr = :jahr
        WHERE PK_Liga = :pk
    ");
    $stmt->bindParam(':liganame', $_POST["liganame"]);
    $stmt->bindParam(':pk', $_POST["PK_Liga"]);

    $stmt->execute();  

    header('Location: ../vereine.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>