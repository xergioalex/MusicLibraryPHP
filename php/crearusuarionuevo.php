<?php
	session_start();
	
	$usuario=$_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $titulo = $_POST['titulo'];
    $webpersonal = $_POST['webpersonal'];
    $email = $_POST['email'];
    $descripcion = $_POST['descripcion'];
	$contrasena=$_POST['contrasena'];
        
	
    $existeusuario=false;
    
    //Conexion para buscar usuario
	$conexion = sqlite_open('../database/multimedia.db');
	
	$consulta = "SELECT * FROM usuarios;";
	$resultado = sqlite_query($conexion,$consulta);
	
	while($fila = sqlite_fetch_array($resultado)){
		$usuariobasedatos=$fila['usuario'];		
		
		if($usuariobasedatos==$usuario)
            $existeusuario=true;		
		
	}
    
    if($existeusuario)
        echo '<meta http-equiv = "REFRESH" content="0;url=../multimedia.php?new=true&exist=true">';		    
    else{
        //Insertar nuevo usuario
        $consulta=  "INSERT INTO usuarios VALUES('".$usuario."','".$contrasena."','".$nombre."','".$apellido."','".$titulo."','".$descripcion."','foto','".$webpersonal."','".$email."',3);";
        $resultado = sqlite_query($conexion,$consulta);
        
        // Ruta del servidor
        $directorio = $_SERVER['DOCUMENT_ROOT'].'/MultimediaDB/usersdb/'.$usuario.'/';               
       
        if(!(is_dir($directorio))){        
            if(!(is_dir($directorio)))  
                mkdir($directorio, 0700);
            if(!(is_dir($directorio.'music/')))
                mkdir($directorio.'music/', 0700);
            if(!(is_dir($directorio.'video/')))
                mkdir($directorio.'video/', 0700);
            if(!(is_dir($directorio.'image/')))
                mkdir($directorio.'image/', 0700);        
        }
        
        echo '<meta http-equiv = "REFRESH" content="0;url=../multimedia.php">';
        
    }    
    
?>