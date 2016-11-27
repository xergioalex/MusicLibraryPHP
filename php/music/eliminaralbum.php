<?php
	session_start();
	//Remover registro favorito
	//$usuario = $_SESSION['usuario'];
	//$contrasena = $_SESSION['contrasena'];
    $usuario = 'xergio';
	$contrasena = 'xergio';
	$idalbum = $_GET['idalbum'];
	
    //Conectar
	$conexion = sqlite_open('../../database/multimedia.db');
    
    //Obtengo los datos de la ruta
        $consultacancion = 'SELECT * FROM canciones WHERE idalbum='.$idalbum.' AND usuario="'.$usuario.'" LIMIT 1';
    	$resultadocancion = sqlite_query($conexion,$consultacancion);
        while($fila=sqlite_fetch_array($resultadocancion)){
            $consultaartista = 'SELECT * FROM artistas WHERE idartista='.$fila['idartista'].' AND usuario="'.$usuario.'" LIMIT 1';
            $resultadoartista = sqlite_query($conexion,$consultaartista);
        	$artista = sqlite_fetch_array($resultadoartista);
            
            $consultagenero = 'SELECT * FROM generos WHERE idgenero='.$fila['idgenero'].' AND usuario="'.$usuario.'" LIMIT 1';
            $resultadogenero = sqlite_query($conexion,$consultagenero);
        	$genero = sqlite_fetch_array($resultadogenero);
            
            $consultaalbum = 'SELECT * FROM albumes WHERE idalbum='.$idalbum.' AND usuario="'.$usuario.'" LIMIT 1';
            $resultadoalbum = sqlite_query($conexion,$consultaalbum);
        	$album = sqlite_fetch_array($resultadoalbum);    
            
            //Eliminar Carpeta
            include 'eliminarcarpetacompleta.php';
            $path = '../usersdb/'.$usuario.'/'.'music/'.$genero['genero'].'/'.$artista['artista'].'/'.$album['album'].'/';
            if(is_dir($path))
                rmdir_recurse($path);            
        }
                                    
	//Eliminar el album
	$consulta = "DELETE FROM albumes WHERE idalbum=".$idalbum." AND usuario='".$usuario."' "; 
	$resultado = sqlite_query($conexion,$consulta);   
    
    	
	//Eliminar las canciones del album
    $consulta = 'SELECT * FROM canciones WHERE idalbum='.$idalbum.' AND usuario="'.$usuario.'" ';
   	$resultado = sqlite_query($conexion,$consulta);
    
    while($fila = sqlite_fetch_array($resultado)){
        //Eliminar cancion
        $consultaeliminar = "DELETE FROM canciones WHERE idcancion=".$fila['idcancion']." AND usuario='".$usuario."' ";
        $resultado = sqlite_query($conexion,$consultaeliminar);
    }               	    
	
	sqlite_close($conexion);
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