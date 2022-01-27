<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/controlAdmin.css">
    <title>home</title>
</head>
<body>
	
<h1>Bienbenido</h1>
<?php
	
	
?>
<div class="principal">	
	<div class="principal_menu">
		<table class="tiendas">
			<tr>
				<th colspan="2">
					<h2>control de tienda</h2>
				</th>
			</tr>
			<tr>
				<td>
					<img src="css/imgcss/tienda.png" width=100px>
				</td>
				<td>
					<ol>
						<li><a href="conexion/altaTienda.php">alta de tienda</a></li>
						<li>
							<a href="conexion/modificarTienda.php">modificacion de tienda</a>
						</li>
						<!--
						<li>
							<a href="">desactivar tienda</a>
						</li>-->
					</ol>
				</td>
			</tr>
		</table>

		<table class="usuarios">
			<tr>
				<th colspan="2">
			<h2>control de usuarios</h2>
				</th>
			</tr>
			<tr>
				<td>
					<img src="css/imgcss/usuarios.png" width=100px>
				</td>
				<td>
					<ol>
						<li>
							<a href="conexion/singup.php">alta de usuario administrador</a>
						</li>
						<li>
							<a href="conexion/modificarUsuarios.php">modificacion de usuario administrador</a>
						</li>
						<!--
						<li>
							<a href="">desactivar usuario administrador</a>
						</li>
						
						<li>
							<a href="conexion/registroTipoUsuario.php">alta tipo de usuario</a>
						</li>
						<li>
							<a href="">modificacion de tipo de usuario</a>
						</li>
						-->
					<ol>
				</td>
			</tr>
		</table>
	</div>
	<div class="principal_menu">
		<table class="productos">
			<tr>
				<th colspan="2">
					<h2>control de productos</h2>
				</th>
			</tr>
			<tr>
				<td>
					<img src="css/imgcss/product.png" width=100px>
				</td>
			
				<td>
					<ol>
					<li><a href="conexion/altaProducto.php">alta de producto</a></li>
					
					<li><a href="conexion/modificarArti.php">modificacion de producto</a></li>
					<!--
					<li><a href="">desactivar producto</a></li>
					-->
					<li><a href="conexion/registroLinea.php">alta de nueva linea de producto</a></li>
					
					<li><a href="conexion/modificarLinea.php">modificacion de una linea</a></li>
					
					<li><a href="conexion/existencia.php">nueva existencias</a></li>
					<li><a href="conexion/actulaexistencia.php">Actualisar existencias</a></li>
					</ol>
				</td>
			</tr>
		</table>
		<table class="envios">
			<tr>
				<th colspan=2>
					<h2>control de servicio de envios</h2>
				</th>
			</tr>
			<tr>
				<td>
					<img src="css/imgcss/envio.png" width=100px>
				</td>
				<td>
					<ol>
					<li><a href="conexion/registroEnvios.php">alta de servicio</a></li>
					
					<li><a href="conexion/modificarServicio.php">modificacion de servicio</a></li>
					<!--
					<li><a href="">desactivar un servicio</a></li>
				-->
					</ol>	
				</td>
			</tr>
		</table>
	</div>
				
</div>

<div class="reporte">
		<h2>reportes</h2>
		<a href="reportegen.php">Reporte hoy</a>
		<br>
		<a href="reportegen2.php">Reporte por fecha/tienda</a>
</div>
<div>
<p><a href="CerrarSesion.php">Cerrar Sesi&oacute;n</a></p>
</div>
	
<br>


</body>
</html>