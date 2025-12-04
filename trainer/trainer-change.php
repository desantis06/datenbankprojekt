<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        UPDATE tbl_trainer 
        SET Name = :vereinName, Gruendungsjahr = :jahr
        WHERE PK_Verein = :pk
    ");
    $stmt->bindParam(':vorname', $_POST["Vorname"]);
    $stmt->bindParam(':nachname', $_POST["Nachname"]);
        $stmt->bindParam(':lizenz', $_POST["Lizenzschein"]);
    $stmt->bindParam(':pk', $_POST["PK_Verein"]);

    $stmt->execute();  

    header('Location: ../vereine.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>