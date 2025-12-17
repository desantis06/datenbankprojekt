
<?php include 'navigator.php'; ?>
<?php include 'database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare(
        "SELECT [PK_Schiedsrichter], [Vorname], [Nachname],[Lizenzschein]
         FROM tbl_Schiedsrichter"
    );

    $stmt->execute();
    $schiedsrichter = $stmt->fetchAll();   

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

<table cellpadding="7">
    <tr>
        <th>PK_Schiedsrichter</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Lizenzschein</th>
    </tr>

    <?php foreach ($schiedsrichter as $row): ?>    
    <tr>
        <form action="./Schiedsrichter/Schiedsrichter_update.php" method="post">
            <td><?= $row['PK_Schiedsrichter'] ?></td>
            <td><input type="text" name="vname" value="<?= $row['Vorname'] ?>"></td>
            <td><input type="text" name="nname" value="<?= $row['Nachname'] ?>"></td>
            <td><input type="text" name="schein" value="<?= $row['Lizenzschein'] ?>"></td>
            <!-- <input type="hidden" name="PK_Verein" value="<?= $row['PK_Schiedsrichter'] ?>"> -->
            <td><button type="submit" name="PK_Schiedsrichter" value="<?= $row['PK_Schiedsrichter'] ?>">Ändern</button></td>
        </form>
        <form action="./Schiedsrichter/Schiedsrichter_delete.php" method="post">
            <td><button type="submit" name="PK_Schiedsrichter" value="<?= $row['PK_Schiedsrichter'] ?>">Löschen</button></td>
        </form>
        
    </tr>
    <?php endforeach; ?>

    <form action="./Schiedsrichter/Schiedsrichter_add.php" method="post">
        <td>auto increment</td>
        <td><input type="text" name="vname"></td>
        <td><input type="text" name="nname"></td>
        <td><input type="text" name="schein"></td>
        <td><button type="submit" name="add">Hinzufügen</button></td>
    </form>
</table>