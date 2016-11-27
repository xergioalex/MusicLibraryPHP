<?php
//VER Artistas
echo '<div id="divtablas">';
	$conexion = sqlite_open('database/multimedia.db');
	
    echo 'ARTISTAS';
	echo '<table border="0" >		
		<tr><td width=30%>Artista</td>
            <td width=5%>#Albums</td>
            <td width=5%>#Songs</td>            
            <td width=5%>Rank</td>
        </tr>';	
    
    //Consulta    
    $consulta = 'SELECT DISTINCT ar.idartista,ar.nombre,ar.numalbumes,ar.numcanciones,ar.valoracion
                          FROM usuarioscanciones AS uc INNER JOIN relaciones AS r ON uc.idcancion = r.idcancion                                                        
                                                       INNER JOIN artistas AS ar ON r.idartista = ar.idartista                                                       
                                                       WHERE uc.usuario="'.$usuario.'"';
        
    $resultado = sqlite_query($conexion,$consulta); 
        
    while($fila = sqlite_fetch_array($resultado)){
         echo 
         '<tr>            
            <td><a href="music.php?page=31&artista='.$fila['ar.idartista'].'"><div>'.$fila['ar.nombre'].'</div></a></td>
            <td>'.$fila['ar.numalbumes'].'</td>
            <td>'.$fila['ar.numcanciones'].'</td>
            <td>'.$fila['ar.valoracion'].'</td>            		
         </tr>';
    }
             
    echo '</table>';
    
	sqlite_close($conexion);
    
echo '</div>';    
 ?>