<?php
$db = new SQLite3('sites.db');

$title = $_POST['title'];
$description = $_POST['description'];
$photo_name = '';
if($_FILES['photo']['name'] != '') {
    $photo_name = 'who.' . basename($_FILES["photo"]["type"]);
    $base_dir = realpath(dirname(__FILE__));
    $image_dir = substr($base_dir, 0, -9) . "\_resources\images\\";
    $photo = $image_dir . $phophoto_nameto;
    $result = @move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
}

$upd = $db->prepare('UPDATE sites_who SET title = ?,description = ?, photo = ? WHERE id = 1');
$upd->bindValue(1, $title, SQLITE3_TEXT);
$upd->bindValue(2, $description,SQLITE3_TEXT);
$upd->bindValue(3, $photo_name, SQLITE3_TEXT);
$upd->execute();

header("Location: ../who.php");
die();

?>