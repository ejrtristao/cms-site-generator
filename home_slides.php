<?php

$db = new SQLite3('./admin/db/sites.db');
$list = $db->query("SELECT * FROM sites_slide");

$slide = "";

while($value = $list->fetchArray()) {
$slide .= '       
        <div class="slide" style="background-image:url(./_resources/images/slides/'.$value['image'].')">
            <div class="container">
                <div class="content">
                    <div class="image"><img src="./_resources/images/icon/'.$value['icon'].'" alt=""></div>
                    <h3>'.$value['title'].'</h3>
                    <h2>'.$value['subtitle'].'</h2>
                    <div class="link-box">
                        <a href="'.$value['link1'].'" class="theme-btn btn-style-one">'.$value['description1'].'</a> 
                        <a href="'.$value['link2'].'" class="theme-btn btn-style-two">'.$value['description2'].'</a>
                    </div>
                </div>
            </div>
        </div>
';
}
?>


<section class="main-slider style-1">
    <div class="main-slider-carousel owl-carousel owl-theme">
        <?=$slide;?>
    </div>
</section>