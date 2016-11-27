<?php
	session_start();
	
	//Crear varibale
	$usuario = $_SESSION['usuario'];
	$contrasena = $_SESSION['contrasena'];
    $permisos = $_SESSION['permisos'];
    
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
    $numartistas = 0;   
    $numcanciones=0;    
    $valoracion =$_POST['valoracion'];        
    
	//Conexion	
	$conexion = sqlite_open('../../database/multimedia.db');
	
    $existegenero=false;
    //ConsultaGenero
    $consultagenero = 'SELECT * FROM generos WHERE nombre="'.$nombre.'"';
    $resultadogenero= sqlite_query($conexion,$consultagenero);
    
    while($fila=sqlite_fetch_array($resultadogenero)){
        $existegenero=true;
    }
    
    
	//Agregar Genero
    if(!$existegenero){	
        $consulta ="INSERT INTO generos VALUES (null,'".$nombre."', '".$descripcion."','".$numartistas."','".$numcanciones."','".$valoracion."');";	    
	    //Ejecuto consulta	
        $resultado = sqlite_query($conexion,$consulta);
        //Cerrar Conexion
	    sqlite_close($conexion);	
	    //Y vuelvo    	
    	echo "
		  <html>
			<head>
				<meta http-equiv = 'REFRESH' content='0;url=../../music.php?page=12'>
			</head>
		  <html>";   
    }else{
        //Y vuelvo    	
    	echo "
		  <html>
			<head>
				<meta http-equiv = 'REFRESH' content='0;url=../../music.php?page=42&exist=true'>
			</head>
		  <html>"; 
        
    }
	
?>