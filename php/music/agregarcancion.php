<?php include '../projectDB.php'; ?>

<?php
	session_start();

	//Crear variables
	$usuario = $_SESSION['usuario'];
	$contrasena = $_SESSION['contrasena'];
    $permisos = $_SESSION['permisos'];

    //Cancion
    $idcancion=0;
	$nombrecancion = $_POST['nombrecancion'];
	$descripcioncancion = $_POST['descripcioncancion'];
    $duracion = 0;
    $reproducciones=0;
    $valoracioncancion =$_POST['valoracioncancion'];

    // Artista
    $idartista = $_POST['idartista'];

    // Album
    $idalbum = $_POST['idalbum'];

	// Genero
    $idgenero = $_POST['idgenero'];

    //Rutas
    $directorio='';
    $urlmove='';
    $url='';

    // Recibo los datos de la imagen
    $file = $_FILES['file']['name'];
    $tipo = $_FILES['file']['type'];
    $tamano = $_FILES['file']['size'];

	// Conexion
	$conexion = new ProjectDB('../../database/multimedia.db') or die('Ha sido imposible establecer la conexión');

    // Busco los datos de genero,artista y album
    // Selecionar Genero
    $consultagenero = 'SELECT * FROM generos AS g WHERE g.idgenero='.$idgenero.'';
    $resultadogenero = $conexion->query($consultagenero);
    $filagenero = $resultadogenero->fetchArray(SQLITE3_ASSOC);

    // Selecionar Artista
    $consultaartista = 'SELECT * FROM artistas AS ar WHERE ar.idartista='.$idartista.'';
    $resultadoartista = $conexion->query($consultaartista);
    $filaartista = $resultadoartista->fetchArray(SQLITE3_ASSOC);

    // Selecionar Album
    $consultaalbum = 'SELECT * FROM albumes AS al WHERE al.idalbum='.$idalbum.'';
    $resultadoalbum = $conexion->query($consultaalbum);
    $filaalbum = $resultadoalbum->fetchArray(SQLITE3_ASSOC);

//----------------------

    // Ruta del servidor
    $directorio = $_SERVER['DOCUMENT_ROOT'].'/usersdb/'.$usuario.'/music/';
    
    // Url de la cancion
    $urldir= $directorio.$filagenero['nombre'].'/'.$filaartista['nombre'].'/'.$filaalbum['nombre'].'/';
    $urlmusic = 'usersdb/'.$usuario.'/'.'music/'.$filagenero['nombre'].'/'.$filaartista['nombre'].'/'.$filaalbum['nombre'].'/'.$nombrecancion.'.mp3';
    $urlmove = $directorio.$filagenero['nombre'].'/'.$filaartista['nombre'].'/'.$filaalbum['nombre'].'/'.$nombrecancion.'.mp3';

    // echo $directorio.'<br>';
    // echo $urldir.'<br>';
    // echo $urlmusic.'<br>';
    // echo $urlmove.'<br>';

    if (!(is_dir($urldir))) {
        if(!(is_dir($directorio.$filagenero['nombre'].'/')))
            mkdir($directorio.$filagenero['nombre'].'/', 0700);
        if(!(is_dir($directorio.$filagenero['nombre'].'/'.$filaartista['nombre'].'/')))
            mkdir($directorio.$filagenero['nombre'].'/'.$filaartista['nombre'].'/', 0700);
        if(!(is_dir($directorio.$filagenero['nombre'].'/'.$filaartista['nombre'].'/'.$filaalbum['nombre'].'/')))
            mkdir($directorio.$filagenero['nombre'].'/'.$filaartista['nombre'].'/'.$filaalbum['nombre'].'/', 0700);
    }

    // Crear Cancion
    $consulta = 'INSERT INTO canciones VALUES(null,"'.$nombrecancion.'","'.$descripcioncancion.'","'.$duracion.'",0,"'.$valoracioncancion.'","'.$urlmusic.'")';
    // Ejecuto la consulta y
    // Muevo la cancion desde su ubicación temporal al directorio definitivo
    if ($resultado = $conexion->exec($consulta)) {
        move_uploaded_file ($_FILES['file']['tmp_name'],$urlmove);

        //Busco informacion de la cancion
        $consultacancion = 'SELECT * FROM canciones ORDER BY idcancion DESC LIMIT 1';
        $resultadocancion = $conexion->query($consultacancion);
        $filacancion = $resultadocancion->fetchArray(SQLITE3_ASSOC);

        $idcancion = $filacancion['idcancion'];

        //Crear Relacion
        $consultarelacion = 'INSERT INTO relaciones VALUES(null,'.$idcancion.','.$idalbum.','.$idartista.','.$idgenero.')';
        $resultadorelacion = $conexion->query($consultarelacion);

        //Crear Relacion UsuariosCanciones
        $consultausuarioscanciones = 'INSERT INTO usuarioscanciones VALUES(null,"'.$usuario.'",'.$idcancion.')';
        $resultadousuarioscanciones = $conexion->query($consultausuarioscanciones);
    }

	// Cerrar
    $conexion->close();

	//Y vuelvo

	echo "
		<html>
			<head>
				<meta http-equiv = 'REFRESH' content='0;url=../../music.php?page=1&song=".$idcancion."'>
			</head>
		<html>
	";
?>