<?php //esto es para cerrar la sesión una vez nos hemos loggeado.
	session_start();
	$_SESSIONB = [];//le ponemos un array vacío
	session_destroy();
	header("Location: index.php");
?>