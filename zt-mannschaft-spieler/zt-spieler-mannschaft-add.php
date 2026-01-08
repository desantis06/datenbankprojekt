<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        INSERT INTO tbl_spieler_mannschaft (Von, Bis, FK_Spieler, FK_Mannschaft)
        VALUES (:Von, :Bis, :FK_Spieler, :FK_Mannschaft)
    ");
    $stmt->bindParam(':Von', $_POST["Von"]);
    $stmt->bindParam(':Bis', $_POST["Bis"]);
    $stmt->bindParam(':FK_Spieler', $_POST["FK_Spieler"]);
    $stmt->bindParam(':FK_Mannschaft', $_POST["FK_Mannschaft"]);

    $stmt->execute();  

    header('Location: ../zt-mannschaft-spieler.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>