<html>
<head>
 <title>Upload de imagens</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body>
<div class="container">
<h2><strong>Envio de imagens</strong></h2><hr>

<form method="POST" enctype="multipart/form-data">
  <label for="conteudo">Enviar imagem:</label>
  <input type="file" name="pic" accept="image/*" class="form-control">

  <div align="center">
    <button type="submit" class="btn btn-success">Enviar imagem</button>
  </div>
</form>
 
 <hr>
 
 <?php
 if(isset($_FILES['pic']))
 {
     $target_path = 'logo.' . basename($_FILES["pic"]["type"]);
     $base_dir = realpath(dirname(__FILE__));
     $image_dir = substr($base_dir, 0, -9) . "\_resources\images\logo\\";
     $logo = $image_dir . $target_path;
     $result = @move_uploaded_file($_FILES['pic']['tmp_name'], $logo);
     echo '<img src="../_resources/images/logo/'.$target_path.'" class="img-responsive"  />';
}
 ?>

</div>
<body>
</html>