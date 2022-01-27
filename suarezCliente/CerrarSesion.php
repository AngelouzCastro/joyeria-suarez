<?php
    // mostramos la sesion
    session_start();
    //destruimos la session
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cerrar sesi&oacute;n</title>
    </head>
    <body>
        <h2>Has cerrado cesi&oacute;n correctamente</h2>
        <br>
        <p><a href="index.php">Ir al login</a></p>
    </body>
<html>