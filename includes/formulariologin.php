<div id="formulariologin">
    <table id="tablalogin">
  		<tr><td><h1>ACCEDER</h1></td></tr>
  		<form action="php/login.php" method="post">
            <?php
                if(isset($_GET['exist'])){
                    echo '<tr><td id="error">El usuario no existe o la contraseña es incorrecta</td></tr>';
                }
            ?>
   			<tr><td><h2>Usuario</h2></td></tr>
   			<tr><td><input id="inputtextlogin" type="text" name="usuario" value="" required/></td></tr>
   			<tr><td><h2>Contraseña</h2></td></tr>
   			<tr><td><input id="inputtextlogin" type="password" name="contrasena" value="" required/></td></tr>
   			<tr><td><input id="submitformulariologin" type="submit"/></td></tr>
  		</form>
        <tr><td><p>Si aun no eres usuario</p></td></tr>
        <tr><td><a href="multimedia.php?new=true">Registrate</a></td></tr>
    </table>
</div>
