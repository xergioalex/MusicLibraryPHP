<?php
//VER Albumes
echo '<div id="divtablas">';

	$conexion = sqlite_open('database/multimedia.db');
	
    echo 'ALBUMES';
	echo '<table border="0" >		
		<tr><td width=30%>Album</td>
            <td width=5%>A�o</td>
            <td width=5%>#Songs</td>            
            <td width=5%>Rank</td>
        </tr>';	
    
    //Consulta    
    $consulta = 'SELECT DISTINCT al.idalbum, al.nombre, al.ano , al.numcanciones , al.valoracion 
                          FROM usuarioscanciones AS uc INNER JOIN relaciones AS r ON uc.idcancion = r.idcancion                                                        
                                                       INNER JOIN albumes AS al ON r.idalbum = al.idalbum                                                       
                                                       WHERE uc.usuario="'.$usuario.'"';
        
    $resultado = sqlite_query($conexion,$consulta); 
        
    while($fila = sqlite_fetch_array($resultado)){
         echo 
         '<tr>            
            <td><a href="music.php?page=11&album='.$fila['al.idalbum'].'"><div>'.$fila['al.nombre'].'</div></a></td>
            <td>'.$fila['al.ano'].'</td>
            <td>'.$fila['al.numcanciones'].'</td>
            <td>'.$fila['al.valoracion'].'</td>            	
         </tr>';
    }
             
    echo '</table>';
    
	sqlite_close($conexion);
 echo '</div>';
 ?>