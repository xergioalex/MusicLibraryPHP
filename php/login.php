<?php include 'projectDB.php'; ?>

<?php
	session_start();

	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];

    $existeusuario = false;

    //Conexion para buscar usuario
	$conexion = new ProjectDB('../database/multimedia.db') or die('Ha sido imposible establecer la conexión');

	$consulta = "SELECT * FROM usuarios;";
	$resultado = $conexion->query($consulta);

	while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
		$usuariobasedatos = $fila['usuario'];
		$contrasenabasedatos = $fila['contrasena'];
		$permisosbase = $fila['permisos'];

		if ($usuariobasedatos == $usuario and $contrasenabasedatos == $contrasena) {
            $existeusuario = true;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['contrasena'] = $contrasena;
			$_SESSION['permisos'] = $permisosbase;
			echo '<meta http-equiv = "REFRESH" content="0;url=../multimedia.php">';
		}

	}
    // Cerrar
	$conexion->close();

    if (!$existeusuario) {
        echo '<meta http-equiv = "REFRESH" content="0;url=../multimedia.php?exist=true">';
    }
?>