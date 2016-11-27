<?php
    session_start();
    
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    
    $conexion = sqlite_open("../database/multimedia.db");
    $consulta = "SELECT * FROM usuarios";
    $resultado = sqlite_query($conexion,$consulta);
    
    $usuarioexiste = false;
    
    while($fila = sqlite_fetch_array($resultado)){
        $usuariobase = $fila['usuario'];
        $contrasenabase = $fila['contrasena'];
        $permisosbase = $fila['permisos'];
		
		if($usuariobase==$usuario && $contrasenabase==$contrasena){
			$_SESSION['usuario'] = $usuario;
			$_SESSION['contrasena'] = $contrasena;
			$_SESSION['permisos'] = $permisosbase;
			echo '
			<html>
				<head>
					<meta http-equiv = "REFRESH" content="0;url=principal.php">				
				</head>
			</html>';			
		}		                
    }
    
    if($usuarioenbase){
        echo '
        <html>
            head>
                <meta http-equiv = "REFRESH" content="0;url=principal.php">				
            </head>
        </html>';
    
    }
?>