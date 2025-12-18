<?php include 'navigator.php'; ?>
<?php include 'database/mssql.php'; ?>

<?php 
try {
    $stmt = $pdo->prepare("
       SELECT [PK_Spieler_Mannschaft]
      ,[Von]
      ,[Bis]
      ,[FK_Spieler]
      ,[FK_Mannschaft]
  FROM [dbo].[tbl_spieler_mannschaft]
    ");
    $stmt->execute();

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;
var_dump($stmt);

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

    <?php foreach ($ligaMannschaft as $row): ?>    
    <tr>
        <form action="./liga-mannschaft/zt-liga-mannschaft-change.php" method="post">
            <td><?= $row['PK_Spieler_Mannschaft'] ?></td>
            <td>
                <select name="FK_Mannschaft">
                    <?php foreach ($mannschaften as $m): ?>
                        <option value="<?= $m['PK_Mannschaft'] ?>"
                            <?= $m['PK_Mannschaft'] == $row['PK_Mannschaft'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($m['Name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <select name="FK_Liga">
                    <?php foreach ($ligen as $l): ?>
                        <option value="<?= $l['PK_Liga'] ?>"
                            <?= $l['PK_Liga'] == $row['PK_Liga'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($l['Name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            
            <td><input type="date" name="Von" value="<?= $row['Von'] ?>"></td>
            <td><input type="date" name="Bis" value="<?= $row['Bis'] ?>"></td>

            <td>
                <button type="submit" name="PK_Liga_Mannschaft" value="<?= $row['PK_Liga_Mannschaft'] ?>">
                    Ändern
                </button>
            </td>
        </form>

        <form action="./liga-mannschaft/zt-liga-mannschaft-delete.php" method="post">
            <td>
                <button type="submit" name="PK_Liga_Mannschaft" value="<?= $row['PK_Liga_Mannschaft'] ?>">
                    Löschen
                </button>
            </td>
        </form>
    </tr>
    <?php endforeach; ?>

    <form action="./liga-mannschaft/zt-liga-mannschaft-add.php" method="post">
        <tr>
        <td>auto increment</td>
        <td>
        <select name="FK_Mannschaft">
        <?php foreach ($mannschaften as $m): ?>
        <option value="<?= $m['PK_Mannschaft'] ?>">
        <?= htmlspecialchars($m['Name']) ?>
        </option>
        <?php endforeach; ?>
        </select>
        </td>
        <td>
        <select name="FK_Liga">
        <?php foreach ($ligen as $l): ?>
        <option value="<?= $l['PK_Liga'] ?>">
        <?= htmlspecialchars($l['Name']) ?>
        </option>
        <?php endforeach; ?>
        </select>
        </td>








            <td><input type="date" name="Von"></td>
            <td><input type="date" name="Bis"></td>

            <td><button type="submit" name="add">Hinzufügen</button></td>
            <td></td>
        </tr>
    </form>
</table>
