<?php include 'navigator.php'; ?>
<?php include 'database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare(
        "SELECT [PK_Stadion], [Name], [Adresse],[PLZ], [Ort], [Kapazitaet], [FK_Verein] 
         FROM tbl_stadion"
    );

    $stmt->execute();
    $stadion = $stmt->fetchAll();   

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

<table cellpadding="5">
    <tr>
        <th>PK_Stadion</th>
        <th>Name</th>
        <th>Adresse</th>
        <th>PLZ</th>
        <th>Ort</th>
        <th>Kapazität</th>
        <th>FK_Verein</th>       
        <th>Ändern</th>
        <th>Löschen</th>



    </tr>

    <?php foreach ($stadion as $row): ?>    
    <tr>
        <form action="./stadion/stadion-change.php" method="post">
            <td><?= $row['PK_Stadion'] ?></td>
            <td><input type="text" name="Name" value="<?=$row['Name']?>"></td>
            <td><input type="text" name="Adresse" value="<?=$row['Adresse']?>"></td>
            <td><input type="text" name="PLZ" value="<?=$row['PLZ']?>"></td>
            <td><input type="text" name="Ort" value="<?=$row['Ort']?>"></td>
            <td><input type="text" name="Kapazitaet" value="<?=$row['Kapazitaet']?>"></td>
            <td><input type="text" name="FK_Verein" value="<?=$row['FK_Verein']?>"></td>
            <td><button type="submit" name="PK_Stadion" value="<?= $row['PK_Stadion'] ?>">Ändern</button></td>
        </form>
        <form action="./stadion/stadion-delete.php" method="post">
            <td><button type="submit" name="PK_Stadion" value="<?= $row['PK_Stadion'] ?>">Löschen</button></td>
        </form>
        
    </tr>
    <?php endforeach; ?>

    <form action="./stadion/stadion-add.php" method="post">
        <td>auto increment</td>
        <td><input type="text" name="Name"></td>
        <td><input type="text" name="Adresse"></td>
        <td><input type="text" name="PLZ"></td>
        <td><input type="text" name="Ort"></td>
        <td><input type="text" name="Kapazitaet"></td>
        <td><input type="text" name="FK_Verein"></td>

        <td><button type="submit" name="add">Hinzufügen</button></td>
    </form>
</table>
