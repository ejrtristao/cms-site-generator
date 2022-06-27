<?php 
$json_data = file_get_contents('./_layouts/config.json');
$data = json_decode($json_data, TRUE);
$site = $data['site'];
foreach($site as $key => $value) {
    define(strtoupper($key), $value);
}
?>