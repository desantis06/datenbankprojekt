<?php include '../navigator.php'; ?>
<?php include '../database/mssql.php'; 


print_r($_POST);


try {
    $stmt = $pdo->prepare("
        UPDATE tbl_liga 
        SET Name =:Name
        WHERE PK_Liga = :PK_Liga
    ");
    $stmt->bindParam(':Name', $_POST["Name"]);
    $stmt->bindParam(':PK_Liga', $_POST["PK_Liga"]);

    $stmt->execute();  

    header('Location: ../Liga.php');

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>