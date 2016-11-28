<?php
    // VER Artistas de un Genero
    echo '<div id="divtablas">';

	$conexion = new ProjectDB('database/multimedia.db') or die('No se pudo establecer conexion');

    //Recibo el Genero
    if(!isset($_GET['genero'])){
       //Y vuelvo
	   echo
       "<html>
            <head>
				<meta http-equiv = 'REFRESH' content='0;url=music.php'>
			</head>
		<html>";
    }else{

        $idgenero = $_GET['genero'];

        echo 'ARTISTAS';
    	echo '<table border="0" >
    		<tr><td width=30%>Artista</td>
                <td width=5%>#Albums</td>
                <td width=5%>#Songs</td>
                <td width=5%>Rank</td>
            </tr>';

        //Consulta
        $consulta = 'SELECT DISTINCT ar.idartista as ar_idartista,ar.nombre as ar_nombre,ar.numalbumes as ar_numalbumes,ar.numcanciones as ar_numcanciones,ar.valoracion as ar_valoracion
                              FROM usuarioscanciones AS uc INNER JOIN relaciones AS r ON uc.idcancion = r.idcancion
                                                           INNER JOIN artistas AS ar ON r.idartista = ar.idartista
                                                           WHERE uc.usuario="'.$usuario.'" AND g.idgenero='.$idgenero.'';

        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
             echo
             '<tr>
                <td>'.$fila['ar_nombre'].'</td>
                <td>'.$fila['ar_numalbumes'].'</td>
                <td>'.$fila['ar_numcanciones'].'</td>
                <td>'.$fila['ar_valoracion'].'</td>
                <td><a href ="actualizarcancion.php?idcancion='.$fila['ar_idartista'].'">Editar</a></td>
                <td><a href ="php/eliminarcancion.php?idcancion='.$fila['ar_idartista'].'">Eliminar</a></td>
             </tr>';
        }

        echo '</table>';
    }
	$conexion->close();

    echo '</div>';
 ?>