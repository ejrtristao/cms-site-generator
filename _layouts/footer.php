<?php 
$db = new SQLite3('./admin/db/sites.db');
$list = $db->query("SELECT * FROM sites WHERE id = 1");
$site = $list->fetchArray();
?>
<!--main-footer-->
<footer class="main-footer bg-four sp-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 footer-colmun text-center">
                <div class="footer-clomun footer-about-widget">
                    <div class="footer-logo">
                        <figure>
                            <a href="home"><img src="./_resources/images/logo/logo.png" alt=""></a>
                        </figure>
                    </div>
                    <p><?=$site['name']?><br><span class="font-italic" style=" color: #FFF; font-size: 70%">REVENDA AUTORIZADA DA EAD RIO BRANCO</span></p>
                    <ul class="social-links">
                        <li><a href="https://<?=$site['facebook'] ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="<?=$site['instagram'] ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
                             
            
            
        </div>
    </div>   
</footer>
<!--End main-footer--> 


<!--Start Footer Bottom--> 
<section class="footer-bottom bg-three">
    <div class="container">
        <div class="bottom-text text-center">
            <p>Desenvolvido por <a href="https://www.kowata.com.br" target="_blank"><img src="./_resources/images/kowata.png" alt="[LOGO] Kowata Stúdio Web"></a></p>
        </div>
    </div>
</section>
<!--End Footer Bottom-->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html">
    <span class="fa fa-angle-up"></span>
</div>
<!--End Scroll to top-->
<?php include 'scripts.inc.php'; ?>
</div>
</body>
</html>