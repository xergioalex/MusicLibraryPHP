<?php
//VER Canciones de Un album   
echo '<div id="divtablas">';
	$conexion = sqlite_open('database/multimedia.db');     
        
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
        $consulta = 'SELECT * FROM usuarioscanciones AS uc INNER JOIN relaciones AS r ON uc.idcancion = r.idcancion 
                                                           INNER JOIN canciones AS c ON r.idcancion = c.idcancion
                                                           INNER JOIN albumes AS al ON r.idalbum = al.idalbum
                                                           INNER JOIN artistas AS ar ON r.idartista = ar.idartista
                                                           INNER JOIN generos AS g ON r.idgenero = g.idgenero                                                                                                                  
                                                           WHERE uc.usuario="'.$usuario.'" AND al.idalbum='.$idalbum.'';
            
        $resultado = sqlite_query($conexion,$consulta); 
            
        while($fila = sqlite_fetch_array($resultado)){
             echo 
             '<tr>
                <td><a href="music.php?page=11&album='.$idalbum.'&song='.$fila['c.idcancion'].'"><div>'.$fila['c.nombre'].'</div></a></td>
                <td>'.$fila['c.duracion'].'</td>
                <td><a href="music.php?page=31&artista='.$fila['ar.idartista'].'"><div>'.$fila['ar.nombre'].'</div></a></td>
                <td><a href="music.php?page=11&album='.$fila['al.idalbum'].'"><div>'.$fila['al.nombre'].'</div></a></td>
                <td><a href="music.php?page=13&genero='.$fila['g.idgenero'].'"><div>'.$fila['g.nombre'].'</div></a></td>
                <td>'.$fila['c.reproducciones'].'</td>
                <td>'.$fila['c.valoracion'].'</td>		             
                <td><a href ="php/eliminarcancion.php?idcancion='.$fila['c.idcancion'].'">Eliminar</a></td>
             </tr>';
        }
                 
        echo '</table>';    
            
    
        
        //Buscar ruta de la cancion
        if(isset($_GET['song'])){
            $consulta = 'SELECT * FROM canciones WHERE idcancion='.$_GET['song'].' ';                      
            $resultado = sqlite_query($conexion,$consulta);    
            while($fila = sqlite_fetch_array($resultado))	
       	        $ruta = $fila['url'];	            
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
    
	sqlite_close($conexion);
 echo '</div>';
 ?>