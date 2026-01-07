<?php include 'navigator.php' ?>
<?php include 'database/mssql.php';

try {
    $stmt = $pdo->prepare(
        "SELECT [PK_Liga], [Name]
         FROM tbl_liga"
    );

    $stmt->execute();
    $liga = $stmt->fetchAll();   

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

<table cellpadding="5">
    <tr>
        <th>PK_Liga</th>
        <th>Name</th>
        <th>Ändern</th>
        <th>Löschen</th>

    </tr>

    <?php foreach ($liga as $row): ?>    
    <tr>
                <form action="./liga/liga-change.php" method="post">
            <td><?= $row['PK_Liga'] ?></td>
        <td>  <input type="text" name="Name" value="<?= $row['Name']?>">  </td>
            <td><button type="submit" name="PK_Liga" value="<?= $row['PK_Liga'] ?>">Ändern</button></td>
        </form>
               <form action="./liga/liga-delete.php" method="post">
            <td><button type="submit" name="PK_Liga" value="<?= $row['PK_Liga'] ?>">Löschen</button></td>
        </form>

    </tr>
    <?php endforeach; ?>

    <form action="./liga/liga-add.php" method="post">
    <td> auto increment  </td>
    <td> <input type="text" name="NeuName" id="">     </td>
    <td> <button type="submit" name="add" value=""> Hinzufügen</button></td>
    </form>
</table>

