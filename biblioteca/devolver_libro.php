<?php
	include_once('libro_modelo.php');

	$resultado = devolverLibroPorId($_GET['libro_id']); 
	if ($resultado == false) {
		echo "<p>Ha ocurrido un error</p>";
	} else {
		header("Location:ver_usuario.php?id=" . $_GET["usuario_id"]);
	}
?>