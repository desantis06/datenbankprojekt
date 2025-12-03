<?php include 'navigator.php'; ?>
<?php include 'database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare(
        "SELECT [PK_Verein], [Name], [Gruendungsjahr]
         FROM [Projekt].[dbo].[tbl_verein]"
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
        <td><?= $row['PK_Verein'] ?></td>
        <td><input type="text" value="<?= htmlspecialchars($row['Name']) ?>"></td>
        <td><input type="text" value="<?= htmlspecialchars($row['Gruendungsjahr']) ?>"></td>
        <td><button type="submit" name="change" value="<?= $row['PK_Verein'] ?>">Ändern</button></td>
        <td><button type="submit" name="delete" value="<?= $row['PK_Verein'] ?>">Löschen</button></td>
    </tr>
    <?php endforeach; ?>

    <form action="./vereine/vereine-add.php" method="post">
        <td>auto increment</td>
        <td><input type="text" name="vereinName"></td>
        <td><input type="text" name="gruendungsjahr"></td>
        <td><button type="submit" name="add">Hinzufügen</button></td>
    </form>
</table>
