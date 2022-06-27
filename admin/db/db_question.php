<?php
$type = $_GET['type'];
$db = new SQLite3('sites.db');
if($type=='new'){
    $qry = $db->prepare('INSERT INTO sites_questions (question,answer) VALUES (?,?)');
    $qry->bindValue(1, $_POST['question'], SQLITE3_TEXT);
    $qry->bindValue(2, $_POST['answer'], SQLITE3_TEXT);
}else if($type=='edit'){
    $qry = $db->prepare('UPDATE sites_questions SET question = ?, answer = ? WHERE id = ?');
    $qry->bindValue(1, $_POST['question'], SQLITE3_TEXT);
    $qry->bindValue(2, $_POST['answer'], SQLITE3_TEXT);
    $qry->bindValue(3, $_POST['id'], SQLITE3_TEXT);
}else if($type=='delete'){
    $qry = $db->prepare('DELETE FROM sites_questions WHERE id = ?');
    $qry->bindValue(1, $_GET['id'], SQLITE3_INTEGER);
}
$qry->execute();
header('Location: ./../questions.php');
die();
