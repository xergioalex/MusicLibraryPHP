<div id="formulariologin">
    <table id="tablalogin">
        <?php
            if(isset($_GET['usercreated'])){
                echo '<tr><td><strong style="color: #29710c;">Usuario creado exitosamente</strong></td></tr>';
            }
        ?>
  		<tr><td><h1>ACCEDER</h1></td></tr>
        <tr><td><a href="iniciarcomoinvitado.php" style="color: #005ae2;"><strong>Acceder como invitado</strong></a></td></tr>
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
        <tr><td><a href="multimedia.php?new=true" style="color: #005ae2;"><strong>Registrate</strong></a></td></tr>
    </table>
</div>
