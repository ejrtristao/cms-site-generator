<?php
include './layouts/header.php';
$db = new SQLite3('./db/sites.db');
$list = $db->query('SELECT * FROM sites');
?>
<div>
    <h3>Configurar Site</h3>
</div>
<?php
include './layouts/footer.php';
?>