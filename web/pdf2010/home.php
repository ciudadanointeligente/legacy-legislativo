<?php
    require("sesion.php");
    require("cnx.php");
    require("controlador.php");
    $coneccion = coneccion();
    $o = new Controlador();
    $o->setQry("SELECT count(*) value1 FROM beca");
    if($o->selectQ()>0):
?>
        <br />
        <br />
        <br />
        <input type="button" name="Descargar" value="Descargar listado inscritos" onclick="location.href='download.php'" />
<?php else: ?>
        <br />
        <br />
        <br />
        No existen inscripciones registradas en nuestra base de datos.
<?php endif; ?>
<?php 
    $og = new Controlador();
    $og->setQry("SELECT count(*) value1 FROM beca_google");
    if($og->selectQ()>0):
?>
        <br />
        <br />
        <br />
        <input type="button" name="Descargar" value="Descargar listado inscritos Beca Google" onclick="location.href='grantGoogle.php'" />
<?php else: ?>
        <br />
        <br />
        <br />
        No existen inscripciones de la Beca Google registradas en nuestra base de datos.
<?php endif; ?>
        <br />
        <br />
        <a href="logout.php">Logout</a>
