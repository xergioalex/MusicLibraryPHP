<?php
//VER Albumes de un Artista
echo '<div id="divtablas">';

	$conexion = new ProjectDB('database/multimedia.db') or die('No se pudo establecer conexion');

     //Recibo el Artista
    if (!isset($_GET['artista'])) {
       // Y vuelvo
	   echo
       "<html>
            <head>
				<meta http-equiv = 'REFRESH' content='0;url=music.php'>
			</head>
		<html>";
    } else {
        $idartista = $_GET['artista'];

        echo 'ALBUMES';
    	echo '<table border="0" >
    		<tr><td width=30%>Album</td>
                <td width=5%>A?</td>
                <td width=5%>#Songs</td>
                <td width=5%>Rank</td>
            </tr>';

        // Consulta
        $consulta = 'SELECT DISTINCT al.idalbum as al_idalbum, al.nombre as al_nombre, al.ano as al_ano, al.numcanciones as al_numcanciones, al.valoracion as al_valoracion
                              FROM usuarioscanciones AS uc INNER JOIN relaciones AS r ON uc.idcancion = r.idcancion
                                                           INNER JOIN artistas AS ar ON r.idartista = ar.idartista
                                                           INNER JOIN albumes AS al ON r.idalbum = al.idalbum
                                                           WHERE uc.usuario="'.$usuario.'" AND ar.idartista='.$idartista.'';

        $resultado = $conexion->query($consulta);
        while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
             echo
             '<tr>
                <td><a href="music.php?page=11&album='.$fila['al_idalbum'].'"><div>'.$fila['al_nombre'].'</div></a></td>
                <td>'.$fila['al_ano'].'</td>
                <td>'.$fila['al_numcanciones'].'</td>
                <td>'.$fila['al_valoracion'].'</td>
             </tr>';
        }

        echo '</table>';
    }

	// Cerrar
    $conexion->close();
    echo '</div>';
 ?>