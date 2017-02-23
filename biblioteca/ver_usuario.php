<?php
	include_once('usuario_modelo.php');
	include_once('libro_modelo.php');
	include('login_snippet.php');

	$usuario = obtenerUsuarioPorId($_GET["id"]);
	$libros = obtenerLibroPorUsuarioId($_GET["id"]);
?>
<?php // esto lo que hace es crear un buffer lo que esta entre los dos OB, ws decir el contenido de la página, lo que cambia.
	ob_start();
?>

	<h1>Ver usuario</h1>

	<table class="table table-bordered table-striped">
		<tr>
			<th>Nombre:</th>
			<td><?= $usuario["nombre"] ?></td>
		</tr>
		<tr>
			<th>Correo electrónico:</th>
			<td><?= $usuario["email"] ?></td>
		</tr>
	</table>

	<h3>Libros prestados</h3>

	<?php

		if (count($libros) <= 0):
	?>
		<p>Este usuario no tiene libro prestados</p>

	<?php	

	else:

	?>


	<table class="table table-bordered table-striped col-md-8 col-offset-2">
		<thead>
			<tr>
				<th>Titulo Libro</th>				
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
		<?php
			foreach ($libros as $libro):
		?>
			<tr>
				<td><?= $libro["titulo"] ?></td>
				<td>
					<a href="devolver_libro.php?libro_id=<?= $libro['id']?>&usuario_id=<?=$usuario['id']?>" class="btn btn-info btn-xs">
						<span class="glyphicon glyphicon-log-in"  aria-hidden="true"></span>  Devolver
					</a>
				</td>
			</tr>
		</tbody>
			<?php
				endforeach;
			?>
	</table>

	<?php
		endif;
	?>


<?php // sto lo que hace es crear un buffer lo que esta entre los dos OB`s
	$contenidoDeLaPagina = ob_get_contents(); //esto dice que meteto todo en la varible $contenido de la pagina 
	ob_end_clean(); //aquí se limìa el buffer
	$tituloDeLaPagina = "Detalles Usuario";

	include ('master.php'); //con esto se imprime la página
?>