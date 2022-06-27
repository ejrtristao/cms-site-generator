<?php
include './layouts/header.php';
$db = new SQLite3('./db/sites.db');
$list = $db->query('SELECT * FROM sites');
$row = $list->fetchArray();
?>
<div>
    <h3>Configurar Site</h3>
    <h4><?php echo $row['title'] ?></h4>
</div>
<?php
include './layouts/footer.php';
?>