<?php
//-----------------

    // ######### Contenido de prueba de usuarios ###########

	// Conexión
	$conexion = new ProjectDB('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');;

	// Consulta
	$consulta = <<<SQL
        INSERT INTO usuarios VALUES('root','root','Admin','Admin','Administrador','Soy el Administrador de la base','xergio','','',1);
        INSERT INTO usuarios VALUES('xergio','xergio','Sergio Alexander','Florez Galeano','Ingeniero de Sistemas','Descripcion','xergio','www.google.com','http://xergioalex@gmail.com',1);
        INSERT INTO usuarios VALUES('xergioalex','xergioalex','Sergio Alexander','Florez Galeano','Ingeniero de Sistemas','Descripcion','xergio','www.google.com','http://xergioalex@gmail.com',1);
SQL;

	// Ejecutar
	$resultado = $conexion->exec($consulta);

	// Cerrar
	$conexion->close();

 //-------------------

    // ######### Contenido de prueba de Artistas ###########

	// Conexión
	$conexion = new ProjectDB('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');

    $archivoartistas = "ContenidoPredeterminado/artistas.txt";
	$manejador = fopen($archivoartistas,'r'); // a+ w r

	while($datos = fgetcsv($manejador,100000,"|")){
	   //Insertar Contenido
	   $consulta= 'INSERT INTO artistas VALUES(null,"'.$datos[0].'","'.$datos[1].'",0,0,0);';

       // Ejecutar
	   $resultado = $conexion->exec($consulta);
    }

	// Cerrar
    fclose($manejador);
	$conexion->close();

//--------------------------

    // ######### Contenido de prueba de Generos #########

	// Conexión
	$conexion = new ProjectDB('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');
    $archivogeneros = "ContenidoPredeterminado/generos.txt";
	$manejador = fopen($archivogeneros,'r'); // a+ w r

	while($datos = fgetcsv($manejador,100000,"|")){
	   //Insertar Contenido
	   $consulta= 'INSERT INTO generos VALUES(null,"'.$datos[0].'","'.$datos[1].'",0,0,0)';

       // Ejecutar
	   $resultado = $conexion->exec($consulta);
    }

	// Cerrar
    fclose($manejador);
   	$conexion->close();


//-----------------------------

	// ######### Contenido de prueba de Albumes #########

	// Conexión
	$conexion = new ProjectDB('../database/multimedia.db') or die('Ha sido imposible establecer la conexion');

    $archivoalbumes = "ContenidoPredeterminado/albumes.txt";
	$manejador = fopen($archivoalbumes,'r'); // a+ w r

	while($datos = fgetcsv($manejador,100000,"|")){
	   // Insertar Contenido
	   $consulta= 'INSERT INTO albumes VALUES(null,"'.$datos[0].'","'.$datos[1].'",0,0,0);';

       // Ejecutar
	   $resultado = $conexion->exec($consulta);
    }

	// Cerrar
    fclose($manejador);
	$conexion->close();

?>