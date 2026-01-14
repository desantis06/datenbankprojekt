<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare("
        INSERT INTO tbl_spieler ([Vorname], [Nachname],[Trikotnummer],[Position])
        VALUES (:vname, :nname,:nummer,:posi)
    ");
    $stmt->bindParam(':vname', $_POST["vname"]);
    $stmt->bindParam(':nname', $_POST["nname"]);
    $stmt->bindParam(':nummer', $_POST["nummer"]);
    $stmt->bindParam(':posi', $_POST["posi"]);

    $stmt->execute();  

    header('Location: ../spieler.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>