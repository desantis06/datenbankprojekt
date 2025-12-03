<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        INSERT INTO tbl_verein ([Name], [Gruendungsjahr])
        VALUES (:vereinName, :jahr)
    ");
    $stmt->bindParam(':vereinName', $_POST["vereinName"]);
    $stmt->bindParam(':jahr', $_POST["gruendungsjahr"]);

    $stmt->execute();  

    header('Location: ../vereine.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>