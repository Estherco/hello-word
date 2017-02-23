<?php
	include('usuario_modelo.php');

	session_start();
	if ($_POST) {
		$usuario = obtenerUsuarioPorEmailYContrasena($_POST["email"], cifrarContrasena($_POST["contrasena"]));
		if ($usuario == false) {
			$mensajeError = "El email o contraseña no coinciden";
		} else {
			$_SESSION["usuario"] = $usuario;
			header("Location: lista_usuarios.php");
		}
	}
?>

<?php // esto lo que hace es crear un buffer lo que esta entre los dos OB, ws decir el contenido de la página, lo que cambia.
	ob_start();
?>

	<h1>Identificación de usuarios</h1>

	<?php
		if (!empty($mensajeError)) {
			echo '<p class="alert alert-danger">' . $mensajeError . '</p>';
		}
	?>

	<form method="POST" class="form-horizontal">

		<div class="well col-md-8 col-md-offset-2">

			<div class="form-group">
    			<label for="email" class="col-md-4 control-label">Correo electrónico</label>
    			<div class="col-md-8">
      				<input type="email" class="form-control" id="email" placeholder="Correo electrónico" name="email">
    			</div>
  			</div>

			<div class="form-group">
    			<label for="contrasena" class="col-md-4 control-label">Contraseña</label>
    			<div class="col-md-8">
      				<input type="password" class="form-control" id="contrasena" placeholder="Contraseña" name="contrasena">
    			</div>
  			</div>

  			<button type="submit" class="btn btn-primary center-block">Identifícate</button>

  			<a href="nuevo_usuario.php" class="btn btn-default pull-right">Regístrate</a>

		</div>
	</form>
<?php // sto lo que hace es crear un buffer lo que esta entre los dos OB`s
	$contenidoDeLaPagina = ob_get_contents(); //esto dice que meteto todo en la varible $contenido de la pagina 
	ob_end_clean(); //aquí se limìa el buffer

	include ('master.php'); //con esto se imprime la página
?>