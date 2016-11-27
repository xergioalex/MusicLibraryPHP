<?php
//-----------------

    //#########Contenido de prueba de usuarios###########
	//conexion
	$conexion = sqlite_open('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');;
	//consulta
	$consulta = 
     <<<SQL
        INSERT INTO usuarios VALUES('root','root','Admin','Admin','Administrador','Soy el Administrador de la base','xergio','','',1);     
        INSERT INTO usuarios VALUES('xergio','xergio','Sergio Alexander','Florez Galeano','Ingeniero de Sistemas','Descripcion','xergio','www.google.com','http://xergioalex@gmail.com',1);
        INSERT INTO usuarios VALUES('xergioalex','xergioalex','Sergio Alexander','Florez Galeano','Ingeniero de Sistemas','Descripcion','xergio','www.google.com','http://xergioalex@gmail.com',1);
SQL;
    	
	//ejecutar
	$resultado = sqlite_exec($conexion,$consulta);
	//cerrar
	sqlite_close($conexion);
    
 //-------------------
   
    //#########Contenido de prueba de Artistas###########
	//conexion
	$conexion = sqlite_open('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');
	
    $archivoartistas = "contenidopredeterminado/artistas.txt";	
	$manejador = fopen($archivoartistas,'r'); // a+ w r
	
	while($datos = fgetcsv($manejador,100000,"|")){
	   //Insertar Contenido
	   $consulta= 'INSERT INTO artistas VALUES(null,"'.$datos[0].'","'.$datos[1].'",0,0,0);';
       //ejecutar
	   $resultado = sqlite_exec($conexion,$consulta);    
    }        		            	
	
	//cerrar
    fclose($manejador);	
	sqlite_close($conexion);
    
//--------------------------
    
    //#########Contenido de prueba de Generos#########
	//conexion
	$conexion = sqlite_open('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');
    $archivogeneros = "contenidopredeterminado/generos.txt";	
	$manejador = fopen($archivogeneros,'r'); // a+ w r
	
	while($datos = fgetcsv($manejador,100000,"|")){
	   //Insertar Contenido
	   $consulta= 'INSERT INTO generos VALUES(null,"'.$datos[0].'","'.$datos[1].'",0,0,0)';
       //ejecutar
	   $resultado = sqlite_exec($conexion,$consulta);    
    }        		            	
	
	//cerrar
    fclose($manejador);
   	sqlite_close($conexion);
    
//-----------------------------    
    
	//#########Contenido de prueba de Albumes#########
	//conexion
	$conexion = sqlite_open('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');
    
    $archivoalbumes = "contenidopredeterminado/albumes.txt";	
	$manejador = fopen($archivoalbumes,'r'); // a+ w r
	
	while($datos = fgetcsv($manejador,100000,"|")){
	   //Insertar Contenido
	   $consulta= 'INSERT INTO albumes VALUES(null,"'.$datos[0].'","'.$datos[1].'",0,0,0);';
       //ejecutar
	   $resultado = sqlite_exec($conexion,$consulta);    
    }        		            	
	
	//cerrar
    fclose($manejador);

	//cerrar
	sqlite_close($conexion);
    
?>