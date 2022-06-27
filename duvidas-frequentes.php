<?php 
session_start(); 
$_SESSION['sub-title-page'] = 'FAQ';
require('./_layouts/header.php'); 

$db = new SQLite3('./admin/db/sites.db');
$list = $db->query("SELECT * FROM sites_questions");

$q = '';

while ($questions = $list->fetchArray()) {
    $q .= '<div class="col-xl-12 col-md-12 col-sm-12">
    <div class="blog-item-one">
    <div class="image-text">
    <h6>'.$questions['question'].'</h6>
    <p>'.$questions['answer'].'</p>
    </div>
    </div>
    </div>';
}
?>

<section class="blog-grid-section sp-three">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-sm-12">
                <div class="left-side-area">
                    <div class="row">
                    <?= $q; ?>
                    </div>
                                                                          
                </div>
            </div>
            
        </div>
    </div>
</section>

<?php include('./_layouts/footer.php'); ?>