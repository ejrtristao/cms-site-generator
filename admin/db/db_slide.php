<?php
$type = $_GET['type'];
$db = new SQLite3('sites.db');
if($type=='new'){
    $qry = $db->prepare('INSERT INTO sites_slide (slide,title,description) VALUES (?,?,?)');
    $qry->bindValue(1, $_POST['slide'], SQLITE3_TEXT);
    $qry->bindValue(2, $_POST['title'], SQLITE3_TEXT);
    $qry->bindValue(3, $_POST['description'], SQLITE3_TEXT);
}else if($type=='edit'){
    $qry = $db->prepare('UPDATE sites_slide SET slide = ?, title = ?, description = ? WHERE id = ?');
    $qry->bindValue(1, $_POST['slide'], SQLITE3_TEXT);
    $qry->bindValue(2, $_POST['title'], SQLITE3_TEXT);
    $qry->bindValue(3, $_POST['description'], SQLITE3_TEXT);
    $qry->bindValue(4, $_POST['id'], SQLITE3_INTEGER);
}else if($type=='delete'){
    $qry = $db->prepare('DELETE FROM sites_slide WHERE id = ?');
    $qry->bindValue(1, $_GET['id'], SQLITE3_INTEGER);
}
$qry->execute();
header('Location: ./../slides.php');
die();
