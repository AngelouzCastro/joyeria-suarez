<!DOCTYPE html>
<html>
<head>
	<title>reporte por tienda</title>
	<link rel="stylesheet" type="text/css" href="conexion/forms.css">
</head>
<body>
	<div >
		<?php
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];
        $tienda = $_POST['entienda'];
        

        $db_host="localhost";
        $db_user="root";
        $db_pass="";
        $db_db="suarezbd";
        $total = 0;
        $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
        $query="SELECT ventas.idventas,
         articulos.idarticulos,
         ventas.cantidad,
         envio.compania,
         ventas.fecha,
         tiendas.descripcion,
         ventas.total,
         usuario.nombre 
         FROM ventas INNER JOIN articulos on ventas.articulos_idarticulos = articulos.idarticulos INNER JOIN envio on ventas.envio_idenvio = envio.idenvio INNER JOIN tiendas on ventas.tiendas_idtiendas = tiendas.idtiendas INNER JOIN usuario on ventas.usuario_idusuario = usuario.idusuario WHERE (fecha BETWEEN '".$inicio."' AND '".$fin."') AND tiendas_idtiendas =".$tienda."; ";
        $res=mysqli_query($con, $query);
        ?>
        <table class="registro" border="2">
        	<tr>
        		<th>No de venta</th>
        		<th>articulo</th>
        		<th>cantidad</th>
        		<th>enviado por</th>
        		<th>fecha</th>
        		<th>en tienda</th>
        		<th>total venta</th>
        		<th>realizada por:</th>
        	</tr>
        <?php
        while ($row=mysqli_fetch_assoc($res)) { ?>
        	<tr>
        		<td><?php echo $row['idventas']?> </td>
        		<td><?php echo $row['idarticulos']?> </td>
        		<td><?php echo $row['cantidad']?> </td>
        		<td><?php echo $row['compania']?> </td>
        		<td><?php echo $row['fecha']?> </td>
        		<td><?php echo $row['descripcion']?> </td>
        		<td><?php echo $row['total']?> </td>
        		<td><?php echo $row['nombre']?> </td>
        	</tr>

        <?php 
        	$total = $total + $row['total'];

    	} 
    	echo "<tr><td><h2>Total $".$total."</h2></td></tr>";
    	?>
        	</table>
   </div>
</body>
</html>