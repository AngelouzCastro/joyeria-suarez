<?php
    $conexion=mysqli_connect('localhost','root','','suarezbd');
    $idtiendas=$_POST['continente'];
    $sql="SELECT articulos.idarticulos,
                tiendas.idtiendas,
                articulos.descripcion   
FROM existencia INNER JOIN articulos
on existencia.articulos_idarticulos = articulos.idarticulos
INNER JOIN tiendas on existencia.tiendas_idtiendas = tiendas.idtiendas 
WHERE existencia.tiendas_idtiendas = ".$idtiendas.";";
$reult=mysqli_query($conexion,$sql);
$cadena="<label> SELECT 2 </label><br>
        <select class='controls' id='lista2' name='lista2'>";

        while ($ver=mysqli_fetch_row($reult)):
            $cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
        endwhile;

        echo $cadena."</select>";
?>