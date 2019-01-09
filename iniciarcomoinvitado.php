<?php
	session_start();
	$_SESSION['usuario'] = "xergioalex";
	$_SESSION['contrasena'] = "xergioalex";
	$_SESSION['permisos'] = 1;

	echo'
    <html>
	   <head>
	       <meta http-equiv = "REFRESH" content="0;url=multimedia.php">
	   </head>
	<html>';
?>

