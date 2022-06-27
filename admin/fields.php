<?php
include 'header.php';
$db = new SQLite3('sites.db');

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $value = $_POST['value'];
    $db->exec("INSERT INTO fields (name, value) VALUES ('$name' , '$value')");
    $_POST['name'] = null;
    $_POST['value'] = null;
}

$res = $db->query('SELECT * FROM fields');
?>

<div>
    <h3>Gerenciar Campos</h3>
    <div>
        <form action="fields.php" method="post">
            <label for="name">Nome do campo</label>
            <input type="text" name="name" id="name" required>
            <label for="value">Valor do campo</label>
            <input type="text" name="value" id="value" required>
            <input type="submit" value="Criar">
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Valor</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $res->fetchArray()) { ?>
                <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['value']; ?></td>
                <td><a href="field_delete.php?id=<?php echo $row['id']; ?>">Excluir</a></td>
                </tr>
            <?php } ?>
    </table>
</div>
<?php include 'footer.php'; ?>