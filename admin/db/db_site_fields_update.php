<?php
$db = new SQLite3('sites.db');
$id = $_POST['site_id'];

foreach($_POST as $i => $stuff ) {
    $upd = $db->prepare('UPDATE site_details SET value = ? WHERE id = ?');
    $upd->bindValue(1, $stuff, SQLITE3_TEXT);
    $upd->bindValue(2, $i, SQLITE3_INTEGER);
    $upd->execute();
    var_dump($i);
}
header("Location: /cms/index.php");
die();
?>