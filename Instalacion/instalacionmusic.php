<?php

//-------------------------

	//#########Creacion de tabla de Usuarios###########
	//conexion
	$conexion = sqlite_open('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');;
	//consulta
	$consulta = 
	<<<SQL
		CREATE TABLE usuarios(
			usuario Char(40) Primary Key Not Null,
			contrasena Char(40) Not Null,
			nombre Char(40) Not Null,
			apellido Char(40),
			titulo Char(120),
			descripcion Char(1500),
			foto Char(40),
			webpersonal Char(80),
			email Char(80) Not Null,
			permisos Int Not Null
		);
SQL;
	//ejecutar
	$resultado = sqlite_exec($conexion,$consulta);
	//cerrar
	sqlite_close($conexion);
		
	
//-------------------------

	//#########Creacion de tabla de Artistas###########
	//conexion
	$conexion = sqlite_open('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');;
	//consulta
	$consulta = 
	<<<SQL
		CREATE TABLE artistas(
			idartista Integer Primary Key,	            		
			nombre Char(40) Not Null,
			descripcion Char(1500),
            numalbumes Integer,
			numcanciones Integer,
			valoracion Integer
		);
SQL;
	//ejecutar
	$resultado = sqlite_exec($conexion,$consulta);    
    
	//cerrar
	sqlite_close($conexion);		
	

//-------------------------    
    
	//#########Creacion de tabla de Generos###########
	//conexion
	$conexion = sqlite_open('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');;
	//consulta
	$consulta = 
	<<<SQL
		CREATE TABLE generos(
			idgenero Integer Primary Key,            
			nombre Char(40) Not Null,
			descripcion Char(1500),
			numartistas Integer,
            numcanciones Integer,
			valoracion Integer			
		);
SQL;
	//ejecutar
	$resultado = sqlite_exec($conexion,$consulta);
	//cerrar
	sqlite_close($conexion);
		

//-------------------------        
	
	//#########Creacion de tabla de Albumes###########
	//conexion
	$conexion = sqlite_open('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');;
	//consulta
	$consulta = 
	<<<SQL
		CREATE TABLE albumes(
			idalbum Integer Primary Key,            
			nombre Char(40) Not Null,
			descripcion Char(1500),
			ano Integer,
			numcanciones Integer,
			valoracion Integer
		);
SQL;
	//ejecutar
	$resultado = sqlite_exec($conexion,$consulta);
	//cerrar
	sqlite_close($conexion);
	

//-------------------------
	
	//#########Creacion de tabla de Canciones###########
	//conexion
	$conexion = sqlite_open('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');
	//consulta
	$consulta = 
	<<<SQL
		CREATE TABLE canciones(
			idcancion Integer Primary Key,			
			nombre Char(40) Not Null,
			descripcion Char(1500),
			duracion Integer,
			reproducciones Integer,
			valoracion Integer,
            url Char(300)			
		);
SQL;
	//ejecutar
	$resultado = sqlite_exec($conexion,$consulta);
	//cerrar
	sqlite_close($conexion);
	
	
	
//-------------------------    
    
	//#########Creacion de tabla de Relaciones###########
	//conexion
	$conexion = sqlite_open('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');;
	//consulta
	$consulta = 
	<<<SQL
		CREATE TABLE relaciones(
			idrelacion Integer Primary Key ,			
			idcancion Integer,
            idalbum Integer,
            idartista Integer,
            idgenero Integer
		);
SQL;
	//ejecutar
	$resultado = sqlite_exec($conexion,$consulta);
	//cerrar
	sqlite_close($conexion);		


//-------------------------	
    
    //#########Creacion de tabla de UsuariosCanciones###########
	//conexion
	$conexion = sqlite_open('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');;
	//consulta
	$consulta = 
	<<<SQL
		CREATE TABLE usuarioscanciones(
			idusuariocancion Integer Primary Key,
			usuario Char(40),
			idcancion Integer
		);
SQL;
	//ejecutar
	$resultado = sqlite_exec($conexion,$consulta);
	//cerrar
	sqlite_close($conexion);
	
	
?>