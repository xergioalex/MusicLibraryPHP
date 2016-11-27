<form action="php/music/agregargenero.php" method="post">
    <table >
    
        <tr>
            <td id="alignright">Nombre del Genero</td>
            <td id="alignleft"><input name="nombre" width=100% type="text" required /></td>
        </tr>        
        <?php
            if(isset($_GET['exist'])){
                echo '
                <tr>
                    <td id="alignright"></td>
                    <td id="alignleft"><span id="error">El Genero ya existe<span></td>
                </tr>';
            }
        ?>
        
        <tr>
            <td id="alignright">Introduce una descripcion</td>
            <td id="alignleft"><textarea name="descripcion" cols="40" rows='6' ></textarea></td>
        </tr>
        <tr>
            <td id="alignright">Ranking</td>
            <td id="alignleft"><input name="valoracion" type="number" min="0" max="5" value="2" step="1"/></td>
        </tr>
        <tr>
            <td id="alignright"></td>
            <td id="alignleft"><input type="submit" value="Enviar"/></td>
        </tr>
        
    </table>
</form>