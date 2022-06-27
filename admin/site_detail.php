<?php
include './layouts/header.php';
$db = new SQLite3('./db/sites.db');
$row = $db->querySingle("SELECT * FROM sites WHERE id = 1", true);
?>
<div>
    <h3>Editar Campos</h3>
    <form action="./db/db_site.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Nome</label>
            <input type="text" class="form-control" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Logo</label>
            <img src="../_resources/images/logo/<?=$row['logo']?>" class="img-responsive" id="image_logo"  />
            <img id="image_preview" src="#" class="img-responsive"  style="display: none" />
            <input type="file" accept="image/*" class="form-control" value="<?php echo isset($row['logo']) ? $row['logo']: ''; ?>" name="logo" id="logo" >
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Facebook</label>
            <input type="text" class="form-control" value="<?php echo isset($row['facebook']) ? $row['facebook'] : ''; ?>" name="facebook" id="facebook">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Instagram</label>
            <input type="text" class="form-control" value="<?php echo isset($row['instagram']) ? $row['instagram'] : ''; ?>" name="instagram" id="instagram">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">E-mail</label>
            <input type="text" class="form-control" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Fone/Whats</label>
            <input type="text" class="form-control" value="<?php echo isset($row['phone']) ? $row['phone'] : ''; ?>" name="phone" id="phone">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Endereço</label>
            <input type="text" class="form-control" value="<?php echo isset($row['address']) ? $row['address'] : ''; ?>" name="address" id="address">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Bairro</label>
            <input type="text" class="form-control" value="<?php echo isset($row['address2']) ? $row['address2'] : ''; ?>" name="address2" id="address2">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Cidade</label>
            <input type="text" class="form-control" value="<?php echo isset($row['city']) ? $row['city'] : ''; ?>" name="city" id="city">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Estado</label>


            <select id="state" name="state" class="form-control">

            <?php 
            if(isset($row['state'])) {
                echo '<option value="' . $row['state'] . '" selected>' . $row['state'] . '</option>';
            }
            ?>
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espírito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>
</select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Google Maps</label>
            <input type="text" class="form-control" value="<?php echo isset($row['url_maps']) ? $row['url_maps'] : ''; ?>" name="url_maps" id="url_maps">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Link Whatsapp</label>
            <input type="text" class="form-control" value="<?php echo isset($row['link_whatsapp']) ? $row['link_whatsapp'] : ''; ?>" name="link_whatsapp" id="link_whatsapp">
        </div>

        <input type="hidden" name="id" value="1" />
        <input class="btn btn-primary" type="submit" value="Salvar" />
    </form>
</div>

<script>
    logo.onchange = evt => {
  const [file] = logo.files
  if (file) {
    image_preview.src = URL.createObjectURL(file)
    image_preview.style.display = 'block'
    image_logo.style.display = 'none'

  }
}
</script>
<?php include './layouts/footer.php'; ?>