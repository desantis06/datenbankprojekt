<?php include 'navigator.php'; ?>
<?php include 'database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare(
        "SELECT [PK_Verein], [Name], [Gruendungsjahr]
         FROM tbl_verein"
    );

    $stmt->execute();
    $vereine = $stmt->fetchAll();   

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

<table cellpadding="5">
    <tr>
        <th>PK_Verein</th>
        <th>Name</th>
        <th>Gründungsjahr</th>
        <th>Ändern</th>
        <th>Löschen</th>
    </tr>

    <?php foreach ($vereine as $row): ?>    
    <tr>
        <form action="./vereine/vereine-change.php" method="post">
            <td><?= $row['PK_Verein'] ?></td>
            <td><input type="text" name="vereinName" value="<?= htmlspecialchars($row['Name']) ?>"></td>
            <td><input type="text" name="jahr" value="<?= htmlspecialchars($row['Gruendungsjahr']) ?>"></td>
            <!-- <input type="hidden" name="PK_Verein" value="<?= $row['PK_Verein'] ?>"> -->
            <td><button type="submit" name="PK_Verein" value="<?= $row['PK_Verein'] ?>">Ändern</button></td>
        </form>
        <form action="./vereine/vereine-delete.php" method="post">
            <td><button type="submit" name="PK_Verein" value="<?= $row['PK_Verein'] ?>">Löschen</button></td>
        </form>
        
    </tr>
    <?php endforeach; ?>

    <form action="./vereine/vereine-add.php" method="post">
        <td>auto increment</td>
        <td><input type="text" name="vereinName"></td>
        <td><input type="text" name="gruendungsjahr"></td>
        <td><button type="submit" name="add">Hinzufügen</button></td>
    </form>
</table>
