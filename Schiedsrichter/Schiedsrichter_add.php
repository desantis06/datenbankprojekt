<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

print_r($_POST);?>

<?php
try {
    $stmt = $pdo->prepare("
        INSERT INTO tbl_Schiedsrichter ([Vorname], [Nachname],[Lizensenschein])
        VALUES (:vname, :nname,:nummer,:posi)
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