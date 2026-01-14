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
    /*[PK_Spiel]
      ,[Ergebnis]
      ,[Anpfiff]
      ,[FK_Schiedsrichter]
      ,[FK_Stadion]
      ,[FK_Mannschaft_Heim]
      ,[FK_Mannschaft_Auswaerts]*/
try {
    $stmt = $pdo->prepare(
        "SELECT *
FROM tbl_spiel
    JOIN tbl_schiedsrichter ON tbl_spiel.FK_Schiedsrichter = tbl_schiedsrichter.PK_Schiedsrichter
JOIN tbl_stadion   ON tbl_spiel.FK_Stadion = tbl_stadion.PK_Stadion
JOIN tbl_mannschaft AS heim  ON tbl_spiel.FK_Mannschaft_Heim = heim.PK_Mannschaft
JOIN tbl_mannschaft AS auswaerts  ON tbl_spiel.FK_Mannschaft_Auswaerts = auswaerts.PK_Mannschaft;
");

    $stmt->execute();
    $vereine = $stmt->fetchAll(); 
//schiedrichter
    $SQLSchiedrichter = $pdo->prepare("SELECT * FROM tbl_schiedsrichter");
    $SQLSchiedrichter->execute();
    $schied = $SQLSchiedrichter->fetchAll();
//stadion
    $SQLStadion = $pdo->prepare("SELECT * FROM tbl_stadion");
    $SQLStadion->execute();
    $stadions = $SQLStadion->fetchAll();
//mannschaft
    $SQLMannschaft = $pdo->prepare("SELECT * FROM tbl_mannschaft");
    $SQLMannschaft->execute();
    $mans = $SQLMannschaft->fetchAll();

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
        <th>Ändern</th>
        <th>Löschen</th>
    </tr>

    <?php foreach ($vereine as $row): ?>    
        <tr>
    <form action="Api/spiele/spiele-edit.php" method="post">
        <td><?= htmlspecialchars($row['PK_Spiel']) ?></td>
        <td> <input type="text" name="Ergebnis" value="<?= $row['Ergebnis'] ?>"></td>
        <td> <input type="text" name="Anpfiff" value="<?=  $row['Anpfiff'] ?>"></td>
        
        <td> <select name="FK_Schiedsrichter">
                 <?php foreach ($schied as $sd) : ?>
                        <option value="<?= $sd['PK_Schiedsrichter'] ?>"
                            <?= ($sd['PK_Schiedsrichter'] == $row['PK_Schiedsrichter']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($sd['Nachname']) ?>
                        </option>
                    <?php endforeach; ?>
            </select></td>
           
        <td>  <select name="FK_Stadion">
                 <?php foreach ($stadions as $st) : ?>
                        <option value="<?= $st['PK_Stadion'] ?>"
                            <?= ($st['PK_Stadion'] == $row['PK_Stadion']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($st['Name']) ?>
                        </option>
                    <?php endforeach; ?>
            </select></td>
           
        <td>   <select name="FK_Mannschaft_Heim">
                 <?php foreach ($mans as $ms) : ?>
                        <option value="<?= $ms['PK_Mannschaft'] ?>"
                            <?= ($ms['PK_Mannschaft'] == $row['FK_Mannschaft_Heim']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($ms['Name']) ?>
                        </option>
                    <?php endforeach; ?>
            </select></td>
            
        <td>   <select name="FK_Mannschaft_Auswaerts">
                 <?php foreach ($mans as $ms) : ?>
                        <option value="<?= $ms['PK_Mannschaft'] ?>"
                            <?= ($ms['PK_Mannschaft'] == $row['FK_Mannschaft_Auswaerts']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($ms['Name']) ?>
                        </option>
                    <?php endforeach; ?>
            </select></td>
    
        <td><button type="submit" name="edit" value ="<?php echo $row['PK_Spiel'] ?>">Ändern</button></td>
    </form>
        <form action="Api/spiele/spiele-delete.php" method="post">
        <td><button type="submit" name="delete" value ="<?php echo $row['PK_Spiel'] ?>">Löschen</button></td>
        </form>
    </tr>
    <?php endforeach; ?>


<form action="Api/spiele/spiele-add.php" method="post">
<td>auto increment</td>
    <td>            <input type="text" id="Ergebnis" name="Ergebnis" value="">
    </td>
<td>
        <input type="date" id="Anpfiff" name="Anpfiff" value="">
    </td>
<td>
        <input type="text" id="FK_Schiedsrichter" name="FK_Schiedsrichter" value="">
    </td>
<td>
        <input type="text" id="FK_Stadion" name="FK_Stadion" value="">
    </td>
<td>
        <input type="text" id="FK_Mannschaft_Heim" name="FK_Mannschaft_Heim" value="">
    </td>
<td>
        <input type="text" id="FK_Mannschaft_Auswaerts" name="FK_Mannschaft_Auswaerts" value="">
    </td>
    <td>
        <button type="submit" name="add">Hinzufügen</button>
    </td>
</form>
    </table>

</body>
</html>