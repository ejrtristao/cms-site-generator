<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Sistema de Login :: CMS</title>
	<meta charset="UTF-8" />
	<!-- Estilos da Index.php -->
	<style type="text/css">
		body {
			background: linear-gradient(45deg, #f0f9ff 10%, #cbebff 47%, #a1dbff 100%);
		}

		div.global {
			width: 40%;
			height: auto;
			background-color: #fff;
			border: 1px solid #606060;
			padding: 50px;
			box-shadow: 0px 0px 10px #000;
			margin-top: 10%;
			/* Centralizando a div 
			
			*O atributo text-align foi depreciado. 
			
			*/
			margin-left: auto;
			margin-right: auto;
		}

		input[type='text'],
		input[type='password'] {
			width: 300px;
			height: 25px;
			border: solid 1px #606060;
			border-radius: 5px;
		}

		input[type='password'] {
			margin-left: 10px;
		}

		input[type='submit'] {
			width: 150px;
		}
	</style>
</head>

<body>
	<div class="global">
		<form method="post">
			<label>Usuário: <input type="text" name="user" /></label><br /><br />
			<label>Senha: <input type="password" name="pass" /></label><br /><br />
			<input type="submit" name="submit" />
		</form>
		<?php
		include('.config.inc.php');
		$user = @$_REQUEST['user'];
		$pass = @$_REQUEST['pass'];

		if (isset($_REQUEST['submit'])) {
			$conn = new Connection();
			$conn->connect($user, $pass);
		}

		?>
	</div>
</body>

</html>