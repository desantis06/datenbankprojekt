<?php include 'navigator.php' ?>
<?php include 'database/mssql.php'?>

<?php
try {
    $stmt = $pdo->prepare(
        "SELECT PK_Trainer, Vorname, Nachname, Lizenzschein
         FROM tbl_trainer"
    );

    $stmt->execute();

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

<table cellpadding="5">
    <tr>
        <th>PK_Trainer</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Lizenzschein</th>
        <th>Ändern</th>
        <th>Löschen</th>
    </tr>

    <?php while ($daten = $stmt->fetch()){ ?>    
    <tr>
        <form action="./trainer/trainer-change.php" method="post">
            <td><?= $daten['PK_Trainer'] ?></td>
            <td><input type="text" name="trainerName" value="<?= htmlspecialchars($daten['Vorname']) ?>"></td>
            <td><input type="text" name="trainerNachname" value="<?= htmlspecialchars($daten['Nachname']) ?>"></td>
            <td><input type="text" name="trainerLizenzschein" value="<?= htmlspecialchars($daten['Lizenzschein']) ?>"></td>
            <td><button type="submit" name="PK_Trainer" value="<?= $daten['PK_Trainer'] ?>">Ändern</button></td>
        </form>
        <form action="./trainer/trainer-delete.php" method="post">
            <td><button type="submit" name="PK_Trainer" value="<?= $daten['PK_Trainer'] ?>">Löschen</button></td>
        </form>
        
    </tr>
    <?php } ?>

    <form action="./trainer/trainer-add.php" method="post">
        <td>auto increment</td>
        <td><input type="text" name="Vorname"></td>
        <td><input type="text" name="Nachname"></td>
        <td><input type="text" name="Lizenzschein"></td>
        <td><button type="submit" name="add">Hinzufügen</button></td>
    </form>
</table>