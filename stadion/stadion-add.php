<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

try {
    $stmt = $pdo->prepare("
        INSERT INTO tbl_stadion ( [Name], [Adresse],[PLZ], [Ort], [Kapazitaet], [FK_Verein])
        VALUES (:Name, :Adresse, :PLZ, :Ort, :Kapazitaet, :FK_Verein)
    ");
    $stmt->bindParam(':Name', $_POST["Name"]);
    $stmt->bindParam(':Adresse', $_POST["Adresse"]);
    $stmt->bindParam(':PLZ', $_POST["PLZ"]);
    $stmt->bindParam(':Ort', $_POST["Ort"]);
    $stmt->bindParam(':Kapazitaet', $_POST["Kapazitaet"]);
    $stmt->bindParam(':FK_Verein', $_POST["FK_Verein"]);

    $stmt->execute();  

    header('Location: ../stadion.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>