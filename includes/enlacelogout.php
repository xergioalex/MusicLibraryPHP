<?php
    // Conexión
    if (isset($usuario)) {
        $conexion = new ProjectDB('database/multimedia.db') or die('No se pudo establecer conexion');

        $consulta = "SELECT * FROM usuarios WHERE usuario='".$usuario."'";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
            echo '<a id="enlacelogout" href="php/logout.php"><div id="divlogout">'.$fila['nombre'].'(logout)</div></a>';
        }

        // Cerrar
    	$conexion->close();
    }
?>