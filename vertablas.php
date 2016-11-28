<?php include 'php/projectDB.php'; ?>

<?php
// VER usuarios
	$conexion = new ProjectDB('database/multimedia.db') or die('Ha sido imposible establecer la conexión');
	$consulta = 'SELECT * FROM usuarios';
	$resultado = $conexion->query($consulta);

	echo '<table border="3" >
		<tr><td>Usuarios</td></tr>
		<tr><td>Usuario</td><td>Contrasena</td><td>Nombre</td><td>Apellido</td><td>Titulo</td><td>Descripcion</td><td>Foto</td><td>WebPersonal</td><td>Email</td><td>Permisos</td></tr>';
	while($fila = $resultado->fetchArray(SQLITE3_ASSOC)){
		echo '<tr>
                <td>'.$fila['usuario'].'</td>
                <td>'.$fila['contrasena'].'</td>
                <td>'.$fila['nombre'].'</td>
                <td>'.$fila['apellido'].'</td>
                <td>'.$fila['titulo'].'</td>
                <td>'.$fila['descripcion'].'</td>
                <td>'.$fila['foto'].'</td>
                <td>'.$fila['webpersonal'].'</td>
                <td>'.$fila['email'].'</td>
                <td>'.$fila['permisos'].'</td>
		      </tr>';
	}

	echo '</table><br>';
	$conexion->close();


// VER Artistas
	$conexion = new ProjectDB('database/multimedia.db') or die('Ha sido imposible establecer la conexión');
	$consulta = 'SELECT * FROM artistas';
	$resultado = $conexion->query($consulta);

	echo '<table border="3" >
		<tr><td>Artistas</td></tr>
		<tr><td>IdArtista</td><td>Nombre</td><td>Descripcion</td><td>NumAlbumes</td><td>NumCanciones</td><td>Valoracion</td></tr>';
	while($fila = $resultado->fetchArray(SQLITE3_ASSOC)){
		echo '<tr>
                <td>'.$fila['idartista'].'</td>
                <td>'.$fila['nombre'].'</td>
                <td>'.$fila['descripcion'].'</td>
                <td>'.$fila['numalbumes'].'</td>
                <td>'.$fila['numcanciones'].'</td>
                <td>'.$fila['valoracion'].'</td>
            </tr>';
	}

	echo '</table><br>';
	$conexion->close();


// VER Albumes
	$conexion = new ProjectDB('database/multimedia.db') or die('Ha sido imposible establecer la conexión');
	$consulta = 'SELECT * FROM albumes';
	$resultado = $conexion->query($consulta);

	echo '<table border="3" >
		<tr><td>Albumes</td></tr>
		<tr><td>IdAlbum</td><td>Nombre</td><td>Descripcion</td><td>Ano</td><td>NumCanciones</td><td>Valoracion</td></tr>';
	while($fila = $resultado->fetchArray(SQLITE3_ASSOC)){
		echo '<tr>
                <td>'.$fila['idalbum'].'</td>
                <td>'.$fila['nombre'].'</td>
                <td>'.$fila['descripcion'].'</td>
                <td>'.$fila['ano'].'</td>
                <td>'.$fila['numcanciones'].'</td>
                <td>'.$fila['valoracion'].'</td>
		      </tr>';
	}

	echo '</table><br>';
	$conexion->close();


// VER Canciones
	$conexion = new ProjectDB('database/multimedia.db') or die('Ha sido imposible establecer la conexión');
	$consulta = 'SELECT * FROM canciones';
	$resultado = $conexion->query($consulta);

	echo '<table border="3" >
		<tr><td>Canciones</td></tr>
		<tr><td>IdCancion</td><td>Nombre</td><td>Descripcion</td><td>Duracion</td><td>Reproducciones</td><td>Valoracion</td><td>Url</td></tr>';
	while($fila = $resultado->fetchArray(SQLITE3_ASSOC)){
		echo '<tr>
                <td>'.$fila['idcancion'].'</td>
                <td>'.$fila['nombre'].'</td>
                <td>'.$fila['descripcion'].'</td>
                <td>'.$fila['duracion'].'</td>
                <td>'.$fila['reproducciones'].'</td>
                <td>'.$fila['valoracion'].'</td>
                <td>'.$fila['url'].'</td>
		      </tr>';
	}

	echo '</table><br>';
	$conexion->close();



// VER Generos
	$conexion = new ProjectDB('database/multimedia.db') or die('Ha sido imposible establecer la conexión');
	$consulta = 'SELECT * FROM generos';
	$resultado = $conexion->query($consulta);

	echo '<table border="3" >
		<tr><td>Generos</td></tr>
		<tr><td>IdGenero</td><td>Nombre</td><td>Descripcion</td><td>NumArtistas</td><td>NumCanciones</td><td>Valoracion</td></tr>';
	while($fila = $resultado->fetchArray(SQLITE3_ASSOC)){
		echo '<tr>
                <td>'.$fila['idgenero'].'</td>
                <td>'.$fila['nombre'].'</td>
                <td>'.$fila['descripcion'].'</td>
                <td>'.$fila['numartistas'].'</td>
                <td>'.$fila['numcanciones'].'</td>
                <td>'.$fila['valoracion'].'</td>
		      </tr>';
	}

	echo '</table><br>';
	$conexion->close();



// VER Relaciones
	$conexion = new ProjectDB('database/multimedia.db') or die('Ha sido imposible establecer la conexión');
	$consulta = 'SELECT * FROM relaciones';
	$resultado = $conexion->query($consulta);

	echo '<table border="3" >
		<tr><td>Relaciones</td></tr>
		<tr><td>IdRelacion</td><td>IdCancion</td><td>IdAlbum</td><td>IdArtista</td><td>IdGenero</td></tr>';
	while($fila = $resultado->fetchArray(SQLITE3_ASSOC)){
		echo '<tr>
                <td>'.$fila['idrelacion'].'</td>
                <td>'.$fila['idcancion'].'</td>
                <td>'.$fila['idalbum'].'</td>
                <td>'.$fila['idartista'].'</td>
                <td>'.$fila['idgenero'].'</td>
		      </tr>';
	}

	echo '</table><br>';
	$conexion->close();


// VER UsuariosCanciones
	$conexion = new ProjectDB('database/multimedia.db') or die('Ha sido imposible establecer la conexión');
	$consulta = 'SELECT * FROM usuarioscanciones';
	$resultado = $conexion->query($consulta);

	echo '<table border="3" >
		<tr><td>Relaciones</td></tr>
		<tr><td>IdUsuarioCancion</td><td>Usuario</td><td>IdCancion</td></tr>';
	while($fila = $resultado->fetchArray(SQLITE3_ASSOC)){
		echo '<tr>
                <td>'.$fila['idusuariocancion'].'</td>
                <td>'.$fila['usuario'].'</td>
                <td>'.$fila['idcancion'].'</td>
		      </tr>';
	}

	echo '</table><br>';
	$conexion->close();
?>