<?php
	include ('usuario_modelo.php');
	include('login_snippet.php');
	
	if (!empty($_GET["id"])) {
		$resultado = eliminarUsuarioPorId($_GET["id"]);
		if ($resultado == true) {
			header("Location: lista_usuarios.php");
		}
	} else {
		header("Location: lista_usuarios.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Biblioteca</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
	<?php
		if ($resultado == false):
	?>
	<p class="alert alert-danger">No se ha encontrado ese usuario.</p>
	<?php
		endif;
	?>
</body>
</html>