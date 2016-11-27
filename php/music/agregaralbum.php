<?php
	session_start();
	
	//Crear varibale
	$usuario = $_SESSION['usuario'];
	$contrasena = $_SESSION['contrasena'];
    $permisos = $_SESSION['permisos'];
    	
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];   
    $ano = $_POST['ano'];
    $numcanciones=0;    
    $valoracion =$_POST['valoracion'];     
    
	//Conexion	
	$conexion = sqlite_open('../../database/multimedia.db');
	
    $existealbum=false;
    //ConsultaAlbum
    $consultaalbum = 'SELECT * FROM albumes WHERE nombre="'.$nombre.'"';
    $resultadoalbum= sqlite_query($conexion,$consultaalbum);
    
    while($fila=sqlite_fetch_array($resultadoalbum)){
        $existealbum=true;
    }
    
    //Agregar Genero
    if(!$existealbum){	
        //Consulta			
        $consulta ="INSERT INTO albumes VALUES (null,'".$nombre."', '".$descripcion."','".$ano."','".$numcanciones."','".$valoracion."');";	    
        
    	//Ejecuto consulta	
    	$resultado = sqlite_exec($conexion,$consulta);	             
           	
	    //Y vuelvo    	
    	echo "<meta http-equiv = 'REFRESH' content='0;url=../../music.php?page=12'>";   
    }else{
        //Y vuelvo    	
    	echo "<meta http-equiv = 'REFRESH' content='0;url=../../music.php?page=32&exist=true'>"; 
        
    }
    
	//Cerrar Conexion
	sqlite_close($conexion);
		
?>