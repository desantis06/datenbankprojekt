<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

?>

<?php
try {
    $stmt = $pdo->prepare("
        INSERT INTO tbl_liga ([Name])
        VALUES (:NeuName)
    ");
    $stmt->bindParam(':NeuName', $_POST["NeuName"]);

    $stmt->execute();  

    header('Location: ../liga.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>