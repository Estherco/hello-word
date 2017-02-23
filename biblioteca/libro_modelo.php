<?php

include_once('conexion.php');

function obtenerTodosLosLibros() {
		$consulta = "SELECT * FROM libros";
		$libros = hacerListado($consulta);
		return $libros;
}

// Función de paginación
function obtenerLibrosPorPagina($pagina, $registrosPorPagina=6) {
		$offset = ($pagina - 1) * $registrosPorPagina;
		$consulta = "SELECT * FROM libros LIMIT $offset, $registrosPorPagina";
		$libros = hacerListado($consulta);
		return $libros;
	}

function obtenerLibroPorUsuarioId($usuario_id) {
		$consulta = "SELECT * FROM libros WHERE usuario_id='$usuario_id'";
		$libros = hacerListado($consulta);
		return $libros;
}

function devolverLibroPorId($id) {
		$consulta = "UPDATE libros SET usuario_id=NULL WHERE id='$id'";
		$libros = ejecutarConsulta($consulta); //ahora es ejecutar consulta porqyue solo se refiere a una tabla.
		return $libros;
}

function obtenerLibroPorId($id) {
		$consulta = "SELECT * FROM libros WHERE id='$id'";
		$libros = hacerListado($consulta);
		if (count($libros) <= 0) {
			return false;
		} else {
			return $libros[0];
		}
	}

function prestarLibroAUsuarioId($libro_id, $usuario_id) {
		$consulta = "UPDATE libros SET usuario_id='$usuario_id' WHERE id='$libro_id'";
		$resultado = ejecutarConsulta($consulta);
		return $resultado;
}


?>