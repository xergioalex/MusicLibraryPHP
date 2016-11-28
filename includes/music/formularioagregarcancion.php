
    <form action="php/music/agregarcancion.php" enctype="multipart/form-data" method="post">
        <table >
            <tr>
                <td id="alignright">Nombre de la Cancion</td>
                <td id="alignleft"><input name="nombrecancion" width=100% type="text" required /></td>
            </tr>

            <tr>
                <td id="alignright">Introduce una descripcion</td>
                <td id="alignleft"><textarea name="descripcioncancion" cols="40" rows='6' ></textarea></td>
            </tr>

            <tr>
                <td id="alignright">Artista</td>
                <td id="alignleft" >
                    <select name = 'idartista' required >
                    <?php
                        $conexion = new ProjectDB('database/multimedia.db') or die('No se pudo establecer conexion');
                        //Consulta
                        $consulta = 'SELECT * FROM artistas ORDER BY nombre ASC';

    	                $resultado = $conexion->query($consulta);
    	                while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
                            echo '<option value="'.$fila['idartista'].'">'.$fila['nombre'].'</Option>';
                        }

                        // Cerrar
                        $conexion->close();
                    ?>
                    </select>

                </td>
            </tr>

            <tr>
                <td id="alignright">Agregar un Nuevo Artista al Diccionario</td>
                <td id="alignleft" >
                    <a href="music.php?page=22">Agregar</a>

                </td>
            </tr>

            <tr>
                <td id="alignright">Album </td>
                <td id="alignleft" >

                    <select name = 'idalbum' required >
                    <?php
                        $conexion = new ProjectDB('database/multimedia.db') or die('No se pudo establecer conexion');
                        //Consulta
                        //Consulta
                        $consulta = 'SELECT * FROM albumes ORDER BY nombre ASC';

    	                $resultado = $conexion->query($consulta);
    	                while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
                            echo '<option value="'.$fila['idalbum'].'">'.$fila['nombre'].'</Option>';
                        }

                        // Cerrar
                        $conexion->close();
                    ?>
                    </select>

                </td>
            </tr>

            <tr>
                <td id="alignright">Agregar un Nuevo Album al Diccionario</td>
                <td id="alignleft" >
                    <a href="music.php?page=32">Agregar</a>

                </td>
            </tr>

            <tr>
                 <tr>
                <td id="alignright">Genero</td>
                <td id="alignleft" >

                    <select name = 'idgenero' required >
                    <?php
                        $conexion = new ProjectDB('database/multimedia.db') or die('No se pudo establecer conexion');

                        // Consulta
                        $consulta = 'SELECT * FROM generos ORDER BY nombre ASC';

    	                $resultado = $conexion->query($consulta);
    	                while($fila = $resultado->fetchArray(SQLITE3_ASSOC)){
                            echo '<option value='.$fila['idgenero'].'>'.$fila['nombre'].'</Option>';
                        }

                        // Cerrar
                        $conexion->close();
                    ?>
                    </select>

                </td>
            </tr>

            <tr>
                <td id="alignright">Agregar un Nuevo Genero al Diccionario</td>
                <td id="alignleft" >
                    <a href="music.php?page=42">Agregar</a>

                </td>
            </tr>

            <tr>
                <td id="alignright">Ranking</td>
                <td id="alignleft"><input name="valoracioncancion" type="number" min="0" max="5" value="2" step="1"/></td>
            </tr>

            <tr>
                <td id="alignright">Archivo Origen</td>
                <td id="alignleft"><input name="file" type="file" value=""  accept="audio/mp3" required /></td>
            </tr>
            <tr>
                <td id="alignright"></td>
                <td id="alignleft"><input type="submit" value="Enviar"/></td>
            </tr>

        </table>
    </form>
