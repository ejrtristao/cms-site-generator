<?php 
session_start(); 
$_SESSION['sub-title-page'] = 'Contato';
require('./_layouts/header.php'); 
$db = new SQLite3('./admin/db/sites.db');
$list = $db->query("SELECT * FROM sites WHERE id = 1");
$site = $list->fetchArray();
?>
<!--Contact Section-->
<section class="contact-section sp-ten">
    <div class="container">
        <div class="map-area" style="margin-bottom: 40px">
            <div class="google-map-area">
                <iframe src="<?=$site['url_maps']?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="contact-area">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="left-side">
                        <div class="text-title">
                            <h5>Dados de Contato</h5>
                        </div>
                        <div class="social-links">
                            <div class="item">
                                <div class="icon-box">
                                    <i class="flaticon-home-button"></i>
                                </div>
                                <div class="icon-text">
                                    <p><?=$site['address']?> <br /> <?=$site['address2']?> - <?=$site['city']?>/<?=$site['state']?></p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon-box">
                                    <i class="flaticon-phone-call"></i>
                                </div>
                                <div class="icon-text">
                                    <p><?=$site['phone']?></p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon-box">
                                    <i class="flaticon-message"></i>
                                </div>
                                <div class="icon-text">
                                    <p><?=$site['email']?></p>
                                </div>
                            </div>
                        </div>                                           
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="right-side">
                        <div class="text-title"> 
                            <h5>Formulário de Contato</h5>
                        </div>
                        <form id="contact_form" name="contact_form" action="sendmail.php" method="post">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="form_name" class="form-control" value="" placeholder="Seu Nome" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input type="email" name="form_email" class="form-control" value="" placeholder="Seu Email" required="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="tel" name="form_phone" class="form-control" value="" placeholder="Seu Telefone" required="">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-sm-12">
                                    <div class="form-group">
                                        <textarea name="form_message" class="form-control textarea required" placeholder="Digite sua mensagem..."></textarea>
                                    </div>
                                    <div class="form-group form-bottom">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button class="thm-btn bg-clr1" type="submit" data-loading-text="Enviando...">Enviar Mensagem</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>                    
        </div>
    </div>
</section>
<!--End Contact Section-->

<!-- gmap helper -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBevTAR-V2fDy9gQsQn1xNHBPH2D36kck0"></script>

<script src="resources/js/gmaps.js"></script>
<script src="resources/js/map-helper.js"></script>

<?php include('./_layouts/footer.php'); ?>