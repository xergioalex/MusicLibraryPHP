<?php include '../projectDB.php'; ?>

<?php
	session_start();
	$usuario = $_SESSION['usuario'];
	$contrasena = $_SESSION['contrasena'];
    $permisos = $_SESSION['permisos'];

	$idcancion = $_GET['idcancion'];

	//Conectar
	$conexion = new ProjectDB('../../database/multimedia.db') or die('Ha sido imposible establecer la conexión');

    //Consulta
    $consulta = 'SELECT * FROM usuarioscanciones AS uc INNER JOIN relaciones AS r ON uc.idcancion = r.idcancion
                                                       INNER JOIN canciones AS c ON r.idcancion = c.idcancion
                                                       WHERE uc.usuario="'.$usuario.'" AND c.idcancion='.$idcancion.'';

    $resultado = $conexion->query($consulta);
    while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {

        // dirección del archivo
        $directorio = $_SERVER['DOCUMENT_ROOT'].'/MusicLibraryPHP/'.$fila['url'];

        if(file_exists($directorio)){
            unlink($directorio);
        }

        //Eliminar Cancion
        $consultacancion = 'DELETE FROM canciones WHERE idcancion='.$idcancion.' ';
	    $resultadocancion = $conexion->query($consultacancion);

        //Eliminar Relacion
        $consultarelacion = 'DELETE FROM relaciones WHERE idcancion='.$idcancion.' ';
	    $resultadorelacion = $conexion->query($consultarelacion);

        //Eliminar Relacion UsuarioCancion
        $consultausuariocancion = 'DELETE FROM usuarioscanciones WHERE idcancion='.$idcancion.' AND usuario="'.$usuario.'"';
	    $resultadocancion = $conexion->query($consultausuariocancion);

    }


	// Cerrar
	$conexion->close();

    //Y vuelvo
	echo "
		<html>
			<head>
				<meta http-equiv = 'REFRESH' content='0;url=../../music.php?page=1'>
			</head>
		<html>
	";

?>
