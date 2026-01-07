<?php include 'navigator.php'; ?>
<?php include 'database/mssql.php'; ?>

<?php 
try {
    // Hauptabfrage
    $stmt = $pdo->prepare(
        "SELECT *
         FROM tbl_trainer_mannschaft
         JOIN tbl_trainer 
            ON tbl_trainer_mannschaft.FK_Trainer = tbl_trainer.PK_Trainer
         JOIN tbl_mannschaft 
            ON tbl_trainer_mannschaft.FK_Mannschaft = tbl_mannschaft.PK_Mannschaft"
    );
    $stmt->execute();

    // Trainerliste
    $stmtTrainer = $pdo->prepare("
        SELECT PK_Trainer, Nachname
        FROM tbl_trainer
    ");
    $stmtTrainer->execute();
    $trainerListe = $stmtTrainer->fetchAll(PDO::FETCH_ASSOC);

    // Mannschaftsliste
    $stmtMannschaft = $pdo->prepare("
        SELECT PK_Mannschaft, Name
        FROM tbl_mannschaft
    ");
    $stmtMannschaft->execute();
    $mannschaftListe = $stmtMannschaft->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<table cellpadding="5" border="1">
    <tr>
        <th>PK</th>
        <th>Von</th>
        <th>Bis</th>
        <th>Trainer</th>
        <th>Mannschaft</th>
        <th>Ändern</th>
        <th>Löschen</th>
    </tr>

    <?php while ($daten = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>    
    <tr>
        <!-- ÄNDERN -->
        <form action="./zt-trainer-mannschaft/zt-trainer-mannschaft-change.php" method="post">
            <td><?= $daten['PK_Trainer_Mannschaft'] ?></td>

            <td>
                <input type="text" name="Von" value="<?= htmlspecialchars($daten['Von']) ?>">
            </td>

            <td>
                <input type="text" name="Bis" value="<?= htmlspecialchars($daten['Bis']) ?>">
            </td>

            <td>
                <select name="FK_Trainer">
                    <?php foreach ($trainerListe as $trainer) { ?>
                        <option value="<?= $trainer['PK_Trainer'] ?>"
                            <?= ($trainer['PK_Trainer'] == $daten['FK_Trainer']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($trainer['Nachname']) ?>
                        </option>
                    <?php } ?>
                </select>
            </td>

            <td>
                <select name="FK_Mannschaft">
                    <?php foreach ($mannschaftListe as $mannschaft) { ?>
                        <option value="<?= $mannschaft['PK_Mannschaft'] ?>"
                            <?= ($mannschaft['PK_Mannschaft'] == $daten['FK_Mannschaft']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($mannschaft['Name']) ?>
                        </option>
                    <?php } ?>
                </select>
            </td>

            <td>
                <button type="submit" name="PK_Trainer_Mannschaft"
                        value="<?= $daten['PK_Trainer_Mannschaft'] ?>">
                    Ändern
                </button>
            </td>
        </form>

        <!-- LÖSCHEN -->
        <form action="./zt-trainer-mannschaft/zt-trainer-mannschaft-delete.php" method="post">
            <td>
                <button type="submit" name="PK_Trainer_Mannschaft"
                        value="<?= $daten['PK_Trainer_Mannschaft'] ?>">
                    Löschen
                </button>
            </td>
        </form>
    </tr>
    <?php } ?>

    <!-- HINZUFÜGEN -->
    <tr>
        <form action="./zt-trainer-mannschaft/zt-trainer-mannschaft-add.php" method="post">
            <td>auto increment</td>

            <td><input type="text" name="Von"></td>
            <td><input type="text" name="Bis"></td>

            <td>
                <select name="FK_Trainer">
                    <?php foreach ($trainerListe as $trainer) { ?>
                        <option value="<?= $trainer['PK_Trainer'] ?>">
                            <?= htmlspecialchars($trainer['Nachname']) ?>
                        </option>
                    <?php } ?>
                </select>
            </td>

            <td>
                <select name="FK_Mannschaft">
                    <?php foreach ($mannschaftListe as $mannschaft) { ?>
                        <option value="<?= $mannschaft['PK_Mannschaft'] ?>">
                            <?= htmlspecialchars($mannschaft['Name']) ?>
                        </option>
                    <?php } ?>
                </select>
            </td>

            <td colspan="2">
                <button type="submit" name="add">Hinzufügen</button>
            </td>
        </form>
    </tr>
</table>

<?php $pdo = null; ?>
