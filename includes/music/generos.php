<?php
//VER Generos
echo '<div id="divtablas">';

	$conexion = sqlite_open('database/multimedia.db');
	
    echo 'GENEROS';
	echo '<table border="0" >		
		<tr><td width=30%>Genero</td>            
            <td width=5%>#Artists</td>
            <td width=5%>#Songs</td>            
            <td width=5%>Rank</td>            
        </tr>';	
    
    //Consulta    
    $consulta = 'SELECT DISTINCT g.idgenero , g.nombre , g.numartistas , g.numcanciones,g.valoracion
                         FROM usuarioscanciones AS uc INNER JOIN relaciones AS r ON uc.idcancion = r.idcancion                                                       
                                                      INNER JOIN generos AS g ON r.idgenero = g.idgenero                                                       
                                                      WHERE uc.usuario="'.$usuario.'"';
        
    $resultado = sqlite_query($conexion,$consulta); 
        
    while($fila = sqlite_fetch_array($resultado)){
         echo 
         '<tr>            
            <td><a href="music.php?page=13&genero='.$fila['g.idgenero'].'"><div>'.$fila['g.nombre'].'</div></a></td>
            <td>'.$fila['g.numartistas'].'</td>
            <td>'.$fila['g.numcanciones'].'</td>
            <td>'.$fila['g.valoracion'].'</td>            		
         </tr>';
    }
             
    echo '</table>';
    
	sqlite_close($conexion);
 
 echo '</div>';
 ?>