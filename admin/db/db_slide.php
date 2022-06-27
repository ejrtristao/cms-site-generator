<?php
$db = new SQLite3('sites.db');

function upload_file($file, $title, $path) {
    $imagem_name = strtolower(strtr(utf8_decode($title), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ '), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY-'));
    $target_path = $imagem_name. '.'. basename($file["type"]);
    $base_dir = realpath(dirname(__FILE__));
    $image_dir = substr($base_dir, 0, -9) . "\_resources\images\\" .$path . "\\";
    $image_curso = $image_dir  .  $target_path;
    @move_uploaded_file($file['tmp_name'], $image_curso);
    return $target_path;
}


$type = $_GET['type'];
$db = new SQLite3('sites.db');
if($type=='new'){
    $qry = $db->prepare('INSERT INTO sites_slide (title, subtitle, image, link1, description1, link2, description2, icon)
     VALUES (?,?,?,?,?,?,?, ?)');
    $qry->bindValue(1, $_POST['title'], SQLITE3_TEXT);
    $qry->bindValue(2, $_POST['subtitle'], SQLITE3_TEXT);
    $qry->bindValue(3, upload_file($_FILES['image'], $_POST['title'], 'slides'), SQLITE3_TEXT);
    $qry->bindValue(4, $_POST['link1'], SQLITE3_TEXT);
    $qry->bindValue(5, $_POST['description1'], SQLITE3_TEXT);
    $qry->bindValue(6, $_POST['link2'], SQLITE3_TEXT);
    $qry->bindValue(7, $_POST['description2'], SQLITE3_TEXT);
    $qry->bindValue(8, upload_file($_FILES['icon'], $_FILES['title'], 'icon'), SQLITE3_TEXT);
}else if($type=='edit'){
    $qry = $db->prepare('UPDATE sites_slide SET 
    title = ?, 
    subtitle = ?, 
    image = ?, 
    link1 = ?, 
    description1 = ? ,
    link2 = ?, 
    description2 = ?,
    icon = ?
    WHERE id = ?');
    $qry->bindValue(1, $_POST['title'], SQLITE3_TEXT);
    $qry->bindValue(2, $_POST['subtitle'], SQLITE3_TEXT);
    $qry->bindValue(3, upload_file($_FILES['image'], $_POST['title'], 'slides'), SQLITE3_TEXT);
    $qry->bindValue(4, $_POST['link1'], SQLITE3_TEXT);
    $qry->bindValue(5, $_POST['description1'], SQLITE3_TEXT);
    $qry->bindValue(6, $_POST['link2'], SQLITE3_TEXT);
    $qry->bindValue(7, $_POST['description2'], SQLITE3_TEXT);
    $qry->bindValue(8, upload_file($_FILES['icon'], $_POST['title'], 'icon'), SQLITE3_TEXT);
    $qry->bindValue(9, $_POST['id'], SQLITE3_INTEGER);
}else if($type=='delete'){
    $qry = $db->prepare('DELETE FROM sites_slide WHERE id = ?');
    $qry->bindValue(1, $_GET['id'], SQLITE3_INTEGER);
}
$qry->execute();
header('Location: ./../slides.php');
die();
