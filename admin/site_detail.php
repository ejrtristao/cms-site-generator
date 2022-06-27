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
            <div id="display_image"></div>
            <img src="../_resources/images/logo/logo.png" />
            <input type="file" accept="image/*" class="form-control" value="<?php echo isset($row['logo']) ? $row['logo']: ''; ?>" name="logo" id="logo">
        </div>
        <!-- <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" class="form-control" value="<?php //echo isset($row['url']) ? $row['url']:'' ; 
                                                            ?>" name="name" id="name">
        </div> -->
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
            <input type="text" class="form-control" value="<?php echo isset($row['state']) ? $row['state'] : ''; ?>" name="state" id="state">
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

<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('flArquivo').addEventListener('change', handleFileSelect, false);

        function handleFileSelect(evt) {
            if (document.getElementById("slTipoArquivo").value == 2) { //Tira esta linha
                document.getElementById('list').innerHTML = "";
                var files = evt.target.files; // FileList object
                for (var i = 0, f; f = files[i]; i++) {

                    if (!f.type.match('image.*')) {
                        continue;
                    }

                    var reader = new FileReader();

                    // Closure to capture the file information.
                    reader.onload = (function(theFile) {
                        return function(e) {
                            // Render thumbnail.
                            var span = document.createElement('span');
                            span.innerHTML = ['<img style="max-width:550px; width: 100%;" data-caption="Imagem de pré visualização" class="thumb responsive-img materialboxed" src="', e.target.result,
                                '" title="', escape(theFile.name), '"/>'
                            ].join('');
                            document.getElementById('list').insertBefore(span, null);
                        };
                    })(f);

                    // Read in the image file as a data URL.
                    reader.readAsDataURL(f);
                }
            } //Tira esta linha
        }

    }, false);
</script> -->
<?php include './layouts/footer.php'; ?>