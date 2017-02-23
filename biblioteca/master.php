<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=  empty($tituloDeLaPagina) //si está vacío titulo de la página pon: bibliotec, sino, el titulo de la página
				? "biblioteca"
				: $tituloDeLaPagina;
			?> 
	</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
	<?php
		include('navbar.php');
	?>

<div class="container-fluid">

<?= $contenidoDeLaPagina ?> <!-- aquí va el contenido de la página, es decir lo que o es igual. Esto hay que hacer en todas las páginas-->

</div>
</body>
</html>