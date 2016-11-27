<?php

    //Consulta
    $conexion = sqlite_open('../database/multimedia.db') or die('No se pudo establecer conexion');
    $consultausuario = 'SELECT * FROM usuarios';
    $resultadousuarios = sqlite_query($conexion,$consultausuario);

    $fila=sqlite_fetch_array($resultadousuarios);

    //Consulta
    $consulta = 'SELECT * FROM usuarioscanciones AS uc INNER JOIN '.$fila.'';


    $resultado = sqlite_query($conexion,$consulta);

?>

<?php

    // Consulta
    // --Old-- $conexion = sqlite_open('../database/multimedia.db') or die('No se pudo establecer conexion');
	$conexion = new SQLite3('../database/multimedia.db') or die('No se pudo establecer conexion');

    $consultausuario = 'SELECT * FROM usuarios';
    // --Old-- $resultadousuarios = sqlite_query($conexion,$consultausuario);
    $resultadousuarios = $conexion->query($consultausuario);

    // --Old-- $fila=sqlite_fetch_array($resultadousuarios);
    $fila= $resultadousuarios->fetchArray(SQLITE3_ASSOC);

    //Consulta
    $consulta = 'SELECT * FROM usuarioscanciones AS uc INNER JOIN '.$fila.'';


    // --Old-- $resultado = sqlite_query($conexion,$consulta);
    $resultado = $conexion->query($consulta);

?>