<?php
//VER Artistas de un Genero
echo '<div id="divtablas">';
	$conexion = sqlite_open('database/multimedia.db');
	
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
        $consulta = 'SELECT DISTINCT ar.idartista,ar.nombre,ar.numalbumes,ar.numcanciones,ar.valoracion
                              FROM usuarioscanciones AS uc INNER JOIN relaciones AS r ON uc.idcancion = r.idcancion                                                        
                                                           INNER JOIN artistas AS ar ON r.idartista = ar.idartista                                                       
                                                           WHERE uc.usuario="'.$usuario.'" AND g.idgenero='.$idgenero.'';
            
        $resultado = sqlite_query($conexion,$consulta); 
            
        while($fila = sqlite_fetch_array($resultado)){
             echo 
             '<tr>            
                <td>'.$fila['ar.nombre'].'</td>
                <td>'.$fila['ar.numalbumes'].'</td>
                <td>'.$fila['ar.numcanciones'].'</td>
                <td>'.$fila['ar.valoracion'].'</td>            		
                <td><a href ="actualizarcancion.php?idcancion='.$fila['ar.idartista'].'">Editar</a></td>
                <td><a href ="php/eliminarcancion.php?idcancion='.$fila['ar.idartista'].'">Eliminar</a></td>
             </tr>';
        }
                 
        echo '</table>';
    }
	sqlite_close($conexion);
    
echo '</div>';    
 ?>