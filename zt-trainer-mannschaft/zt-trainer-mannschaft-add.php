<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        INSERT INTO tbl_trainer_mannschaft (Von, Bis, FK_Mannschaft, FK_Trainer)
        VALUES (:von, :bis, :fk_mann, :fk_trainer)
    ");
    $stmt->bindParam(':von', $_POST["Von"]);
    $stmt->bindParam(':bis', $_POST["Bis"]);
    $stmt->bindParam(':fk_mann', $_POST["FK_Mannschaft"]);
    $stmt->bindParam(':fk_trainer', $_POST["FK_Trainer"]);

    $stmt->execute();  

    header('Location: ../zt-trainer-mannschaft.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>