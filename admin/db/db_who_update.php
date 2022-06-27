<?php
$db = new SQLite3('sites.db');

$title = $_POST['title'];
$description = $_POST['description'];
$photo = $_POST['photo'];


$upd = $db->prepare('UPDATE sites_who SET title = ?,description = ?, photo = ? WHERE id = 1');
$upd->bindValue(1, $title, SQLITE3_TEXT);
$upd->bindValue(2, $description,SQLITE3_TEXT);
$upd->bindValue(3, $photo, SQLITE3_TEXT);
$upd->execute();

header("Location: ../index.php");
die();

?>