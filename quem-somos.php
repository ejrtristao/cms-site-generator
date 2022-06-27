<?php
session_start();
$_SESSION['sub-title-page'] = 'Quem Somos';
require('./_layouts/header.php');

$db = new SQLite3('./admin/db/sites.db');
$list = $db->query("SELECT * FROM sites_who");
$who = $list->fetchArray();

?>
<!--Start Wellcome Section-->
<section class="welcome-section sp-two">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-sm-12">
                <div class="wellcome-left-colmun">
                    <div class="sec-title pb-one">
                        <h4><?php echo $who['title'] ?></h4>
                    </div>
                    <div class="content-text">
                        <?php echo $who['description'] ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-sm-12">
                <div class="image-box">
                    <figure>
                        <img src="./_resources/images/<?php echo $who['photo'] ?>" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Wellcome Section-->

<?php include('./_layouts/footer.php'); ?>