<?php
	include('login_snippet.php');
	include_once('libro_modelo.php');
	include_once('usuario_modelo.php');

	$libro = obtenerLibroPorId($_GET["id"]);
	$usuarios = obtenerUsuariosOrdenadosPor("nombre");

	if ($libro["usuario_id"] != NULL) {
		echo "Ese libro ya está prestado a otro usuario";
	} else if($_POST) {
		$resultado = prestarLibroAUsuarioId($_POST["libro_id"], $_POST["usuario_id"]);
		if ($resultado == true) {
			header("Location: ver_usuario.php?id=" . $_POST["usuario_id"]);
		}
	}

?>
<?php // esto lo que hace es crear un buffer lo que esta entre los dos OB, ws decir el contenido de la página, lo que cambia.
	ob_start();
?>
<h1 align="center">Prestar libro </h1><br/>
	<form method="POST" class="form-horizontal">

		<div class="well col-md-8 col-md-offset-2">

			<div class="form-group">
    			<label for="titulo" class="col-md-4 control-label">Título del libro</label>
    			<div class="col-md-8">
      				<input type="text" class="form-control" id="titulo" name="titulo" disabled="disabled" value="<?= $libro["titulo"] ?>">
      				<input type="hidden" name="libro_id" value="<?= $libro["id"] ?>">
    			</div>
  			</div>

			<div class="form-group">
    			<label for="usuario" class="col-md-4 control-label">Usuario</label>
    			<div class="col-md-8">
    				<select id="usuario_id" name="usuario_id" class="form-control">
    				<?php
    					foreach ($usuarios as $usuario):
    				?>
  						<option value="<?= $usuario["id"] ?>"><?= $usuario["nombre"] ?></option>
    				<?php
    					endforeach;
    				?>	
  
					</select>
    			</div>
  			</div>

			
  			<button type="submit" class="btn btn-primary center-block">Prestar</button>

		</div>
	</form>

<?php // sto lo que hace es crear un buffer lo que esta entre los dos OB`s
	$contenidoDeLaPagina = ob_get_contents(); //esto dice que meteto todo en la varible $contenido de la pagina 
	ob_end_clean(); //aquí se limìa el buffer.
	$tituloDeLaPagina = "Préstamo de libros";

	include ('master.php'); //con esto se imprime la página
?>