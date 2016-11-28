<?php include '../projectDB.php'; ?>

<?php
	session_start();

	// Crear varibale
	$usuario = $_SESSION['usuario'];
	$contrasena = $_SESSION['contrasena'];
    $permisos = $_SESSION['permisos'];

	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
    $numartistas = 0;
    $numcanciones=0;
    $valoracion =$_POST['valoracion'];

	// Conexion
	$conexion = new ProjectDB('../../database/multimedia.db') or die('Ha sido imposible establecer la conexión');

    $existegenero=false;
    // ConsultaGenero
    $consultagenero = 'SELECT * FROM generos WHERE nombre="'.$nombre.'"';
    $resultadogenero= $conexion->query($consultagenero);

    while($fila = $resultadogenero->fetchArray(SQLITE3_ASSOC)){
        $existegenero=true;
    }


	// Agregar Genero
    if(!$existegenero){
        $consulta ="INSERT INTO generos VALUES (null,'".$nombre."', '".$descripcion."','".$numartistas."','".$numcanciones."','".$valoracion."');";
	    // Ejecuto consulta
        $resultado = $conexion->query($consulta);

        // Cerrar
		$conexion->close();

	    // Y vuelvo
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