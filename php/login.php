<?php
	session_start();
	
	$usuario=$_POST['usuario'];
	$contrasena=$_POST['contrasena'];    
	
    $existeusuario=false;
    
    //Conexion para buscar usuario
	$conexion = sqlite_open('../database/multimedia.db');
	
	$consulta = "SELECT * FROM usuarios;";
	$resultado = sqlite_query($conexion,$consulta);
	
	while($fila = sqlite_fetch_array($resultado)){
		$usuariobasedatos=$fila['usuario'];
		$contrasenabasedatos=$fila['contrasena'];
		$permisosbase = $fila['permisos'];
		
		if($usuariobasedatos==$usuario and $contrasenabasedatos==$contrasena){
            $existeusuario=true;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['contrasena'] = $contrasena;
			$_SESSION['permisos'] = $permisosbase;
			echo '<meta http-equiv = "REFRESH" content="0;url=../multimedia.php">';			
		}
		
	}
    if(!$existeusuario){
        echo '<meta http-equiv = "REFRESH" content="0;url=../multimedia.php?exist=true">';		
    }
    else{
        
        
    }
    
?>