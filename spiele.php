<?php include 'navigator.php' // Bruno?>
<?php include 'database/mssql.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
try {
    $stmt = $pdo->prepare(
        "SELECT [PK_Spiel]
      ,[Ergebnis]
      ,[Anpfiff]
      ,[FK_Schiedsrichter]
      ,[FK_Stadion]
      ,[FK_Mannschaft_Heim]
      ,[FK_Mannschaft_Auswaerts]
  FROM tbl_spiel
"
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
        <th>PK_Spiel</th>
        <th>Ergebnis</th>
        <th>Anpfiff</th>
        <th>FK_Schiedsrichter</th>
        <th>FK_Stadion</th>
        <th>FK_Mannschaft_Heim</th>
        <th>FK_Mannschaft_Auswaerts</th>
    </tr>

    <?php foreach ($vereine as $row): ?>    
        <tr>
        <form action="Api/spiele/spiele-edit.php" method="post">
        <td><?= htmlspecialchars($row['PK_Spiel']) ?></td>
        <td> <input type="text" name="Ergebnis" value="<?= $row['Ergebnis'] ?>"></td>
        <td> <input type="text" name="Anpfiff" value="<?=  $row['Anpfiff'] ?>"></td>
        <td> <input type="text" name="FK_Schiedsrichter" value="<?= $row['FK_Schiedsrichter'] ?>"></td>
        <td> <input type="text" name="FK_Stadion" value="<?= $row['FK_Stadion'] ?>"></td>
        <td> <input type="text" name="FK_Mannschaft_Heim" value="<?= $row['FK_Mannschaft_Heim'] ?>"></td>
        <td> <input type="text" name="FK_Mannschaft_Auswaerts" value="<?= $row['FK_Mannschaft_Auswaerts'] ?>"></td>
    
        <td><button type="submit" name="edit" value ="<?php echo $row['PK_Spiel'] ?>">Edit</button></td>
    </form>
    </tr>
    <?php endforeach; ?>
</table>


</body>
</html>