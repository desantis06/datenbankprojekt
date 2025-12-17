<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare("
        INSERT INTO tbl_liga_mannschaft ([FK_Liga],[FK_Mannschaft],[Von],[Bis]
        )
        VALUES (:FK_Liga, :FK_Mannschaft, :Von, :Bis)
    ");

    $stmt->bindParam(':FK_Liga', $_POST['FK_Liga']);
    $stmt->bindParam(':FK_Mannschaft', $_POST['FK_Mannschaft']);
    $stmt->bindParam(':Von', $_POST['Von']);
    $stmt->bindParam(':Bis', $_POST['Bis']);

    $stmt->execute();

    header('Location: ../zt-liga-mannschaft.php');

    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
