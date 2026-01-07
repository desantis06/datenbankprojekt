
<?php include 'navigator.php'; ?>
<?php include 'database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare(
        "SELECT [PK_Mannschaft], [Name],[FK_Verein]
         FROM tbl_Mannschaft"
    );

    $stmt->execute();
    $Mannschaft = $stmt->fetchAll();   

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}




$pdo = null;
?>

<table cellpadding="7">
    <tr>
        <th>PK_Mannschaft</th>
        <th>Name</th>
        <th>FK_Verein</th>
        <th>Ändern</th>
        <th>Löschen</th>
     
    </tr>

    <?php foreach ($Mannschaft as $row): ?>    
    <tr>
        <form action="./Mannschaft/Mannschaft_update.php" method="post">
            <td><?= $row['PK_Mannschaft'] ?></td>
            <td><input type="text" name="name" value="<?= $row['Name'] ?>"></td>
            <td><input type="text" name="verein" value="<?= $row['FK_Verein'] ?>"></td>
            <!-- <input type="hidden" name="PK_Verein" value="<?= $row['PK_Mannschaft'] ?>"> -->
            <td><button type="submit" name="PK_Mannschaft" value="<?= $row['PK_Mannschaft'] ?>">Ändern</button></td>
        </form>
        <form action="./Mannschaft/Mannschaft_delete.php" method="post">
            <td><button type="submit" name="PK_Mannschaft" value="<?= $row['PK_Mannschaft'] ?>">Löschen</button></td>
        </form>
        
    </tr>
    <?php endforeach; ?>

    <form action="./Mannschaft/Mannschaft_add.php" method="post">
        <td>auto increment</td>
        <td><input type="text" name="name"></td>
        <td><input type="text" name="verein"></td>

        <td><button type="submit" name="add">Hinzufügen</button></td>
    </form>
</table>