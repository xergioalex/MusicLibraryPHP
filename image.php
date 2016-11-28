<?php include 'php/projectDB.php'; ?>

<?php
    session_start();

    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
        $contrasena= $_SESSION['usuario'];
        $permisos= $_SESSION['permisos'];
    }
    else{
        echo '
		<html>
			<head>
				<meta http-equiv = "REFRESH" content="0;url=index.php">
			</head>
		<html>';

    }

    if (isset($_GET['page'])) {
        $page=$_GET['page'];
    } else {
        $page=0;
    }

?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Musica</title>
        <!--<meta http-equiv="refresh" content="500"/>-->
        <link rel=stylesheet href="css/estilo.css" type="text/css"/>
    </head>

    <body>
        <header id="headerimage">
            <section id="logotipo">
                <div id="logo"></div>
                <div id="formulariobuscarmusica">
                    <?php //include "includes/music/formulariobuscarmusica.php"; ?>
                </div>
                <div id="logout">
                    <?php include "includes/enlacelogout.php"; ?>
                </div>
            </section>
            <nav>
                <ul>
                    <li><a href="multimedia.php"><div id="navmultimediaheader" ></div> </a></li>
                    <li><a href="image.php"><div id="navimageheader" ></div></a></li>
                    <li><a href="video.php"><div id="navvideoheader" ></div></a></li>
                    <li><a href="music.php"><div id="navmusicheader" ></div></a></li>
                </ul>
            </nav>
        </header>
        <!-- <aside id="menu">
               <h2 id="tituloMenu">Men&uacute;</h2>
        	   <ul>
                    <li><a id="inicio" href="music.php"><div>INICIO</div></a></li>
                    <li><a id="canciones" href="music.php?page=1"><div>Canciones</div></a></li>
                    <?php //if($page==1 || $page==12 ){include "includes/music/menueditcanciones.php";} ?>
          		    <li><a id="artistas" href="music.php?page=2"><div>Artistas</div></a></li>
                    <li><a id="albumes" href="music.php?page=3"><div>Albumes</div></a></li>
                    <li><a id="generos" href="music.php?page=4"><div>Generos</div></a></li>
               	</ul>
        </aside> -->
        <div id="cuerpo" style="width:96%">

            <?php
                switch($page){
                    default: include "includes/image/inicio.php";  break;
                }
            ?>

        </div>
        <footer>
            (c) 2012 - Sergio Alexander Florez Galeano
        </footer>
    </body>
</html>