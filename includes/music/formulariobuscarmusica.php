<div id="formulariobuscarmusica">
    <form action="music.php?page=14" method="get">
        <input id="inputtextlogin" type="text" name="search" value="<?php echo (isset($_GET['search']))? $_GET['search']: ''; ?>" placeholder="Buscar" autocomplete="off"/>
        <input id="submitformulariobuscarmusica" type="text" name="page" value="14"/>
        <input id="submitformulariobuscarmusica" type="submit"/>
    </form>
</div>