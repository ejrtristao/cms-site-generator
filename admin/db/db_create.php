<?php
$db = new SQLite3('sites.db');

// $db->exec("CREATE TABLE IF NOT EXISTS fields(
//     id INTEGER PRIMARY KEY, 
//     name TEXT,
//     value TEXT
// )");


$db->exec("CREATE TABLE IF NOT EXISTS sites(
    id INTEGER PRIMARY KEY,
    logo TEXT,
    name TEXT,
    url TEXT,
    facebook TEXT,
    instagram TEXT,
    email TEXT,
    phone TEXT,
    address TEXT,
    city TEXT,
    state TEXT
)");

$db->exec("CREATE TABLE IF NOT EXISTS site_details(
    id INTEGER PRIMARY KEY, 
    site_id INTEGER,
    category_detail_id INTEGER,
    name TEXT,
    value TEXT
)");

$db->exec("CREATE TABLE IF NOT EXISTS category(
    id INTEGER PRIMARY KEY, 
    name TEXT
)");

$db->exec("CREATE TABLE IF NOT EXISTS sites_who(
    id INTEGER PRIMARY KEY, 
    title TEXT,
    description TEXT,
    photo TEXT
)");

$db->exec("INSERT INTO sites_who(title, description) VALUES('Quem Somos','Descrição completa quem somos')");


$db->exec("CREATE TABLE IF NOT EXISTS sites_questions(
    id INTEGER PRIMARY KEY, 
    site_id INTEGER,
    question TEXT,
    answer TEXT
)");

$db->exec("CREATE TABLE IF NOT EXISTS sites_cursos(
    id INTEGER PRIMARY KEY, 
    title INTEGER,
    description TEXT,
    category TEXT,
    photo TEXT
)");


$db->exec("CREATE TABLE IF NOT EXISTS sites_slide(
    id INTEGER PRIMARY KEY, 
    site_id INTEGER,
    slide TEXT,
    title TEXT,
    subtitle TEXT,
    image TEXT,
    link1 TEXT,
    description1 TEXT,
    link2 TEXT,
    description2 TEXT,
    icon TEXT
)");

$db->exec("INSERT INTO category(name) VALUES('site')");

$db->exec("CREATE TABLE IF NOT EXISTS category_detail(
    id INTEGER PRIMARY KEY, 
    category_id INTEGER,
    name TEXT,
    value TEXT,
    photo TEXT,
    type TEXT
)");

//carrega category site
$categories = $db->query("SELECT * FROM category WHERE name = 'site'");

while($row = $categories->fetchArray()) {
    $db->exec("INSERT INTO category_detail(category_id, name, type) VALUES(". $row['id'] .",'Logo','image')");
    $db->exec("INSERT INTO category_detail(category_id, name, type) VALUES(". $row['id'] .",'Name','text')");
    $db->exec("INSERT INTO category_detail(category_id, name, type) VALUES(". $row['id'] .",'Url','text')");
    $db->exec("INSERT INTO category_detail(category_id, name, type) VALUES(". $row['id'] .",'Facebook','text')");
    $db->exec("INSERT INTO category_detail(category_id, name, type) VALUES(". $row['id'] .",'Instagram','text')");
    $db->exec("INSERT INTO category_detail(category_id, name, type) VALUES(". $row['id'] .",'Email','text')");
    $db->exec("INSERT INTO category_detail(category_id, name, type) VALUES(". $row['id'] .",'ContactConfig','text')");
    $db->exec("INSERT INTO category_detail(category_id, name, type) VALUES(". $row['id'] .",'Whatsapp','text')");
    $db->exec("INSERT INTO category_detail(category_id, name, type) VALUES(". $row['id'] .",'Phone','text')");
    $db->exec("INSERT INTO category_detail(category_id, name, type) VALUES(". $row['id'] .",'Cidade','text')");
    $db->exec("INSERT INTO category_detail(category_id, name, type) VALUES(". $row['id'] .",'Estado','text')");
    $db->exec("INSERT INTO category_detail(category_id, name, type) VALUES(". $row['id'] .",'Endereço','text')");
}


header("Location: ../index.php");
die();
?>