<?php
$db = new SQLite3('sites.db');

$logo = "";
if($_FILES['logo']['name'] != '') {
    $target_path = '/logo.' . basename($_FILES["logo"]["type"]);
    // @mkdir(DIR_ARQUIVOS.$chave, 0777, true)
    $base_dir = realpath(dirname(__FILE__));
    $image_dir = substr($base_dir, 0, -9) . "\_resources\images\logo\\";
    $logo = $image_dir . $target_path;
    $result = @move_uploaded_file($_FILES['logo']['tmp_name'], $logo);
}

// $db->exec("ALTER TABLE sites ADD COLUMN link_whatsapp TEXT;");
$db->exec(
    "UPDATE sites SET 
    name='" . $_POST['name'] . "',
    logo='" . $logo . "',
    facebook='" . $_POST['facebook'] . "',
    instagram='" . $_POST['instagram'] . "',
    email='" . $_POST['email'] . "',
    phone='" . $_POST['phone'] . "',
    address='" . $_POST['address'] . "',
    address2='" . $_POST['address2'] . "',
    url_maps='" . $_POST['url_maps'] . "',
    link_whatsapp='" . $_POST['link_whatsapp'] . "',
    city='" . $_POST['city'] . "',
    state='" . $_POST['state'] . "'
     WHERE id=" . $_POST['id']
);



header("Location: ../site_detail.php");
die();

?>
