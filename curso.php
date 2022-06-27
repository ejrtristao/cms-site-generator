<?php 
session_start();
$_SESSION['title-page'] = 'Cursos';
require('./_layouts/header_curso.php'); 
$db = new SQLite3('./admin/db/sites.db');

$list = $db->query("SELECT * FROM sites WHERE id = 1");
$site = $list->fetchArray();

$id = $_GET['id'];

$list = $db->query("SELECT * FROM sites_cursos WHERE id = ".$id);
$row = $list->fetchArray();

?>

<section class="page-title" style="background: url(images/resources/page-title.jpg);">
    <div class="container clearfix">
        <div class="title pull-left">
            <h2>Curso Online</h2>
        </div>
        <ul class="title-manu pull-right">
            <li style="color: #FFF"><?php echo $row['category'] ?></li>
            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
            <li><?php echo $row['title'] ?></li>
        </ul>
    </div>
</section>

<section class="courses-list-section sp-ten">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-sm-12">
                <div class="left-side-area">

                    <div class="image-content">
                        <div class="courses-bottom clearfix">
                            <div class="text-left float-left">
                                <h6><?php echo $row['title'] ?></h6>
                                <ul class="ratting-star">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                </ul>
                            </div>

                        </div>
                        <div class="content-text">
                            <p><?php echo nl2br($row['description'])  ?></p>
                        </div>
                    </div>

                    <!--Start Course Search Section-->
                    <section class="course-search">
                        <div class="container">
                            <div class="course-search-bg">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12">
                                        <div class="course-search-title text-center">
                                            <div class="icon">
                                                <figure>
                                                    <img src="images/icon/course-logo.png" alt="">
                                                </figure>
                                            </div>
                                            <h5>Contato</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-12 col-md-12">
                                        <form class="form-style-one form-area-one" name="contact_form" action="<?=$site['link_whatsapp']?>" method="get">
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group button-area">
                                                        <button class="thm-btn bg-clr2" type="submit" style="float: right"><span class="fa fa-whatsapp" aria-hidden="true"></span> Faça sua Matrícula Agora!</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--End Course Search Section-->

                </div>
            </div>
            <div class="col-xl-4 col-sm-12">
                <div class="right-side-bar">
                    <div class="login-area two">
                        <div class="sec-title-one pb-one">
                            <h6>Fale Conosco</h6>
                        </div>
                        <div class="link-btn">
                            <a href="<?=$site['link_whatsapp']?>" target="_blank" class="thm-btn bg-clr1">Contato WhatsApp</a>
                        </div>
                    </div>
                    <div class="side-menu">
                        <div class="item-six">
                            <div class="free-consultation">
                                <div class="sec-title-one pb-one">
                                    <h6>Dúvidas?</h6>
                                </div>
                                <div class="color-text">
                                    <p><i class="fa fa-phone" aria-hidden="true"></i><?=$site['phone']?></p>
                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i><?=$site['address']?><br><?=$site['address2']?> - <?=$site['city']?>/<?=$site['state']?></p>
                                    <p><i class="fa fa-envelope" aria-hidden="true"></i><?=$site['email']?></p>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="image-box">
                        <figure>
                            <img src="./_resources/images/cursos/<?= $row['photo']  ?> " />
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include('./_layouts/footer.php'); 
?>

