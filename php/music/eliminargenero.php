<?php
	session_start();
	//Remover registro favorito
	//$usuario = $_SESSION['usuario'];
	//$contrasena = $_SESSION['contrasena'];
    $usuario = 'xergio';
	$contrasena = 'xergio';
	$idgenero = $_GET['idgenero'];
		
	//Conectar
	$conexion = sqlite_open('../../database/multimedia.db');
	$consulta = "DELETE FROM generos WHERE idgenero='".$idgenero."' AND usuario='".$usuario."' "; 
	
	$resultado = sqlite_query($conexion,$consulta);	
	
	sqlite_close($conexion);
	
	//Y vuelvo	
	echo "
		<html>
			<head>
				<meta http-equiv = 'REFRESH' content='0;url=../music.php?page=4'>
			</head>
		<html>		
	";
	
?>
