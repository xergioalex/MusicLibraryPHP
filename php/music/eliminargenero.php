<?php include '../projectDB.php'; ?>

<?php
	session_start();
	//Remover registro favorito
	//$usuario = $_SESSION['usuario'];
	//$contrasena = $_SESSION['contrasena'];
    $usuario = 'xergio';
	$contrasena = 'xergio';
	$idgenero = $_GET['idgenero'];

	//Conectar
	$conexion = new ProjectDB('../../database/multimedia.db') or die('Ha sido imposible establecer la conexión');
	$consulta = "DELETE FROM generos WHERE idgenero='".$idgenero."' AND usuario='".$usuario."' ";

	$resultado = $conexion->query($consulta);

	// Cerrar
	$conexion->close();

	//Y vuelvo
	echo "
		<html>
			<head>
				<meta http-equiv = 'REFRESH' content='0;url=../music.php?page=4'>
			</head>
		<html>
	";

?>
