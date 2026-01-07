<?php include 'navigator.php'; ?>
<?php include 'database/mssql.php'; ?>

<?php 
try {
    $stmt = $pdo->prepare("
         SELECT *
         FROM tbl_spieler_mannschaft
         JOIN tbl_spieler ON tbl_spieler_mannschaft.FK_Spieler=tbl_spieler.PK_Spieler
         JOIN tbl_mannschaft ON tbl_spieler_mannschaft.FK_Mannschaft=tbl_mannschaft.PK_Mannschaft"
        );
    $stmt->execute();
    $data = $stmt->fetchAll();
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;

?>
<table>
    <tr>
        <th>PK_Spieler_Mannschaft</th>
        <th>Von</th>
        <th>Bis</th>
        <th>FK_Spieler</th>
        <th>FK_Mannschaft</th>
        <th>Ändern</th>
        <th>Löschen</th>
    </tr>
<tr><?php foreach ($data as $row): ?>
<tr>
    <form action="./zt-mannschaft-spieler\zt-spieler-mannschaft-change.php" method="post">
        <td><?= htmlspecialchars($row['PK_Spieler_Mannschaft']) ?></td>

        <td>
            <input type="text" name="Von"
                   value="<?= htmlspecialchars($row['Von']) ?>">
        </td>

        <td>
            <input type="text" name="Bis"
                   value="<?= htmlspecialchars($row['Bis']) ?>">
        </td>

         <td>
            <select name="FK_Spieler">
                <option value="<?= htmlspecialchars($row['FK_Spieler']) ?>">
                    <?= htmlspecialchars($row['Vorname']) ?>
                </option>
            </select>
        </td>

        <td>
            <input type="text" name="FK_Mannschaft"
                   value="<?= htmlspecialchars($row['FK_Mannschaft']) ?>">
        </td>

      

        <td>
            <button type="submit"
                    name="edit"
                    value="<?= htmlspecialchars($row['PK_Spieler_Mannschaft']) ?>">
                Edit
            </button>
        </td>
    </form>

    
    <form action="./zt-mannschaft-spieler\zt-spieler-mannschaft-delete.php" method="post">
        <td>
            <button type="submit"
                    name="delete"
                    value="<?= htmlspecialchars($row['PK_Spieler_Mannschaft']) ?>">
                Delete
            </button>
        </td>
    </form>

</tr>
<?php endforeach; ?>

    </tr>
</tr>
<tr>
        <form action="./zt-trainer-mannschaft/zt-trainer-mannschaft-add.php" method="post">
            <td>auto increment</td>

            <td><input type="text" name="Von"></td>
            <td><input type="text" name="Bis"></td>

            <td>
                <select name="FK_Trainer">
                    <?php foreach ($trainerListe as $trainer) { ?>
                        <option value="<?= $trainer['PK_Spieler_Mannschaft'] ?>">
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
