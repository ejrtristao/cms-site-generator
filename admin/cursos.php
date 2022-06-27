<?php
include './layouts/header.php';
$db = new SQLite3('./db/sites.db');

$list = $db->query("SELECT * FROM sites_cursos");


if (isset($_GET['id'])) {
    $edit = $db->query("SELECT * FROM sites_cursos WHERE id =" . $_GET['id']);
    $res = $edit->fetchArray();
    $title = $res['title'];
    $description = $res['description'];
    $category = $res['category'];
    $photo = $res['photo'];
    $id = $res['id'];
} else {
    $title = '';
    $description = '';
    $photo = '';
    $category = '';
}
?>
<div>
    <h3>Cursos</h3>

    <div>
        <?php
        if (isset($_GET['id'])) {
            echo '<form action="./db/db_curso.php?type=edit" method="post"  enctype="multipart/form-data">';
            echo '<input type="hidden" class="form-control" value="' . $_GET['id'] . '"  name="id" id="id">';
        } else {
            echo '<form action="./db/db_curso.php?type=new" method="post"  enctype="multipart/form-data">';
        }
        ?>

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" value="<?= $title ?>" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" name="description" rows="18"><?= $description ?></textarea>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Foto</label>
            <input accept="image/*" type="file" class="form-control" value="<?= $photo ?>" name="photo" id="photo">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select name="category" class="form-control">
                <option value="">Selecione</option>
                <option value="Capacitação">Capacitação</option>
                <option value="Atualização">Atualização</option>
                <option value="Reciclagem">Reciclagem</option>
            </select>
        </div>
        <input class="btn btn-lg btn-primary" type="submit" value="Criar">
        </form>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Categoria</th>
                <th>Foto</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $list->fetchArray()) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><img src="./../_resources/images/cursos/<?php echo str_replace(['ã', 'ç'], ['a', 'c'], strtolower($row['category'])); ?>/<?php echo $row['photo']; ?>" height="50" /></td>
                    <td><a href="./cursos.php?type=edit&id=<?php echo $row['id']; ?>">Editar</a></td>
                    <td><a href="./db/db_curso.php?type=delete&id=<?php echo $row['id']; ?>">Excluir</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include './layouts/footer.php'; ?>