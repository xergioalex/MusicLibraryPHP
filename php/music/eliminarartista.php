<?php
	session_start();
	//Remover registro favorito
	//$usuario = $_SESSION['usuario'];
	//$contrasena = $_SESSION['contrasena'];
    $usuario = 'xergio';
	$contrasena = 'xergio';
	$idartista = $_GET['idartista'];
		
	//Conectar
	$conexion = sqlite_open('../../database/multimedia.db');
    
    //Obtengo los datos de la ruta
        $consultacancion = 'SELECT * FROM canciones WHERE idartista='.$idartista.' AND usuario="'.$usuario.'" LIMIT 1';
    	$resultadocancion = sqlite_query($conexion,$consultacancion);
        while($fila=sqlite_fetch_array($resultadocancion)){
            $consultaartista = 'SELECT * FROM artistas WHERE idartista='.$idartista.' AND usuario="'.$usuario.'" LIMIT 1';
            $resultadoartista = sqlite_query($conexion,$consultaartista);
        	$artista = sqlite_fetch_array($resultadoartista);
            
            $consultagenero = 'SELECT * FROM generos WHERE idgenero='.$fila['idgenero'].' AND usuario="'.$usuario.'" LIMIT 1';
            $resultadogenero = sqlite_query($conexion,$consultagenero);
        	$genero = sqlite_fetch_array($resultadogenero);             
            
            //Eliminar Carpeta
            include 'eliminarcarpetacompleta.php';
            $path = '../usersdb/'.$usuario.'/'.'music/'.$genero['genero'].'/'.$artista['artista'].'/';
            if(is_dir($path))
                rmdir_recurse($path);            
        }
    
    
    //Elimino el Artista
	$consulta = "DELETE FROM artistas WHERE idartista='".$idartista."' AND usuario='".$usuario."' "; 
	$resultado = sqlite_query($conexion,$consulta);	
    
    //Eliminar las canciones y los albumes del Artista
    $consulta = 'SELECT DISTINCT idalbum FROM canciones WHERE idartista='.$idartista.' AND usuario="'.$usuario.'" ';
   	$resultado = sqlite_query($conexion,$consulta);
    
    while($fila = sqlite_fetch_array($resultado)){
        //Eliminar cancion
        $consultaeliminar = "DELETE FROM albumes WHERE idalbum=".$fila['idalbum']." AND usuario='".$usuario."' ";
        $resultado = sqlite_query($conexion,$consultaeliminar);
    }   
    
    $consulta = 'SELECT * FROM canciones WHERE idartista='.$idartista.' AND usuario="'.$usuario.'" ';
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
				<meta http-equiv = 'REFRESH' content='0;url=../music.php?page=2'>
			</head>
		<html>		
	";
	*/
?>