<?php
	include_once('libro_modelo.php');
	include('login_snippet.php');

	if (isset($_GET["pagina"])) {
		$pagina = $_GET["pagina"];
	} else {
		$pagina = 1;
	}

	$libros = obtenerLibrosPorPagina($pagina);
?>


<?php
	ob_start(); /*ESTO ES UN BUFFER, una especie de almacen donde guardaremos todo lo que ponemos a raiz de esto en el codigo*/
?>

<h1>Lista de libros</h1>

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
					<a href="#" class="btn btn-info btn-xs">
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Ver
					</a>
					<a href="#" class="btn btn-success btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
					</a>
					<a href="prestar_libro.php?id=<?= $libro['id'] ?>" class="btn btn-warning btn-xs">
						<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Prestar
					</a>
					<a href="#" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
					</a>
					
				</td>
			</tr>
		<?php
			endforeach;
		?>
		</tbody>
	</table>

<?php
	$contenidoDeLaPagina = ob_get_contents();/*Con esto LO GUARDAMOS en la VARIABLE que establecimos antes en la PAGINA MASTER*/
	$tituloDeLaPagina = "Lista de libros";
	ob_end_clean(); /*Acaba con el CONTENIDO del BUFFER, lo cierra y lo limpia*/

/*PONEMOS el INCLUDE para que MUESTRE la pagina, ya que lo que hace el OB_START y el OB_CLEAN es almacenar la informacion que esta entre ambas etiquetas, esta informacion se manda a la pagina MASTER mediante una VARIABLE ($contenidoDeLaPagina) y a continuacion metemos en INCLUDE para que meta la INFORMACION GUARDADA y la estructura creada anteriormente en la MASTER*/
	include ('master.php');
?>