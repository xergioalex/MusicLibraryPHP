<?
    //Conexion
    if(isset($usuario)){
        $conexion = sqlite_open('database/multimedia.db') or die('No se pudo establecer conexion');
            
        $consulta = 'SELECT * FROM usuarios WHERE usuario="'.$usuario.'"';        
        $resultado = sqlite_query($conexion,$consulta); 
            
        while($fila = sqlite_fetch_array($resultado)){
            echo '<a id="enlacelogout" href="php/logout.php"><div id="divlogout">'.$fila['nombre'].'(logout)</div></a>';
            
        }
    }
?> 