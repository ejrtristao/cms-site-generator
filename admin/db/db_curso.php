<?php
$type = $_GET['type'];
$db = new SQLite3('sites.db');
    
function upload_file($file, $title, $category) {
    $imagem_name = strtolower(strtr(utf8_decode($title), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ '), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY-'));
    $category = str_replace(['ã','ç'], ['a','c'], strtolower($_POST['category']));
    $target_path = $category . '_' . $imagem_name. '.'. basename($file["type"]);
    $base_dir = realpath(dirname(__FILE__));
    $image_dir = substr($base_dir, 0, -9) . "\_resources\images\cursos\\";
    $image_curso = $image_dir .  $target_path;
    @move_uploaded_file($file['tmp_name'], $image_curso);
    return $target_path;
}


if($type=='new'){
    $qry = $db->prepare('INSERT INTO sites_cursos (title,description,photo,category) VALUES (?,?,?,?)');
    $qry->bindValue(1, $_POST['title'], SQLITE3_TEXT);
    $qry->bindValue(2, $_POST['description'], SQLITE3_TEXT);
    $qry->bindValue(3, upload_file($_FILES['photo'], $_POST['title'],$_POST['category']), SQLITE3_TEXT);
    $qry->bindValue(4, $_POST['category'], SQLITE3_TEXT);
}else if($type=='edit'){
    $qry = $db->prepare('UPDATE sites_cursos SET  title = ?, description = ?, photo = ?, category =? WHERE id = ?');
    $qry->bindValue(1, $_POST['title'], SQLITE3_TEXT);
    $qry->bindValue(2, $_POST['description'], SQLITE3_TEXT);
    // $qry->bindValue(3, $_POST['photo'], SQLITE3_TEXT);
    $qry->bindValue(3, upload_file($_FILES['photo'], $_POST['title'],$_POST['category']), SQLITE3_TEXT);
    $qry->bindValue(4, $_POST['category'], SQLITE3_TEXT);
    $qry->bindValue(5, $_POST['id'], SQLITE3_INTEGER);
}else if($type=='delete'){
    $qry = $db->prepare('DELETE FROM sites_cursos WHERE id = ?');
    $qry->bindValue(1, $_GET['id'], SQLITE3_INTEGER);
}
$qry->execute();
header('Location: ./../cursos.php');
die();
