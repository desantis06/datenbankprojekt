<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        DELETE FROM tbl_spieler
        WHERE PK_Spieler = :pk
    ");
    $stmt->bindParam(':pk', $_POST["PK_Spieler"]);

    $stmt->execute();  

    header('Location: ../spieler.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>