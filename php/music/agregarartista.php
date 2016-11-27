<?php
	session_start();
	
	//Crear varibale
	$usuario = $_SESSION['usuario'];
	$contrasena = $_SESSION['contrasena'];
    $permisos = $_SESSION['permisos'];
    
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
    $numalbumes=0;
    $numcanciones=0;    
    $valoracion =$_POST['valoracion'];    
        	      
    
	//Conexion	
	$conexion = sqlite_open('../../database/multimedia.db');	    
    
    $existeartista=false;
    //ConsultaArtista
    $consultaartista = 'SELECT * FROM artistas WHERE nombre="'.$nombre.'"';
    $resultadoartista= sqlite_query($conexion,$consultaartista);
    
    while($fila=sqlite_fetch_array($resultadoartista)){
        $existeartista=true;
    }
    
    //Agregar Artista
    if(!$existeartista){	
        //Consulta			
        $consulta ="INSERT INTO artistas VALUES (null,'".$nombre."', '".$descripcion."','".$numalbumes."','".$numcanciones."','".$valoracion."');";	    
        
    	//Ejecuto consulta	
    	$resultado = sqlite_exec($conexion,$consulta);	             
           	
	    //Y vuelvo    	
    	echo "<meta http-equiv = 'REFRESH' content='0;url=../../music.php?page=12'>";   
    }else{
        //Y vuelvo    	
    	echo "<meta http-equiv = 'REFRESH' content='0;url=../../music.php?page=22&exist=true'>"; 
        
    }
    
	//Cerrar Conexion
	sqlite_close($conexion);
    
    
    
    
    
    
    
    
    
   
?>