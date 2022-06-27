<?php
$db = new SQLite3('sites.db');
if(isset($_GET['id'])){
    $db->exec("DELETE FROM fields WHERE id = ".$_GET['id']);
}
header("Location: /cms/fields.php");
die();
?>