<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare("
        INSERT INTO tbl_Schiedsrichter ([Vorname], [Nachname],[Lizenzschein])
        VALUES (:vname, :nname,:schein)
    ");
    $stmt->bindParam(':vname', $_POST["vname"]);
    $stmt->bindParam(':nname', $_POST["nname"]);
    $stmt->bindParam(':schein', $_POST["schein"]);
   



    $stmt->execute();  

    header('Location: ../Schiedsrichter.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>