<?php
include './layouts/header.php';
$db = new SQLite3('./db/sites.db');

$list = $db->query("SELECT * FROM sites_slide");

$title = null;
$subtitle = null;
$image = null;
$link1 = null;
$description1 = null;
$link2 = null;
$description2 = null;
$icon = null;

if (isset($_GET['id'])) {
    $edit = $db->query("SELECT * FROM sites_slide WHERE id =" . $_GET['id']);
    $res = $edit->fetchArray();
    $title = $res['title'];
    $subtitle = $res['subtitle'];
    $image = $res['image'];
    $link1 = $res['link1'];
    $description1 = $res['description1'];
    $link2 = $res['link2'];
    $description2 = $res['description2'];
    $icon = $res['icon'];
}

?>
<div>
    <h3>Slides</h3>

    <div>
        <?php
        if (isset($_GET['id'])) {
            echo '<form action="./db/db_slide.php?type=edit" method="post"  enctype="multipart/form-data">';
            echo '<input type="hidden" class="form-control" value="' . $_GET['id'] . '"  name="id" id="id">';
        } else {
            echo '<form action="./db/db_slide.php?type=new" method="post" enctype="multipart/form-data">';
        }
        ?>
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" value="<?= $title ?>" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Subtítulo</label>
            <input type="text" class="form-control" value="<?= $subtitle ?>" name="subtitle" id="subtitle">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imagem</label>
            <br />
            <img id="image_preview" src="#" class="img-responsive" style="display: none; width: 200px;" />
            <?php
            if ($image) {
                echo '<img src="../_resources/images/slides/' . $image . '" class="img-responsive"  style="width: 200px;" id="slide" />';
            }
            ?>

            <input type="file" class="form-control" value="<?= $image ?>" name="image" id="image">
        </div>
        <div class="mb-3">
            <label for="icon" class="form-label">Ícone</label>
            <br />
            <img id="icon_preview" src="#" class="img-responsive" style="display: none; width: 200px;" />
            <?php
            if ($icon) {
                echo '<img src="../_resources/images/icon/' . $icon . '" class="img-responsive"  style="width: 200px;" id="icon_full" />';
            }
            ?>

            <input type="file" class="form-control" value="<?= $icon ?>" name="icon" id="icon">
        </div>
        <div class="mb-3">
            <label for="description1" class="form-label">Descrição</label>
            <input type="text" class="form-control" value="<?= $description1 ?>" name="description1" id="description1">
        </div>
        <div class="mb-3">
            <label for="link1" class="form-label">Link 1</label>
            <input type="text" class="form-control" value="<?= $link1 ?>" name="link1" id="link1">
        </div>
        <div class="mb-3">
            <label for="description2" class="form-label">Descrição 2</label>
            <input type="text" class="form-control" value="<?= $description2 ?>" name="description2" id="description2">
        </div>
        <div class="mb-3">
            <label for="link2" class="form-label">Link 2</label>
            <input type="text" class="form-control" value="<?= $link2 ?>" name="link2" id="link2">
        </div>
        <input class="btn btn-lg btn-primary" type="submit" value="Criar">
        </form>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Título</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $list->fetchArray()) { ?>
                <tr>
                    <td><img src="./../_resources/images/slides/<?php echo $row['image']; ?>" height="50" /></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><a href="./slides.php?type=edit&id=<?php echo $row['id']; ?>">Editar</a></td>
                    <td><a href="./db/db_slide.php?type=delete&id=<?php echo $row['id']; ?>">Excluir</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    image.onchange = evt => {
        const [file] = image.files
        if (file) {
            image_preview.src = URL.createObjectURL(file)
            image_preview.style.display = 'block'
            slide.style.display = 'none'
        }
    }
    icon.onchange = evt => {
        const [file] = icon.files
        if (file) {
            icon_preview.src = URL.createObjectURL(file)
            icon_preview.style.display = 'block'
            icon_full.style.display = 'none'
        }
    }
</script>
<?php include './layouts/footer.php'; ?>