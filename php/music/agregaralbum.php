<?php include '../projectDB.php'; ?>

<?php
	session_start();

	//Crear varibale
	$usuario = $_SESSION['usuario'];
	$contrasena = $_SESSION['contrasena'];
    $permisos = $_SESSION['permisos'];

	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
    $ano = $_POST['ano'];
    $numcanciones = 0;
    $valoracion =$_POST['valoracion'];

	// Conexion
	$conexion = new ProjectDB('../../database/multimedia.db') or die('Ha sido imposible establecer la conexión');

    $existealbum = false;
    // ConsultaAlbum
    $consultaalbum = 'SELECT * FROM albumes WHERE nombre="'.$nombre.'"';
    $resultadoalbum = $conexion->query($consultaalbum);

    while ($fila = $resultadoalbum->fetchArray(SQLITE3_ASSOC)) {
        $existealbum = true;
    }

    // Agregar Genero
    if(!$existealbum){
        // Consulta
        $consulta = "INSERT INTO albumes VALUES (null,'".$nombre."', '".$descripcion."','".$ano."','".$numcanciones."','".$valoracion."');";

    	// Ejecuto consulta
    	$resultado = $conexion->exec($consulta);

	    // Y vuelvo
    	echo "<meta http-equiv = 'REFRESH' content='0;url=../../music.php?page=12'>";
    }else{
        // Y vuelvo
    	echo "<meta http-equiv = 'REFRESH' content='0;url=../../music.php?page=32&exist=true'>";

    }

	// Cerrar
    $conexion->close();

?>