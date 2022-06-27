<?php
include './layouts/header.php';
$db = new SQLite3('./db/sites.db');
$qry = $db->prepare('SELECT * FROM sites WHERE id = ?');
$qry->bindValue(1, $_GET['id'], SQLITE3_INTEGER);
$res = $qry->execute();
$row = $res->fetchArray(SQLITE3_NUM);
?>
<div>
    <h3>Editar Site</h3>
    <form action="site_fields.php" method="post">
        <input type="hidden" value="<?php echo $row[0] ?>" name="id" id="id" required>
        <label for="nome">Título do site</label>
        <input type="text" value="<?php echo $row[1] ?>" name="name" id="name" required>
        <input type="submit" value="Criar">
    </form>
</div>
<?php
include './layouts/footer.php';
?>