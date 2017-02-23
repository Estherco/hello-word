<?php
	include_once('conexion.php');

	function obtenerTodosLosUsuarios() {
		$consulta = "SELECT * FROM usuarios";
		$usuarios = hacerListado($consulta);
		return $usuarios;
	}

	function obtenerUsuariosOrdenadosPor($orden) {
		$consulta = "SELECT * FROM usuarios ORDER BY $orden";
		$usuarios = hacerListado($consulta);
		return $usuarios;
	}

	function obtenerUsuariosYLibrosPrestados() {
		$consulta = "SELECT usuarios.id, usuarios.nombre, usuarios.email, COUNT(libros.id) AS librosPrestados FROM usuarios LEFT JOIN libros ON usuarios.id = libros.usuario_id GROUP BY usuarios.id";
		$usuarios = hacerListado($consulta);
		return $usuarios;
	}

	function obtenerUsuarioPorId($id) {
		$consulta = "SELECT * FROM usuarios WHERE id='$id'";
		$usuarios = hacerListado($consulta);
		if (count($usuarios) <= 0) {
			return false;
		} else {
			return $usuarios[0];
		}
	}

	function obtenerUsuarioPorEmail($email) {
		$consulta = "SELECT * FROM usuarios WHERE email='$email'";
		$usuarios = hacerListado($consulta);
		if (count($usuarios) <= 0) {
			return false;
		} else {
			return $usuarios[0];
		}
	}

	function eliminarUsuarioPorId($id) {
		$consulta = "DELETE FROM usuarios WHERE id='$id'";
		$resultado = ejecutarConsulta($consulta);
		return $resultado;
	}

	function guardarUsuario($datos) {
		$consulta = consultaInsert($datos, "usuarios");
		$resultado = ejecutarConsulta($consulta);
		return $resultado;
	}

	function obtenerUsuarioPorEmailYContrasena($email, $contrasena) {
		$consulta = "SELECT * FROM usuarios WHERE email='$email' AND contrasena='$contrasena'";
		$usuarios = hacerListado($consulta);
		if (count($usuarios) <= 0) {
			return false;
		} else {
			return $usuarios[0];
		}
	}

	function cifrarContrasena($contrasena) {
		return sha1($contrasena);
	}

	function comprobarErroresUsuario($datos) {
		if (empty($datos["nombre"])) {
			return "Debe completar el nombre";
		}

		if (empty($datos["email"])) {
			return "Debe completar el correo electrónico";
		}

		if (empty($datos["contrasena"])) {
			return "Debe completar la contraseña";
		}
		if ($datos["contrasena"] != $datos["contrasena2"]) {
			return "Las contraseñas no coinciden";
		}

		if (obtenerUsuarioPorEmail($datos["email"]) != false) {
			return "Ese correo electrónico ya está registrado";
		}

		return false;
	}
?>