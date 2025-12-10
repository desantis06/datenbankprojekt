<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        INSERT INTO tbl_trainer (Von, Bis, FK_Mannschaft, FK_Trainer)
        VALUES (:von, :bis, :fk_mann, :fk_trainer)
    ");
    $stmt->bindParam(':von', $_POST["Von"]);
    $stmt->bindParam(':bis', $_POST["Bis"]);
    $stmt->bindParam(':fk_mann', $_POST["Lizenzschein"]);
    $stmt->bindParam(':fk_trainer', $_POST["Lizenzschein"]);

    $stmt->execute();  

    header('Location: ../zt-trainer-mannschaft.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>