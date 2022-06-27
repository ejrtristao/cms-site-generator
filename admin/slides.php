<?php
include './layouts/header.php';
$db = new SQLite3('./db/sites.db');

$list = $db->query("SELECT * FROM sites_slide");
$row = $list->fetchArray();

if(isset($_GET['id'])){
    $edit = $db->query("SELECT * FROM sites_slide WHERE id =" . $_GET['id']);
    $res = $edit->fetchArray();
    $slide = $res['slide'];
    $title = $res['title'];
    $description = $res['description'];
    $id = $res['id'];
}else{
    $slide = '';
    $title = '';
    $description = '';
}

?>
<div>
    <h3>Slides</h3>

    <div>
<?php
if(isset($_GET['id'])){
    echo '<form action="./db/db_slide.php?type=edit" method="post">';
    echo '<input type="hidden" class="form-control" value="'. $_GET['id'].'"  name="id" id="id">';
}else{
    echo '<form action="./db/db_slide.php?type=new" method="post">';
}
?>
        <div class="mb-3">
            <label for="slide" class="form-label">Slide</label>
            <input type="text" class="form-control" value="<?=$slide?>"  name="slide" id="slide">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" value="<?=$title?>"  name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <input type="text" class="form-control" value="<?=$description?>" name="description" id="description">
        </div>
        <input class="btn btn-lg btn-primary" type="submit" value="Criar">
    </form>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Slide</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $list->fetchArray()) { ?>
                <tr>
                    <td><?php echo $row['slide']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><a href="./slides.php?type=edit&id=<?php echo $row['id']; ?>">Editar</a></td>
                    <td><a href="./db/db_slide.php?type=delete&id=<?php echo $row['id']; ?>">Excluir</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include './layouts/footer.php'; ?>