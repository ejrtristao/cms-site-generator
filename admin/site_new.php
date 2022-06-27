<?php include './layouts/header.php'; ?>
<div>
    <h3>Novo Site</h3>
    <form action="./db/db_site.php" method="post">
        <label for="nome">Título do site:</label>
        <input type="text" name="name" id="name" required>
        <input type="submit" value="Criar">
    </form>
</div>
<?php include './layouts/footer.php'; ?>