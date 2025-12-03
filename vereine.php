<?php include 'navigator.php'; ?>
<?php include 'database/mssql.php'; ?>

<?php
try {
    $stmt = $pdo->prepare(
        "SELECT [PK_Verein], [Name], [Gruendungsjahr]
         FROM [Projekt].[dbo].[tbl_verein]"
    );

    $stmt->execute();
    $vereine = $stmt->fetchAll();   // FIXED

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
    </tr>

    <?php foreach ($vereine as $row): ?>    
    <tr>
        <td><?= htmlspecialchars($row['PK_Verein']) ?></td>
        <td><?= htmlspecialchars($row['Name']) ?></td>
        <td><?= htmlspecialchars($row['Gruendungsjahr']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>