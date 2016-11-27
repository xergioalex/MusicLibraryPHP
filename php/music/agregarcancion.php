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
        
    //Artista    
    $idartista = $_POST['idartista'];    
    
    //Album    
    $idalbum = $_POST['idalbum'];    
        
	//Genero    
    $idgenero = $_POST['idgenero'];
    
    //Rutas
    $directorio='';
    $urlmove='';
    $url='';
    
    // Recibo los datos de la imagen
    $file = $_FILES['file']['name'];
    $tipo = $_FILES['file']['type'];
    $tamano = $_FILES['file']['size'];
	    
	//Conexion	
	$conexion = sqlite_open('../../database/multimedia.db');
	
    //Busco los datos de genero,artista y album 
    //Selecionar Genero
    $consultagenero = 'SELECT * FROM generos AS g WHERE g.idgenero='.$idgenero.'';
    $resultadogenero = sqlite_query($conexion,$consultagenero);
    $filagenero = sqlite_fetch_array($resultadogenero);
        
    //Selecionar Artista
    $consultaartista = 'SELECT * FROM artistas AS ar WHERE ar.idartista='.$idartista.'';
    $resultadoartista = sqlite_query($conexion,$consultaartista);
    $filaartista = sqlite_fetch_array($resultadoartista);
    
    //Selecionar Album
    $consultaalbum = 'SELECT * FROM albumes AS al WHERE al.idalbum='.$idalbum.'';
    $resultadoalbum = sqlite_query($conexion,$consultaalbum);
    $filaalbum = sqlite_fetch_array($resultadoalbum);
 
 //----------------------
 
    // Ruta del servidor
    $directorio = $_SERVER['DOCUMENT_ROOT'].'/MultimediaDB/usersdb/'.$usuario.'/music/';    
    //Url de la cancion        
    $urldir= $directorio.$filagenero['nombre'].'/'.$filaartista['nombre'].'/'.$filaalbum['nombre'].'/';
    $urlmusic = 'usersdb/'.$usuario.'/'.'music/'.$filagenero['nombre'].'/'.$filaartista['nombre'].'/'.$filaalbum['nombre'].'/'.$nombrecancion.'.mp3';
    $urlmove = $directorio.$filagenero['nombre'].'/'.$filaartista['nombre'].'/'.$filaalbum['nombre'].'/'.$nombrecancion.'.mp3';   
   
    if(!(is_dir($urldir))){        
        if(!(is_dir($directorio.$filagenero['nombre'].'/')))  
            mkdir($directorio.$filagenero['nombre'].'/', 0700);
        if(!(is_dir($directorio.$filagenero['nombre'].'/'.$filaartista['nombre'].'/')))
            mkdir($directorio.$filagenero['nombre'].'/'.$filaartista['nombre'].'/', 0700);
        if(!(is_dir($directorio.$filagenero['nombre'].'/'.$filaartista['nombre'].'/'.$filaalbum['nombre'].'/')))
            mkdir($directorio.$filagenero['nombre'].'/'.$filaartista['nombre'].'/'.$filaalbum['nombre'].'/', 0700);        
    }
                  
    //Crear Cancion			
    $consulta = 'INSERT INTO canciones VALUES(null,"'.$nombrecancion.'","'.$descripcioncancion.'","'.$duracion.'",0,"'.$valoracioncancion.'","'.$urlmusic.'")';
    //Ejecuto la consulta y
    // Muevo la cancion desde su ubicación temporal al directorio definitivo   
    if($resultado = sqlite_exec($conexion,$consulta)){    
        move_uploaded_file ($_FILES['file']['tmp_name'],$urlmove);
        
        //Busco informacion de la cancion
        $consultacancion = 'SELECT * FROM canciones ORDER BY idcancion DESC LIMIT 1';
        $resultadocancion = sqlite_query($conexion,$consultacancion);
        $filacancion = sqlite_fetch_array($resultadocancion);

        $idcancion = $filacancion['idcancion'];
    
        //Crear Relacion
        $consultarelacion = 'INSERT INTO relaciones VALUES(null,'.$idcancion.','.$idalbum.','.$idartista.','.$idgenero.')';
        $resultadorelacion = sqlite_query($conexion,$consultarelacion);
        
        //Crear Relacion UsuariosCanciones
        $consultausuarioscanciones = 'INSERT INTO usuarioscanciones VALUES(null,"'.$usuario.'",'.$idcancion.')';
        $resultadousuarioscanciones = sqlite_query($conexion,$consultausuarioscanciones);
        
    }
	                  
	//Cerrar Conexion
	sqlite_close($conexion);
	
	//Y vuelvo
    
	echo "
		<html>
			<head>
				<meta http-equiv = 'REFRESH' content='0;url=../../music.php?page=1&song=".$idcancion."'>
			</head>
		<html>		
	";
?>