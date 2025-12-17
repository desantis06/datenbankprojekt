<?php include 'navigator.php' ?>
<?php include 'database/mssql.php'?>

<?php //jonas trian mann
try {
    $stmt = $pdo->prepare(
        "SELECT *
         FROM tbl_trainer_mannschaft
         JOIN tbl_trainer ON tbl_trainer_mannschaft.FK_Trainer=tbl_trainer.PK_Trainer
         JOIN tbl_mannschaft ON tbl_trainer_mannschaft.FK_Mannschaft=tbl_mannschaft.PK_Mannschaft"
    );

    $stmt->execute();

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

<table cellpadding="5">
    <tr>
        <th>PK_Trainer_Mannschaft</th>
        <th>Von</th>
        <th>Bis</th>
        <th>FK_Mannschaft</th>
        <th>FK_Trainer</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Lizenzschein</th>
        <th>Name-Mannschaft</th>
        <th>Ändern</th>
        <th>Löschen</th>
    </tr>

    <?php while ($daten = $stmt->fetch()){ ?>    
    <tr>
        <form action="./zt-trainer-mannschaft/zt-trainer-mannschaft-change.php" method="post">
            <td><?= $daten['PK_Trainer_Mannschaft'] ?></td>
            <td><input type="text" name="Von" value="<?= htmlspecialchars($daten['Von']) ?>"></td>
            <td><input type="text" name="Bis" value="<?= htmlspecialchars($daten['Bis']) ?>"></td>
            <td><input type="text" name="FK_Mannschaft" value="<?= htmlspecialchars($daten['FK_Mannschaft']) ?>"></td>
            <td><input type="text" name="FK_Trainer" value="<?= htmlspecialchars($daten['FK_Trainer']) ?>"></td>
            <td><input type="text" name="Vorname" value="<?php echo $daten['Vorname'] ?>"></td>
            <td><input type="text" name="Nachname" value="<?php echo $daten['Nachname'] ?>"></td>
            <td><input type="text" name="Lizenzschein" value="<?php echo $daten['Lizenzschein'] ?>"></td>
            <td><input type="text" name="Name-Mannschaft" value="<?php echo $daten['Name'] ?>"></td>
            <td><button type="submit" name="PK_Trainer_Mannschaft" value="<?= $daten['PK_Trainer_Mannschaft'] ?>">Ändern</button></td>
        </form>
        <form action="./zt-trainer-mannschaft/zt-trainer-mannschaft-delete.php" method="post">
            <td><button type="submit" name="PK_Trainer_Mannschaft" value="<?= $daten['PK_Trainer_Mannschaft'] ?>">Löschen</button></td>
        </form>
        
    </tr>
    <?php } ?>

    <form action="./zt-trainer-mannschaft/zt-trainer-mannschaft-add.php" method="post">
        <td>auto increment</td>
        <td><input type="text" name="Von"></td>
        <td><input type="text" name="Bis"></td>
        <td><input type="text" name="FK_Mannschaft"></td>
        <td><input type="text" name="FK_Trainer"></td>
        <td><button type="submit" name="add">Hinzufügen</button></td>
    </form>
</table>