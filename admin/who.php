<?php
include './layouts/header.php';
$db = new SQLite3('./db/sites.db');
$list = $db->query("SELECT * FROM sites_who LIMIT 1");
$row = $list->fetchArray();
?>
<div>
    <h3>Quem Somos</h3>
    <form action="db/db_who_update.php" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Descrição curta</label>
            <input type="text" class="form-control" value="<?= $row['title'] ?>" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição completa</label>
            <textarea class="form-control" id="description" rows="3" name="description"><?= $row['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Foto</label>
            <input type="file" class="form-control" value="<?= $row['photo'] ?>" name="photo" id="photo">
        </div>
        <input class="btn btn-lg btn-primary" type="submit" value="Criar">
    </form>
</div>
<?php
include './layouts/footer.php';
?>