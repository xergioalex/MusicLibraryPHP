<?php include '../php/projectDB.php'; ?>

<?php

    // Conexión
    $conexion = new ProjectDB('../database/multimedia.db') or die('Ha sido imposible establecer la conexión');

    $consultausuario = 'SELECT * FROM usuarios';
    $resultadousuarios = $conexion->query($consultausuario);

    while ($fila = $resultadousuarios->fetchArray(SQLITE3_ASSOC)) {
        print_r($fila);
    }

    // Cerrar
	$conexion->close();
?>