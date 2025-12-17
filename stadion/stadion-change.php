<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 

try {
    $stmt = $pdo->prepare("
        UPDATE tbl_stadion 
        SET Name = :Name, Adresse = :Adresse, PLZ = :PLZ, Ort = :Ort, Kapazitaet = :Kapazitaet, FK_Verein = :FK_Verein
        WHERE PK_Stadion = :pk
    ");
    $stmt->bindParam(':Name', $_POST["Name"]);
    $stmt->bindParam(':Adresse', $_POST["Adresse"]);
    $stmt->bindParam(':PLZ', $_POST["PLZ"]);
    $stmt->bindParam(':Ort', $_POST["Ort"]);
    $stmt->bindParam(':Kapazitaet', $_POST["Kapazitaet"]);
    $stmt->bindParam(':FK_Verein', $_POST["FK_Verein"]);
    $stmt->bindParam(':pk', $_POST["PK_Stadion"]);


    
    $stmt->execute();  

    
   header('Location: ../stadion.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>