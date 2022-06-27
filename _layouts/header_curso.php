<?php 
$db = new SQLite3('./admin/db/sites.db');
$list = $db->query("SELECT * FROM sites WHERE id = 1");
$site = $list->fetchArray();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title><?=$site['name']?></title>

	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php include('styles.inc.php') ?>
    
</head>
<body>
<div class="boxed_wrapper">

<!--Start Preloader -->
<div class="preloader"></div>
<!--End Preloader -->  

<header class="main-header">
    <!--Start Header Top Area -->
    <section class="header-style-one">
        <div class="container clearfix">
            <div class="right-side float-right">
                <ul class="top-info">
                    <li><a href="https://ava.eadcursosdetransito.com.br/login" target="_blank"><i class="fa fa-user" aria-hidden="true"></i>Área do Aluno</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--Start Header Top Area -->
    <!--Start header area-->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12">
                    <div class="header-logo">
                        <a href="index.html">
                            <img src="./_resources/images/logo.png" alt="Awesome Logo">
                        </a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="header-contact-info">
                        <ul>
                            <li>
                                <div class="iocn-holder">
                                    <span class="flaticon-home-button"></span>
                                </div>
                                <div class="text-holder">
                                    <strong><?=$site['city']?>/<?=$site['state']?></strong>
                                    <p><?=$site['address']?> - <?=$site['address2']?></p>
                                </div>
                            </li>
                            <li>
                                <div class="iocn-holder">
                                    <span class="flaticon-phone-call"></span>
                                </div>
                                <div class="text-holder">
                                <strong>TELEFONE:</strong>
                                    <p><?=$site['phone']?></p>
                                </div>
                            </li>
                            <li>
                                <div class="link-btn">
                                    <a href="<?=$site['link_whatsapp']?>" target="_blank" class="thm-btn bg-clr1">Contato WhatsApp</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>           
            </div>
        </div>
    </header>
    <!--End header area-->
    <!--Start mainmenu area-->
    <section class="main-menu-one stricky">
        <div class="container">
            <div class="menu-style-one clearfix">
                <nav class="main-menu">
                    <div class="navbar-header">     
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
<?php include('menu.php') ?>
                    </div>
                </nav>
            </div>            
        </div>
    </section>
    <!--End mainmenu area-->
</header>
