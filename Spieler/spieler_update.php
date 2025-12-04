<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        UPDATE tbl_spieler
        SET Vorname = :vname, Nachname = :nname ,Trikotnummer = :nummer, Position = :posi
        WHERE PK_Spieler = :pk
    ");
    $stmt->bindParam(':vname', $_POST["vname"]);
    $stmt->bindParam(':nname', $_POST["nname"]);
    $stmt->bindParam(':nummer', $_POST["nummer"]);
    $stmt->bindParam(':posi', $_POST["posi"]);
    $stmt->bindParam(':pk', $_POST["PK_Spieler"]);

    $stmt->execute();  

    header('Location: ../spieler.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>