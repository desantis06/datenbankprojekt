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
<tr>
 <?php foreach ($data as $row): ?>    
        <tr>
        <form action="" method="post">
        <td><?= htmlspecialchars($row['PK_Spieler_Mannschaft']) ?></td>
        <td> <input type="text" name="Ergebnis" value="<?= $row['Von'] ?>"></td>
        <td> <input type="text" name="Anpfiff" value="<?=  $row['Bis'] ?>"></td>
        <td> <input type="text" name="FK_Schiedsrichter" value="<?= $row['FK_Spieler'] ?>"></td>
        <td> <input type="text" name="FK_Stadion" value="<?= $row['FK_Mannschaft'] ?>"></td>
        <select>
            <?php 
            while($row){
                echo "<option value="echo $row['FK_Spieler']";>echo $row['tbl_spieler.Vorname']</option>";
            }
            ?>
        </select>
        <td><button type="submit" name="edit" value ="<?php echo $row['PK_Spieler_Mannschaft'] ?>">Edit</button></td>
    </form>
        <form action="Api/spiele/spiele-delete.php" method="post">
        <td><button type="submit" name="delete" value ="<?php echo $row['PK_Spieler_Mannschaft'] ?>">Delete</button></td>
        </form>
    </tr>
    <?php endforeach; ?>
</tr>
   
</table>
