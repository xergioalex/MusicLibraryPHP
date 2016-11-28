<div id="formulariousuarionuevo">
    <table id="tablalogin">
  		<tr><td><h1>NUEVO USUARIO</h1></td></tr>
  		<form action="php/crearusuarionuevo.php" method="post">
            <?php
                if(isset($_GET['exist'])){
                    echo '<tr><td id="error">El usuario ya existe</td></tr>';
                }
            ?>
   			<tr><td><h2>Usuario</h2></td></tr>
   			<tr><td><input id="inputtextlogin" type="text" name="usuario" value="" required/></td></tr>
            <tr><td><h2>Nombres</h2></td></tr>
   			<tr><td><input id="inputtextlogin" type="text" name="nombre" value="" required/></td></tr>
            <tr><td><h2>Apellidos</h2></td></tr>
   			<tr><td><input id="inputtextlogin" type="text" name="apellido" value="" /></td></tr>
            <tr><td><h2>Titulo</h2></td></tr>
   			<tr><td><input id="inputtextlogin" type="text" name="titulo" value="" /></td></tr>
            <tr><td><h2>Web Personal</h2></td></tr>
   			<tr><td><input id="inputtextlogin" type="text" name="webpersonal" value="" /></td></tr>
            <tr><td><h2>email</h2></td></tr>
   			<tr><td><input id="inputtextlogin" type="email" name="email" value="" required/></td></tr>
            <tr><td><h2>Sobre ti</h2></td></tr>
   			<tr><td><textarea name="descripcion" cols="40" rows='6' ></textarea></td></tr>

   			<tr><td><h2>Contraseña</h2></td></tr>
   			<tr><td><input id="inputtextlogin" type="password" name="contrasena" value="" required/></td></tr>

   			<tr><td><input id="submitformulariologin" type="submit"/></td></tr>
  		</form>
    </table>
</div>
