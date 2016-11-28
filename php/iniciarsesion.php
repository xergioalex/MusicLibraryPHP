<?php include 'projectDB.php'; ?>

<?php
    session_start();

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $conexion = new ProjectDB('../database/multimedia.db') or die('Ha sido imposible establecer la conexión');
    $consulta = "SELECT * FROM usuarios";
    $resultado = $conexion->query($consulta);

    $usuarioexiste = false;

    while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
        $usuariobase = $fila['usuario'];
        $contrasenabase = $fila['contrasena'];
        $permisosbase = $fila['permisos'];

		if($usuariobase == $usuario && $contrasenabase == $contrasena){
			$_SESSION['usuario'] = $usuario;
			$_SESSION['contrasena'] = $contrasena;
			$_SESSION['permisos'] = $permisosbase;
			echo '
			<html>
				<head>
					<meta http-equiv = "REFRESH" content="0;url=principal.php">
				</head>
			</html>';
		}
    }

    if ($usuarioenbase) {
        echo '
        <html>
            head>
                <meta http-equiv = "REFRESH" content="0;url=principal.php">
            </head>
        </html>';
    }

    // Cerrar
    $conexion->close();
?>