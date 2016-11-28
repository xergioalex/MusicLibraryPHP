<?php
    // VER Generos
    echo '<div id="divtablas">';

	$conexion = new ProjectDB('database/multimedia.db') or die('No se pudo establecer conexion');

    echo 'GENEROS';
	echo '<table border="0" >
            <tr><td width=30%>Genero</td>
                <td width=5%>#Artists</td>
                <td width=5%>#Songs</td>
                <td width=5%>Rank</td>
             </tr>';

    // Consulta
    $consulta = 'SELECT DISTINCT g.idgenero as g_idgenero , g.nombre as g_nombre , g.numartistas as g_numartistas , g.numcanciones as g_numcanciones,g.valoracion as g_valoracion
                    FROM usuarioscanciones AS uc INNER JOIN relaciones AS r ON uc.idcancion = r.idcancion
                                                INNER JOIN generos AS g ON r.idgenero = g.idgenero
                                                WHERE uc.usuario="'.$usuario.'"';

    $resultado = $conexion->query($consulta);

    while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
        echo
            '<tr>
                <td><a href="music.php?page=13&genero='.$fila['g_idgenero'].'"><div>'.$fila['g_nombre'].'</div></a></td>
                <td>'.$fila['g_numartistas'].'</td>
                <td>'.$fila['g_numcanciones'].'</td>
                <td>'.$fila['g_valoracion'].'</td>
             </tr>';
    }

    echo '</table>';

	// Cerrar
    $conexion->close();

    echo '</div>';
 ?>