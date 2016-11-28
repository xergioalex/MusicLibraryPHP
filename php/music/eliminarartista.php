<?php include '../projectDB.php'; ?>

<?php
	session_start();
	//Remover registro favorito
	//$usuario = $_SESSION['usuario'];
	//$contrasena = $_SESSION['contrasena'];
    $usuario = 'xergio';
	$contrasena = 'xergio';
	$idartista = $_GET['idartista'];

	//Conectar
	$conexion = new ProjectDB('../../database/multimedia.db') or die('Ha sido imposible establecer la conexión');

    //Obtengo los datos de la ruta
        $consultacancion = 'SELECT * FROM canciones WHERE idartista='.$idartista.' AND usuario="'.$usuario.'" LIMIT 1';
    	$resultadocancion = $conexion->query($consultacancion);
        while($fila=$resultadocancion->fetchArray(SQLITE3_ASSOC)){
            $consultaartista = 'SELECT * FROM artistas WHERE idartista='.$idartista.' AND usuario="'.$usuario.'" LIMIT 1';
            $resultadoartista = $conexion->query($consultaartista);
        	$artista = $resultadoartista->fetchArray(SQLITE3_ASSOC);

            $consultagenero = 'SELECT * FROM generos WHERE idgenero='.$fila['idgenero'].' AND usuario="'.$usuario.'" LIMIT 1';
            $resultadogenero = $conexion->query($consultagenero);
        	$genero = $resultadogenero->fetchArray(SQLITE3_ASSOC);

            //Eliminar Carpeta
            include 'eliminarcarpetacompleta.php';
            $path = '../usersdb/'.$usuario.'/'.'music/'.$genero['genero'].'/'.$artista['artista'].'/';
            if(is_dir($path))
                rmdir_recurse($path);
        }


    //Elimino el Artista
	$consulta = "DELETE FROM artistas WHERE idartista='".$idartista."' AND usuario='".$usuario."' ";
	$resultado = $conexion->query($consulta);

    //Eliminar las canciones y los albumes del Artista
    $consulta = 'SELECT DISTINCT idalbum FROM canciones WHERE idartista='.$idartista.' AND usuario="'.$usuario.'" ';
   	$resultado = $conexion->query($consulta);

    while($fila = $resultado->fetchArray(SQLITE3_ASSOC)){
        //Eliminar cancion
        $consultaeliminar = "DELETE FROM albumes WHERE idalbum=".$fila['idalbum']." AND usuario='".$usuario."' ";
        $resultado = $conexion->query($consultaeliminar);
    }

    $consulta = 'SELECT * FROM canciones WHERE idartista='.$idartista.' AND usuario="'.$usuario.'" ';
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
				<meta http-equiv = 'REFRESH' content='0;url=../music.php?page=2'>
			</head>
		<html>
	";
	*/
?>