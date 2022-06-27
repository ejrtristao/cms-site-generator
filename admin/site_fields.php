<?php
include './layouts/header.php';
$id = $_GET['id'];

$db = new SQLite3('./db/sites.db');
$list = $db->query("SELECT * FROM site_details WHERE site_id = " . $id);
?>
<div>
    <h3>Editar Campos</h3>
    <form action="./db/db_site_fields_update.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $list->fetchArray()) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <?php
                            $type = $db->query("SELECT * FROM category_detail WHERE id = " . $row['category_detail_id']);
                            $type = $type->fetchArray();
                            if($type['type'] == 'text') {
                                echo '<td><input type="text" name="' . $row['id'] . '" value="' . $row['value'] . '"></td>';
                            } else if($type['type'] == 'textarea') {
                                echo '<td><textarea name="' . $row['id'] . '">' . $row['value'] . '</textarea></td>';
                            } else if($type['type'] == 'image') {
                                echo '<td><input type="file" name="' . $row['id'] . '" value="' . $row['value'] . '"></td>';
                            }
                        ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <input type="hidden" name="site_id" value="<?php echo $id; ?>" />
        <input type="submit" value="Salvar" />
    </form>
</div>
<?php include './layouts/footer.php'; ?>