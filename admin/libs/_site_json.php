<?php
include '_url_amigavel.php';
include '_copyCMSDirectory.php';
$db = new SQLite3('./../db/sites.db');
$site = $db->query("SELECT * FROM sites");
$site = $site->fetchArray();
$site = generate_friendly_url($site['name']);

$fields = $db->query("SELECT * FROM site_details");
$json = '{"site":{';
while($row = $fields->fetchArray()) {
    $json .= '"' . $row['name'] . '":"' . $row['value'] . '",';     
}

$json = substr($json, 0, -1);
$json .= '},';

//CURSOS
$fields = $db->query("SELECT * FROM sites_cursos");
$json .= '"cursos":[';

while($row = $fields->fetchArray()) {
    $json .= '{';
    $json .= '"title":"' . $row['title'] . '",';     
    $json .= '"description":"' . $row['description'] . '",';     
    $json .= '"category":"' . $row['category'] . '",';
    $json .= '"photo":"' . $row['photo'] . '",';
    $json .= '"id":"' . $row['id'] . '"';
    $json .= '},' ;
}

$json = substr($json, 0, -1);
$json .= '],';

    //slides
$fields = $db->query("SELECT * FROM sites_slide");
$json .= '"slide":[';

while($row = $fields->fetchArray()) {
    $json .= '{';
    $json .= '"title":"' . $row['title'] . '",';     
    $json .= '"description":"' . $row['description'] . '",';     
    $json .= '"slide":"' . $row['slide'] . '"';
    $json .= '},' ;
}

    $json = substr($json, 0, -1);
    $json .= '],';

    
// QUESTIONS
$fields = $db->query("SELECT * FROM sites_questions");
$json .= '"questions":[';

while($row = $fields->fetchArray()) {
    $json .= '{';
    $json .= '"question":"' . $row['question'] . '",';     
    $json .= '"answer":"' . $row['answer'] . '"';     
    $json .= '},' ;
}

    $json = substr($json, 0, -1);
    $json .= '],';

    // Who
$fields = $db->query("SELECT * FROM sites_who LIMIT 1");
$json .= '"who":';

while($row = $fields->fetchArray()) {
    $json .= '{';
    $json .= '"title":"' . $row['title'] . '",';     
    $json .= '"description":"' . $row['description'] . '",';     
    $json .= '"photo":"' . $row['photo'] . '"';     
    $json .= '}' ;
}


//FINALIZA O JSON
$json .= '}';

$decodificado = json_decode($json);
$codificado = json_encode($decodificado);


// // $dir = new copyCMSDirectory();
// // $dir->recurseCopy('c:\laragon\www\cms\modelo', 'c:\laragon\www\cms\clientes\\' . $site);
file_put_contents('c:\laragon\www\cms\clientes\\' . $site . "\config.json", $codificado);

header("Location: /cms/index.php");
die();
?>