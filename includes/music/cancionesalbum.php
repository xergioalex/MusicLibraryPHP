<?php
    // VER Canciones de Un album
    echo '<div id="divtablas">';

	$conexion = new ProjectDB('database/multimedia.db') or die('No se pudo establecer conexion');

    //Recibo el album
    if(!isset($_GET['album'])){
       //Y vuelvo
	   echo
       "<html>
            <head>
				<meta http-equiv = 'REFRESH' content='0;url=music.php'>
			</head>
		<html>";
    }else{

    	$idalbum = $_GET['album'];

        echo 'CANCIONES';
    	echo '<table border="0" >
    		<tr><td width=30%>Cancion</td>
                <td width=5%>Time</td>
                <td width=10%>Artista</td>
                <td width=10%>Album</td>
                <td width=10%>Genero</td>
                <td width=5%>Plays</td>
                <td width=5%>Rank</td>
                <td width=5%>Delete</td>
            </tr>';

        //Consulta
        $consulta = 'SELECT c.idcancion as c_idcancion, c.nombre as c_nombre, c.duracion as c_duracion, ar.idartista as ar_idartista, ar.nombre as ar_nombre, al.idalbum as al_idalbum, al.nombre as al_nombre, g.idgenero as g_idgenero, g.nombre as g_nombre, c.reproducciones as c_reproducciones, c.valoracion as c_valoracion, c.idcancion as c_idcancion
                        FROM usuarioscanciones AS uc INNER JOIN relaciones AS r ON uc.idcancion = r.idcancion
                                                           INNER JOIN canciones AS c ON r.idcancion = c.idcancion
                                                           INNER JOIN albumes AS al ON r.idalbum = al.idalbum
                                                           INNER JOIN artistas AS ar ON r.idartista = ar.idartista
                                                           INNER JOIN generos AS g ON r.idgenero = g.idgenero
                                                           WHERE uc.usuario="'.$usuario.'" AND al.idalbum='.$idalbum.'';

        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
             echo
             '<tr>
                <td><a href="music.php?page=11&album='.$idalbum.'&song='.$fila['c_idcancion'].'"><div>'.$fila['c_nombre'].' (reproducir)</div></a></td>
                <td>'.$fila['c_duracion'].'</td>
                <td><a href="music.php?page=31&artista='.$fila['ar_idartista'].'"><div>'.$fila['ar_nombre'].'</div></a></td>
                <td><a href="music.php?page=11&album='.$fila['al_idalbum'].'"><div>'.$fila['al_nombre'].'</div></a></td>
                <td><a href="music.php?page=13&genero='.$fila['g_idgenero'].'"><div>'.$fila['g_nombre'].'</div></a></td>
                <td>'.$fila['c_reproducciones'].'</td>
                <td>'.$fila['c_valoracion'].'</td>
                <td><a href ="php/eliminarcancion.php?idcancion='.$fila['c_idcancion'].'">Eliminar</a></td>
             </tr>';
        }

        echo '</table>';



        //Buscar ruta de la cancion
        if(isset($_GET['song'])){
            $consulta = 'SELECT * FROM canciones WHERE idcancion='.$_GET['song'].' ';
            $resultado = $conexion->query($consulta);
            while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
       	        $ruta = $fila['url'];
            }
        }

        if(isset($ruta)){
            echo
            '<audio id="audio" controls = "controls" autoplay="autoplay">
                <source src="'.$ruta.'">
    	       	   Tu navegador no soporta audio HTML5
            </audio>';
        }
        else{
            echo
            '<audio id="audio" controls = "controls" >
                <source src="">
    	       	   Tu navegador no soporta audio HTML5
            </audio>';
        }
    }

	$conexion->close();

    echo '</div>';
 ?>