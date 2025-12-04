

<?php include 'navigator.php'; ?>
<?php include 'database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare(
        "SELECT [PK_Spieler], [Vorname], [Nachname],[Trikotnummer],[Position]
         FROM tbl_spieler"
    );

    $stmt->execute();
    $spieler = $stmt->fetchAll();   

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

<table cellpadding="7">
    <tr>
        <th>PK_Spieler</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Trikotnummer</th>
        <th>Position</th>
        <th>Ändern</th>
        <th>Löschen</th>
    </tr>

    <?php foreach ($spieler as $row): ?>    
    <tr>
        <form action="./spieler/spieler_update.php" method="post">
            <td><?= $row['PK_Spieler'] ?></td>
            <td><input type="text" name="vname" value="<?= $row['Vorname'] ?>"></td>
            <td><input type="text" name="nname" value="<?= $row['Nachname'] ?>"></td>
            <td><input type="text" name="nummer" value="<?= $row['Trikotnummer'] ?>"></td>
            <td><input type="text" name="posi" value="<?= $row['Position'] ?>"></td>
            <!-- <input type="hidden" name="PK_Verein" value="<?= $row['PK_Spieler'] ?>"> -->
            <td><button type="submit" name="PK_Spieler" value="<?= $row['PK_Spieler'] ?>">Ändern</button></td>
        </form>
        <form action="./spieler/spieler_delite.php" method="post">
            <td><button type="submit" name="PK_Spieler" value="<?= $row['PK_Spieler'] ?>">Löschen</button></td>
        </form>
        
    </tr>
    <?php endforeach; ?>

    <form action="./spieler/spieler_add.php" method="post">
        <td>auto increment</td>
        <td><input type="text" name="vname"></td>
        <td><input type="text" name="nname"></td>
        <td><input type="text" name="nummer"></td>
        <td><input type="text" name="posi"></td>
        <td><button type="submit" name="add">Hinzufügen</button></td>
    </form>
</table>
