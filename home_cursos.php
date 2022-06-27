<?php 


$db = new SQLite3('./admin/db/sites.db');
$list = $db->query("SELECT * FROM sites_cursos");
// $row = $list->fetchArray();
$c = "";
while($value = $list->fetchArray()) {
    $c .= '
    <article class="col-xl-4 col-lg-6 col-sm-12 filter-item '.str_replace(['ç', 'ã'], ['C', 'A'], strtoupper($value['category'])).' Growth">
    <div class="gallery-item">
        <div class="image-box">
            <img src="./_resources/images/cursos/'. $value['photo']  .'" />
            <div class="overlay">
                <a class="link-btn" href="curso.php?id='.$value['id'].'">
                    <i class="fa fa-link"></i>
                </a>
            </div>
        </div>
        <div class="image-content">
            <div class="date-box">
                <h6>EAD</h6>
            </div>
            <div class="reting clearfix">
                <div class="float-left">
                    <div class="reting-star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="float-right">
                    <a href="curso.php?id='.$value['id'].'">Acessar</a>
                </div>
            </div>
            <div class="bottom-text">
                <h6><a href="curso.php?id='.$value['id'].'">'.$value['title'].'</a></h6>
            </div>
            <div class="info clearfix">
                <div class="float-left"><p><i class="fa fa-book" aria-hidden="true"></i>'. $value['category'] .'</p></div>
            </div>                       
        </div>                        
    </div>                    
</article> ';
}
?>



<section class="gallery-section sp-three">
    <div class="container">
        <div class="title-area clearfix">
            <div class="sec-title-one pb-one">
                <h4>Nossos Cursos</h4>
            </div>
            <div class="gallery-filter">
                <ul class="post-filter">
                    <li class="active" data-filter=".filter-item">
                        <span>Todos Cursos</span>
                    </li>
                    <li data-filter=".CAPACITACAO">
                        <span>Capacitação</span>
                    </li>
                    <li data-filter=".ATUALIZACAO">
                        <span>Atualização</span>
                    </li>
                    <li data-filter=".RECICLAGEM">
                        <span>CNH Suspensa</span>
                    </li>
                </ul>
            </div>
        </div>           

        <div class="row filter-layout">
            <?= $c ?>
        </div>
    </div>
</section>