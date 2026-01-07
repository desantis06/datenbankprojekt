<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        DELETE FROM tbl_spieler_mannschaft
        WHERE PK_Spieler_Mannschaft = :delete
    ");
    $stmt->bindParam(':delete', $_POST["delete"]);

    $stmt->execute();  

    header('Location: ../zt-mannschaft-spieler.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>