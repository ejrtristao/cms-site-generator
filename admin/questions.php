<?php
include './layouts/header.php';
$db = new SQLite3('./db/sites.db');

$list = $db->query("SELECT * FROM sites_questions");


if(isset($_GET['id'])){
    $edit = $db->query("SELECT * FROM sites_questions WHERE id =" . $_GET['id']);
    $res = $edit->fetchArray();
    $question = $res['question'];
    $answer = $res['answer'];
    $id = $res['id'];
}else{
    $question = '';
    $answer = '';
}



?>
<div>
    <h3>Perguntas e respostas</h3>

    <div>
<?php
if(isset($_GET['id'])){
    echo '<form action="./db/db_question.php?type=edit" method="post">';
    echo '<input type="hidden" class="form-control" value="'. $_GET['id'].'"  name="id" id="id">';
}else{
    echo '<form action="./db/db_question.php?type=new" method="post">';
}
?>
    <div class="mb-3">
            <label for="question" class="form-label">Pergunta</label>
            <input type="text" class="form-control" value="<?=$question?>"  name="question" id="question">
        </div>
        <div class="mb-3">
            <label for="answer" class="form-label">Resposta</label>
            <input type="text" class="form-control" value="<?=$answer?>" name="answer" id="answer">
        </div>
        <input class="btn btn-lg btn-primary" type="submit" value="Criar">
    </form>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pergunta</th>
                <th>Resposta</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $list->fetchArray()) { ?>
                <tr>
                    <td><?php echo $row['question']; ?></td>
                    <td><?php echo $row['answer']; ?></td>
                    <td><a href="./questions.php?type=edit&id=<?php echo $row['id']; ?>">Editar</a></td>
                    <td><a href="./db/db_question.php?type=delete&id=<?php echo $row['id']; ?>">Excluir</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include './layouts/footer.php'; ?>