<?php
	session_start();
	$usuario = $_SESSION['usuario'];
	$contrasena = $_SESSION['contrasena'];
    $permisos = $_SESSION['permisos'];
    
	$idcancion = $_GET['idcancion'];        
		
	//Conectar
	$conexion = sqlite_open('../../database/multimedia.db');
    
    //Consulta    
    $consulta = 'SELECT * FROM usuarioscanciones AS uc INNER JOIN relaciones AS r ON uc.idcancion = r.idcancion 
                                                       INNER JOIN canciones AS c ON r.idcancion = c.idcancion                                                                                                                                                                     
                                                       WHERE uc.usuario="'.$usuario.'" AND c.idcancion='.$idcancion.'';  
    
    $resultado = sqlite_query($conexion,$consulta);
    while($fila = sqlite_fetch_array($resultado)){        
        
        //direccion del archivo        
        $directorio = $_SERVER['DOCUMENT_ROOT'].'/MultimediaDB/'.$fila['c.url'];
        
        if(file_exists($directorio)){
            unlink($directorio);
        }
        
        //Eliminar Cancion
        $consultacancion = 'DELETE FROM canciones WHERE idcancion='.$idcancion.' '; 	
	    $resultadocancion = sqlite_query($conexion,$consultacancion);
        
        //Eliminar Relacion
        $consultarelacion = 'DELETE FROM relaciones WHERE idcancion='.$idcancion.' '; 	
	    $resultadorelacion = sqlite_query($conexion,$consultarelacion);
        
        //Eliminar Relacion UsuarioCancion
        $consultausuariocancion = 'DELETE FROM usuarioscanciones WHERE idcancion='.$idcancion.' AND usuario="'.$usuario.'"'; 	
	    $resultadocancion = sqlite_query($conexion,$consultausuariocancion);
        
    }
    
    
    
    
	
    
	sqlite_close($conexion);
	
    //Y vuelvo	
	echo "
		<html>
			<head>
				<meta http-equiv = 'REFRESH' content='0;url=../../music.php?page=1'>
			</head>
		<html>		
	";
	
?>
