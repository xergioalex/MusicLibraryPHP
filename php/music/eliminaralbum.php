<?php include '../projectDB.php'; ?>

<?php
	session_start();
	// Remover registro favorito
	// $usuario = $_SESSION['usuario'];
	// $contrasena = $_SESSION['contrasena'];
    $usuario = 'xergio';
	$contrasena = 'xergio';
	$idalbum = $_GET['idalbum'];

    // Conectar
	$conexion = new ProjectDB('../../database/multimedia.db') or die('Ha sido imposible establecer la conexión');

    // Obtengo los datos de la ruta
        $consultacancion = 'SELECT * FROM canciones WHERE idalbum='.$idalbum.' AND usuario="'.$usuario.'" LIMIT 1';
    	$resultadocancion = $conexion->query($consultacancion);
        while($fila=$resultadocancion->fetchArray(SQLITE3_ASSOC)){
            $consultaartista = 'SELECT * FROM artistas WHERE idartista='.$fila['idartista'].' AND usuario="'.$usuario.'" LIMIT 1';
            $resultadoartista = $conexion->query($consultaartista);
        	$artista = $resultadoartista->fetchArray(SQLITE3_ASSOC);

            $consultagenero = 'SELECT * FROM generos WHERE idgenero='.$fila['idgenero'].' AND usuario="'.$usuario.'" LIMIT 1';
            $resultadogenero = $conexion->query($consultagenero);
        	$genero = $resultadogenero->fetchArray(SQLITE3_ASSOC);

            $consultaalbum = 'SELECT * FROM albumes WHERE idalbum='.$idalbum.' AND usuario="'.$usuario.'" LIMIT 1';
            $resultadoalbum = $conexion->query($consultaalbum);
        	$album = $resultadoalbum->fetchArray(SQLITE3_ASSOC);

            // Eliminar Carpeta
            include 'eliminarcarpetacompleta.php';
            $path = '../usersdb/'.$usuario.'/'.'music/'.$genero['genero'].'/'.$artista['artista'].'/'.$album['album'].'/';
            if(is_dir($path))
                rmdir_recurse($path);
        }

	// Eliminar el album
	$consulta = "DELETE FROM albumes WHERE idalbum=".$idalbum." AND usuario='".$usuario."' ";
	$resultado = $conexion->query($consulta);


	// Eliminar las canciones del album
    $consulta = 'SELECT * FROM canciones WHERE idalbum='.$idalbum.' AND usuario="'.$usuario.'" ';
   	$resultado = $conexion->query($consulta);

    while($fila = $resultado->fetchArray(SQLITE3_ASSOC)){
        //Eliminar cancion
        $consultaeliminar = "DELETE FROM canciones WHERE idcancion=".$fila['idcancion']." AND usuario='".$usuario."' ";
        $resultado = $conexion->query($consultaeliminar);
    }

	// Cerrar
    $conexion->close();

	/*
	//Y vuelvo
	echo "
		<html>
			<head>
				<meta http-equiv = 'REFRESH' content='0;url=../music.php?page=3'>
			</head>
		<html>
	";
	*/
?>