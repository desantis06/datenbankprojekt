<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare("
        UPDATE tbl_liga_mannschaft SET FK_Liga = :FK_Liga, FK_Mannschaft = :FK_Mannschaft, Von = :Von, Bis = :Bis WHERE PK_Liga_Mannschaft = :pk");

    $stmt->bindParam(':FK_Liga', $_POST['FK_Liga']);
    $stmt->bindParam(':FK_Mannschaft', $_POST['FK_Mannschaft']);
    $stmt->bindParam(':Von', $_POST['Von']);
    $stmt->bindParam(':Bis', $_POST['Bis']);
    $stmt->bindParam(':pk', $_POST['PK_Liga_Mannschaft']);

    $stmt->execute();

    header('Location: ../zt-liga-mannschaft.php');


} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
