<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        $usuario=$_SESSION['usuario'];
        $contrasena=$_SESSION['contrasena'];
        $permisos=$_SESSION['permisos'];
    }

?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Multimedia</title>
        <!--<meta http-equiv="refresh" content="60"/>-->
        <link rel=stylesheet href="css/estilo.css" type="text/css"/>
    </head>

    <body>
        <header id="headermultimedia">
            <section id="logotipo">
                <div id="logo"></div>
                <div id="logout">
                    <?php
                        if(isset($_SESSION['usuario'])){
                            include "includes/enlacelogout.php";
                        }

                    ?>
                </div>
                <div id="tipo">
                    <h1>MULTIMEDIA</h1>
                </div>
            </section>
        </header>
        <?php
            if(isset($_GET['new']) && !isset($usuario)){
                include "includes/formulariousuarionuevo.php";

            }else{
                if(isset($usuario))
                    include "includes/iniciomultimedia.php";
                else
                    include "includes/formulariologin.php";
            }

           // echo $usuario;
           // echo $contrasena;
        ?>


        <footer>
            (c) 2012 - Sergio Alexander Florez Galeano
        </footer>
    </body>
</html>